@extends('front-end.layouts.master')


@section('contents')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
        <div class="container">
            <div class="row align-items-center">
            <div class="col-lg-12">
                <h2 class="mb-20">Profile</h2>
                <ul class="breadcrumbs">
                <li><a class="home-icon" href="index.html">Home</a></li>
                <li>Profile</li>
                </ul>
            </div>
            </div>
        </div>
        </div>
    </section>

    <section class="section-box mt-120">
        <div class="container">
        <div class="row">
            @include('front-end.company-dashboard.sidebar')
            <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Company Info</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Company History</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Account Settings</button>
                </li>
              </ul>


              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                    <form action="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Comapny Logo *</label>
                                <input class="form-control" type="file" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Comapny Banner *</label>
                                <input class="form-control" type="file" value="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Comapny Name *</label>
                                <input class="form-control" type="text" value="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Comapny Bio *</label>
                                <textarea name="" id=""></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Comapny Vision *</label>
                                <textarea name="" id=""></textarea>
                                </div>
                            </div>
                            <div class="box-button mt-15">
                                <button class="btn btn-apply-big font-md font-bold">Save All Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                    <form action="">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group select-style">
                                <label class="font-sm color-text-mutted mb-10">Industry Type *</label>
                                <select name="" class="form-control from-icons select-active" id="">
                                    <option value="">Select</option>
                                    <option value="">Data!</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group select-style">
                                <label class="font-sm color-text-mutted mb-10">Organization Type *</label>
                                <select name="" class="form-control from-icons select-active" id="">
                                    <option value="">Select</option>
                                    <option value="">Data!</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group select-style">
                                <label class="font-sm color-text-mutted mb-10">Team Size *</label>
                                <select name="" class="form-control from-icons select-active" id="">
                                    <option value="">Select</option>
                                    <option value="">Data!</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Establishment Date *</label>
                                <input class="form-control datepicker" type="text" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Website Link</label>
                                <input class="form-control" type="text" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Email *</label>
                                <input class="form-control" type="email" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Phone *</label>
                                <input class="form-control" type="text" value="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group select-style">
                                <label class="font-sm color-text-mutted mb-10">Country *</label>
                                <select name="" class="form-control from-icons select-active" id="">
                                    <option value="">Select</option>
                                    <option value="">Data!</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group select-style">
                                <label class="font-sm color-text-mutted mb-10">State</label>
                                <select name="" class="form-control from-icons select-active" id="">
                                    <option value="">Select</option>
                                    <option value="">Data!</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group select-style">
                                <label class="font-sm color-text-mutted mb-10">City</label>
                                <select name="" class="form-control from-icons select-active" id="">
                                    <option value="">Select</option>
                                    <option value="">Data!</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Address</label>
                                <input class="form-control" type="text" value="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Map Link</label>
                                <input class="form-control" type="text" value="">
                                </div>
                            </div>
                            <div class="box-button mt-15">
                                <button class="btn btn-apply-big font-md font-bold">Save All Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                    <form action="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">User Name *</label>
                                <input class="form-control" type="text" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Email *</label>
                                <input class="form-control" type="email" value="">
                                </div>
                            </div>
                            <div class="box-button mt-15 col-md-2">
                                <button class="btn btn-apply-big font-md font-bold">Save</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <form action="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Password *</label>
                                <input class="form-control" type="password" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="font-sm color-text-mutted mb-10">Confirm Password *</label>
                                <input class="form-control" type="password" value="">
                                </div>
                            </div>
                            <div class="box-button mt-15 col-md-2">
                                <button class="btn btn-apply-big font-md font-bold">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">...</div>
              </div>
            </div>
        </div>
        </div>
    </section>
@endsection
