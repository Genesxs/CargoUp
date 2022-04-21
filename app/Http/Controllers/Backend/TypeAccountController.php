<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreateTypeAccountRequest;
use App\Http\Requests\Backend\UpdateTypeAccountRequest;
use App\Repositories\Backend\TypeAccountRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TypeAccountController extends AppBaseController
{
    /** @var  TypeAccountRepository */
    private $typeAccountRepository;

    public function __construct(TypeAccountRepository $typeAccountRepo)
    {
        $this->typeAccountRepository = $typeAccountRepo;
    }

    /**
     * Display a listing of the TypeAccount.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $typeAccounts = $this->typeAccountRepository->paginate(5);

        return view('backend.type_accounts.index')
            ->with('typeAccounts', $typeAccounts);
    }

    /**
     * Show the form for creating a new TypeAccount.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.type_accounts.create');
    }

    /**
     * Store a newly created TypeAccount in storage.
     *
     * @param CreateTypeAccountRequest $request
     *
     * @return Response
     */
    public function store(CreateTypeAccountRequest $request)
    {
        $input = $request->all();

        $typeAccount = $this->typeAccountRepository->create($input);

        Flash::success(__('Type Account saved successfully.'));

        return redirect(route('backend.typeAccounts.index'));
    }

    /**
     * Display the specified TypeAccount.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $typeAccount = $this->typeAccountRepository->find($id);

        if (empty($typeAccount)) {
            Flash::error(__('Type Account not found'));

            return redirect(route('backend.typeAccounts.index'));
        }

        return view('backend.type_accounts.show')->with('typeAccount', $typeAccount);
    }

    /**
     * Show the form for editing the specified TypeAccount.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $typeAccount = $this->typeAccountRepository->find($id);

        if (empty($typeAccount)) {
            Flash::error(__('Type Account not found'));

            return redirect(route('backend.typeAccounts.index'));
        }

        return view('backend.type_accounts.edit')->with('typeAccount', $typeAccount);
    }

    /**
     * Update the specified TypeAccount in storage.
     *
     * @param int $id
     * @param UpdateTypeAccountRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTypeAccountRequest $request)
    {
        $typeAccount = $this->typeAccountRepository->find($id);

        if (empty($typeAccount)) {
            Flash::error(__('Type Account not found'));

            return redirect(route('backend.typeAccounts.index'));
        }

        $typeAccount = $this->typeAccountRepository->update($request->all(), $id);

        Flash::success(__('Type Account updated successfully.'));

        return redirect(route('backend.typeAccounts.index'));
    }

    /**
     * Remove the specified TypeAccount from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $typeAccount = $this->typeAccountRepository->find($id);

        if (empty($typeAccount)) {
            Flash::error(__('Type Account not found'));

            return redirect(route('backend.typeAccounts.index'));
        }

        $this->typeAccountRepository->delete($id);

        Flash::success(__('Type Account deleted successfully.'));

        return redirect(route('backend.typeAccounts.index'));
    }
}
