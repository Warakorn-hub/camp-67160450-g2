<?php

namespace App\Http\Controllers;

use App\Models\flight;
use Illuminate\Http\Request;

class FlightsController extends Controller
{
    public function index()
    {
        $data['flights'] = Flight::all();

        return view('flight.flightForm', $data);
    }

    public function store(Request $request)
    {
        $flight = new Flight;
        $flight->name = $request->input('name');
        $flight->airline = $request->input('airline');
        $flight->number_of_planes = $request->input('number_of_planes');
        $flight->price_per_ticket = $request->input('price_per_ticket');
        $flight->save();

        return redirect('/flights');

    }

    public function update_action(Request $request, $id)
    {
        $flight = Flight::find($id);
        $flight->name = $request->input('name');
        $flight->airline = $request->input('airline');
        $flight->number_of_planes = $request->input('number_of_planes');
        $flight->price_per_ticket = $request->input('price_per_ticket');
        $flight->save();

        return $this->index();
    }

    public function delete_action($id)
    {
        $flight = Flight::find($id);
        $flight->delete();

        return $this->index();
    }

    private function insertToDB()
    {
        $flight = new Flight;
        $flight->name = 'Express Air';
        $flight->airline = 'Express Airlines';
        $flight->number_of_planes = 10;
        $flight->price_per_ticket = 199.99;
        $flight->save();
    }

    private function updateDB()
    {
        $flight = Flight::find(1);
        $flight->name = 'Updated Air';
        $flight->save();
    }

    private function deleteFromDB()
    {
        $flight = Flight::find(1);
        $flight->delete();
    }
}