<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of cars.
     */
    public function index()
    {
        return Car::all();
    }

    /**
     * Store a newly created car in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'price_per_day' => 'required|numeric',
            'details' => 'nullable|string',
            'image' => 'nullable|image',
        ]);

        $car = new Car($data);
        // handle image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('cars', 'public');
            $car->image_path = $path;
        }
        $car->save();

        return response()->json($car, 201);
    }

    /**
     * Display the specified car.
     */
    public function show(Car $car)
    {
        return $car;
    }

    /**
     * Update the specified car in storage.
     */
    public function update(Request $request, Car $car)
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'model' => 'sometimes|required|string|max:255',
            'price_per_day' => 'sometimes|required|numeric',
            'details' => 'nullable|string',
            'image' => 'nullable|image',
        ]);
        $car->fill($data);
        if ($request->hasFile('image')) {
            // delete old image
            if ($car->image_path) {
                Storage::disk('public')->delete($car->image_path);
            }
            $path = $request->file('image')->store('cars', 'public');
            $car->image_path = $path;
        }
        $car->save();
        return response()->json($car);
    }

    /**
     * Remove the specified car from storage.
     */
    public function destroy(Car $car)
    {
        if ($car->image_path) {
            Storage::disk('public')->delete($car->image_path);
        }
        $car->delete();
        return response()->json(null, 204);
    }
}