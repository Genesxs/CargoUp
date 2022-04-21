<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreateDepartmentRequest;
use App\Http\Requests\Backend\UpdateDepartmentRequest;
use App\Repositories\Backend\DepartmentRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Backend\Department;
use Illuminate\Http\Request;
use Flash;
use Response;

class DepartmentController extends AppBaseController
{
    /** @var  DepartmentRepository */
    private $departmentRepository;

    public function __construct(DepartmentRepository $departmentRepo)
    {
        $this->departmentRepository = $departmentRepo;
    }

    /**
     * Display a listing of the Department.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $departments = $this->departmentRepository->paginate(5);

        return view('backend.departments.index')
            ->with('departments', $departments);
    }

    /**
     * Show the form for creating a new Department.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.departments.create');
    }


    /**
     * Store a newly created Department in storage.
     *
     * @param CreateDepartmentRequest $request
     *
     * @return Response
     */
    public function store(CreateDepartmentRequest $request)
    {
        $input = $request->all();

        try {
            $department = $this->departmentRepository->create($input);
        } catch (\Throwable $th) {
            Flash::error(__('This department already exists.'));
            return redirect(route('backend.departments.index'));
        }
        

        Flash::success(__('Department saved successfully.'));

        return redirect(route('backend.departments.index'));
    }

    /**
     * Display the specified Department.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $department = $this->departmentRepository->find($id);

        if (empty($department)) {
            Flash::error(__('Department not found'));

            return redirect(route('backend.departments.index'));
        }

        return view('backend.departments.show')->with('department', $department);
    }

    /**
     * Show the form for editing the specified Department.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $department = $this->departmentRepository->find($id);

        if (empty($department)) {
            Flash::error(__('Department not found'));

            return redirect(route('backend.departments.index'));
        }

        return view('backend.departments.edit')->with('department', $department);
    }

    /**
     * Update the specified Department in storage.
     *
     * @param int $id
     * @param UpdateDepartmentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepartmentRequest $request)
    {
        $department = $this->departmentRepository->find($id);

        if (empty($department)) {
            Flash::error(__('Department not found'));

            return redirect(route('backend.departments.index'));
        }

        try {
            $department = $this->departmentRepository->update($request->all(), $id);
        } catch (\Throwable $th) {
            Flash::error(__('This department already exists.'));
            return redirect(route('backend.departments.index'));
        }
        

        Flash::success('Department updated successfully.');

        return redirect(route('backend.departments.index'));
    }

    /**
     * Remove the specified Department from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $department = $this->departmentRepository->find($id);

        if (empty($department)) {
            Flash::error(__('Department not found'));

            return redirect(route('backend.departments.index'));
        }

        $this->departmentRepository->delete($id);

        Flash::success(__('Department deleted successfully.'));

        return redirect(route('backend.departments.index'));
    }

    public function getdepartments()
    {
        $department = Department::select('id', 'name')
        ->orderBy('name')
        ->get();

        $department_json = json_encode($department);  // de Odjeto a JSON.
        // $departments_json = $departments->toJson();  // de Odjeto a JSON.
        return $department_json;
    }
}
