<x-layout.main :title="'Brand-'.$brand->id" :route="'brands.index'">
    <h3>{{$brand->title}}</h3>
    <p>{{$brand->description}}</p>

    @php
        $transmission = config('app-cars.transmissions');
    @endphp

    <ul class="list-group">
        @foreach($brand->cars as $car)
            <li class="list-group-item">
                <h3>{{$car->brand->title}}</h3>
                <p>{{$car->model}} ({{$car->price}} $)</p>
                <p>{{$transmission[$car->transmission]}}</p>
                <p>{{$car->vin}}</p>
                <div class="d-flex">
                    <a href="{{route('car.edit', $car->id)}}">
                        <button class="btn btn-primary me-2">Edit</button>
                    </a>
                    <x-form method="delete" action="{{route('car.destroy', $car->id)}}">
                        <button class="btn btn-danger">Delete</button>
                    </x-form>
                </div>
            </li>
        @endforeach
    </ul>
</x-layout.main>