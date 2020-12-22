<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\TravelPackage;
use App\Http\Requests\Admin\TravelPackageRequest;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;

class TravelPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items =TravelPackage::all();

        return view('pages.admin.travel-package.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.travel-package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TravelPackageRequest $request)
    {
        $data = $request->all();
        
        $departureDate = $data['departureDate'];
        $arrivalDate = $data['arrivalDate'];
        $day1 = new DateTime($departureDate);
        $day2 = new DateTime($arrivalDate);
        $interval = $day1->diff($day2);
        $duration_day = $interval->format('%a');
        $duration_night = $duration_day - 1;

        $data['slug'] = Str::slug($request->title);
        $data['duration_day'] = $duration_day;
        $data['duration_night'] = $duration_night;
        $data['price'] = intval(preg_replace('/[^\d\.]+/', '', $request->price));

        // return $data['price'];
        TravelPackage::create($data);
        return redirect()->route('travel-package.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = TravelPackage::findOrFail($id);
        return view('pages.admin.travel-package.edit', [
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
    public function update(TravelPackageRequest $request, $id)
    {
        $data = $request->all();
        $departureDate = $data['departureDate'];
        $arrivalDate = $data['arrivalDate'];
        $day1 = new DateTime($departureDate);
        $day2 = new DateTime($arrivalDate);
        $interval = $day1->diff($day2);
        $duration_day = $interval->format('%a');
        $duration_night = $duration_day - 1;

        $data['slug'] = Str::slug($request->title);
        $data['duration_day'] = $duration_day;
        $data['duration_night'] = $duration_night;
        $data['price'] = intval(preg_replace('/[^\d\.]+/', '', $request->price));

        $item = TravelPackage::findOrFail($id);
        $item->update($data);

        return redirect()->route('travel-package.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroyTravelPackage = TravelPackage::findOrFail($id);
        $destroyTravelPackage->delete();

        DB::table('galleries')->where('travel_packages_id', '=', $id)->update(['deleted_at' => Carbon::now()]);

        return redirect()->route('travel-package.index');
    }
}
