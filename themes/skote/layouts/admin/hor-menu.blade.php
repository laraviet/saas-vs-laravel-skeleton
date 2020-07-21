<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">

                    @if(Module::find('adminhome') && Module::find('adminhome')->isEnabled())
                        <li class="nav-item">
                            <a class="nav-link arrow-none" href="{{ route('admin.home') }}" aria-expanded="false">
                                <i class="bx bx-home-circle mr-2"></i>{{ __('core::labels.home') }}
                            </a>
                        </li>
                    @endif

                    @if(Module::find('product') && Module::find('product')->isEnabled())
                        <li class="nav-item">
                            <a class="nav-link arrow-none" href="{{ route('products.index') }}" aria-expanded="false">
                                <i class="bx bxl-product-hunt mr-2"></i>{{ __('product::labels.product') }}
                            </a>
                        </li>
                    @endif

                    @if(Module::find('service') && Module::find('service')->isEnabled())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-restaurant mr-2"></i>{{ __('service::labels.service') }}
                                <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                                <a href="{{ route('services.index') }}"
                                   class="dropdown-item">{{ __('service::labels.service_group') }}</a>
                                <a href="{{ route('service-items.index') }}"
                                   class="dropdown-item">{{ __('service::labels.service') }}</a>
                                <a href="{{ route('offers.index') }}"
                                   class="dropdown-item">{{ __('service::labels.offer') }}</a>
                            </div>
                        </li>
                    @endif

                    @if(Module::find('booking') && Module::find('booking')->isEnabled())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-calendar mr-2"></i>{{ __('booking::labels.request') }}
                                <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                                <a href="{{ route('bookings.index') }}"
                                   class="dropdown-item">{{ __('booking::labels.booking') }}</a>
                                <a href="{{ route('offer-requests.index') }}"
                                   class="dropdown-item">{{ __('booking::labels.offer_request') }}</a>
                                <a href="{{ route('service-requests.index') }}"
                                   class="dropdown-item">{{ __('booking::labels.service_request') }}</a>
                            </div>
                        </li>
                    @endif

                    @if(Module::find('payment') && Module::find('payment')->isEnabled())
                        <li class="nav-item">
                            <a class="nav-link arrow-none" href="{{ route('payments.index') }}" aria-expanded="false">
                                <i class="bx bx-dollar mr-2"></i>{{ __('payment::labels.payment') }}
                            </a>
                        </li>
                    @endif

                    @if(Module::find('feedback') && Module::find('feedback')->isEnabled())
                        <li class="nav-item">
                            <a class="nav-link arrow-none" href="{{ route('feedbacks.index') }}" aria-expanded="false">
                                <i class="bx bx-message mr-2"></i>{{ __('feedback::labels.feedback') }}
                            </a>
                        </li>
                    @endif

                    @if(Module::find('page') && Module::find('page')->isEnabled())
                        <li class="nav-item">
                            <a class="nav-link arrow-none" href="#" aria-expanded="false">
                                <i class="bx bx-list-check mr-2"></i>{{ __('labels.policy') }}
                            </a>
                        </li>
                    @endif

                    @if(Module::find('report') && Module::find('report')->isEnabled())
                        <li class="nav-item">
                            <a class="nav-link arrow-none" href="{{ route('report.index') }}" aria-expanded="false">
                                <i class="bx bxs-report mr-2"></i>{{ __('report::labels.report') }}
                            </a>
                        </li>
                    @endif

                    @if(Module::find('agency') && Module::find('agency')->isEnabled())
                        <li class="nav-item">
                            <a class="nav-link arrow-none" href="{{ route('agencies.index') }}" aria-expanded="false">
                                <i class="bx bxs-hotel mr-2"></i>{{ __('agency::labels.agency') }}
                            </a>
                        </li>
                    @endif

                    @if(Module::find('core') && Module::find('core')->isEnabled())
                        <li class="nav-item">
                            <a class="nav-link arrow-none" href="{{ route('users.index') }}" aria-expanded="false">
                                <i class="bx bxs-user mr-2"></i>{{ __('core::labels.user') }}
                            </a>
                        </li>
                    @endif

                    @if(Module::find('cms') && Module::find('cms')->isEnabled())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-comment mr-2"></i>{{ __('cms::labels.cms') }}
                                <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                                <a href="{{ route('image-cms.index') }}"
                                   class="dropdown-item">{{ __('cms::labels.image') }}</a>
                                <a href="{{ route('video-cms.index') }}"
                                   class="dropdown-item">{{ __('cms::labels.video') }}</a>
                                <a href="{{ route('config-cms.index') }}"
                                   class="dropdown-item">{{ __('cms::labels.config') }}</a>
                                <a href="{{ route('meta-cms.index') }}"
                                   class="dropdown-item">{{ __('cms::labels.seo') }}</a>
                            </div>
                        </li>
                    @endif

                </ul>
            </div>
        </nav>
    </div>
</div>
