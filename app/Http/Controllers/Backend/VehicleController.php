<?php

namespace App\Http\Controllers\Backend;

use App\Domains\Auth\Models\User;
use App\Http\Requests\Backend\CreateVehicleRequest;
use App\Http\Requests\Backend\UpdateVehicleRequest;
use App\Repositories\Backend\VehicleRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Backend\TypeVehicle;
use App\Models\Frontend\Owner;
use App\Models\Backend\Vehicle;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;

class VehicleController extends AppBaseController
{
    /** @var  VehicleRepository */
    private $vehicleRepository;

    public function __construct(VehicleRepository $vehicleRepo)
    {
        $this->vehicleRepository = $vehicleRepo;
    }

    /**
     * Display a listing of the Vehicle.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $vehicles = Vehicle::join('owners', 'owners.id', '=', 'vehicles.owner_id')
            ->join('profiles', 'profiles.id', '=', 'owners.profile_id')
            ->join('users', 'users.id', '=', 'profiles.user_id')
            ->join('type_vehicles', 'type_vehicles.id', '=', 'vehicles.type_vehicle_id')
            ->get(['vehicles.id', 'vehicles.badge', 'vehicles.capacity', 'vehicles.status', 'type_vehicles.name as nameTv', 'owners.id', 'users.name as nameUs']);

        return view('backend.vehicles.index')
            ->with('vehicles', $vehicles);
    }

    /**
     * Show the form for creating a new Vehicle.
     *
     * @return Response
     */
    public function create()
    {
        $owners = Owner::select('owners.id', 'users.name')
            ->join('profiles', 'profiles.id', '=', 'owners.profile_id')
            ->join('users', 'users.id', '=', 'profiles.user_id')
            ->where('status', '=', 3)
            ->get();

        $typeVehicles = TypeVehicle::pluck('name', 'id');

        return view('backend.vehicles.create', compact('owners', 'typeVehicles'));
    }

    /**
     * Store a newly created Vehicle in storage.
     *
     * @param CreateVehicleRequest $request
     *
     * @return Response
     */
    public function store(CreateVehicleRequest $request)
    {
        $input = $request->all();

        $vehicle = $this->vehicleRepository->create($input);

        Flash::success(__('Vehicle saved successfully.'));

        return redirect(route('backend.vehicles.index'));
    }

    /**
     * Display the specified Vehicle.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        // $vehicle = $this->vehicleRepository->find($id);

        $vehicle = DB::table('vehicles')
        ->join('owners', 'owners.id', '=', 'vehicles.owner_id')
        ->join('profiles', 'profiles.id', '=', 'owners.profile_id')
        ->join('users', 'users.id', '=', 'profiles.user_id')
        ->join('type_vehicles', 'type_vehicles.id', '=', 'vehicles.type_vehicle_id')
        ->where('vehicles.id', $id)
        ->first(['vehicles.badge', 'vehicles.capacity', 'vehicles.status', 'type_vehicles.name as nameTv', 'owners.id', 'users.name as nameUs']);

        if (empty($vehicle)) {
            Flash::error(__('Vehicle not found'));

            return redirect(route('backend.vehicles.index'));
        }

        return view('backend.vehicles.show')->with('vehicle', $vehicle);
    }

    /**
     * Show the form for editing the specified Vehicle.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vehicle = $this->vehicleRepository->find($id);

        $owners = Owner::select('owners.id', 'users.name')
            ->join('profiles', 'profiles.id', '=', 'owners.profile_id')
            ->join('users', 'users.id', '=', 'profiles.user_id')
            ->where('status', '=', 3)
            ->get();

        $typeVehicles = TypeVehicle::pluck('name', 'id');

        if (empty($vehicle)) {
            Flash::error(__('Vehicle not found'));

            return redirect(route('backend.vehicles.index'));
        }

        return view('backend.vehicles.edit', compact('owners', 'typeVehicles', 'vehicle'));
    }

    /**
     * Update the specified Vehicle in storage.
     *
     * @param int $id
     * @param UpdateVehicleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVehicleRequest $request)
    {
        $vehicle = $this->vehicleRepository->find($id);

        if (empty($vehicle)) {
            Flash::error(__('Vehicle not found'));

            return redirect(route('backend.vehicles.index'));
        }

        $vehicle = $this->vehicleRepository->update($request->all(), $id);

        Flash::success(__('Vehicle updated successfully.'));

        return redirect(route('backend.vehicles.index'));
    }

    /**
     * Remove the specified Vehicle from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vehicle = $this->vehicleRepository->find($id);

        if (empty($vehicle)) {
            Flash::error(__('Vehicle not found'));

            return redirect(route('backend.vehicles.index'));
        }

        $this->vehicleRepository->delete($id);

        Flash::success(__('Vehicle deleted successfully.'));

        return redirect(route('backend.vehicles.index'));
    }
}
