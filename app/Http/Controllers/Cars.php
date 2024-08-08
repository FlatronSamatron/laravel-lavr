<?php

namespace App\Http\Controllers;

use App\Enums\Cars\Status;
use App\Http\Requests\Cars\StoreRequest;
use App\Http\Requests\Cars\UpdateRequest;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Tag;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class Cars extends Controller
{
    private array $transmission;

    public function __construct()
    {
        $this->transmission = config('app-cars.transmissions');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transmission = $this->transmission;
        $cars         = Car::ofActive()->with(['brand', 'tags'])->orderByDesc('created_at')->get();

        return view('cars.index', compact('cars', 'transmission'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::orderBy('title')->pluck('title', 'id');
        $tags   = Tag::orderBy('title')->pluck('title', 'id');

        return view('cars.create', [
                'transmission' => $this->transmission,
                'brands'       => $brands,
                'tags'       => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $car = Car::make(Arr::except($request->validated(), 'tags'));

        DB::transaction( function () use($request, $car) {
            $car->save();
            $car->tags()->sync($request['tags']);
        });

        return redirect(route('car.show', $car->id))->with('status', config('alerts.cars.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        $car['transmission'] = $this->getTransmission($car['transmission']);

        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $transmission = $this->transmission;
        $brands       = Brand::orderBy('title')->pluck('title', 'id');
        $tags   = Tag::orderBy('title')->pluck('title', 'id');

        return view('cars.edit', compact('car', 'transmission', 'brands', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Car $car)
    {
        $car->update(Arr::except($request->validated(), 'tags'));
        $car->tags()->sync($request->validated('tags'));

        return redirect(route('car.show', $car->id))->with('status', config('alerts.cars.edited'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        if($car->canDelete){
            $car->delete();

            return redirect(route('car.index'))->with('status', config('alerts.cars.deleted'));
        } else {
            return redirect(route('car.index'))->with('status', 'can\'t remove');
        }
    }

    public function destroyDeleted($id)
    {
        $car = Car::onlyTrashed()->findOrFail($id);
        $car->forceDelete();

        return redirect(route('car.index'))->with('status', config('alerts.cars.trash.deleted'));
    }

    public function restoreDeleted($id)
    {
        $car = Car::onlyTrashed()->findOrFail($id);
        $car->restore();

        return redirect(route('car.index'))->with('status', config('alerts.cars.trash.restored'));
    }

    public function deleted()
    {
        $deletedCars  = Car::onlyTrashed()->get();
        $transmission = $this->transmission;

        return view('cars.deleted', compact('deletedCars', 'transmission'));
    }

    public function getTransmission(int $id)
    {
        $transmission = config('app-cars.transmissions');

        return $transmission[$id];
    }
}
