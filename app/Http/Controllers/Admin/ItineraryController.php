<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ItineraryRequest;
use App\Itinerary;
use App\TravelPackage;
use Illuminate\Http\Request;

class ItineraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $items = TravelPackage::findOrFail($id);

        return view('pages.admin.itinerary.create',[
            'items' => $items
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItineraryRequest $request)
    {
        $data = $request->all();
        $id = $data['travel_packages_id'];
        
        Itinerary::create($data);

        return redirect()->route('itinerary.show', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = TravelPackage::with(['itineraries'])->findOrFail($id);
        $sorted = $item->itineraries->sortBy('day');
        $sorted = $sorted->values()->all();
        
        // return $sorted;

        return view('pages.admin.itinerary.detail', [
            'item' => $item,
            'sorted' => $sorted
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Itinerary::findOrFail($id);
        
        return view('pages.admin.itinerary.edit',[
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItineraryRequest $request, $id)
    {
        $data = $request->all();
        $item = Itinerary::findOrFail($id);
        $travel_packages_id = $data['travel_packages_id'];

        // return $travel_packages_id;
        $item->update($data);

        return redirect()->route('itinerary.show', $travel_packages_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Itinerary::findOrFail($id);
        $item->delete();

        return redirect()->back();
    }
}
