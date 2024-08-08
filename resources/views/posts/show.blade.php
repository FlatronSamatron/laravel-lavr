<x-layout.main :title="'Post - '.$post->id">
    <h3>{{$post->title}}</h3>
    <p>{{$post->content}}</p>

    <x-form action="{{route('comments.store', ['type' => 'post', 'id' => $post->id])}}" method="post">
        <x-form-textarea name="body" placeholder="Comment" />
        <x-form-submit class="mt-2"/>
    </x-form>


    @if($post->comments)
    <ul class="list-group mt-5">
        @foreach($post->comments as $comment)
            <li class="list-group-item d-flex justify-content-between">
                <span>
                    {{$comment->body}}
                </span>
                <span>
                    {{$comment->created_at}}
                </span>
            </li>
        @endforeach
    </ul>
    @endif


</x-layout.main>