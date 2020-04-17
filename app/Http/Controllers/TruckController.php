<?php

namespace App\Http\Controllers;

use App\Truck;
use Illuminate\Http\Request;
use App\Http\Resources\TruckResource;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get truck
        $trucks = Truck::Paginate(15);
        //Return Trucks as collection
        return TruckResource::collection($trucks);
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
        $newTruck = new Truck();

        $newTruck->truck_number = $request->input('truck_number');
        $newTruck->chassis_number = $request->input('chassis_number');
        $newTruck->traffic_number = $request->input('traffic_number');      


        if($newTruck->save()){

            return new TruckResource($newTruck);
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function show(Truck $truck)
    {
        return new TruckResource($truck);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Truck $truck)
    {

        $truck->truck_number = $request->input('truck_number');
        $truck->chassis_number = $request->input('chassis_number');
        $truck->traffic_number = $request->input('traffic_number');      

        if($truck->update()){

            return new TruckResource($truck);
        }


}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function destroy(Truck $truck)
    {
        if($truck->delete()){

            return response()->json(["message" => "truck record has been deleted!"]);
        }
    }
}
