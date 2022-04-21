<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreateDocumentTypeRequest;
use App\Http\Requests\Backend\UpdateDocumentTypeRequest;
use App\Repositories\Backend\DocumentTypeRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Backend\DocumentType;
use Illuminate\Http\Request;
use Flash;
use Response;

class DocumentTypeController extends AppBaseController
{
    /** @var  DocumentTypeRepository */
    private $documentTypeRepository;

    public function __construct(DocumentTypeRepository $documentTypeRepo)
    {
        $this->documentTypeRepository = $documentTypeRepo;
    }

    /**
     * Display a listing of the DocumentType.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $documentTypes = $this->documentTypeRepository->paginate(5);

        return view('backend.document_types.index')
            ->with('documentTypes', $documentTypes);
    }

    /**
     * Show the form for creating a new DocumentType.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.document_types.create');
    }

    /**
     * Store a newly created DocumentType in storage.
     *
     * @param CreateDocumentTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateDocumentTypeRequest $request)
    {
        $input = $request->all();

        try {
            $documentType = $this->documentTypeRepository->create($input);
        } catch (\Throwable $th) {
            Flash::error(__('This document type already exists.'));
            return redirect(route('backend.documentTypes.index'));
        }


        Flash::success(__('Document Type saved successfully.'));

        return redirect(route('backend.documentTypes.index'));
    }

    /**
     * Display the specified DocumentType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $documentType = $this->documentTypeRepository->find($id);

        if (empty($documentType)) {
            Flash::error(__('Document Type not found'));

            return redirect(route('backend.documentTypes.index'));
        }

        return view('backend.document_types.show')->with('documentType', $documentType);
    }

    /**
     * Show the form for editing the specified DocumentType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $documentType = $this->documentTypeRepository->find($id);

        if (empty($documentType)) {
            Flash::error(__('Document Type not found'));

            return redirect(route('backend.documentTypes.index'));
        }

        return view('backend.document_types.edit')->with('documentType', $documentType);
    }

    /**
     * Update the specified DocumentType in storage.
     *
     * @param int $id
     * @param UpdateDocumentTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDocumentTypeRequest $request)
    {
        $documentType = $this->documentTypeRepository->find($id);

        if (empty($documentType)) {
            Flash::error(__('Document Type not found'));

            return redirect(route('backend.documentTypes.index'));
        }

        try {
            $documentType = $this->documentTypeRepository->update($request->all(), $id);
        } catch (\Throwable $th) {
            Flash::error(__('This document type already exists.'));
            return redirect(route('backend.documentTypes.index'));
        }      

        Flash::success(__('Document Type updated successfully.'));

        return redirect(route('backend.documentTypes.index'));
    }

    /**
     * Remove the specified DocumentType from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $documentType = $this->documentTypeRepository->find($id);

        if (empty($documentType)) {
            Flash::error(__('Document Type not found'));

            return redirect(route('backend.documentTypes.index'));
        }

        $this->documentTypeRepository->delete($id);

        Flash::success('Document Type deleted successfully.');

        return redirect(route('backend.documentTypes.index'));
    }

    public function getTypeDocuments() {

        $documentType = DocumentType::select('id', 'name')
        ->orderBy('name')
        ->get();

        $documentType_json = json_encode($documentType);  // de Odjeto a JSON.
        // $departments_json = $departments->toJson();  // de Odjeto a JSON.
        return $documentType_json;
    }
}
