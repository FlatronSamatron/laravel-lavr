<x-layout.main :title="'Posts'">
    <a href={{route('post.create')}}>Create Post</a>
    <ul>
        @foreach($posts as $post)
            <li>
                <a href={{route('post.edit', $post->id)}}>Edit</a>
                <h3>{{$post->title}}</h3>
                <p>{{$post->content}}</p>
            </li>
        @endforeach
    </ul>
</x-layout.main>

