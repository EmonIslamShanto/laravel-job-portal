<div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
    <div class="card">
        <div class="card-header">
            <h4>Stripe Settings</h4>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.stripe-settings.update') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Stripe Status</label>
                        <select name="stripe_status" class="form-control {{ hasError($errors, 'stripe_status') }}"
                            id="">
                            <option @selected(config('gatewaySettings.stripe_status') === 'active') value="active">Active</option>
                            <option @selected(config('gatewaySettings.stripe_status') === 'inactive') value="inactive">Inactive</option>
                        </select>
                        <x-input-error :messages="$errors->get('stripe_status')" class="mt-2" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Stripe Country Name</label>
                        <select name="stripe_country_name"
                            class="form-control select2 {{ hasError($errors, 'stripe_country_name') }}" id="">
                            <option value="">Select Country</option>
                            @foreach (config('countries') as $key => $country)
                                <option @selected($key === config('gatewaySettings.stripe_country_name')) value="{{ $key }}">{{ $country }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('stripe_country_name')" class="mt-2" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Stripe Currency Name</label>
                        <select name="stripe_currency_name"
                            class="form-control select2 {{ hasError($errors, 'stripe_currency_name') }}" id="">
                            <option value="">Select Currency</option>
                            @foreach (config('currencies.currency_list') as $key => $currency)
                                <option @selected($currency === config('gatewaySettings.stripe_currency_name')) value="{{ $currency }}">{{ $key }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('stripe_currency_name')" class="mt-2" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Stripe Currency Rate</label>
                        <input type="text" class="form-control {{ hasError($errors, 'stripe_currency_rate') }}"
                            name="stripe_currency_rate" value="{{ config('gatewaySettings.stripe_currency_rate') }}">
                        <x-input-error :messages="$errors->get('stripe_currency_rate')" class="mt-2" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Stripe Publishable Key</label>
                        <input type="text" class="form-control {{ hasError($errors, 'stripe_publishable_key') }}"
                            name="stripe_publishable_key"
                            value="{{ config('gatewaySettings.stripe_publishable_key') }}">
                        <x-input-error :messages="$errors->get('stripe_publishable_key')" class="mt-2" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Stripe Secret Key</label>
                        <input type="text" class="form-control {{ hasError($errors, 'stripe_secret_key') }}"
                            name="stripe_secret_key" value="{{ config('gatewaySettings.stripe_secret_key') }}">
                        <x-input-error :messages="$errors->get('stripe_secret_key')" class="mt-2" />
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
