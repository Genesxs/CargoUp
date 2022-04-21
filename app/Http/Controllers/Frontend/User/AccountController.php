<?php

namespace App\Http\Controllers\Frontend\User;

use App\Models\Backend\Municipality as BackendMunicipality;
use App\Models\Frontend\Profile;
use App\Models\Backend\Municipality;

/**
 * Class AccountController.
 */
class AccountController
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

        $user = \Auth::user();

        $user_profile = Profile::where('user_id', $user->id)->first();


        $user_profile_array = [
            'identification_number' => '',
            'cellphone'  => '',
            'telephone'  => '',
            'address'  => '',
            'document_type_id'  => '',
            'municipality_id'  => '',
            'gender_id'  => '',
            'user_id'  => ''
        ];

        $dptoId = 0;

        if (isset($user_profile)) {

            $department_id = Municipality::where('id', $user_profile->municipality_id)
                ->select('department_id')
                ->first();

            $dptoId = $department_id->department_id;

            $user_profile_array = $user_profile->toarray();
        }

        return view('frontend.user.account')
            ->with([
                'profile' => $user_profile_array, 
                'dptoId' => $dptoId
            ]);
    }
}
