<div class="page-header">
    <div class="header-wrapper row m-0">
        <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper">
                <a href="{{ route('admin.index') }}"><img class="img-fluid"
                                                          src="{{ asset('backend/assets/images/logo/logo.png') }}"
                                                          alt="">
                </a>
            </div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
            </div>
        </div>
        <div class="left-header col horizontal-wrapper ps-0">

        </div>
        <div class="nav-right col-8 pull-right right-header p-0">
            <ul class="nav-menus">
                <li class="language-nav">
                    <div class="translate_wrapper">
                        <div class="current_lang">
                            <div class="lang">
                                <i
                                    class="flag-icon flag-icon-{{ app()->getLocale() == 'en' ? 'us' : app()->getLocale() }}"></i><span
                                    class="lang-txt">{{ app()->getLocale() }} </span>
                            </div>
                        </div>
                        <div class="more_lang">
                            <ul>
                                @foreach ($languages as $lang)
                                    @if ($lang->code != app()->getLocale())
                                        <li>
                                            <div style="padding: 15px 7px" class="lang">
                                                <a hreflang="{{ $lang->code }}"
                                                   href="{{ route('user.locale', $lang->code) }}">
                                                    <i
                                                        class="flag-icon flag-icon-{{ $lang->code == 'en' ? 'us' : $lang->code }}"></i>
                                                    <span class="lang-txt">{{ $lang->code }}</span>
                                                </a>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="mode"><i class="fa fa-moon-o"></i></div>
                </li>
                <li class="maximize"><a class="text-dark" href="#!" onclick="toggleFullScreen()"><i
                            data-feather="maximize"></i></a></li>
                <li class="onhover-dropdown p-0 me-0">
                    <div class="media profile-media"><img class="b-r-10"
                                                          src="{{ asset('backend/assets/images/dashboard/profile.jpg') }}"
                                                          alt="">
                        <div class="media-body"><span>
                                {{ auth()->user()->name }}
                            </span>
                            <p class="mb-0 font-roboto">Admin <i class="middle fa fa-angle-down"></i></p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li><a href="{{ route('admin.settings') }}"><i
                                    data-feather="settings"></i><span>{{ __('settings') }}</span></a></li>
                        <li><a href="{{ route('admin.logout') }}"><i data-feather="log-out">
                                </i><span>{{ __('logout') }}</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
