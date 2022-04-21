<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreateQuotaRequest;
use App\Http\Requests\Backend\UpdateQuotaRequest;
use App\Repositories\Backend\QuotaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Backend\TypeVehicle;
use App\Models\Backend\Quota;

class QuotaController extends AppBaseController
{
    /** @var  QuotaRepository */
    private $quotaRepository;

    public function __construct(QuotaRepository $quotaRepo)
    {
        $this->quotaRepository = $quotaRepo;
    }

    /**
     * Display a listing of the Quota.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $quotas = $this->quotaRepository->paginate(5);

        return view('backend.quotas.index')
            ->with('quotas', $quotas);
    }

    /**
     * Show the form for creating a new Quota.
     *
     * @return Response
     */
    public function create()
    {
        $vehicle = TypeVehicle::pluck('name','id');
        $quota = new Quota();
        return view('backend.quotas.create')->with(compact('vehicle', 'quota'));
    }

    /**
     * Store a newly created Quota in storage.
     *
     * @param CreateQuotaRequest $request
     *
     * @return Response
     */
    public function store(CreateQuotaRequest $request)
    {
        $input = $request->all();

        $quota = $this->quotaRepository->create($input);

        Flash::success(__('Quota saved successfully.'));

        return redirect(route('backend.quotas.index'));
    }

    /**
     * Display the specified Quota.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $quota = $this->quotaRepository->find($id);
        

        if (empty($quota)) {
            Flash::error('Quota not found');

            return redirect(route('backend.quotas.index'));
        }

        return view('backend.quotas.show')->with('quota', $quota);
    }

    /**
     * Show the form for editing the specified Quota.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $quota = $this->quotaRepository->find($id);
        $vehicle = TypeVehicle::pluck('name','id');

        if (empty($quota)) {
            Flash::error(__('Quota not found'));

            return redirect(route('backend.quotas.index'));
        }

        return view('backend.quotas.edit')->with(compact('quota', 'vehicle'));
    }

    /**
     * Update the specified Quota in storage.
     *
     * @param int $id
     * @param UpdateQuotaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuotaRequest $request)
    {
        $quota = $this->quotaRepository->find($id);

        if (empty($quota)) {
            Flash::error('Quota not found');

            return redirect(route('backend.quotas.index'));
        }

        $quota = $this->quotaRepository->update($request->all(), $id);

        Flash::success(__('Quota updated successfully.'));

        return redirect(route('backend.quotas.index'));
    }

    /**
     * Remove the specified Quota from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $quota = $this->quotaRepository->find($id);

        if (empty($quota)) {
            Flash::error(__('Quota not found'));

            return redirect(route('backend.quotas.index'));
        }

        $this->quotaRepository->delete($id);

        Flash::success(__('Quota deleted successfully.'));

        return redirect(route('backend.quotas.index'));
    }
}
