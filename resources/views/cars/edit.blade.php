<x-layout.main :title="'Edit car - '.$car->id">
    <x-form action="{{route('car.update', $car->id)}}" method="put">
        @bind($car)
        <div class="mb-3">
            <x-form-select name="brand_id" :options="$brands" label="Brand:" placeholder="------------"/>
        </div>
        <div class="mb-3">
            <x-form-input name="model" label="Model:" />
        </div>
        <div class="mb-3">
            <x-form-input name="price" label="Price:" type="number"/>
        </div>
        <div class="mb-3">
            <x-form-select name="transmission" :options="$transmission" label="Transmission:" placeholder="------------"/>
        </div>
        <div class="mb-3">
            <x-form-input name="vin" label="Vin:"/>
        </div>
        <div class="mb-3">
            <x-form-select name="tags[]" :options="$tags" label="Select your tags:" multiple many-relation />
        </div>
        @endbind
        <div class="mb-3">
            <button class="btn btn-success" type="submit">Save</button>
        </div>
    </x-form>
</x-layout.main>