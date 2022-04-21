<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreateIvaRequest;
use App\Http\Requests\Backend\UpdateIvaRequest;
use App\Repositories\Backend\IvaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class IvaController extends AppBaseController
{
    /** @var  IvaRepository */
    private $ivaRepository;

    public function __construct(IvaRepository $ivaRepo)
    {
        $this->ivaRepository = $ivaRepo;
    }

    /**
     * Display a listing of the Iva.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $ivas = $this->ivaRepository->paginate(5);

        return view('backend.ivas.index')
            ->with('ivas', $ivas);
    }

    /**
     * Show the form for creating a new Iva.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.ivas.create');
    }

    /**
     * Store a newly created Iva in storage.
     *
     * @param CreateIvaRequest $request
     *
     * @return Response
     */
    public function store(CreateIvaRequest $request)
    {
        $input = $request->all();

        try {
            $iva = $this->ivaRepository->create($input);
        } catch (\Throwable $th) {
            Flash::error(__('This iva already exists.'));
            return redirect(route('backend.ivas.index'));
        }
        

        Flash::success(__('Iva saved successfully.'));

        return redirect(route('backend.ivas.index'));
    }

    /**
     * Display the specified Iva.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $iva = $this->ivaRepository->find($id);

        if (empty($iva)) {
            Flash::error(__('Iva not found'));

            return redirect(route('backend.ivas.index'));
        }

        return view('backend.ivas.show')->with('iva', $iva);
    }

    /**
     * Show the form for editing the specified Iva.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $iva = $this->ivaRepository->find($id);

        if (empty($iva)) {
            Flash::error(__('Iva not found'));

            return redirect(route('backend.ivas.index'));
        }

        return view('backend.ivas.edit')->with('iva', $iva);
    }

    /**
     * Update the specified Iva in storage.
     *
     * @param int $id
     * @param UpdateIvaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIvaRequest $request)
    {
        $iva = $this->ivaRepository->find($id);

        if (empty($iva)) {
            Flash::error('Iva not found');

            return redirect(route('backend.ivas.index'));
        }

        try {
            $iva = $this->ivaRepository->update($request->all(), $id);
        } catch (\Throwable $th) {
            Flash::error(__('This iva already exists.'));
            return redirect(route('backend.ivas.index'));
        }
        

        Flash::success(__('Iva updated successfully.'));

        return redirect(route('backend.ivas.index'));
    }

    /**
     * Remove the specified Iva from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $iva = $this->ivaRepository->find($id);

        if (empty($iva)) {
            Flash::error(__('Iva not found'));

            return redirect(route('backend.ivas.index'));
        }

        $this->ivaRepository->delete($id);

        Flash::success(__('Iva deleted successfully.'));

        return redirect(route('backend.ivas.index'));
    }
}
