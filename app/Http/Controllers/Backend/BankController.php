<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreateBankRequest;
use App\Http\Requests\Backend\UpdateBankRequest;
use App\Repositories\Backend\BankRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Backend\TypeAccount;
use Illuminate\Http\Request;
use Flash;
use Response;

class BankController extends AppBaseController
{
    /** @var  BankRepository */
    private $bankRepository;

    public function __construct(BankRepository $bankRepo)
    {
        $this->bankRepository = $bankRepo;
    }

    /**
     * Display a listing of the Bank.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $banks = $this->bankRepository->paginate(5);

        return view('backend.banks.index')
            ->with('banks', $banks);
    }

    /**
     * Show the form for creating a new Bank.
     *
     * @return Response
     */
    public function create()
    {
        $typeAccount = TypeAccount::pluck('name','id');
        return view('backend.banks.create')->with('typeAccount', $typeAccount);
    }

    /**
     * Store a newly created Bank in storage.
     *
     * @param CreateBankRequest $request
     *
     * @return Response
     */
    public function store(CreateBankRequest $request)
    {
        $input = $request->all();

        $bank = $this->bankRepository->create($input);

        Flash::success(__('Bank saved successfully.'));

        return redirect(route('backend.banks.index'));
    }

    /**
     * Display the specified Bank.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bank = $this->bankRepository->find($id);

        if ($bank->status == 0) {
            $status = 'Activo';
        } else {
            $status = 'Inactivo';
        }

        if (empty($bank)) {
            Flash::error(__('Bank not found'));

            return redirect(route('backend.banks.index'));
        }

        return view('backend.banks.show')->with(compact('bank', 'status'));
    }

    /**
     * Show the form for editing the specified Bank.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bank = $this->bankRepository->find($id);

        $typeAccount = TypeAccount::pluck('name','id');

        if (empty($bank)) {
            Flash::error(__('Bank not found'));

            return redirect(route('backend.banks.index'));
        }

        return view('backend.banks.edit')->with(compact('bank', 'typeAccount'));
    }

    /**
     * Update the specified Bank in storage.
     *
     * @param int $id
     * @param UpdateBankRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBankRequest $request)
    {
        $bank = $this->bankRepository->find($id);

        if (empty($bank)) {
            Flash::error(__('Bank not found'));

            return redirect(route('backend.banks.index'));
        }

        $bank = $this->bankRepository->update($request->all(), $id);

        Flash::success(__('Bank updated successfully.'));

        return redirect(route('backend.banks.index'));
    }

    /**
     * Remove the specified Bank from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bank = $this->bankRepository->find($id);

        if (empty($bank)) {
            Flash::error(__('Bank not found'));

            return redirect(route('backend.banks.index'));
        }

        $this->bankRepository->delete($id);

        Flash::success(__('Bank deleted successfully.'));

        return redirect(route('backend.banks.index'));
    }
}
