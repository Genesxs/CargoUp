<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Backend\TypeVehicle;
use App\Models\Backend\Quota;
use App\Models\Frontend\Profile;
use App\Models\Frontend\Owner;
use App\Models\Frontend\Driver;
use App\Models\Backend\Bank;
use App\Models\Backend\Vehicle;
use App\Models\Backend\TypeAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Backend\TypeVehicleRepository;
use App\Models\Frontend\OwnerDriver;
use Carbon\Carbon;
use Flash;
use Illuminate\Support\Facades\Session;


class OwnerController extends AppBaseController
{
    /** @var  TypeVehicleRepository */
    private $typeVehicleRepository;

    // public static $gohere = "";

    public function __construct(TypeVehicleRepository $typeVehicleRepo)
    {
        $this->typeVehicleRepository = $typeVehicleRepo;
    }

    //Vista de selección de vehiculos
    public function showVehicle()
    {
        $typeVehicles = $this->typeVehicleRepository->paginate(5);
        $quotas = Quota::all();

        return view('frontend.user.owner.vehicle')->with(compact('quotas', 'typeVehicles'));
    }

    // método de vista de pago crédito
    public function creditPayment()
    {
        $banks = Bank::select('name', 'id')->get();
        $typeAccounts = TypeAccount::select('name', 'id')->get();

        return view('frontend.user.owner.credit-payment', compact('banks', 'typeAccounts'));
    }

    // método de vista de pago contado
    public function cashPayment()
    {
        return view('frontend.user.owner.cash-payment');
    }

    //Metodo para guardar petición de crédito
    public function upPetition(Request $request)
    {

        $banks = Bank::select('name', 'id')->get();
        $typeAccounts = TypeAccount::select('name', 'id')->get();

        $this->validate($request, [
            'url_credit' => 'required',
            'account_number' => 'required',
            'url_identity' => 'required',
            'url_photo' => 'required',
            'account_number' => 'required',
            'bank_id' => 'required',
            'type_account_id' => 'required',
        ]);

        $idUser = auth()->id();

        $profiles = Profile::select('id', 'user_id')
            ->where('user_id', '=', $idUser)
            ->first();

        if ($profiles == null) {

            session()->flash('warning', 'Debe completar los datos de editar información, en Mi cuenta');
            return view('frontend.user.owner.credit-payment', compact('banks', 'typeAccounts'))->with('warning');
        }



        $users = DB::table('users')->select('name')->where('id', '=', $idUser)
            ->first();

        $urlCredit = $request->file('url_credit');
        $urlName = null;

        if ($request->hasFile('url_credit')) {
            $urlName =  $urlCredit->getClientOriginalName();
            $document = 'storage/documents/' . $users->name . '/' . $urlName;

            Storage::disk('documents')->put($users->name . '/' . $urlName, File::get($urlCredit));
        } else {
            $document = $urlName;
        }

        $urlCertificate = $request->file('url_bank_certificate');

        if ($request->hasFile('url_credit')) {
            $urlName =  $urlCertificate->getClientOriginalName();
            $certificate = 'storage/documents/' . $users->name . '/' . $urlName;

            Storage::disk('documents')->put($users->name . '/' . $urlName, File::get($urlCertificate));
        } else {
            $certificate = $urlName;
        }

        $urlPhoto = $request->file('url_photo');

        // validar si existe la foto en la carpeta, si es así, eliminamos el archivo.

        if ($request->hasFile('url_photo')) {
            $urlName =  $urlPhoto->getClientOriginalName();
            $photo = 'storage/img/' . $users->name . '/' . $urlName;

            Storage::disk('images')->put($users->name . '/' . $urlName, File::get($urlPhoto));
        } else {
            $photo = $urlName;
        }

        $urlIdentity = $request->file('url_identity');

        if ($request->hasFile('url_identity')) {
            $urlName =  $urlIdentity->getClientOriginalName();
            $identity = 'storage/documents/' . $users->name . '/' . $urlName;

            Storage::disk('documents')->put($users->name . '/' . $urlName, File::get($urlIdentity));
        } else {
            $identity = $urlName;
        }

        Owner::create([
            'url_credit' => $document,
            'type_payment' => Owner::CREDITO,
            'status' => Owner::COMPLETADO,
            'account_number' =>  request('account_number'),
            'url_bank_certificate' => $certificate,
            'url_identity' => $identity,
            'url_photo' => $photo,
            'url_document_approved' => null,
            'bank_id' => request('bank_id'),
            'type_account_id' => request('type_account_id'),
            'profile_id' => $profiles->id,
        ]);

        $owner = new Owner();
        $owner->status = 2;


        session()->flash('success', 'Se ha registro correctamente la petición de crédito, cuando suba la aprobación del crédito, se habilitara la opción de seleccionar conductor');
        return view('frontend.user.dashboard', compact('banks', 'typeAccounts', 'owner'))->with('success');
    }

    //método para guardar petición aprobada
    public function upDocument(Request $request)
    {
        $idUser = auth()->id();

        $profiles = Profile::select('id')
            ->where('user_id', '=', $idUser)
            ->first();


        $users = DB::table('users')->select('name')->where('id', '=', $idUser)
            ->first();

        $urlDocument = $request->file('url_document_approved');
        $urlName = null;

        if ($request->hasFile('url_document_approved')) {
            $urlName =  $urlDocument->getClientOriginalName();
            $documentApprov = 'storage/documents/' . $users->name . '/' . $urlName;

            Storage::disk('documents')->put($users->name . '/' . $urlName, $documentApprov);
        } else {
            $documentApprov = $urlName;
        }

        Owner::where('profile_id', '=', $profiles->id)
            ->update([
                'status' => Owner::APROBADO,
                'url_document_approved' => $documentApprov
            ]);

        $owner = Owner::select('id', 'status')->where('profile_id', '=', $profiles->id)->first();

        session()->flash('success', 'Se ha subido correctamente la solicitud aprobada, ahora podrá seleccionar su conductor');
        return view('frontend.user.owner', compact('owner'))->with('success');
    }

    public function showDriver()
    {

        $drivers = Driver::join('profiles', 'profiles.id', '=', 'drivers.profile_id')
            ->join('users', 'users.id', '=', 'profiles.user_id')
            ->join('municipalities', 'municipalities.id', '=', 'drivers.municipality_id')
            ->get(['drivers.id', 'drivers.url_photo', 'drivers.jobs_name', 'drivers.experience', 'drivers.score', 'users.name as nameUs', 'municipalities.name as nameM']);

        return view('frontend.user.owner.select-driver')->with('drivers', $drivers);
    }


    //metodo para guardar conductor a un propietario
    public function storeDriver($id)
    {
        $drivers = Driver::join('profiles', 'profiles.id', '=', 'drivers.profile_id')
            ->join('users', 'users.id', '=', 'profiles.user_id')
            ->join('municipalities', 'municipalities.id', '=', 'drivers.municipality_id')
            ->get(['drivers.id', 'drivers.url_photo', 'drivers.jobs_name', 'drivers.experience', 'drivers.score', 'users.name as nameUs', 'municipalities.name as nameM']);

        $idUser = auth()->id();

        $profiles = Profile::select('id')
            ->where('user_id', '=', $idUser)
            ->first();

        $owner = Owner::select('id')
            ->where('profile_id', '=', $profiles->id)
            ->first();

        $driver = Driver::select('id')->where('id', '=', $id)->first();

        $vehicle = Vehicle::select('id')
            ->where('owner_id', $owner->id)
            ->update([
                'driver_id' => $driver->id
            ]);

        $date = Carbon::now();

        OwnerDriver::create([
            'owner_id' => $owner->id,
            'driver_id' => $driver->id,
            'start_date' => $date,
        ]);

        session()->flash('success', 'Se ha guardado correctamente su conductor.');
        return redirect(route('selectDriver'))->with('drivers', $drivers, 'success');
    }

    public function showOwDriver()
    {
        $idUser = auth()->id();

        $profiles = Profile::select('id')
            ->where('user_id', '=', $idUser)
            ->first();

        $owner = Owner::select('id')
            ->where('profile_id', '=', $profiles->id)
            ->first();

        $drivers = OwnerDriver::join('drivers', 'drivers.id', '=', 'owners_drivers.driver_id')
            ->join('profiles', 'profiles.id', '=', 'drivers.profile_id')
            ->join('users', 'users.id', '=', 'profiles.user_id')
            ->select('owners_drivers.driver_id', 'users.name as usDriver', 'drivers.url_photo as photod', 'users.email as emdriver', 'profiles.identification_number as iddriver')
            ->where('owner_id', '=', $owner->id)
            ->get();

        return view('frontend.user.owner.my-drivers', compact('drivers'));
    }

    public function removeDriver($id)
    {
        $idUser = auth()->id();

        $profiles = Profile::select('id')
            ->where('user_id', '=', $idUser)
            ->first();

        $owner = Owner::select('id')
            ->where('profile_id', '=', $profiles->id)
            ->first();

        $drivers = Vehicle::join('owners', 'owners.id', '=', 'vehicles.owner_id')
            ->join('type_vehicles', 'type_vehicles.id', '=', 'vehicles.type_vehicle_id')
            ->join('drivers', 'drivers.id', '=', 'vehicles.driver_id')
            ->join('profiles', 'profiles.id', '=', 'drivers.profile_id')
            ->join('users', 'users.id', '=', 'profiles.user_id')
            ->select('vehicles.badge', 'vehicles.capacity', 'type_vehicles.name as tvname', 'vehicles.driver_id', 'users.name as usDriver', 'drivers.url_photo as photod', 'users.email as emdriver', 'profiles.identification_number as iddriver')
            ->where('owner_id', '=', $owner->id)
            ->get();

        Vehicle::select('driver_id')
            ->where('driver_id', '=', $id)
            ->where('owner_id', '=', $owner->id)
            ->update(['driver_id' => null]);

        $date = Carbon::now();

        OwnerDriver::select('end_date')
            ->where('driver_id', '=', $id)
            ->where('owner_id', '=', $owner->id)
            ->update(['end_date' => $date]);

        session()->flash('success', 'Se ha desvinculado correctamente el conductor.');
        return redirect(route('showOwDriver'))->with('drivers', $drivers, 'success');
    }


    //Método para descargar documento de crédito
    public function download()
    {
        $pathToFile = storage_path("app/documents/SolicitudDeCreditoFinesa.pdf");
        return response()->download($pathToFile);
    }
}
