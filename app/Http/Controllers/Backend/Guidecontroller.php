<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Guide;
use App\Models\Frontend\Driver;
use App\Models\Frontend\Owner;
use App\Models\Frontend\OwnerDriver;
use App\Repositories\Backend\GuideRepository;
use Illuminate\Http\Request;
use Flash;
use RealRashid\SweetAlert\Facades\Alert;

class Guidecontroller extends Controller
{
    /** @var  GuideRepository */
    private $guideRepository;

    public function __construct(GuideRepository $guideRepo)
    {
        $this->guideRepository = $guideRepo;
    }

    public function index()
    {
        $guides = Guide::join('pick_places', 'pick_places.id', '=', 'guides.pick_place_id')
            ->join('profiles', 'profiles.id', '=', 'pick_places.profile_id')
            ->join('users', 'users.id', '=', 'profiles.user_id')
            ->get(['guides.id', 'guides.status', 'guides.date_guide', 'guides.date_pick', 'users.name']);

        return view('backend.guides.index')->with('guides', $guides);
    }

    public function download($id)
    {
        $guide = Guide::select('payment_guide')->find($id);

        $pathToFile = $guide->payment_guide;
        return response()->download($pathToFile);

        if (empty($gender)) {
            Flash::error(__('Guide not found'));
            return redirect(route('backend.guides.index'));
        }
    }

    public function update($id)
    {
        $guide = Guide::where('id', '=', $id)
            ->update([
                'status' => Guide::PAGADA
            ]);

        Alert::success(session('success', 'Se ha verificado correctamente el comprobante de pago.'));
        return redirect()->back();
    }

    public function findGuide($id)
    {
        $guide = Guide::select('id')->where('id', '=', $id)->first();

        return view('backend.guides.assing-driver', compact('guide'));
    }

    public function searchGuide(Request $request)
    {
        $guide = Guide::select('date_guide', 'status')
            ->where('date_guide', '>=', $request->input('date_from'))
            ->where('date_guide', '<=', $request->input('date_to'))
            ->where('status', '=', $request->input('status'))->get();

        $guides = [];

        foreach ($guide as $guide) {

            $guides = Guide::join('pick_places', 'pick_places.id', '=', 'guides.pick_place_id')
                ->join('profiles', 'profiles.id', '=', 'pick_places.profile_id')
                ->join('users', 'users.id', '=', 'profiles.user_id')
                ->where('guides.status', '=', $request->input('status'))
                ->get(['guides.id', 'guides.status', 'guides.date_guide', 'guides.date_pick', 'users.name']);
        }

        return view('backend.guides.index')->with('guides', $guides);
    }
}
