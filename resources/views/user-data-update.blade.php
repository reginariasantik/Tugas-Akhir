@extends('layout')

@section('judul')
New User
@endsection

@section('js')
<script src="{{ asset("assets/vendors/custom/datatables/datatables.bundle.js")}}" type="text/javascript"></script>
<script> $("#tabledata").DataTable();
</script>
@endsection

@section('css')
<link href="{{ asset("assets/vendors/custom/datatables/datatables.bundle.css")}}" rel="stylesheet" type="text/css" />
@endsection

@section('konten')
<div class="row">
    <div class="col-lg-6">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Form Edit User
                    </h3>
                </div>
            </div>


            <form action="/menu/user/updatedata" class="kt-form">
                <div class="kt-portlet__body">
                <input type="hidden" name="id" value="{{ $variabelUserData->id }}"/>
                    <div class="form-group">
                        <div class="col-lg-8 form-group-sub">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Input your name" value="{{ $variabelUserData->name }}">
                        <span class="form-text text-muted"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-8 form-group-sub">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" value="{{ $variabelUserData->username }}">
                        <span class="form-text text-muted"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-8 form-group-sub">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" value="{{ $variabelUserData->password }}">
                        <span class="form-text text-muted"></span>
                        </div>
                    </div>


                    <div class="form-group">

                        <div class="col-lg-4 form-group-sub">

                            <label class="form-control-label" name="location">Location</label>
                            <select class="form-control" name="location">
                                <option value="">Select</option>
                                <option {{ $variabelUserData->location == "CBB" ? "selected" : ""}}>CBB</option>
                                <option {{ $variabelUserData->location == "CWA" ? "selected" : ""}}>CWA</option>
                                <option {{ $variabelUserData->location == "GAN" ? "selected" : ""}}>GAN</option>
                                <option {{ $variabelUserData->location == "KLD" ? "selected" : ""}}>KLD</option>
                                <option {{ $variabelUserData->location == "KRG" ? "selected" : ""}}>KRG</option>
                                <option {{ $variabelUserData->location == "JTN" ? "selected" : ""}}>JTN</option>
                                <option {{ $variabelUserData->location == "PDK" ? "selected" : ""}}>PDK</option>
                                <option {{ $variabelUserData->location == "PGB" ? "selected" : ""}}>PGB</option>
                                <option {{ $variabelUserData->location == "PGG" ? "selected" : ""}}>PGG</option>
                                <option {{ $variabelUserData->location == "PSR" ? "selected" : ""}}>PSR</option>
                                <option {{ $variabelUserData->location == "RMG" ? "selected" : ""}}>RMG</option>
                                <option {{ $variabelUserData->location == "WOC" ? "selected" : ""}}>WOC</option>


                            </select>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-lg-4 form-group-sub">
                            <label class="form-control-label" >User Privilege</label>
                            <select class="form-control" name="userprivilege">
                                <option {{ $variabelUserData->userprivilege == "Helpdesk" ? "selected" : ""}}>Helpdesk</option>
                                <option {{ $variabelUserData->userprivilege == "Admin" ? "selected" : ""}}>Admin</option>
                                <option {{ $variabelUserData->userprivilege == "Techinican" ? "selected" : ""}}>Technician</option>



                            </select>
                        </div>
                    </div>

                </div>

                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary" href="/menu/user/list">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
