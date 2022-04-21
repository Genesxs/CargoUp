<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Department;
use App\Models\Backend\Discount;
use App\Models\Backend\Iva;
use App\Models\Backend\Municipality;
use App\Models\Frontend\Destination;
use App\Models\Frontend\Guide;
use App\Models\Frontend\GuideDestination;
use App\Models\Frontend\GuideDetail;
use App\Models\Frontend\Package;
use App\Models\Frontend\PickPlace;
use App\Models\Frontend\Profile;
use App\Models\Frontend\Ubication;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isEmpty;

class GuideController extends Controller
{

    public function index()
    {
        return view('frontend.user.guide-query');
    }

    public function indexService()
    {
        $ubications = Ubication::select('id', 'name')->get();

        return view('frontend.user.service', compact('ubications'));
    }

    public function indexGuideDes()
    {
        $ubications = Ubication::select('id', 'name')->get();
        return view('frontend.user.guide-destination', compact('ubications'));
    }


    public function storeOrigin(Request $request)
    {
        $ubications = Ubication::select('id', 'name')->get();

        //----------------------------------------------------------------

        $idUser = auth()->id();

        $profile = Profile::select('id')
            ->where('user_id', '=', $idUser)
            ->first();

        $ubication = Ubication::select('name as ub')
            ->where('id', '=', $request->input('ubications'))
            ->first();

        $department = Department::select('name as dep')
            ->where('id', '=', $request->input('departments'))
            ->first();

        $municipality = Municipality::select('name as mun')
            ->where('department_id', '=', $request->input('departments'))
            ->where('id', '=', $request->input('municipalities'))
            ->first();

        $address = collect([
            $ubication->ub,
            $request->input('nro1'),
            $request->input('nro2'), '-',
            $request->input('nro3'),
            $municipality->mun,
            $department->dep
        ])->implode(' ');


        if ($request->input('date_pick') < now()->toDateString()) {
            session()->flash('danger', 'No puedes seleccionar fechas anteriores.');
            return view('frontend.user.service', compact('ubications'))->with('danger');
        }

        $datePick = $request->input('date_pick');
        $date = Carbon::now();


        $lastIdPickPlace =  PickPlace::create([
            'address' => $address,
            'aditional_info' => $request->input('aditional_info'),
            'municipality_id' => $request->input('municipalities'),
            'profile_id' => $profile->id
        ]);

        $lastGuide = Guide::create([
            'pick_place_id' => $lastIdPickPlace->id,
            'date_guide' => $date,
            'date_pick' =>  $datePick
        ]);

        $lastGuideId = $lastGuide->id;

        return view('frontend.user.guide-destination', compact('ubications', 'lastGuideId'));
    }


    public function storeGuideDestiny(Request $request)
    {

        $ubications = Ubication::select('id', 'name')->get();

        //-------------------------------------------------------------------

        $ubication = Ubication::select('name as ub')
            ->where('id', '=', $request->input('ubications'))
            ->first();

        $department = Department::select('name as dep')
            ->where('id', '=', $request->input('departments'))
            ->first();

        $municipality = Municipality::select('name as mun')
            ->where('department_id', '=', $request->input('departments'))
            ->where('id', '=', $request->input('municipalities'))
            ->first();

        //guarda el address en un array
        $address = collect([
            $ubication->ub,
            $request->input('nro1'),
            $request->input('nro2'), '-',
            $request->input('nro3'),
            $municipality->mun,
            $department->dep
        ])->implode(' ');

        if ($request->input('envio') == 1) {
            $typeSend = 1;
        } else {
            $typeSend = 2;
        }

        if ($typeSend == 2) {
            $lastGuideDetailId = GuideDetail::create([
                'guide_id' =>  $request->input('guideId'),
                'type_send' => $typeSend,
                'cuantity' => $request->input('cuantity'),
                'content' => $request->input('content'),
                'height' => 0,
                'width' => 0,
                'length' => 0,
                'weight' => $request->input('weight'),
                'price' => 0
            ]);
        } else {
            $lastGuideDetailId = GuideDetail::create([
                'guide_id' =>  $request->input('guideId'),
                'type_send' => $typeSend,
                'cuantity' => $request->input('cuantity'),
                'content' => $request->input('content'),
                'height' => $request->input('height'),
                'width' => $request->input('width'),
                'length' => $request->input('length'),
                'weight' => $request->input('weight'),
                'price' => 0
            ]);
        }

        $lastIdDestination = Destination::create([
            'names' => $request->input('names'),
            'last_names' => $request->input('lastnames'),
            'address' => $address,
            'cellphone' => $request->input('cellphone'),
            'telephone' => $request->input('telephone'),
            'aditional_info' => $request->input('aditional_info'),
            'municipality_id' => $request->input('municipalities')
        ]);

        GuideDestination::create([
            'destination_id' => $lastIdDestination->id,
            'guide_detail_id' => $lastGuideDetailId->id
        ]);

        $lastGuideId = $request->input('guideId');


        session()->flash('success', 'Se ha guardado correctamente su dirección de destino.');
        return view('frontend.user.guide-destination', compact('ubications', 'lastGuideId'))->with('success');
    }

    public function storeGuide()
    {
        $lastGuideId = Guide::orderBy('id', 'desc')->select('id')->first();

        //Consulta si la fecha del iva y descuento es vigente
        $dateIva = DB::table('ivas')->select('id', 'end_date')
            ->where('end_date', '>=', now()->toDateString())
            ->first();

        $dateDiscount = DB::table('discounts')->select('id', 'end_date')
            ->where('end_date', '>=', now()->toDateString())
            ->first();

        //Se comprueba si existe el descuento e iva si no se guardar nulos
        if (isEmpty($dateIva) && isEmpty($dateDiscount)) {
            $guides = Guide::select('discount_id', 'iva_id', 'subtotal', 'total')
                ->where('id', '=', $lastGuideId->id)
                ->update([
                    'discount_id' => null,
                    'iva_id' => null,
                    'subtotal' => 0,
                    'total' => 0,
                ]);
        } else {
            $guides = Guide::select('discount_id', 'iva_id', 'subtotal', 'total')
                ->where('id', '=', $lastGuideId->id)
                ->update([
                    'discount_id' => $dateIva->id,
                    'iva_id' => $dateDiscount->id,
                    'subtotal' => 0,
                    'total' => 0,
                ]);
        }


        //Se comprueba si existe el descuento e iva si no se muestran nulos
        if (isEmpty($dateIva) && isEmpty($dateDiscount)) {
            $guide = DB::table('guides')
                ->join('pick_places', 'pick_places.id', '=', 'guides.pick_place_id')
                ->select('guides.id as guideId', 'guides.total', 'guides.subtotal', 'pick_places.address as pickAd', 'guides.iva_id', 'guides.discount_id')
                ->where('guides.id', '=', $lastGuideId->id)
                ->first();
        } else {
            $guide = DB::table('guides')
                ->join('pick_places', 'pick_places.id', '=', 'guides.pick_place_id')
                ->join('ivas', 'ivas.id', '=', 'guides.iva_id')
                ->join('discounts', 'discounts.id', '=', 'guides.discount_id')
                ->select(
                    'guides.id as guideId',
                    'guides.total',
                    'guides.subtotal',
                    'pick_places.address as pickAd',
                    'discounts.percentage as dis',
                    'ivas.percentage as iva'
                )
                ->where('guides.id', '=', $lastGuideId->id)
                ->first();
        }

        $lastOriginId = PickPlace::orderBy('id', 'desc')->select('id')->first();

        $origin = PickPlace::join('municipalities', 'municipalities.id', '=', 'pick_places.municipality_id')
            ->join('departments', 'departments.id', '=', 'municipalities.department_id')
            ->join('profiles', 'profiles.id', '=', 'pick_places.profile_id')
            ->join('users', 'users.id', '=', 'profiles.user_id')
            ->select(
                'pick_places.id',
                'municipalities.name as munOr',
                'pick_places.address as pickAd',
                'departments.name as depOr',
                'pick_places.aditional_info as adOr',
                'users.name as remitente',
                'profiles.telephone as telRemit'
            )
            ->where('pick_places.id', '=', $lastOriginId->id)
            ->first();


        //hacer consulta detalle guia y destinos

        $guideTotals = DB::table('guide_destinations')
            ->join('guide_details', 'guide_details.id', '=', 'guide_destinations.guide_detail_id')
            ->select(
                'guide_details.guide_id'
            )
            ->selectRaw('sum(guide_details.cuantity) as totalCuantity')
            ->selectRaw('sum(guide_details.weight) as totalWeight')
            ->groupBy('guide_details.guide_id')
            ->where('guide_details.guide_id', '=', $lastGuideId->id)
            ->get();

        $guideDestinations =  DB::table('guide_destinations')
            ->join('destinations', 'destinations.id', '=', 'guide_destinations.destination_id')
            ->join('guide_details', 'guide_details.id', '=', 'guide_destinations.guide_detail_id')
            ->join('municipalities', 'municipalities.id', '=', 'destinations.municipality_id')
            ->join('departments', 'departments.id', '=', 'municipalities.department_id')
            ->select(
                'guide_details.guide_id',
                'destinations.names as namDes',
                'destinations.last_names as lastDes',
                'destinations.address as desAd',
                'destinations.aditional_info as adDes',
                'destinations.telephone as telDes',
                'municipalities.name as munDes',
                'departments.name as depDe'
            )->where('guide_details.guide_id', '=', $lastGuideId->id)
            ->get();


        return view('frontend.user.guide', compact('guide', 'origin', 'guideDestinations', 'guideTotals'));
    }


    public function showPaymentGuide()
    {
        return view('frontend.user.payment-guide');
    }

    public function showEvidence($id)
    {
        $guide = Guide::find($id);

        return view('frontend.user.guide-evidence', compact('guide'));
    }

    public function storeEvidence(Request $request)
    {
        $idUser = auth()->id();

        $users = DB::table('users')->select('name')->where('id', '=', $idUser)
            ->first();

        $urlDocument = $request->file('payment_guide');
        $urlName = null;

        if ($request->hasFile('payment_guide')) {
            $urlName =  $urlDocument->getClientOriginalName();
            $payment = 'storage/documents/' . $users->name . '/' . $urlName;

            $path = 'storage/documents/' . $users->name;

            if (!File::exists($path)) {
                mkdir($path, 0777, true);
            }

            Storage::disk('documents')->put($users->name . '/' . $urlName, $payment);
        } else {
            $payment = $urlName;
        }

        $guidePayment = Guide::select('payment_guide')->where('id', '=', $request->input('guideId'))->update(['payment_guide' => $payment]);

        $guide = Guide::find($request->input('guideId'));

        session()->flash('success', 'Se ha enviado correctamente su comprobante de pago.');
        return view('frontend.user.guide-evidence',compact('guide'))->with('success');
    }

    public function storePaymentGuide(Request $request)
    {
        $idUser = auth()->id();

        $users = DB::table('users')->select('name')->where('id', '=', $idUser)
            ->first();

        $urlDocument = $request->file('payment_guide');
        $urlName = null;

        if ($request->hasFile('payment_guide')) {
            $urlName =  $urlDocument->getClientOriginalName();
            $payment = 'storage/documents/' . $users->name . '/' . $urlName;

            $path = 'storage/documents/' . $users->name;

            if (!File::exists($path)) {
                mkdir($path, 0777, true);
            }

            Storage::disk('documents')->put($users->name . '/' . $urlName, $payment);
        } else {
            $payment = $urlName;
        }

        $lastGuideId = Guide::orderBy('id', 'desc')->select('id')->first();

        $guide = Guide::select('payment_guide')->where('id', '=', $lastGuideId->id)->update(['payment_guide' => $payment]);

        session()->flash('success', 'Se ha enviado correctamente su comprobante de pago.');
        return view('frontend.user.payment-guide')->with('success');
    }
}
