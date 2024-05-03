@extends('backend.layout.layout')
@section('content')
    @section('title')
        {{ __('home') }}
    @endsection
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>{{ __('home') }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row second-chart-list third-news-update">
                <div class="col-xl-9 xl-100 chart_data_left box-col-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="row m-0 chart-main">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
