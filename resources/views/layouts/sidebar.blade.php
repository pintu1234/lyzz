<div class="col-md-4">
    <aside class="right-sidebar">
        <div class="search-widget">
            <form action="{{route('blog')}}">
                <div class="input-group">
                    <input type="text" class="form-control input-lg" name="term" value="{{request('term')}}" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-lg btn-default" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div><!-- /input-group -->
            </form>
        </div>

        <div class="widget">
            <div class="widget-heading">
                <h4>Categories</h4>
            </div>
            <div class="widget-body">
                @if($categories)
                <ul class="categories">
                    @foreach($categories as $category)
                    <li>
                        <a href="{{route('category', $category->slug)}}"><i class="fa fa-angle-right"></i> {{$category->title}}</a>
                        <span class="badge pull-right">{{$category->posts->count()}}</span>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <div class="widget">
            <div class="widget-heading">
                <h4>Popular Posts</h4>
            </div>
            <div class="widget-body">
                <ul class="popular-posts">
                  @foreach($popularPosts as $post)
                    <li>
                        @if($post->imageUrl)
                            <div class="post-image">
                                <a href="{{route('blog.show', $post->id)}}">
                                    <img src="{{$post->imageUrl}}" />
                                </a>
                            </div>
                        @endif
                        <div class="post-body">
                            <h6><a href="{{route('blog.show', $post->id)}}">{{$post->title}}</a></h6>
                            <div class="post-meta">
                                <span>{{$post->date}}</span>
                            </div>
                        </div>
                    </li>
                  @endforeach
                </ul>
            </div>
        </div>

        <div class="widget">
            <div class="widget-heading">
                <h4>Tags</h4>
            </div>
            <div class="widget-body">
                <ul class="tags">
                    @foreach($tags as $tag)
                    <li><a href="{{route('tag', $tag->slug)}}">{{$tag->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </aside>
</div>
