<div class="full-width leave-reply">
    <form action="{{ route('blog.comments',$post->id) }}" method="POST">
        <div class="wrapper">
        <div class="box a">
            @include('layouts.admin.include.flash_messages')
            <h3>Leave a Reply</h3>
            <label>Your comment<span>*</span></label>
            <textarea id="blog-leave-reply-comment" name="body" rows="8" id="blog-leave-reply-comment" onkeypress="remove_error(this.id)"></textarea>
            @if($errors->has('body'))
                <span class="help-block">
                        <strong>{{$errors->first('body')}}</strong>
                    </span>
            @endif
        </div>
        <div class="box b">
            <label>Name<span>*</span></label>
            <input type="text" name="author_name" id="blog-leave-reply-name" onkeypress="remove_error(this.id)">
            @if($errors->has('author_name'))
                <span class="help-block">
                        <strong>{{$errors->first('author_name')}}</strong>
                    </span>
            @endif
        </div>
        <div class="box c">
            <label>Email<span>*</span></label>
            <input type="email" name="email" id="blog-leave-reply-email" onkeypress="remove_error(this.id)">
            @if($errors->has('email'))
                <span class="help-block">
                        <strong>{{$errors->first('email')}}</strong>
                    </span>
            @endif
        </div>
        <div class="box d">
            <a id="blog-leave-reply-btn">SEND A COMMENT</a>
            <div id="reply-submitted">
                Your Reply Submitted Successfully
            </div>
        </div>
    </div>
    </form>
</div>

<div class="full-width blog-comments">
    <h4>Comments {{$post->commentNumber()}}</h4>
    <div class="comment-content">
        <a rel="nofollow" class="comment-reply-link">Reply</a>
        <div class="comment-left">
            <img src="{{ asset('images/user.svg') }}">
        </div>
        <div class="comment-right">
            <h5 class="comment-author-name">User Name</h5>
            <div class="comment-date-time"><span class="comment-date">May 20, 2017</span> at <span class="comment-time">3:11 pm</span></div>
            <div class="comment-message">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempus tortor et facilisis lobortis. Donec auctor aliquam libero nec ullamcorper. In hac habitasse platea dictumst. Nullam nec eros scelerisque, auctor mauris at, vehicula mauris. Sed ac mollis magna, in tempus eros. Duis et nibh in sapien finibus posuere at ut libero.
            </div>
        </div>
        <ol>
            <li>
                <div class="comment-content">
                    <div class="comment-left">
                        <img src="{{ asset('images/pic-3.jpg') }}">
                    </div>
                    <div class="comment-right">
                        <h5 class="comment-author-name">Meghan</h5>
                        <div class="comment-date-time"><span class="comment-date">May 20, 2017</span> at <span class="comment-time">3:11 pm</span></div>
                        <div class="comment-message">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempus tortor et facilisis lobortis. Donec auctor aliquam libero nec ullamcorper. In hac habitasse platea dictumst. Nullam nec eros scelerisque, auctor mauris at, vehicula mauris. Sed ac mollis magna, in tempus eros. Duis et nibh in sapien finibus posuere at ut libero.
                        </div>
                    </div>
                </div>
            </li>
        </ol>

    </div>

    <div class="comment-content">
        <a rel="nofollow" class="comment-reply-link">Reply</a>
        <div class="comment-left">
            <img src="{{ asset('images/user.svg') }}">
        </div>
        <div class="comment-right">
            <h5 class="comment-author-name">User Name</h5>
            <div class="comment-date-time"><span class="comment-date">May 20, 2017</span> at <span class="comment-time">3:11 pm</span></div>
            <div class="comment-message">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempus tortor et facilisis lobortis. Donec auctor aliquam libero nec ullamcorper. In hac habitasse platea dictumst. Nullam nec eros scelerisque, auctor mauris at, vehicula mauris. Sed ac mollis magna, in tempus eros. Duis et nibh in sapien finibus posuere at ut libero.
            </div>
        </div>
    </div>
</div>
