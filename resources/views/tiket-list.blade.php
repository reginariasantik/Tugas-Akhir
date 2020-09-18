@extends('layout')
@section('judul')
Ticket List
@endsection

@section('js')
<script src="{{ asset("assets/vendors/custom/datatables/datatables.bundle.js")}}" type="text/javascript"></script>
<script> $("#tabledata").DataTable({
    order: [[10, 'asc']]
});

    //jika tombol di klik
    $(".btn-update").click(function(){
        var id = $(this).data('id');
        $('#idStatus').val(id);
    });

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
                            <th>Location</th>
                            <th>Sender</th>
                            <th>Order Type</th>
                            <th>Jenis Fallout</th>
                            <th>No.Tiket</th>
                            <th>Ket</th>
                            <th>Info</th>
                            <th>Order Date</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Agent</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($variabelDaftarUrut as $index => $item)
                        <tr>
                            <td> {{ $item->id }} </td>
                            <td> {{ $item->order_id }}</td>
                            <td> {{ $item->location }}</td>
                            <td> {{ $item->sender_name }}</td>
                            <td>
                                    @if ($item->order_type == "1")
                                    <span>New Sales</span>

                                    @elseif($item->order_type == "2")
                                    <span>Modification</span>

                                    @elseif($item->order_type == "3")
                                    <span>Add Service</span>

                                    @endif
                            </td>
                            <td> {{ $item->fallout_type }}</td>
                            <td> {{ $item->ticket_no }}</td>
                            <td> {{ $item->ticket_info }}</td>
                            <td> {{ $item->info }}</td>
                            <td> {{ $item->order_date }}</td>
                            <td> {{ $index+1 }} </td>
                            <td>
                                @if($item->status =="Open")
                                @if(\Carbon\Carbon::now('Asia/Jakarta')->diffInMinutes(new\Carbon\Carbon($item->order_date, 'Asia/Jakarta')) > 30)


                                <span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">Urgent</span>

                                @else
                                <span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Open</span>

                                @endif
                                @elseif($item->status == "On Progress")
                                <span class="kt-badge  kt-badge--primary kt-badge--inline kt-badge--pill">OnProgress</span>

                                @elseif($item->status == "Closed")
                                <span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Closed</span>

                                @endif
                            </td>
                            <td>{{ $item->agent_name }}</td>
                            <td nowrap>
                                <button type="button" data-id="{{ $item->id}}" class="btn btn-sm btn-clean btn-icon btn-icon-md btn-update"
                                    data-toggle="modal" data-target="#exampleModal" ><i class="la la-edit"></i></button>

                                </a>
                                <a class="btn btn-sm btn-clean btn-icon btn-icon-md" href="/menu/ticket/hapustiket?id={{ $item->id }}"><i class="la la-trash"></i></a>

                                </a>


                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!--end: Datatable -->
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="/menu/ticket/updatestatus">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ticket Status Update</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="hidden" class="form-control" name="id" id="idStatus" value="1">
            <div class="form-group">

                <div class="form-group-last">
                    <label class="form-control-label" >Status</label>
                    <select class="form-control" name="status">
                        <option >On Progress</option>
                        <option >Closed</option>

                   </select>
                </div>
            </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

@endsection

