<x-layout.main :title="'Deleted cars'">
    <ul class="list-group">
        @foreach($deletedCars as $car)
            <li class="list-group-item">
                <h3>{{$car->brand}}</h3>
                <p>{{$car->model}} ({{$car->price}} $)</p>
                <p>{{$transmission[$car->transmission]}}</p>
                <div class="d-flex">
                    <x-form method="put" action="{{route('car.restore', $car->id)}}">
                        <button class="btn btn-warning me-2">Restore</button>
                    </x-form>
                    <x-form method="delete" action="{{route('car.delete', $car->id)}}">
                        <button class="btn btn-danger">Delete</button>
                    </x-form>
                </div>
            </li>
        @endforeach
    </ul>
</x-layout.main>