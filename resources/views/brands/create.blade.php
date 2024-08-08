<x-layout.main :title="'Brand'" :route="'brands.index'">
    <x-form action="{{route('brands.store')}}">
        <div class="mb-3">
            <x-form-input name="title" label="Title:" />
        </div>
        <div class="mb-3">
            <x-form-input name="description" label="Description:" />
        </div>
        <div class="mb-3">
            <button class="btn btn-success" type="submit">Save</button>
        </div>
    </x-form>
</x-layout.main>

