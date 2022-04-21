<?php

namespace App\Http\Livewire;

use App\Models\Backend\Vehicle;
use App\Models\Frontend\Guide;
use App\Models\Frontend\Profile;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class GuidesTable extends Component
{

    public $guideId, $guideUsers;
    public $owner, $vehicle;

    public function render()
    {
        $idUser = auth()->id();

        $profile = Profile::select('id')
            ->where('user_id', '=', $idUser)
            ->first();

        $guides = Guide::join('pick_places', 'pick_places.id', '=', 'guides.pick_place_id')
            ->select('guides.id as guideId')
            ->where('pick_places.profile_id', '=', $profile->id)
            ->get();

        return view('livewire.guides-table', compact('guides'));
    }

    public function search()
    {
        $this->guideUsers = Guide::select('id', 'status', 'date_guide', 'date_pick', 'total')
            ->where('id', '=', $this->guideId)
            ->first();

        if ($this->guideUsers->status == 4) {
            $this->owner = DB::table('assing_guides')
                ->join('owners', 'owners.id', '=', 'assing_guides.owner_id')
                ->join('profiles', 'profiles.id', '=', 'owners.profile_id')
                ->join('users', 'users.id', '=', 'profiles.user_id')
                ->join('municipalities', 'municipalities.id', '=', 'profiles.municipality_id')
                ->join('departments', 'departments.id', '=', 'municipalities.department_id')
                ->select('owners.id as ownerId', 'owners.url_photo', 'profiles.identification_number', 'users.name', 'users.email', 'municipalities.name as mun', 'departments.name as dep')
                ->where('assing_guides.guide_id', '=', $this->guideId)
                ->get()
                ->toArray();

            $this->vehicle = Vehicle::join('owners', 'owners.id', '=', 'vehicles.owner_id')
                ->join('type_vehicles', 'type_vehicles.id', '=', 'vehicles.type_vehicle_id')
                ->join('drivers', 'drivers.id', '=', 'vehicles.driver_id')
                ->join('profiles', 'profiles.id', '=', 'drivers.profile_id')
                ->join('users', 'users.id', '=', 'profiles.user_id')
                ->select('vehicles.badge', 'vehicles.capacity', 'type_vehicles.name as tvname', 'users.name as usDriver', 'drivers.url_photo as photod', 'users.email as emdriver', 'profiles.identification_number as iddriver')
                ->where('owner_id', '=', $this->owner[0]->ownerId)
                ->first();
        }

    }

    public function cancel()
    {
        Guide::select('status')->where('id', '=', $this->guideId)->update(['status' => Guide::ANULADO]);
        session()->flash('success', 'Se ha anulado correctamente la guía');
    }
}
