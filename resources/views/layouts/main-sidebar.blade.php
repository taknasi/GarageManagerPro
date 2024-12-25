<style>
    .menu-title {
        font-size: 1rem !important;
    }

    @media (min-width: 992px) {
        [data-kt-aside-minimize=on] .aside:not(:hover) .aside-menu #kt_aside_user {
            opacity: 0;
            transition: opacity .3s ease;
        }
    }
</style>

<!--begin::Aside-->
<div id="kt_aside" class="aside aside-light aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="{{ route('index') }}">
            <img alt="Logo" src="{{ asset('assets/media/gdi.png') }}" class="logo" style="height: 22px" />
        </a>

        <!--end::Logo-->
        <!--begin::Aside toggler-->
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="aside-minimize">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <path opacity="0.5"
                        d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                        fill="currentColor" />
                    <path
                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Aside toggler-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
            data-kt-scroll-offset="0">

            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">



                <div class="aside-user mb-5 mb-lg-10" id="kt_aside_user">
                    <!--begin::User-->
                    <div class="d-flex align-items-center flex-column">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-100px mb-4">
                            <img style="object-fit: contain" src="{{ asset('assets/media/logo.png') }}" alt="Argos">
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Info-->
                        <div class="text-center">
                            <!--begin::Description-->
                            <span class="text-gray-600 fw-bold d-block fs-7 mb-1">Bonjour..</span>
                            <!--end::Description-->
                            <!--begin::Username-->

                            <span class="badge fs-6 my-1 p-4 badge-light">{{ Auth::user()->name }} &nbsp;
                                <span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z"
                                                fill="white"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <!--end::Username-->

                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::User-->
                </div>

                <a href="{{ route('index') }}">
                    <div class="menu-item menu-accordion {{ request()->routeIs('index') ? 'hover' : '' }}">

                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen001.svg-->
                                <span class="svg-icon svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="20" viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M11 2.375L2 9.575V20.575C2 21.175 2.4 21.575 3 21.575H9C9.6 21.575 10 21.175 10 20.575V14.575C10 13.975 10.4 13.575 11 13.575H13C13.6 13.575 14 13.975 14 14.575V20.575C14 21.175 14.4 21.575 15 21.575H21C21.6 21.575 22 21.175 22 20.575V9.575L13 2.375C12.4 1.875 11.6 1.875 11 2.375Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title fs-6">Tableau de bord</span>
                        </span>


                    </div>
                </a>

                <div data-kt-menu-trigger="click"
                    {{-- class="menu-item menu-accordion {{ Request::is(['dossiers/*', 'dossiers','/']) ? 'hover show' : '' }}"> --}}
                    class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-folder2-open fs-2"></i>
                        </span>
                        <span class="menu-title fs-6">Dossiers corporel</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            {{-- <a class="menu-link  {{ request()->routeIs('dossiers.create') ? 'active' : '' }}" href="{{ route('dossiers.create') }}"> --}}
                            <a class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title ">Nouveau Dossier corporel</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            {{-- <a class="menu-link {{ Request::is(['dossiers','/']) ? 'active' : '' }}" href="{{ route('dossiers.index') }}"> --}}
                            <a class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Liste des Dossiers corporel</span>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Request::is(['factures/*', 'factures']) ? 'hover show' : '' }}">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-card-checklist fs-2"></i>
                        </span>
                        <span class="menu-title">Facturations</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">

                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('factures.create') ? 'active' : '' }}" href="{{ route('factures.create') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Nouvelle facture</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('factures.index') ? 'active' : '' }}" href="{{ route('factures.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Liste des Factures</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Request::is(['vehicules/*', 'vehicules']) ? 'hover show' : '' }}">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-car-front-fill text-gray-500" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM2.906 5.189l.956-1.913A.5.5 0 0 1 4.309 3h7.382a.5.5 0 0 1 .447.276l.956 1.913a.51.51 0 0 1-.497.731c-.91-.073-3.35-.17-4.597-.17-1.247 0-3.688.097-4.597.17a.51.51 0 0 1-.497-.731Z">
                                </path>
                            </svg>
                        </span>
                        <span class="menu-title">Véhicules volés</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">

                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('vehicules.create') ? 'active' : '' }}" href="{{ route('vehicules.create') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Nouveau véhicule volé</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('vehicules.index') ? 'active' : '' }}" href="{{ route('vehicules.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Liste des Véhicules volés</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Request::is(['charges/*', 'charges']) ? 'hover show' : '' }}">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-cash-coin fs-2"></i>
                        </span>
                        <span class="menu-title">Comptabilité</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">

                        <div class="menu-item ">
                            <a class="menu-link {{ Request::is('charges') ? 'active' : '' }}" href="{{ route('charges') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Liste des charges</span>
                            </a>
                        </div>

                    </div>
                </div> --}}
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Request::is(['users/*', 'users']) ? 'hover show' : '' }}">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-people-fill fs-2"></i>
                        </span>
                        <span class="menu-title">Utilisateurs</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">

                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('users') ? 'active' : '' }}" href="{{ route('users') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Liste des utilisateurs</span>
                            </a>
                        </div>
                    </div>

                </div>
                {{-- <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Request::is(['notifications/*', 'notifications']) ? 'hover show' : '' }}">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-gear fs-2"></i>
                        </span>
                        <span class="menu-title">Paramètres</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">

                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('notifications') ? 'active' : '' }}" href="{{ route('notifications') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Notifications</span>
                            </a>
                        </div>
                    </div>
                </div> --}}
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->

    </div>
    <!--end::Aside menu-->


    <!--begin::Footer-->
    <div class="aside-footer flex-column-auto pt-5 pb-7 px-5" id="kt_aside_footer">
        <button
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="btn btn-custom btn-danger w-100" data-bs-toggle="tooltip" data-bs-trigger="hover"
            data-bs-dismiss-="click" title="">
            <span class="btn-label">Se déconnecter</span>
            <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr077.svg-->
            <span class="svg-icon btn-icon svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.3" x="4" y="11" width="12" height="2"
                        rx="1" fill="currentColor" />
                    <path
                        d="M5.86875 11.6927L7.62435 10.2297C8.09457 9.83785 8.12683 9.12683 7.69401 8.69401C7.3043 8.3043 6.67836 8.28591 6.26643 8.65206L3.34084 11.2526C2.89332 11.6504 2.89332 12.3496 3.34084 12.7474L6.26643 15.3479C6.67836 15.7141 7.3043 15.6957 7.69401 15.306C8.12683 14.8732 8.09458 14.1621 7.62435 13.7703L5.86875 12.3073C5.67684 12.1474 5.67684 11.8526 5.86875 11.6927Z"
                        fill="currentColor" />
                    <path
                        d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z"
                        fill="currentColor" />
                </svg></span>
            <!--end::Svg Icon-->
        </button>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    <!--end::Footer-->


</div>
<!--end::Aside-->
