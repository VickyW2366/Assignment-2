<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Bus;
use mysqli;

class BusController extends Controller
{
    //lists all buses in the database
    function index()
    {
        $buses = Bus::paginate(4);
      //return view('buses.index',['buses' => $buses]);
        return view('buses.index',['buses' => $buses]);
    }
    function create()
    {
        return view('buses.create');
    }
    function about()
    {
        return view('buses.about');
    }
    //takes in the information for a new bus in the database
    public function store(Request $request)
    {
        $bus = new Bus();
        $bus->chassis = $request->chassis;
        $bus->entered_service = $request->entered_service;
        $bus->withdrawn = $request->withdrawn;
        $bus->numberplate = $request->numberplate;
        $bus->origin = $request->origin;

        $validatedData = $request->validate([
        'chassis'=>['required'],
        'entered_service'=>['required', 'numeric', 'integer', 'between:1882,2025'],
        'withdrawn'=>['required', 'numeric', 'integer', 'gte:entered_service', 'lt:2026'],
        'numberplate'=>['required'],
        'origin'=>['required', 'alpha'],
        ],[//A custom error message for if the numberplate field is not interacted with
        'numberplate.required' => 'Either a number plate should be added, or the Unregistered box should be selected.',
        ]);
        
        $bus->save();
        return redirect('/buses');
    }

    //shows the information for a bus
    function show($id)
    {
        $bus = Bus::find($id);
        return view('buses.show', ['bus' => $bus]);
    }
    function edit($id)
    {
        $bus = Bus::find($id);
        return view('buses.edit', ['bus' => $bus]);
    }
    //updates the new information for a bus already in the database
    function update(Request $request)
    {
        $bus = Bus::find($request->id);
        $bus->chassis = $request->chassis;
        $bus->entered_service = $request->entered_service;
        $bus->withdrawn = $request->withdrawn;
        $bus->numberplate = $request->numberplate;
        $bus->origin = $request->origin;
        
        $validatedData = $request->validate([
        'chassis'=>['required'],
        'entered_service'=>['required', 'numeric', 'integer', 'between:1882,2025'],
        'withdrawn'=>['required', 'numeric', 'integer', 'gte:entered_service', 'lt:2026'],
        'numberplate'=>['required'],
        'origin'=>['required', 'alpha'],
        ],[//A custom error message for if the numberplate field is not interacted with
        'numberplate.required' => 'Either a number plate should be added, or the Unregistered box should be selected.',
        ]);
        
        $bus->save();
        return redirect('/buses');
    }
    function destroy(Request $request)
    {
        $bus = Bus::find($request->id);
        $bus->delete();
        return redirect('/buses');
    }
    function search(Request $request)
    {//Shows all results relating to the search in a list like index
        $buses = Bus::where('chassis', 'LIKE', '%' . $request->searchbar . '%')
            ->orWhere('entered_service', 'ALL', '%' . $request->searchbar . '%')
            ->orWhere('withdrawn', 'ALL', '%' . $request->searchbar . '%')
            ->orWhere('numberplate', 'LIKE', '%' . $request->searchbar . '%')
            ->orWhere('origin', 'LIKE', '%' . $request->searchbar . '%')
            ->get();
             return view('buses.search', ['buses' => $buses]);
    }
}