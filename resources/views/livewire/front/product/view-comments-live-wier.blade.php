<div class="u-info__slider">
    @forelse($comments as $comment)
        <div class="review element-animation">
            <div class="talk__top">
                @php /** @var \App\Models\Comment $comment */ @endphp
                <h6>
                    {{$comment->name}}
                </h6>
                <span>
                        {{$comment->createdFormat}}
                </span>
            </div>
            <div class="talk__text">
                <p>
                    {{$comment->text}}
                </p>
            </div>
        </div>
    @empty
        <div class="dont_comment">
            {{__('front.not_comments')}}
        </div>
    @endforelse

</div>