<?php

namespace App\Http\Controllers\Frontend\User;

use App\Domains\Auth\Services\UserService;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use App\Models\Frontend\Profile;

/**
 * Class ProfileController.
 */
class ProfileController
{
    /**
     * @param  UpdateProfileRequest  $request
     * @param  UserService  $userService
     * @return mixed
     */
    public function update(UpdateProfileRequest $request, UserService $userService)
    {

        $user = \Auth::user();

        if (!empty($request->input('user_id'))) {
            $profileUpdate =  Profile::where('user_id', (int)$request->input('user_id'))->first();

            if (isset($profileUpdate)) {
                $profileUpdate->identification_number = $request->input('identification_number');
                $profileUpdate->cellphone =  $request->input('cellphone');
                $profileUpdate->telephone = $request->input('telephone');
                $profileUpdate->address = $request->input('address');
                $profileUpdate->document_type_id = $request->input('document_type'); 
                $profileUpdate->gender_id = $request->input('genders'); 
                $profileUpdate->municipality_id = $request->input('municipalities');               
                $profileUpdate->user_id = $user->id;
                $profileUpdate->save();
            } 
        } else {
            if(!empty($request->input('document_type')) && !empty($request->input('municipalities')) && !empty($request->input('genders'))){
                $profile = new Profile();
                $profile->identification_number = $request->input('identification_number');
                $profile->cellphone =  $request->input('cellphone');
                $profile->telephone = $request->input('telephone');
                $profile->address = $request->input('address');
                $profile->document_type_id = $request->input('document_type'); 
                $profile->gender_id = $request->input('genders'); 
                $profile->municipality_id = $request->input('municipalities');     
                $profile->user_id = $user->id;
                $profile->save();
            } else {
                return redirect()->route('frontend.user.account', ['#information'])->withFlashSuccess(__('You must select a Document Type, Municipality and Gender.'));
            }

        }

        $userService->updateProfile($request->user(), $request->validated());

        if (session()->has('resent')) {
            return redirect()->route('frontend.auth.verification.notice')->withFlashInfo(__('You must confirm your new e-mail address before you can go any further.'));
        }

        return redirect()->route('frontend.user.account', ['#information'])->withFlashSuccess(__('Profile successfully updated.'));
    }
}
