<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
    <form action="{{ route('company.profile.foundation-info') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group select-style">
                            <label class="font-sm color-text-mutted mb-10">Gender *</label>
                            <select
                                class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }} form-icons select-active"
                                name="gender" id="">
                                <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Others</option>
                            </select>
                            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group select-style">
                            <label class="font-sm color-text-mutted mb-10">Marital Status *</label>
                            <select
                                class="form-control {{ $errors->has('marital_status') ? 'is-invalid' : '' }} form-icons select-active"
                                name="marital_status" id="">
                                <option value="">Select Marital Status</option>
                                    <option value="married">Married</option>
                                    <option value="single">Single</option>
                            </select>
                            <x-input-error :messages="$errors->get('marital_status')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group select-style">
                            <label class="font-sm color-text-mutted mb-10">Profession *</label>
                            <select
                                class="form-control {{ $errors->has('profession') ? 'is-invalid' : '' }} form-icons select-active"
                                name="profession" id="">
                                <option value="">Select Profession</option>
                                @foreach ($professions as $profession)
                                    <option @selected($profession->id == $candidate->profession_id) value="{{ $profession->id }}">
                                        {{ $profession->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('profession')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group select-style">
                            <label class="font-sm color-text-mutted mb-10">Your Availability *</label>
                            <select
                                class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }} form-icons select-active"
                                name="status" id="">
                                <option value="">Select Availability</option>
                                    <option value="available">Available</option>
                                    <option value="not_available">Not Available</option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group select-style">
                            <label class="font-sm color-text-mutted mb-10">Select Your Skills *</label>
                            <select
                                class="form-control {{ $errors->has('skill') ? 'is-invalid' : '' }} form-icons select-active"
                                name="marital_status" id="" multiple>
                                <option value="">Select Your Skills</option>
                                    <option value="">test1</option>
                                    <option value="">test2</option>
                            </select>
                            <x-input-error :messages="$errors->get('skill')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group select-style">
                            <label class="font-sm color-text-mutted mb-10">Select Your Known Languages *</label>
                            <select
                                class="form-control {{ $errors->has('language') ? 'is-invalid' : '' }} form-icons select-active"
                                name="language" id="" multiple>
                                <option value="">Select Your Language</option>
                                    <option value="">test1</option>
                                    <option value="">test2</option>
                            </select>
                            <x-input-error :messages="$errors->get('language')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Biography *</label>
                            <textarea name="bio" id="editor"></textarea>
                            <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                        </div>
                    </div>

                </div>
            </div>
            <div class="box-button mt-15">
                <button class="btn btn-apply-big font-md font-bold">Save All Changes</button>
            </div>
        </div>
    </form>
</div>
