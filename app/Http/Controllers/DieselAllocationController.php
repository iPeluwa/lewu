<?php

namespace App\Http\Controllers;

use App\Diesel_allocation;
use App\Http\Resources\DieselAllocationResource;
use Illuminate\Http\Request;

class DieselAllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get diesel Allocatons
        $dieselAllocations = Diesel_allocation::Paginate(15);
        //Return DieselAllocations as collection
        return DieselAllocationResource::collection($dieselAllocations);
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
        $newDieselAllocation = new Diesel_allocation();

        $newDieselAllocation->fleet_number = $request->input('fleet_number');
        $newDieselAllocation->odometer = $request->input('odometer');
        $newDieselAllocation->volume = $request->input('volume');
        $newDieselAllocation->cost = $request->input('cost');
        $newDieselAllocation->gas_station = $request->input('gas_station');


        if($newDieselAllocation->save()){

            return new DieselAllocationResource($newDieselAllocation);
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DieselAllocation  $dieselAllocation
     * @return \Illuminate\Http\Response
     */
    public function show(Diesel_allocation $diesel_allocation)
    {
        return new DieselAllocationResource($diesel_allocation);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DieselAllocation  $dieselAllocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diesel_allocation $diesel_allocation)
    {
        $diesel_allocation->fleet_number = $request->input('fleet_number');
        $diesel_allocation->odometer = $request->input('odometer');
        $diesel_allocation->volume = $request->input('volume');
        $diesel_allocation->cost = $request->input('cost');
        $diesel_allocation->gas_station = $request->input('gas_station');


        if($diesel_allocation->update()){

            return new DieselAllocationResource($diesel_allocation);
        }


}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DieselAllocation  $dieselAllocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diesel_allocation $diesel_allocation)
    {
        if($diesel_allocation->delete()){

            return response()->json(["message" => "Diesel Allocaton record has been deleted!"]);
        }
    }
}
