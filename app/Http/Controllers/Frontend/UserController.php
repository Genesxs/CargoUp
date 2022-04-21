<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Frontend\Owner;
use App\Models\Frontend\Profile;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Ubication;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function indexOwnerDriver()
    {
        return view('frontend.user.ownerDriver');
    }

    public function indexOwner()
    {
        $idUser = auth()->id();

        try {
            $profiles = Profile::select('id', 'user_id')
            ->where('user_id', '=', $idUser)
            ->first();  
        } catch (\Throwable $th) {
            return redirect()->view('frontend.user.account')->with('warning');
        }

            
        if($profiles){
            $owner = DB::table('owners')->select('status')
            ->where('profile_id', '=', $profiles->id)
            ->first();
        } else {
            return redirect()->view('frontend.user.account');
        }

        if(!$owner){
            $owner = new Owner();

            $owner->status = 5;
        }

        return view('frontend.user.owner')->with('owner', $owner);
    }

    public function indexDriver()
    {
        return view('frontend.user.driver');
    }

}
