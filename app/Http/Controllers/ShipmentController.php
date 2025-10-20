<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function index()
    {
        return Shipment::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|string|max:255',
            'ref' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'eta' => 'nullable|date',
            'description' => 'nullable|string',
        ]);
        $shipment = Shipment::create($data);
        return response()->json($shipment, 201);
    }

    public function show(Shipment $shipment)
    {
        return $shipment;
    }

    public function update(Request $request, Shipment $shipment)
    {
        $data = $request->validate([
            'type' => 'sometimes|string|max:255',
            'ref' => 'sometimes|string|max:255',
            'status' => 'sometimes|string|max:255',
            'eta' => 'sometimes|date',
            'description' => 'nullable|string',
        ]);
        $shipment->fill($data);
        $shipment->save();
        return response()->json($shipment);
    }

    public function destroy(Shipment $shipment)
    {
        $shipment->delete();
        return response()->json(null, 204);
    }
}