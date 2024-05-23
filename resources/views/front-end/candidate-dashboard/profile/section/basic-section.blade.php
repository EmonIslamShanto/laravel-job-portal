<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
    <form action="{{ route('company.profile.company-info') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <x-image-preview height="200" width="200" source="" />
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">Profile Picture *</label>
                    <input class="form-control {{ $errors->has('profile_picture') ? 'is-invalid' : '' }}" type="file"
                        name="profile_picture" value="">
                    <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
                </div>
            </div>
            <div class="col-md-6">
                <x-image-preview height="200" width="200" source="" />
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">Email *</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                        name="email" value="">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Full Name *</label>
                            <input class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}" type="text"
                                name="full_name" value="">
                            <x-input-error :messages="$errors->get('full_name')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Title / Tagline</label>
                            <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text"
                                name="title" value="">
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Experience Level *</label>
                            <input class="form-control {{ $errors->has('experience_level') ? 'is-invalid' : '' }}" type="text"
                                name="experience_level" value="">
                            <x-input-error :messages="$errors->get('experience_level')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Website</label>
                            <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" type="text"
                                name="website" value="">
                            <x-input-error :messages="$errors->get('website')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Date of Birth *</label>
                            <input class="form-control datepicker {{ $errors->has('dob') ? 'is-invalid' : '' }}" type="text"
                                name="dob" value="">
                            <x-input-error :messages="$errors->get('dob')" class="mt-2" />
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
