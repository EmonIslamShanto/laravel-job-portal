<div class="tab-pane fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card">
        <div class="card-header">
            <h4>Paypal Settings</h4>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.paypal-settings.update') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Paypal Status</label>
                        <select name="paypal_status" class="form-control {{ hasError($errors, 'paypal_status') }}"
                            id="">
                            <option @selected(config('gatewaySettings.paypal_status' === 'active')) value="active">Active</option>
                            <option @selected(config('gatewaySettings.paypal_status' === 'inactive')) value="inactive">Inactive</option>
                        </select>
                        <x-input-error :messages="$errors->get('paypal_status')" class="mt-2" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Paypal Account Mode</label>
                        <select name="paypal_account_mode"
                            class="form-control {{ hasError($errors, 'paypal_account_mode') }}" id="">
                            <option @selected(config('gatewaySettings.paypal_account_mode' === 'sandbox')) value="sandbox">Sandbox</option>
                            <option @selected(config('gatewaySettings.paypal_account_mode' === 'live')) value="live">Live</option>
                        </select>
                        <x-input-error :messages="$errors->get('paypal_account_mode')" class="mt-2" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Paypal Country Name</label>
                        <select name="paypal_country_name"
                            class="form-control select2 {{ hasError($errors, 'paypal_country_name') }}" id="">
                            <option value="">Select Country</option>
                            @foreach (config('countries') as $key => $country)
                                <option @selected($key === config('gatewaySettings.paypal_country_name')) value="{{ $key }}">{{ $country }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('paypal_country_name')" class="mt-2" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Paypal Currency Name</label>
                        <select name="paypal_currency_name"
                            class="form-control select2 {{ hasError($errors, 'paypal_currency_name') }}" id="">
                            <option value="">Select Currency</option>
                            @foreach (config('currencies.currency_list') as $key => $currency)
                                <option @selected($currency === config('gatewaySettings.paypal_currency_name')) value="{{ $currency }}">{{ $key }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('paypal_currency_name')" class="mt-2" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Paypal Currency Rate</label>
                        <input type="text" class="form-control {{ hasError($errors, 'paypal_currency_rate') }}"
                            name="paypal_currency_rate" value="{{ config('gatewaySettings.paypal_currency_rate') }}">
                        <x-input-error :messages="$errors->get('paypal_currency_rate')" class="mt-2" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Paypal Client Id</label>
                        <input type="text" class="form-control {{ hasError($errors, 'paypal_client_id') }}"
                            name="paypal_client_id" value="{{ config('gatewaySettings.paypal_client_id') }}">
                        <x-input-error :messages="$errors->get('paypal_client_id')" class="mt-2" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Paypal Client Secrete</label>
                        <input type="text" class="form-control {{ hasError($errors, 'paypal_client_secrete') }}"
                            name="paypal_client_secrete" value="{{ config('gatewaySettings.paypal_client_secrete') }}">
                        <x-input-error :messages="$errors->get('paypal_client_secrete')" class="mt-2" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Paypal App Id</label>
                        <input type="text" class="form-control {{ hasError($errors, 'paypal_app_id') }}"
                            name="paypal_app_id" value="{{ config('gatewaySettings.paypal_app_id') }}">
                        <x-input-error :messages="$errors->get('paypal_app_id')" class="mt-2" />
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
