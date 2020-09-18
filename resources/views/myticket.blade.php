@extends('layout')

@section('judul')
My Ticket
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
    <div class="col-lg-12">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Basic
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <div class="dropdown dropdown-inline">
                                <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="la la-download"></i> Export
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="kt-nav">
                                        <li class="kt-nav__section kt-nav__section--first">
                                            <span class="kt-nav__section-text">Choose an option</span>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-print"></i>
                                                <span class="kt-nav__link-text">Print</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-copy"></i>
                                                <span class="kt-nav__link-text">Copy</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-file-excel-o"></i>
                                                <span class="kt-nav__link-text">Excel</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-file-text-o"></i>
                                                <span class="kt-nav__link-text">CSV</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                                <span class="kt-nav__link-text">PDF</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            &nbsp;

                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="tabledata">
                    <thead>
                        <tr>
                            <th>Record ID</th>
                            <th>Order ID</th>
                            <th>STO</th>
                            <th>Pengirim</th>
                            <th>Jenis Order</th>
                            <th>No.Tiket</th>
                            <th>coba</th>
                            <th>Ket</th>
                            <th>Order Date</th>
                            <th>Status</th>
                            <th>Agent</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>61715-075</td>
                            <td>China</td>
                            <td>Tieba</td>
                            <td>746 Pine View Junction</td>
                            <td>cobcob</td>
                            <td>Nixie Sailor</td>
                            <td>Gleichner, Ziemann and Gutkowski</td>
                            <td>2/12/2018</td>
                            <td>
                                <span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Closed</span>
                                <span class="kt-badge  kt-badge--primary kt-badge--inline kt-badge--pill">On Progress</span>
                                <span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">Urgent</span>
                            </td>
                            <td>2</td>
                            <td nowrap>
                                <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Update">
                                <i class="la la-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete">
                                    <i class="la la-trash"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit">
                                        <i class="la la-edit"></i>
                                        </a>
                            </td>
                        </tr>

                    </tbody>
                </table>

                <!--end: Datatable -->
            </div>
        </div>
    </div>
</div>
@endsection
