<h1>Create Post</h1>

<form method="post" action={{route('car.store')}}>
    @csrf
    <div>
        <label>
            Brand:
            <input type="text" name="brand" value={{old('brand')}}>
        </label>
        @error('brand')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label>
            Model:
            <input type="text" name="model" value={{old('model')}}>
        </label>
        @error('model')
        <div style="color:red">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label>
            Price:
            <input type="number" name="price" value={{old('price')}}>
        </label>
        @error('price')
        <div style="color:red">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <input type="submit" value="Submit">
    </div>
</form>