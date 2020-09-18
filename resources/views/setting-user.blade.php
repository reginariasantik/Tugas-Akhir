@extends('layout')

@section('judul')
User
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
                        Add Your Profil
                    </h3>
                </div>
            </div>


            <form action="/menu/user/simpan" class="kt-form">
                <div class="kt-portlet__body">
                    <div class="form-group">
                        <div class="col-lg-8 form-group-sub">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Input your name">
                        <span class="form-text text-muted"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-8 form-group-sub">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username">
                        <span class="form-text text-muted"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-8 form-group-sub">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password"
                            placeholder="Password">
                        <span class="form-text text-muted"></span>
                        </div>
                    </div>


                    <div class="form-group">

                        <div class="col-lg-4 form-group-sub">

                            <label class="form-control-label" name="location">Location</label>
                            <select class="form-control" name="location">
                                <option value="">Select</option>
                                <option >CBB</option>
                                <option >CWA</option>
                                <option >GAN</option>
                                <option >KLD</option>
                                <option >KRG</option>
                                <option >JTN</option>
                                <option >PDK</option>
                                <option >PGB</option>
                                <option >PGG</option>
                                <option >PSR</option>
                                <option >RMG</option>
                                <option >WOC</option>


                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                            <div class="col-lg-4 form-group-sub">
                            <label class="form-control-label" >User Privilege</label>
                            <select class="form-control" name="userprivilege">
                                <option >Select</option>
                                <option >Helpdesk</option>
                                <option >Admin</option>
                                <option >Technician</option>



                            </select>
                        </div>
                    </div>

                </div>

                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        List User
                    </h3>
                </div>
            </div>


            <form class="kt-form">
                <div class="kt-portlet__body">
                    <div class="form-group form-group-last">
                        <table class="table table-striped- table-bordered table-hover table-checkable" id="tabledata">
                            <thead>
                                <tr>
                                    <th> Name
                                    <th >Username</th>
                                    <th >Location</th>
                                    <th >User Privilege</th>
                                    <th> Action </th>

                                </tr>

                            </thead>
                            <tbody>

                                   @foreach ($variabelData as $item)
                                <tr>
                                   <td>{{ $item->name}} </td>
                                   <td>{{ $item->username}} </td>
                                   <td>{{ $item->location}} </td>
                                   <td>{{ $item->userprivilege}} </td>
                                   <td>

                                        {{-- button ubah --}}
                                         <a class="btn btn-sm btn-clean btn-icon btn-icon-md" href="/menu/user/editdata?id={{ $item->id }}"><i class="la la-edit"></i></button>

                                        {{-- button delete --}}
                                         <a class="btn btn-sm btn-clean btn-icon btn-icon-md" href="/menu/user/hapus?id={{ $item->id }}"><i class="la la-trash"></i></a>
                                   @endforeach
                                </tr>
                            </tbody>
                        </table>

            </form>
        </div>


    </div>
</div>
@endsection
