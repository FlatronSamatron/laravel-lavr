<h1>Cars</h1>
<a href={{route('car.create')}}>Add Car</a>
<ul>
    @foreach($cars as $car)
        <li>
                <pre>{{$car}}</pre>
                <h3>{{$car->brand}}</h3>
                <p>{{$car->model}} ({{$car->price}} $)</p>
                <a href="{{route('car.edit', $car->id)}}">Edit</a>
                <form action="{{route('car.destroy', $car->id)}}" method="Post">
                        @csrf
                        @method('Delete')
                        <input type="submit" value="delete">
                </form>
        </li>
    @endforeach
</ul>