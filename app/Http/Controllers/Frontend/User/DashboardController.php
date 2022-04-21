<?php

namespace App\Http\Controllers\Frontend\User;
use App\Models\Frontend\Owner;
use App\Models\Frontend\Profile;
use Illuminate\Support\Facades\DB;

/**
 * Class DashboardController.
 */
class DashboardController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $idUser = auth()->id();

        try {
            $profiles = Profile::select('id', 'user_id')
            ->where('user_id', '=', $idUser)
            ->first();  
        } catch (\Throwable $th) {
            return redirect()->route('frontend.user.account');
        }

            
        if($profiles){
            $owner = DB::table('owners')->select('status')
            ->where('profile_id', '=', $profiles->id)
            ->first();
        } else {
            return redirect()->route('frontend.user.account');
        }

        if(!$owner){
            $owner = new Owner();

            $owner->status = 5;
        }

        return view('frontend.user.dashboard')->with('owner', $owner);
    }
}
