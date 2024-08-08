<x-layout.main :title="'Edit brand - '.$brand->id" :route="'brands.index'">
    <x-form action="{{route('brands.update', $brand->id)}}" method="put">
        @bind($brand)
        <div class="mb-3">
            <x-form-input name="title" label="Title:" />
        </div>
        <div class="mb-3">
            <x-form-input name="description" label="Description:" />
        </div>
        @endbind
        <div class="mb-3">
            <button class="btn btn-success" type="submit">Save</button>
        </div>
    </x-form>
</x-layout.main>