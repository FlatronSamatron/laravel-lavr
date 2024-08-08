<x-layout.main :title="'Brands'" :route="'brands.index'">
    <a href={{route('brands.create')}}><button class="btn btn-success mb-2">Brand Create </button></a>
    <ul class="list-group">
        @if($brands->isEmpty())
            <div class="alert alert-info">Create new brand</div>
        @endif
        @foreach($brands as $brand)
            <li class="list-group-item">
                <h3>{{$brand->title}}</h3>
                <p>{{$brand->description}}</p>
                <div class="d-flex">
                    <a href="{{route('brands.show', $brand->id)}}"><button class="btn btn-primary me-2">More</button></a>
                    <a href="{{route('brands.edit', $brand->id)}}"><button class="btn btn-warning me-2">Edit</button></a>
                    <x-form method="delete" action="{{route('brands.destroy', $brand->id)}}">
                        <button class="btn btn-danger">Delete</button>
                    </x-form>
                </div>
            </li>
        @endforeach
    </ul>
</x-layout.main>