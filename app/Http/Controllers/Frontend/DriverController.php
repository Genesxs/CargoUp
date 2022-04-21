<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Frontend\Profile;
use App\Models\Frontend\Driver;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Flash;

class DriverController extends AppBaseController
{

    //método vista registrarse como conductor
    public function driver()
    {
        return view('frontend.user.driver.driver');
    }

    //método para guardar conductor
    public function storeDriver(Request $request)
    {
        $idUser = auth()->id();

        $profiles = Profile::select('id', 'user_id')
            ->where('user_id', '=', $idUser)
            ->first();

        if ($profiles == null) {
            session()->flash('warning', 'Debe completar los datos de editar información, en Mi cuenta');
            return view('frontend.user.driver.driver')->with('warning');
        }

        $this->validate($request, [
            'url_photo' => 'required',
            'url_curriculum' => 'required',
            'municipalities' => 'required',
            'experience' => 'required',
            'jobs_name' => 'required',
        ]);

        $users = DB::table('users')->select('name')->where('id', '=', $idUser)
            ->first();

        $urlCurriculum = $request->file('url_curriculum');
        $urlName = null;

        if ($request->hasFile('url_curriculum')) {
            $urlName =  $urlCurriculum->getClientOriginalName();
            $curriculum = 'storage/documents/' . $users->name . '/' . $urlName;

            Storage::disk('documents')->put($users->name . '/' . $urlName, File::get($urlCurriculum));
        } else {
            $curriculum = $urlName;
        }

        $urlPhoto = $request->file('url_photo');

        if ($request->hasFile('url_photo')) {
            $urlName =  $urlPhoto->getClientOriginalName();
            $photo = 'storage/img/' . $users->name . '/' . $urlName;

            Storage::disk('images')->put($users->name . '/' . $urlName, File::get($urlPhoto));
        } else {
            $photo = $urlName;
        }

        Driver::create([
            'url_photo' => $photo,
            'url_curriculum' => $curriculum,
            'experience' => request('experience'),
            'municipality_id' => $request->input('municipalities'),
            'jobs_name' => request('jobs_name'),
            'score' => '120',
            'status' => Driver::APROBADO,
            'profile_id' => $profiles->id,
        ]);

        session()->flash('success', 'Se ha guardado correctamente sus datos');
        return view('frontend.user.driver.driver')->with('success');
       
    }


    //Método para descargar documento hoja de vida
    public function downloadCurriculum()
    {
        $pathToFile = storage_path("app/documents/minervahojadevida.pdf");
        return response()->download($pathToFile);
    }
}
