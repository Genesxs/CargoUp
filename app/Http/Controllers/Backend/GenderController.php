<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreateGenderRequest;
use App\Http\Requests\Backend\UpdateGenderRequest;
use App\Repositories\Backend\GenderRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Backend\Gender;
use Illuminate\Http\Request;
use Flash;
use Response;

class GenderController extends AppBaseController
{
    /** @var  GenderRepository */
    private $genderRepository;

    public function __construct(GenderRepository $genderRepo)
    {
        $this->genderRepository = $genderRepo;
    }

    /**
     * Display a listing of the Gender.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $genders = $this->genderRepository->paginate(5);

        return view('backend.genders.index')
            ->with('genders', $genders);
    }

    /**
     * Show the form for creating a new Gender.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.genders.create');
    }

    /**
     * Store a newly created Gender in storage.
     *
     * @param CreateGenderRequest $request
     *
     * @return Response
     */
    public function store(CreateGenderRequest $request)
    {
        $input = $request->all();

        try {
            $gender = $this->genderRepository->create($input);
        } catch (\Throwable $th) {
            Flash::error(__('This gender already exists.'));
            return redirect(route('backend.genders.index'));          
        }
       

        Flash::success(__('Gender saved successfully.'));

        return redirect(route('backend.genders.index'));
    }

    /**
     * Display the specified Gender.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $gender = $this->genderRepository->find($id);

        if (empty($gender)) {
            Flash::error(__('Gender not found'));

            return redirect(route('backend.genders.index'));
        }

        return view('backend.genders.show')->with('gender', $gender);
    }

    /**
     * Show the form for editing the specified Gender.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $gender = $this->genderRepository->find($id);

        if (empty($gender)) {
            Flash::error(__('Gender not found'));

            return redirect(route('backend.genders.index'));
        }

        return view('backend.genders.edit')->with('gender', $gender);
    }

    /**
     * Update the specified Gender in storage.
     *
     * @param int $id
     * @param UpdateGenderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGenderRequest $request)
    {
        $gender = $this->genderRepository->find($id);

        if (empty($gender)) {
            Flash::error(__('Gender not found'));

            return redirect(route('backend.genders.index'));
        }


        try {
            $gender = $this->genderRepository->update($request->all(), $id);
        } catch (\Throwable $th) {
            Flash::error(__('This gender already exists.'));
            return redirect(route('backend.genders.index'));
        }
        

        Flash::success(__('Gender updated successfully.'));

        return redirect(route('backend.genders.index'));
    }

    /**
     * Remove the specified Gender from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $gender = $this->genderRepository->find($id);

        if (empty($gender)) {
            Flash::error(__('Gender not found'));

            return redirect(route('backend.genders.index'));
        }

        $this->genderRepository->delete($id);

        Flash::success(__('Gender deleted successfully.'));

        return redirect(route('backend.genders.index'));
    }

    public function getGenders() {

        $gender = Gender::select('id', 'name')
        ->orderBy('name')
        ->get();

        $gender_json = json_encode($gender);  // de Odjeto a JSON.
        // $departments_json = $departments->toJson();  // de Odjeto a JSON.
        return $gender_json;
    }
}
