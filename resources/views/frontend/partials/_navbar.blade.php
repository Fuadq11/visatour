<nav class="navbar navbar-expand-xl sticky-top navbar-custom main-navbar p-1" id="mynavbar-1">
    <div class="container">

        <a href="{{ route('user.index') }}" title="visatour" class="navbar-brand py-1 m-0">
            <figure>
                <img src="{{ asset('frontend/images/logo.png') }}" alt="logo">
            </figure>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation" id="sidebarCollapse">
            <i class="fa fa-navicon py-1"></i>
        </button>

        <div class="collapse navbar-collapse" id="myNavbar1">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.index') }}" id="navItem1_home" role="button"
                       aria-haspopup="true" aria-expanded="false">{{ __('home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.about') }}" id="navItem2_home" role="button"
                       aria-haspopup="true" aria-expanded="false">{{ __('about') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.service') }}" id="navItem3_home" role="button"
                       aria-haspopup="true" aria-expanded="false">{{ __('services') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.contact') }}" id="navItem4_home" role="button"
                       aria-haspopup="true" aria-expanded="false">{{ __('contact') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link"
                       data-bs-toggle="dropdown">{{ app()->getLocale() == 'az' ? 'AZE' : 'ENG' }}<span><i
                                class="fa-solid fa-globe"></i></span></a>
                    <ul class="dropdown-menu">
                        @foreach($languages as $language)
                            <li>
                                <a class="dropdown-item" href="{{ route('user.locale', $language->code) }}">
                                    {{ $language->name == 'Az' ? 'Azərbaycan dili' : 'English' }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div><!-- end navbar collapse -->
    </div><!-- End container -->
</nav>
<div class="sidenav-content">
    <!-- Sidebar  -->
    <nav id="sidebar" class="sidenav">
        <h2 id="web-name"><span><i class="fa fa-plane"></i></span>VisaTour</h2>

        <div id="main-menu">
            <div id="dismiss">
                <button class="btn" id="closebtn">&times;</button>
            </div>
            <div class="list-group panel">
                <a class="items-list" href="{{ route('user.index') }}">{{ __('home') }}</a>
                <a class="items-list" href="{{ route('user.about') }}">{{ __('about') }}</a>
                <a class="items-list" href="{{ route('user.service') }}">{{ __('services') }}</a>
                <a class="items-list" href="{{ route('user.contact') }}">{{ __('contact') }}</a>
                <a class="items-list" href="#language-links"
                   data-bs-toggle="collapse"><span></span>{{ app()->getLocale() == 'az' ? 'AZE' : 'ENG' }}<span>
                        <i class="fa fa-chevron-down arrow"></i></span>
                </a>
                <div class="collapse sub-menu" id="language-links">
                    @foreach($languages as $language)
                        <a class="items-list"
                           href="{{ route('user.locale', $language->code) }}">{{ $language->name == 'Az' ? 'Azərbaycan dili' : 'English' }}</a>
                    @endforeach
                </div><!-- end sub-menu -->
            </div><!-- End list-group panel -->
        </div><!-- End main-menu -->
    </nav>
</div><!-- End sidenav-content -->