<x-layout.main :title="'Create post'">
    <form method="post" action={{route('post.store')}}>
        @csrf
        <x-input label="Post Title:" name="title"/>
        <x-input label="Post Content:" name="content"/>
        <div>
            <input type="submit" value="Submit">
        </div>
    </form>
</x-layout.main>