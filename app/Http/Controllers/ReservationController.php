<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        // eager load car to include associated car information
        return Reservation::with('car')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'customer_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'national_id' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'nullable|string',
        ]);
        // default status to "جاري" if not provided
        if (empty($data['status'])) {
            $data['status'] = 'جاري';
        }
        $reservation = Reservation::create($data);
        return response()->json($reservation->load('car'), 201);
    }

    public function show(Reservation $reservation)
    {
        return $reservation->load('car');
    }

    public function update(Request $request, Reservation $reservation)
    {
        $data = $request->validate([
            'car_id' => 'sometimes|exists:cars,id',
            'customer_name' => 'sometimes|string|max:255',
            'phone' => 'sometimes|string|max:255',
            'national_id' => 'sometimes|string|max:255',
            'start_date' => 'sometimes|date',
            'end_date' => 'sometimes|date|after_or_equal:start_date',
            'status' => 'sometimes|string',
        ]);
        $reservation->fill($data);
        $reservation->save();
        return response()->json($reservation->load('car'));
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return response()->json(null, 204);
    }
}