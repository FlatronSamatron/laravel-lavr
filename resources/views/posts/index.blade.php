<h1>Posts</h1>
<a href={{route('post.create')}}>Create Post</a>
<ul>
    @foreach($posts as $post)
        <li>
                <h3>{{$post->title}}</h3>
                <p>{{$post->content}}</p>
        </li>
    @endforeach
</ul>