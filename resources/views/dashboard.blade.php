@extends('layout')

@section('judul')
Dashboard
@endsection

@section('js')
<script src="{{ asset("assets/js/demo1/scripts.bundle.js")}}" type="text/javascript"></script>
@endsection

@section('css')
<link href="{{ asset("assets/css/demo1/pages/general/pricing/pricing-1.css")}}" rel="stylesheet" type="text/css" />
<link href="{{ asset("assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css")}}" rel="stylesheet" type="text/css" />
<link href="{{ asset("assets/css/demo1/style.bundle.css")}}" rel="stylesheet" type="text/css" />
@endsection

@section('konten')
<!--begin::Portlet-->
<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="la la-leaf"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Dashboard
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="kt-pricing-1">
            <div class="kt-pricing-1__items row">
                <div class="kt-pricing-1__item col-lg-3">
                    <div class="kt-pricing-1__visual">
                        <div class="kt-pricing-1__hexagon1"></div>
                        <div class="kt-pricing-1__hexagon2"></div>
                        <span class="kt-pricing-1__icon kt-font-brand"><i class="fa flaticon-open-box                            "></i></span>
                    </div>
                    <span class="kt-pricing-1__price">Open<span class="kt-pricing-1__label"></span></span>
                    <h2 class="kt-pricing-1__subtitle"></h2>
                    <span class="kt-pricing-1__description">

                    </span>
                    <div class="kt-pricing-1__btn">
                        <button type="button" class="btn btn-brand btn-custom btn-pill btn-wide btn-uppercase btn-bolder btn-sm"></button>
                    </div>
                </div>
                <div class="kt-pricing-1__item col-lg-3">
                    <div class="kt-pricing-1__visual">
                        <div class="kt-pricing-1__hexagon1"></div>
                        <div class="kt-pricing-1__hexagon2"></div>
                        <span class="kt-pricing-1__icon kt-font-primary"><i class="fa flaticon2-time"></i></span>
                    </div>
                    <span class="kt-pricing-1__price">On Progress<span class="kt-pricing-1__label"></span></span>
                    <h2 class="kt-pricing-1__subtitle"></h2>
                    <span class="kt-pricing-1__description">
                        <
                    </span>
                    <div class="kt-pricing-1__btn">
                        <button type="button" class="btn btn-pill  btn-success btn-wide btn-uppercase btn-bolder btn-sm"></button>
                    </div>
                </div>
                <div class="kt-pricing-1__item col-lg-3">
                    <div class="kt-pricing-1__visual">
                        <div class="kt-pricing-1__hexagon1"></div>
                        <div class="kt-pricing-1__hexagon2"></div>
                        <span class="kt-pricing-1__icon kt-font-success"><i class="fa flaticon-trophy"></i></span>
                    </div>
                    <span class="kt-pricing-1__price">Closed<span class="kt-pricing-1__label"></span></span>
                    <h2 class="kt-pricing-1__subtitle"></h2>
                    <span class="kt-pricing-1__description">

                    </span>
                    <div class="kt-pricing-1__btn">
                        <button type="button" class="btn btn-pill  btn-danger btn-wide btn-uppercase btn-bolder btn-sm"></button>
                    </div>
                </div>
                <div class="kt-pricing-1__item col-lg-3">
                    <div class="kt-pricing-1__visual">
                        <div class="kt-pricing-1__hexagon1"></div>
                        <div class="kt-pricing-1__hexagon2"></div>
                        <span class="kt-pricing-1__icon kt-font-warning"><i class="fa flaticon-danger
                            "></i></span>
                    </div>
                    <span class="kt-pricing-1__price">Urgent<span class="kt-pricing-1__label"></span></span>
                    <h2 class="kt-pricing-1__subtitle"></h2>
                    <span class="kt-pricing-1__description">

                    </span>
                    <div class="kt-pricing-1__btn">
                        <button type="button" class="btn btn-pill  btn-warning btn-wide btn-uppercase btn-bolder btn-sm"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--end::Portlet-->

<!--end::Portlet-->
@endsection
