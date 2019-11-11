<?php

namespace App;

use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use softDeletes;
    protected $guarded = [];
    //...Relation to author
    public function author()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //...image accessor
    public function getImageUrlAttribute($value)
    {
        $imageUrl = "";
        if(! is_null($this->image))
        {
            $imagePath = public_path()."/img/".$this->image;
            if(file_exists($imagePath))
            {
                $imageUrl = asset("img/".$this->image);
            }
        }
        return $imageUrl;
    }

    //...Date accessor
    protected $dates = ['published_at'];
    public function getDateAttribute($value)
    {
        return is_null($this->published_at)? '' : $this->published_at->diffForHumans();
    }

    //...Markdown accessor
    public function getBodyHtmlAttribute($value)
    {
        return Markdown::convertToHtml(e($this->body));
    }

    public function dateFormatted($showTimes = false)
    {
        $format = 'd-M-Y';
        if($showTimes) $format = "h:i:a";
        return $this->created_at->format($format);
    }

    public function publicationLabel()
    {
        if(!$this->published_at)
            return '<span class="label label-warning">Draft</span>';

        elseif ($this->published_at && $this->published_at->isFuture())
            return '<span class="label label-primary">Schedule</span>';

        else
            return '<span class="label label-success">Published</span>';

    }

    //...scope orderBy published latest
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('published_at', 'desc');
    }
    //...scope for popular posts
    public function scopePopular($query)
    {
        return $query->orderBy('view_count', 'desc');
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', Carbon::now());
    }
    public function scopeScheduled($query)
    {
        return $query->where('published_at', '>', Carbon::now());
    }
    public function scopeDrafted($query)
    {
        return $query->whereNull('published_at');
    }


}
