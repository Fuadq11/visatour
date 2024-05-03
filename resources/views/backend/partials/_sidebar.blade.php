<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a href="{{ route('admin.index') }}">
                <img class="img-fluid for-light" style="width:70%"
                     src="{{ asset('backend/images/logo.webp') }}" alt="Logo">
                <img style="width:70%" class="img-fluid for-dark"
                     src="{{ asset('backend/images/logo.webp') }}"
                     alt="Logo">
            </a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper">
            <a href="{{ route('admin.index') }}">
                <img class="img-fluid" style="width: 75px;"
                     src="{{ asset('backend/images/logo.webp') }}" alt="Logo">
            </a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a href="{{ route('admin.index') }}">
                            <img class="img-fluid" src="{{ asset('backend/images/logo.webp') }}"
                                 alt="Logo">
                        </a>
                        <div class="mobile-back text-end"><span>Back</span
                            ><i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                        </div>
                    </li>
                    <li class="sidebar-list mt-3">
                        <a class="sidebar-link sidebar-title" href="#">
                            <i style="font-size: 20px" class="far fa-home"></i>
                            <span style="margin-left: 8px">{{ __('home_page') }}</span>
                            <div class="according-menu">
                                <i class="far fa-type"></i>
                            </div>
                        </a>
                        <ul class="sidebar-submenu">
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.popup.edit') }}">
                                    <i style="font-size: 20px" class="fas fa-ad"> </i>
                                    <span style="margin-left: 8px">{{ __('popup') }}</span>
                                </a>
                            </li>
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.home.sliders.index') }}">
                                    <i style="font-size: 20px" class="fa fa-images"> </i>
                                    <span style="margin-left: 8px">{{ __('slider') }}</span>
                                </a>
                            </li>
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.home.offers.index') }}">
                                    <i style="font-size: 20px" class="fa fa-plane-departure"> </i>
                                    <span style="margin-left: 8px">{{ __('offers') }}</span>
                                </a>
                            </li>
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.home.features.index') }}">
                                    <i style="font-size: 20px" class="fa fa-bars"> </i>
                                    <span style="margin-left: 8px">{{ __('features') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#">
                            <i style="font-size: 20px" class="far fa-info-circle"></i>
                            <span style="margin-left: 8px">{{ __('about') }}</span>
                            <div class="according-menu">
                                <i class="far fa-type"></i>
                            </div>
                        </a>
                        <ul class="sidebar-submenu">
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.about.edit') }}">
                                    <i style="font-size: 20px" class="fa fa-info-circle"> </i>
                                    <span style="margin-left: 8px">{{ __('about') }}</span>
                                </a>
                            </li>
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.about.advantages.index') }}">
                                    <i style="font-size: 20px" class="fa fa-plus"> </i>
                                    <span style="margin-left: 8px">{{ __('advantages') }}</span>
                                </a>
                            </li>
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.about.whyus.index') }}">
                                    <i style="font-size: 20px" class="fa fa-question-circle"> </i>
                                    <span style="margin-left: 8px">{{ __('why_us') }}</span>
                                </a>
                            </li>
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.about.partners.index') }}">
                                    <i style="font-size: 20px" class="fa fa-handshake"> </i>
                                    <span style="margin-left: 8px">{{ __('partners') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#">
                            <i style="font-size: 20px" class="far fa-globe-americas"></i>
                            <span style="margin-left: 8px">{{ __('services') }}</span>
                            <div class="according-menu">
                                <i class="far fa-type"></i>
                            </div>
                        </a>
                        <ul class="sidebar-submenu">
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.service.countries.index') }}">
                                    <i style="font-size: 20px" class="fa fa-flag"> </i>
                                    <span style="margin-left: 8px">{{ __('countries') }}</span>
                                </a>
                            </li>
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.service.visas.index') }}">
                                    <i style="font-size: 20px" class="fab fa-cc-visa"> </i>
                                    <span style="margin-left: 8px">{{ __('visas') }}</span>
                                </a>
                            </li>
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.service.documents.index') }}">
                                    <i style="font-size: 20px" class="fas fa-passport"> </i>
                                    <span style="margin-left: 8px">{{ __('documents') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#">
                            <i style="font-size: 20px" class="far fa-phone"></i>
                            <span style="margin-left: 8px">{{ __('contact') }}</span>
                            <div class="according-menu">
                                <i class="far fa-type"></i>
                            </div>
                        </a>
                        <ul class="sidebar-submenu">
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.contact.edit') }}">
                                    <i style="font-size: 20px" class="far fa-phone"> </i>
                                    <span style="margin-left: 8px">{{ __('contact') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#">
                            <i style="font-size: 20px" class="far fa-store"></i>
                            <span style="margin-left: 8px">{{ __('common') }}</span>
                            <div class="according-menu">
                                <i class="far fa-type"></i>
                            </div>
                        </a>
                        <ul class="sidebar-submenu">
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.networks.index') }}">
                                    <i style="font-size: 20px" class="fab fa-facebook"> </i>
                                    <span style="margin-left: 8px">{{ __('networks') }}</span>
                                </a>
                            </li>
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.contactUs.index') }}">
                                    <i style="font-size: 20px" class="fas fa-envelope-open"> </i>
                                    <span style="margin-left: 8px">{{ __('contact_us') }}</span>
                                </a>
                            </li>
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.subscribe.index') }}">
                                    <i style="font-size: 20px" class="fas fa-envelope-open"> </i>
                                    <span style="margin-left: 8px">{{ __('subscribers') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
