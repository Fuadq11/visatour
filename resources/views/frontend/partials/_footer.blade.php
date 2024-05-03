<section id="footer" class="ftr-heading-o ftr-heading-mgn-1">

    <div id="footer-top" class="banner-padding ftr-top-black ftr-text-white">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 col-xl-4 footer-widget ftr-about">
                    <h3 class="footer-heading">VİSATOUR.AZ</h3>
                    <p>{{ $contact->about }}</p>
                    <ul class="social-links list-inline list-unstyled">
                        @foreach($networks as $network)
                            <li class="list-inline-item">
                                <a href="{{ $network->url }}" rel="noopener"
                                   target="_blank" title="{{ $network->name }}">
                                    <span><i class="{{ $network->icon }}"></i></span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div><!-- end columns -->

                <div class="col-12 col-md-6 col-lg-2 col-xl-2 footer-widget ftr-links">
                    <h3 class="footer-heading">{{ strtoupper(__('footer_services')) }}</h3>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('user.service') }}">{{ __('services') }}</a></li>
                    </ul>
                </div><!-- end columns -->

                <div class="col-12 col-md-6 col-lg-3 col-xl-3 footer-widget ftr-links ftr-pad-left">
                    <h3 class="footer-heading">{{ strtoupper(__('about')) }}</h3>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('user.contact') }}">{{ __('contact') }}</a></li>
                        <li><a href="{{ route('user.about') }}">{{ __('about') }}</a></li>
                    </ul>
                </div><!-- end columns -->

                <div class="col-12 col-md-6 col-lg-3 col-xl-3 footer-widget ftr-contact">
                    <h3 class="footer-heading">{{ strtoupper(__('baku_office')) }}</h3>
                    <ul class="list-unstyled">
                        <li><a href="mailto:{{ $contact->main_email }}">{{ $contact->main_email }}</a></li>
                        @if($contact->email)
                            <li><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></li>
                        @endif
                        <li><a href="tel:{{ $contact->phone1 }}">{{ $contact->phone1 }}</a></li>
                        @if($contact->phone2)
                            <li><a href="tel:{{ $contact->phone2 }}">{{ $contact->phone2 }}</a></li>
                        @endif
                        @if($contact->phone3)
                            <li><a href="tel:{{ $contact->phone3 }}">{{ $contact->phone3 }}</a></li>
                        @endif
                        @if($contact->phone4)
                            <li><a href="tel:{{ $contact->phone4 }}">{{ $contact->phone4 }}</a></li>
                        @endif
                        <li>{{ $contact->address }}</li>
                    </ul>
                </div><!-- end columns -->


            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end footer-top -->

    <div id="footer-bottom" class="ftr-bot-black">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 col-xl-6" id="copyright">
                    <p><span class="year"></span><a href="{{ route('user.index') }}">Visatour.az</a>
                        | {{ __('all_rights_reserved') }}</p>
                </div><!-- end columns -->

            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end footer-bottom -->

</section><!-- end footer -->