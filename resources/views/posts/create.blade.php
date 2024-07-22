<h1>Create Post</h1>

<form method="post" action={{route('post.store')}}>
    @csrf
    <div>
        <label>
            Title:
            <input type="text" name="title" value={{old('title')}}>
        </label>
        @error('title')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label>
            Content:
            <textarea name="content">{{old('content')}}</textarea>
        </label>
        @error('content')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <input type="submit" value="Submit">
    </div>
</form>