<x-forms.patch :action="route('frontend.user.profile.update')">
    <div class="form-group row">
        <label for="name" class="col-md-3 col-form-label text-md-right">@lang('Name')</label>

        <div class="col-md-9">
            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') ?? $logged_in_user->name }}" required autofocus autocomplete="name" />
        </div>
    </div><!--form-group-->

    @if ($logged_in_user->canChangeEmail())
        <div class="form-group row">
            <label for="email" class="col-md-3 col-form-label text-md-right">@lang('E-mail Address')</label>

            <div class="col-md-9">
                {{-- <x-utils.alert type="info" class="mb-3" :dismissable="false">
                    <i class="fas fa-info-circle"></i> @lang('If you change your e-mail you will be logged out until you confirm your new e-mail address.')
                </x-utils.alert> --}}

                <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') ?? $logged_in_user->email }}" required autocomplete="email" />
            </div>
        </div><!--form-group-->
    @endif

    <div class="form-group row">
        <label for="document_type" class="col-md-3 col-form-label text-md-right">@lang('Document Type')</label>

        <div class="col-md-4">
            <select class="form-control" name="document_type" id="document_type">
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="identification_number" class="col-md-3 col-form-label text-md-right">@lang('Identification number')</label>

        <div class="col-md-9">
            <input type="text" name="identification_number" class="form-control" placeholder="{{ __('Identification number') }}" id="identification_number"value="{{  $profile['identification_number'] ? $profile['identification_number'] : ''  }}" required autofocus/>
        </div>
    </div>

    <div class="form-group row">
        <label for="cellphone" class="col-md-3 col-form-label text-md-right">@lang('Cellphone')</label>

        <div class="col-md-9">
            <input type="text" name="cellphone" class="form-control" placeholder="{{ __('Cellphone') }}" id="cellphone"value="{{  $profile['cellphone'] ? $profile['cellphone'] : ''  }}" required autofocus autocomplete/>
        </div>
    </div>

    <div class="form-group row">
        <label for="telephone" class="col-md-3 col-form-label text-md-right">@lang('Telephone')</label>

        <div class="col-md-9">
            <input type="text" name="telephone" class="form-control" placeholder="{{ __('Telephone') }}" id="telephone"value="{{  $profile['telephone'] ? $profile['telephone'] : ''  }}" required autofocus autocomplete/>
        </div>
    </div>

    <div class="form-group row">
        <label for="address" class="col-md-3 col-form-label text-md-right">@lang('Address')</label>

        <div class="col-md-9">
            <input type="text" name="address" class="form-control" placeholder="{{ __('Address') }}" id="address"value="{{  $profile['address'] ? $profile['address'] : ''  }}" required autofocus autocomplete/>
        </div>
    </div>

    <div class="form-group row">
        <label for="departments" class="col-md-3 col-form-label text-md-right">@lang('Department')</label>

        <div class="col-md-4">
            <select class="form-control" name="departments" id="departments">
                <option value="" disabled selected>Seleccione un Departamento</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="municipalities" class="col-md-3 col-form-label text-md-right">@lang('Municipality')</label>

        <div class="col-md-4">
            <select class="form-control" name="municipalities" id="municipalities">
                <option value="" disabled selected>Seleccione un Municipio</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="genders" class="col-md-3 col-form-label text-md-right">@lang('Gender')</label>

        <div class="col-md-4">
            <select class="form-control" name="genders" id="genders">
            </select>
        </div>
    </div>

    <input type="hidden" id="user_id" name="user_id" value="{{ $profile['user_id'] ? $profile['user_id'] : '' }}" />
    <input type="hidden" id="document_type_id" name="document_type_id" value="{{ $profile['document_type_id'] ? $profile['document_type_id'] : '' }}" />
    <input type="hidden" id="department_id" name="department_id" value="{{ $dptoId ? $dptoId : '' }}" />
    <input type="hidden" id="municipality_id" name="municipality_id" value="{{ $profile['municipality_id'] ? $profile['municipality_id'] : '' }}" />
    <input type="hidden" id="gender_id" name="gender_id" value="{{ $profile['gender_id'] ? $profile['gender_id'] : '' }}" />

    <div class="form-group row mb-0">
        <div class="col-md-12 text-right">
            <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update')</button>
        </div>
    </div><!--form-group-->
</x-forms.patch>
