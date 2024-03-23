<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $flights=Flight::all();
        return view('pages.flight',['flights' => $flights]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.flight');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'flight_number' => 'required',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate hình ảnh
            'departure_airport' => 'required',
            'arrival_airport' => 'required',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'price' => 'required'
            
        ]);

        // Lưu trữ hình ảnh vào storage
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('flights');
        } else {
            $imagePath = null;
        }

        // Lưu thông tin chuyến bay vào cơ sở dữ liệu với đường dẫn của hình ảnh
        $flight = new Flight();
        $flight->flight_number = $request->flight_number;
        $flight->image_path = $imagePath;
        $flight->departure_airport = $request->departure_airport;
        $flight->arrival_airport = $request->arrival_airport;
        $flight->departure_time = $request->departure_time;
        $flight->arrival_time = $request->arrival_time;
        $flight->price = $request->price;
        $flight->save();

        return redirect()->route('pages.flight')->with('success', 'Flight created successfully');

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
