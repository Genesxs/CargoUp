<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreateTypeVehicleRequest;
use App\Http\Requests\Backend\UpdateTypeVehicleRequest;
use App\Repositories\Backend\TypeVehicleRepository;
use App\Models\Backend\TypeVehicle;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Backend\Quota;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TypeVehicleController extends AppBaseController
{
    /** @var  TypeVehicleRepository */
    private $typeVehicleRepository;

    public function __construct(TypeVehicleRepository $typeVehicleRepo)
    {
        $this->typeVehicleRepository = $typeVehicleRepo;
    }

    /**
     * Display a listing of the TypeVehicle.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $typeVehicles = $this->typeVehicleRepository->paginate(5);

        return view('backend.type_vehicles.index')
            ->with('typeVehicles', $typeVehicles);
    }

    /**
     * Show the form for creating a new TypeVehicle.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.type_vehicles.create');
    }

    /**
     * Store a newly created TypeVehicle in storage.
     *
     * @param CreateTypeVehicleRequest $request
     *
     * @return Response
     */
    public function store(CreateTypeVehicleRequest $request)
    {
        $typeVehicle = TypeVehicle::all();

        $urlPhoto = $request->file('url_photo');
        $urlName = null;

        if ($request->hasFile('url_photo')) {
            $urlName =  $urlPhoto->getClientOriginalName();
            $photo = 'storage/img/' . request('name') . '/' . $urlName;

            Storage::disk('images')->put(request('name') . '/' . $urlName, File::get($urlPhoto));
        } else {
            $photo = $urlName;
        }

        TypeVehicle::create([
            'name' => request('name'),
            'url_photo' => $photo,
            'price' => request('price'),
        ]);

        Flash::success(__('Type Vehicle saved successfully.'));

        return redirect(route('backend.typeVehicles.index'));
    }

    /**
     * Display the specified TypeVehicle.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $typeVehicle = $this->typeVehicleRepository->find($id);

        if (empty($typeVehicle)) {
            Flash::error(__('Type Vehicle not found'));

            return redirect(route('backend.typeVehicles.index'));
        }

        return view('backend.type_vehicles.show')->with('typeVehicle', $typeVehicle);
    }

    /**
     * Show the form for editing the specified TypeVehicle.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $typeVehicle = $this->typeVehicleRepository->find($id);

        if (empty($typeVehicle)) {
            Flash::error(__('Type Vehicle not found'));

            return redirect(route('backend.typeVehicles.index'));
        }

        return view('backend.type_vehicles.edit')->with('typeVehicle', $typeVehicle);
    }

    /**
     * Update the specified TypeVehicle in storage.
     *
     * @param int $id
     * @param UpdateTypeVehicleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTypeVehicleRequest $request)
    {
        $typeVehicle = TypeVehicle::find($id);

        if (empty($typeVehicle)) {
            Flash::error(__('Type Vehicle not found'));

            return redirect(route('backend.typeVehicles.index'));
        }

        $urlPhoto = $request->file('url_photo');
        $urlName = null;

        if ($request->hasFile('url_photo')) {
            $urlName =  $urlPhoto->getClientOriginalName();
            $photo = 'storage/img/' . request('name') . '/' . $urlName;

            Storage::disk('images')->put(request('name') . '/' . $urlName, File::get($urlPhoto));
        } else {
            $photo = $urlName;
        }

        $typeVehicle->name = request('name');
        $typeVehicle->url_photo = $photo;
        $typeVehicle->price = request('price');
        $typeVehicle->save();

        Flash::success(__('Type Vehicle updated successfully.'));

        return redirect(route('backend.typeVehicles.index'));
    }

    /**
     * Remove the specified TypeVehicle from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $typeVehicle = $this->typeVehicleRepository->find($id);

        if (empty($typeVehicle)) {
            Flash::error(__('Type Vehicle not found'));

            return redirect(route('backend.typeVehicles.index'));
        }

        // $resultQueriesOne = Quota::where('type_vehicle_id', $typeVehicle->id)
        // ->first();

        // if (isset($resultQueriesOne)) {
        //     Flash::error(__('The type vehicle can not be deleted, because this has a quota associated yet'));
        //     return redirect(route('backend.typeVehicles.index'));
        // }

        // $this->typeVehicleRepository->delete($id);

        // $path = $typeVehicle->url_photo;

        // if ($path) {
        //     $pathArray = explode("/", $path);
        //     $photoDirectory = $pathArray[0] . '/' .  $pathArray[1];
        //     $files = glob($photoDirectory . '/*');
        //     foreach ($files as $file) {
        //         if (is_file($file)) {
        //             unlink($file);
        //         }
        //     }
        //     rmdir($photoDirectory);
        // }

        $typeVehicle->forceDelete();   // physical delete.

        Flash::success(__('Type Vehicle deleted successfully.'));

        return redirect(route('backend.typeVehicles.index'));
    }
}
