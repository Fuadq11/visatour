@extends('frontend.layout._layout')
@section('title', __('about'))
@section('meta')
    <meta name="title" content="{{ $about->meta_title }}">
    <meta name="description" content="{{ $about->meta_description }}">
@endsection
@section('content')
    <!--============= PAGE-COVER =============-->
    <section class="page-cover" id="cover-about-us" style="background:url({{ $about->banner_image }}) 50% 45%;">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <!-- <h1 class="page-title">About Us 2</h1> -->
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">{{ __('home') }}</a></li>
                        <li class="breadcrumb-item">{{ __('about') }}</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->


    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="about-content-2" class="innerpage-section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-12 col-sm-12 col-lg-5 col-xl-4">
                        <div id="abt-cnt-2-img">
                            <img src="{{ asset($about->image) }}" class="img-fluid" alt="about-img">
                        </div><!-- end abt-cnt-2-img -->
                    </div><!-- end columns -->

                    <div class="col-12 col-sm-12 col-lg-7 col-xl-8">
                        <div id="abt-cnt-2-text">
                            <h2>Welcome to<span><span><i class="fa fa-plane"></i> Visatour.</span>az</span></h2>
                            {!! $about->content !!}
                            <div class="row">
                                @foreach($advantages as $advantage)
                                    <div class="col-4 col-sm-4">
                                        <div class="abt-cnt-2-ftr">
                                            <span><i class="{{ $advantage->icon }}"></i></span>
                                            <h4>{{ $advantage->content }}</h4>
                                        </div><!-- end abt-cnt-2-ftr -->
                                    </div>
                                @endforeach
                            </div><!-- end row -->
                        </div><!-- end abt-cnt-2-text -->
                    </div><!-- end columns -->

                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end about-content-2 -->

        <section id="video-banner" class="banner-padding back-size"
                 style="background: linear-gradient(rgba(0, 0, 0,0.6),rgba(0, 0, 0,0.6)),url({{ asset('frontend/images/video-banner.jpg') }}) 50% 37%;">
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <h2>VISATOUR.AZ</h2>
                        <p>{{ __('visa_requirement') }}</p>
                        <div class="margin-small py-5 mt-5 m-sm-0 "></div>
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
            </div><!-- end video-banner -->

            <div id="why-us" class="innerpage-section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="page-heading innerpage-heading">
                                <h2>{{ __('why_us') }}</h2>
                                <hr class="heading-line">
                            </div><!-- end page-heading -->

                            <div class="row">

                                <div class="col-sm-12 col-md-12 col-lg-12" id="why-us-tabs">
                                    <ul class="nav nav-tabs d-flex justify-content-center align-items-center"
                                        role="tablist">
                                        @foreach($whyUs as $why_us)
                                            <li class="nav-item" role="presentation">
                                                <a href="#tb-{{ $loop->index }}" data-bs-toggle="tab" role="tab"
                                                   class="nav-link {{ $loop->iteration == 1 ? 'active' : '' }}"><span><i
                                                            class="{{ $why_us->icon }}"></i></span>{{ $why_us->title }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <div class="tab-content">
                                        @foreach($whyUs as $why_us)
                                            <div id="tb-{{ $loop->index }}"
                                                 class="container tab-pane {{ $loop->iteration == 1 ? 'active' : '' }}">
                                                {!! $why_us->content !!}
                                            </div>
                                        @endforeach
                                    </div><!-- end tab-content -->
                                </div><!-- end columns -->


                                <div class="col-sm-12" id="company-logos">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h3>{{ $about->partner_title }}</h3>
                                            <p>{{ $about->partner_subtitle }}</p>
                                        </div><!-- end columns -->

                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="owl-carousel owl-theme" id="owl-company-logo">
                                                    @foreach($partners as $partner)
                                                        <div class="col px-3">
                                                            <div class="item">
                                                                <div class="company-img">
                                                                    <img src="{{ asset($partner->image) }}"
                                                                         class="img-fluid"
                                                                         alt="{{ __('partner') }}">
                                                                </div><!-- company-img -->
                                                            </div><!-- item -->
                                                        </div><!-- end columns -->
                                                    @endforeach
                                                </div><!-- owl-company -->
                                            </div><!-- end row -->
                                        </div><!-- end columns -->

                                    </div><!-- end row -->
                                </div><!-- end columns -->

                            </div><!-- end row -->
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end why-us -->
        </section>
        <!-- end innerpage-wrapper -->

        <div id="search-banner" class="innerpage-103-pd-tb back-size">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-6 col-xl-6 innerpage-left">
                        <p>{{ __('without_time') }}</p>
                        <h2>VISATOUR.AZ</h2>
                        <p>{{ __('ready') }}</p>
                        <a href="{{ route('user.service') }}" class="btn btn-black btn-lg">{{ __('apply') }}</a>
                    </div>

                    <div class="col-12 col-md-12 col-lg-6 col-xl-6 innerpage-right">
                        <figure>
                            <img src="{{ asset('frontend/images/cta.jpg') }}" class="cta" alt="">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection