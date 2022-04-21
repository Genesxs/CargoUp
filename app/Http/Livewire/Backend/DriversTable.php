<?php

namespace App\Http\Livewire\Backend;

use App\Models\Backend\Vehicle;
use App\Models\Frontend\Guide;
use App\Models\Frontend\Owner;
use App\Models\Frontend\Driver;
use App\Models\Frontend\OwnerDriver;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DriversTable extends Component
{

    public $ownerId, $drivers, $owner, $vehicles, $guide;


    public function render()
    {
        $owners = Owner::join('profiles', 'profiles.id', '=', 'owners.profile_id')
            ->join('users', 'users.id', '=', 'profiles.user_id')
            ->select('owners.id as ownerId', 'users.name as nameOw')
            ->get();


        return view('livewire.backend.drivers-table', compact('owners'));
    }

    public function search()
    {
        $this->drivers = OwnerDriver::join('drivers', 'drivers.id', '=', 'owners_drivers.driver_id')
            ->join('profiles', 'profiles.id', '=', 'drivers.profile_id')
            ->join('users', 'users.id', '=', 'profiles.user_id')
            ->select(
                'drivers.id as driverId',
                'drivers.url_photo as driverPhoto',
                'users.name as nameDri'
            )
            ->where('owners_drivers.owner_id', '=', $this->ownerId)
            ->get();

        $this->owner = OwnerDriver::join('owners', 'owners.id', '=', 'owners_drivers.owner_id')
            ->join('profiles', 'profiles.id', '=', 'owners.profile_id')
            ->join('users', 'users.id', '=', 'profiles.user_id')
            ->join('municipalities', 'municipalities.id', '=', 'profiles.municipality_id')
            ->join('departments', 'departments.id', '=', 'municipalities.department_id')
            ->select(
                'owners_drivers.owner_id',
                'users.name as nameOw',
                'municipalities.name as mun',
                'departments.name as dep',
                'owners.url_photo as photoOw'
            )
            ->where('owners_drivers.owner_id', '=', $this->ownerId)
            ->first();

        $this->vehicles = Vehicle::select('badge')->where('owner_id', '=', $this->ownerId)->first();
    }

    public function assing($id)
    {
        $guide = Guide::select('id')->where('id', '=', $this->guide->id)->first();
        $driver = Driver::select('id')->where('id', '=', $id)->first();
        $owner = Owner::select('id')->where('id', '=', $this->ownerId)->first();

        $assing = DB::table('assing_guides')->insert([
            'guide_id' => $guide->id,
            'driver_id' => $driver->id,
            'owner_id' => $owner->id
        ]);

        $updateGuide = Guide::where('id', '=', $this->guide->id)->update(['status' => Guide::ENTREGADA]);

        session()->flash('message', 'Se ha asignado correctamente el vehiculo a la guía.');
        return redirect()->route('backend.guides.assing', $this->guide->id);
    }
}
