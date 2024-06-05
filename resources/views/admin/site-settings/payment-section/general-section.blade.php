<div class="tab-pane fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card">
        <div class="card-header">
            <h4>General Settings</h4>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.general-settings.update') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Site Name</label>
                        <input type="text" class="form-control {{ hasError($errors, 'site_name') }}"
                            name="site_name" value="{{ config('settings.site_name') }}">
                        <x-input-error :messages="$errors->get('site_name')" class="mt-2" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Site Email</label>
                        <input type="text" class="form-control {{ hasError($errors, 'site_email') }}"
                            name="site_email" value="{{ config('settings.site_email') }}">
                        <x-input-error :messages="$errors->get('site_email')" class="mt-2" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Site Phone</label>
                        <input type="text" class="form-control {{ hasError($errors, 'site_phone') }}"
                            name="site_phone" value="{{ config('settings.site_phone') }}">
                        <x-input-error :messages="$errors->get('site_phone')" class="mt-2" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Site Default Currency</label>
                        <select name="site_default_currency"
                            class="form-control select2 {{ hasError($errors, 'site_default_currency') }}" id="">
                            <option value="">Select Currency</option>
                            @foreach (config('currencies.currency_list') as $key => $currency)
                                <option @selected($currency === config('settings.site_default_currency')) value="{{ $currency }}">{{ $key }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('site_default_currency')" class="mt-2" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Currency Icon</label>
                        <input type="text" class="form-control {{ hasError($errors, 'site_currency_icon') }}"
                            name="site_currency_icon" value="{{ config('settings.site_currency_icon') }}">
                        <x-input-error :messages="$errors->get('site_currency_icon')" class="mt-2" />
                    </div>
                </div>
                {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Currency Icon</label>
                        <select name="site_currency_icon"
                            class="form-control select2 {{ hasError($errors, 'site_currency_icon') }}" id="">
                            <option value="">Select Currency</option>
                            @foreach (config('currencies.currency_list') as $key => $currency)
                                <option value="{{ $currency }}">{{ $key }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('site_currency_icon')" class="mt-2" />
                    </div>
                </div> --}}
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
