@extends('layout')

@section('judul')
Tiket Add
@endsection


@section('konten')
<div class="row">
    <div class="col-lg-6">
        <!--begin::Portlet-->
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Input Your Ticket
                    </h3>
                </div>
            </div>

            <!--begin::Form-->
            <<form action="/menu/ticket/simpantiket" class="kt-form">>
                <div class="kt-portlet__body">
                    <div class="form-group form-group-last">

                    </div>
                    <div class="form-group">
                        <label>Ticket Number</label>
                        <input type="text" class="form-control" placeholder="Input Ticket" name="noticket">
                        <span class="form-text text-muted">Ex : SC12345|UIM|IN123456|1054:Service Port 0/13/3 on device
                            GPON23-D2-JTN-2(172.24.156.12) has existing customer.Please check connectivity </span>
                    </div>


                    <div class="form-group">
                        <label>Tipe Order</label>
                        <div class="kt-radio-list">




                            <label class="kt-radio">
                                <input type="radio" name="tipeorder" value="1"> New Sales
                                <span></span>
                            </label>

                            <label class="kt-radio">
                                <input type="radio" name="tipeorder" value="2"> Modification
                                <span></span>
                            </label>

                            <label class="kt-radio">
                                <input type="radio" name="tipeorder" value="3"> Add Service
                                <span></span>
                            </label>


                        </div>
                    </div>
                    <div class="form-group form-group-last">
                        <label for="exampleTextarea">Info</label>
                        <textarea class="form-control" name="infoorder" rows="3"></textarea>
                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="cancel" class="btn btn-secondary">Cancel</button>
                    </div>
                </div>
                </form>

                <!--end::Form-->
        </div>
    </div>
    <div class="col-lg-6">
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Recent Activities
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">

                </div>
            </div>
            <div class="kt-portlet__body">

                <!--Begin::Timeline 3 -->
                <div class="kt-timeline-v2">
                    <div class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
                        @foreach ($variabelData as $item)


                        <div class="kt-timeline-v2__item">
                            <span class="kt-timeline-v2__item-time">{{ \Carbon\Carbon::parse($item->order_date, 'Asia/Jakarta')->format('H:i')}}</span>
                            <div class="kt-timeline-v2__item-cricle">
                                <i class="fa fa-genderless kt-font-danger"></i>
                            </div>
                            <div class="kt-timeline-v2__item-text kt-timeline-v2__item-text--bold">
                                {{ $item->sender_name }} input ticket {{ $item->ticket_no }} on {{ $item->order_date}}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!--End::Timeline 3 -->
            </div>
        </div>
    </div>
</div>


<!--end::Portlet-->



@endsection
