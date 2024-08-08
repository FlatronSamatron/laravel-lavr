<x-layout.main :title="'Cars'">
    <a href={{route('car.create')}}><button class="btn btn-success mb-2">Add Car</button></a>
    <ul class="list-group">
        @foreach($cars as $car)
            <li class="list-group-item">
                <h3>{{$car->brand->title}}</h3>
                <p>{{$car->model}} ({{$car->price}} $)</p>
                <p>{{$transmission[$car->transmission]}}</p>
                <p>{{$car->vin}}</p>
                <p>Status: {{$car->status->text()}}</p>
                <div class="d-flex">
                    @foreach($car->tags as $tag)
                        <div class="alert alert-primary me-2">
                            {{$tag->title}}
                        </div>
                    @endforeach
                </div>
                <div class="d-flex">
                    <a href="{{route('car.edit', $car->id)}}"><button class="btn btn-primary me-2">Edit</button></a>
                    @if($car->canDelete)
                        <x-form method="delete" action="{{route('car.destroy', $car->id)}}">
                            <button class="btn btn-danger">Delete</button>
                        </x-form>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
    <a href={{route('car.deleted')}}><button class="btn btn-warning mt-2">Deleted Cars</button></a>
</x-layout.main>