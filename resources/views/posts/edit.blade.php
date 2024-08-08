<x-layout.main :title="'Edit post - '.$post->id">
    <form method="post" action={{route('post.update', $post->id)}}>
        @csrf
        @method('PUT')

        <x-input label="Post Title:" name="title" default-value="{{$post->title}}"/>
        <x-input label="Post Content:" name="content" :default-value="$post->content"/>

        <div>
            <input type="submit" value="Submit">
        </div>
    </form>
</x-layout.main>