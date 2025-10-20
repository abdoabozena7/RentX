<?php

namespace App\Http\Controllers;

use App\Models\Electric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ElectricController extends Controller
{
    public function index()
    {
        return Electric::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image',
        ]);
        $item = new Electric($data);
        if ($request->hasFile('image')) {
            $item->image_path = $request->file('image')->store('electronics', 'public');
        }
        $item->save();
        return response()->json($item, 201);
    }

    public function show(Electric $electric)
    {
        return $electric;
    }

    public function update(Request $request, Electric $electric)
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image',
        ]);
        $electric->fill($data);
        if ($request->hasFile('image')) {
            if ($electric->image_path) {
                Storage::disk('public')->delete($electric->image_path);
            }
            $electric->image_path = $request->file('image')->store('electronics', 'public');
        }
        $electric->save();
        return response()->json($electric);
    }

    public function destroy(Electric $electric)
    {
        if ($electric->image_path) {
            Storage::disk('public')->delete($electric->image_path);
        }
        $electric->delete();
        return response()->json(null, 204);
    }
}