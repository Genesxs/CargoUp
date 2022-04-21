<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreateMunicipalityRequest;
use App\Http\Requests\Backend\UpdateMunicipalityRequest;
use App\Repositories\Backend\MunicipalityRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Backend\Department;
use App\Models\Backend\Municipality;
use Illuminate\Http\Request;
use Flash;
use Response;

class MunicipalityController extends AppBaseController
{
    /** @var  MunicipalityRepository */
    private $municipalityRepository;

    public function __construct(MunicipalityRepository $municipalityRepo)
    {
        $this->municipalityRepository = $municipalityRepo;
    }

    /**
     * Display a listing of the Municipality.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $municipalities = $this->municipalityRepository->paginate(20);

        return view('backend.municipalities.index')
            ->with('municipalities', $municipalities);
    }

    /**
     * Show the form for creating a new Municipality.
     *
     * @return Response
     */
    public function create()
    {
        $department = Department::pluck('name','id');
        return view('backend.municipalities.create')->with('department', $department);
    }

    /**
     * Store a newly created Municipality in storage.
     *
     * @param CreateMunicipalityRequest $request
     *
     * @return Response
     */
    public function store(CreateMunicipalityRequest $request)
    {
        $input = $request->all();

        $municipality = $this->municipalityRepository->create($input);

        Flash::success(__('Municipality saved successfully.'));

        return redirect(route('backend.municipalities.index'));
    }

    /**
     * Display the specified Municipality.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $municipality = $this->municipalityRepository->find($id);

        if (empty($municipality)) {
            Flash::error(__('Municipality not found'));

            return redirect(route('backend.municipalities.index'));
        }

        return view('backend.municipalities.show')->with('municipality', $municipality);
    }

    /**
     * Show the form for editing the specified Municipality.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $municipality = $this->municipalityRepository->find($id);
        $department = Department::pluck('name','id');

        if (empty($municipality)) {
            Flash::error(__('Municipality not found'));

            return redirect(route('backend.municipalities.index'));
        }

        return view('backend.municipalities.edit')->with(compact('municipality','department'));
    }

    /**
     * Update the specified Municipality in storage.
     *
     * @param int $id
     * @param UpdateMunicipalityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMunicipalityRequest $request)
    {
        $municipality = $this->municipalityRepository->find($id);

        if (empty($municipality)) {
            Flash::error(__('Municipality not found'));

            return redirect(route('backend.municipalities.index'));
        }

        $municipality = $this->municipalityRepository->update($request->all(), $id);

        Flash::success(__('Municipality updated successfully.'));

        return redirect(route('backend.municipalities.index'));
    }

    /**
     * Remove the specified Municipality from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $municipality = $this->municipalityRepository->find($id);

        if (empty($municipality)) {
            Flash::error(__('Municipality not found'));

            return redirect(route('backend.municipalities.index'));
        }

        $this->municipalityRepository->delete($id);

        Flash::success(__('Municipality deleted successfully.'));

        return redirect(route('backend.municipalities.index'));
    }

    public function getMunicipalities() {

        $municipality = Municipality::select('id', 'name')
        ->orderBy('name')
        ->get();

        $municipality_json = json_encode($municipality);  // de Odjeto a JSON.
        // $departments_json = $departments->toJson();  // de Odjeto a JSON.
        return $municipality_json;
    }

    public function getMunicipalitiesForDpt(Request $request){
        $input = $request->all();
        $departmentId = $input['departmentId'];

        $municipioIdData = Municipality::select('id', 'name')
            ->where('department_id', $departmentId)
            ->get();

        $municipioIdData_json = $municipioIdData->toJson();  // de Odjeto a JSON.

        return $municipioIdData_json;

    }
}


