<x-layout.main :title="'Car'.$car->id">
    <h3>{{$car->brand->title}}</h3>
    <p>{{$car->model}}</p>
    <p>{{$car->transmission}}</p>
    <p>{{$car->price}} $</p>
    <p>Status: {{$car->status->text()}}</p>

    <x-form action="{{route('comments.store', ['type' => 'car', 'id' => $car->id])}}" method="post">
        <x-form-textarea name="body" placeholder="Comment" />
        <x-form-submit class="mt-2"/>
    </x-form>


    @if($car->comments)
        <ul class="list-group mt-5">
            @foreach($car->comments as $comment)
                <li class="list-group-item d-flex justify-content-between">
                <span>
                    {{$comment->body}}
                </span>
                    <span>
                    {{$comment->created_at}}
                </span>
                </li>
            @endforeach
        </ul>
    @endif
</x-layout.main>