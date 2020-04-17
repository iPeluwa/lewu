<?php

namespace App\Http\Controllers;

use App\Vehicle_maintenance;
use App\Http\Resources\VehicleMaintenanceResource;
use Illuminate\Http\Request;

class VehicleMaintenanceController extends Controller
{/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get vehicleMaintenances
        $vehicleMaintenances = Vehicle_maintenance::Paginate(15);
        //Return vehicleMaintenances as collection
        return VehicleMaintenanceResource::collection($vehicleMaintenances);
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
        $newVehicleMaintenance = new Vehicle_maintenance();

        $newVehicleMaintenance->fleet_number = $request->input('fleet_number');
        $newVehicleMaintenance->mileage = $request->input('mileage');
        $newVehicleMaintenance->work_performed = $request->input('work_performed');
        $newVehicleMaintenance->performed_by = $request->input('performed_by');
        $newVehicleMaintenance->cost = $request->input('cost');
        

        if($newVehicleMaintenance->save()){

            return new VehicleMaintenanceResource($newVehicleMaintenance);
        } 



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\vehicleMaintenance  $vehicleMaintenance
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle_maintenance $vehicle_maintenance)
    {
        return new VehicleMaintenanceResource($vehicle_maintenance);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vehicleMaintenance  $vehicleMaintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle_maintenance $vehicle_maintenance)
    {

        $vehicle_maintenance->fleet_number = $request->input('fleet_number');
        $vehicle_maintenance->mileage = $request->input('mileage');
        $vehicle_maintenance->work_performed = $request->input('work_performed');
        $vehicle_maintenance->performed_by = $request->input('performed_by');
        $vehicle_maintenance->cost = $request->input('cost');


        if($vehicle_maintenance->update()){

            return new VehicleMaintenanceResource($vehicle_maintenance);
        }


}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vehicleMaintenance  $vehicleMaintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle_maintenance $vehicle_maintenance)
    {
        if($vehicle_maintenance->delete()){

            return response()->json(["message" => "Vehicle Maintenance record has been deleted!"]);
        }
    }
}
