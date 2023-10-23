<?php

require_once('config/config.inc.php');
require_once('config/login.inc.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'include/html.inc.php';

?>
<!--begin::Header-->
<div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: false, lg: true}"
    data-kt-sticky-name="app-header-sticky" data-kt-sticky-offset="{default: false, lg: '300px'}">
    <!--begin::Header container-->
    <div class="app-container container-fluid d-flex align-items-stretch justify-content-between"
        id="kt_app_header_container">
        <!--begin::Header logo-->
        <div class="app-header-logo d-flex align-items-center me-lg-9">
            <!--begin::Mobile toggle-->
            <div class="btn btn-icon btn-color-gray-500 btn-active-color-primary w-35px h-35px ms-n2 me-2 d-flex d-lg-none"
                id="kt_app_header_menu_toggle">
                <i class="ki-outline ki-abstract-14 fs-1"></i>
            </div>
            <!--end::Mobile toggle-->
            <!--begin::Logo image-->
            <a href="../../demo44/dist/index.html">
                <img alt="Logo" src="assets/media/logos/custom-1.png" class="h-50px logo-image theme-light-show" />
                <img alt="Logo" src="assets/media/logos/custom-1.png" class="h-50px logo-image theme-dark-show" />
            </a>
            <!--end::Logo image-->
        </div>

        <!--end::Header logo-->
        <!--begin::Header wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <!--begin::Menu wrapper-->
            <div class="d-flex align-items-stretch" id="kt_app_header_menu_wrapper">
                <!--begin::Menu holder-->
                <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
                    data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                    data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_header_menu_toggle"
                    data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_menu_wrapper'}">
                    <!--begin::Menu-->
                    <div class="menu menu-rounded menu-column menu-lg-row menu-active-bg menu-title-gray-600 menu-state-dark menu-arrow-gray-400 fw-semibold fw-semibold fs-6 align-items-stretch my-5 my-lg-0 px-2 px-lg-0"
                        id="#kt_app_header_menu" data-kt-menu="true">
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                            data-kt-menu-placement="bottom-start"
                            class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <span class="menu-title">Accueil</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </span>
                            <!--end:Menu link-->
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown p-0 w-100 w-lg-850px">
                                <!--begin:Dashboards menu-->
                                <div class="menu-state-bg menu-extended overflow-hidden overflow-lg-visible"
                                    data-kt-menu-dismiss="true">
                                    <!--begin:Row-->
                                    <div class="row">
                                        <!--begin:Col-->
                                        <div class="col-lg-8 mb-3 mb-lg-0 py-3 px-3 py-lg-6 px-lg-6">
                                            <!--begin:Row-->
                                            <div class="row">
                                                <!--begin:Col-->
                                                <div class="col-lg-6 mb-3">
                                                    <!--begin:Menu item-->
                                                    <div class="menu-item p-0 m-0">
                                                        <!--begin:Menu link-->
                                                        <a href="index.php" class="menu-link">
                                                            <span
                                                                class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
                                                                <i class="fa-solid fa-house"></i>
                                                            </span>
                                                            <span class="d-flex flex-column">
                                                                <span class="fs-6 fw-bold text-gray-800">Accueil</span>
                                                            </span>
                                                        </a>
                                                        <!--end:Menu link-->
                                                    </div>
                                                    <!--end:Menu item-->
                                                </div>
                                                <!--end:Col-->
                                                <!--begin:Col-->
                                                <div class="col-lg-6 mb-3">
                                                    <!--begin:Menu item-->
                                                    <div class="menu-item p-0 m-0">
                                                        <!--begin:Menu link-->
                                                        <a href="../../demo44/dist/dashboards/projects.html"
                                                            class="menu-link">
                                                            <span
                                                                class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
                                                                <i class="ki-outline ki-abstract-44 text-info fs-1"></i>
                                                            </span>
                                                            <span class="d-flex flex-column">
                                                                <span class="fs-6 fw-bold text-gray-800">Projects</span>
                                                                <span class="fs-7 fw-semibold text-muted">Tasts, graphs
                                                                    & charts</span>
                                                            </span>
                                                        </a>
                                                        <!--end:Menu link-->
                                                    </div>
                                                    <!--end:Menu item-->
                                                </div>
                                                <!--end:Col-->
                                                <!--begin:Col-->
                                                <div class="col-lg-6 mb-3">
                                                    <!--begin:Menu item-->
                                                    <div class="menu-item p-0 m-0">
                                                        <!--begin:Menu link-->
                                                        <a href="../../demo44/dist/dashboards/online-courses.html"
                                                            class="menu-link">
                                                            <span
                                                                class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
                                                                <i
                                                                    class="ki-outline ki-color-swatch text-success fs-1"></i>
                                                            </span>
                                                            <span class="d-flex flex-column">
                                                                <span class="fs-6 fw-bold text-gray-800">Online
                                                                    Courses</span>
                                                                <span class="fs-7 fw-semibold text-muted">Student
                                                                    progress</span>
                                                            </span>
                                                        </a>
                                                        <!--end:Menu link-->
                                                    </div>
                                                    <!--end:Menu item-->
                                                </div>
                                                <!--end:Col-->
                                                <!--begin:Col-->
                                                <div class="col-lg-6 mb-3">
                                                    <!--begin:Menu item-->
                                                    <div class="menu-item p-0 m-0">
                                                        <!--begin:Menu link-->
                                                        <a href="../../demo44/dist/dashboards/marketing.html"
                                                            class="menu-link">
                                                            <span
                                                                class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
                                                                <i
                                                                    class="ki-outline ki-chart-simple text-dark fs-1"></i>
                                                            </span>
                                                            <span class="d-flex flex-column">
                                                                <span
                                                                    class="fs-6 fw-bold text-gray-800">Marketing</span>
                                                                <span class="fs-7 fw-semibold text-muted">Campaings &
                                                                    conversions</span>
                                                            </span>
                                                        </a>
                                                        <!--end:Menu link-->
                                                    </div>
                                                    <!--end:Menu item-->
                                                </div>
                                                <!--end:Col-->
                                                <!--begin:Col-->
                                                <div class="col-lg-6 mb-3">
                                                    <!--begin:Menu item-->
                                                    <div class="menu-item p-0 m-0">
                                                        <!--begin:Menu link-->
                                                        <a href="../../demo44/dist/dashboards/bidding.html"
                                                            class="menu-link">
                                                            <span
                                                                class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
                                                                <i class="ki-outline ki-switch text-warning fs-1"></i>
                                                            </span>
                                                            <span class="d-flex flex-column">
                                                                <span class="fs-6 fw-bold text-gray-800">Bidding</span>
                                                                <span class="fs-7 fw-semibold text-muted">Campaings &
                                                                    conversions</span>
                                                            </span>
                                                        </a>
                                                        <!--end:Menu link-->
                                                    </div>
                                                    <!--end:Menu item-->
                                                </div>
                                                <!--end:Col-->
                                                <!--begin:Col-->
                                                <div class="col-lg-6 mb-3">
                                                    <!--begin:Menu item-->
                                                    <div class="menu-item p-0 m-0">
                                                        <!--begin:Menu link-->
                                                        <a href="../../demo44/dist/dashboards/pos.html"
                                                            class="menu-link">
                                                            <span
                                                                class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
                                                                <i
                                                                    class="ki-outline ki-abstract-42 text-danger fs-1"></i>
                                                            </span>
                                                            <span class="d-flex flex-column">
                                                                <span class="fs-6 fw-bold text-gray-800">POS
                                                                    System</span>
                                                                <span class="fs-7 fw-semibold text-muted">Campaings &
                                                                    conversions</span>
                                                            </span>
                                                        </a>
                                                        <!--end:Menu link-->
                                                    </div>
                                                    <!--end:Menu item-->
                                                </div>
                                                <!--end:Col-->
                                                <!--begin:Col-->
                                                <div class="col-lg-6 mb-3">
                                                    <!--begin:Menu item-->
                                                    <div class="menu-item p-0 m-0">
                                                        <!--begin:Menu link-->
                                                        <a href="../../demo44/dist/dashboards/call-center.html"
                                                            class="menu-link">
                                                            <span
                                                                class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
                                                                <i class="ki-outline ki-call text-primary fs-1"></i>
                                                            </span>
                                                            <span class="d-flex flex-column">
                                                                <span class="fs-6 fw-bold text-gray-800">Call
                                                                    Center</span>
                                                                <span class="fs-7 fw-semibold text-muted">Campaings &
                                                                    conversions</span>
                                                            </span>
                                                        </a>
                                                        <!--end:Menu link-->
                                                    </div>
                                                    <!--end:Menu item-->
                                                </div>
                                                <!--end:Col-->
                                            </div>
                                            <!--end:Row-->
                                            <div class="separator separator-dashed mx-5 my-5"></div>
                                            <!--begin:Landing-->
                                            <div class="d-flex flex-stack flex-wrap flex-lg-nowrap gap-2 mx-5">
                                                <div class="d-flex flex-column me-5">
                                                    <div class="fs-6 fw-bold text-gray-800">Landing Page Template</div>
                                                    <div class="fs-7 fw-semibold text-muted">Onpe page landing template
                                                        with pricing & others</div>
                                                </div>
                                                <a href="../../demo44/dist/landing.html"
                                                    class="btn btn-sm btn-primary fw-bold">Explore</a>
                                            </div>
                                            <!--end:Landing-->
                                        </div>
                                        <!--end:Col-->
                                        <!--begin:Col-->
                                        <div class="menu-more bg-light col-lg-4 py-3 px-3 py-lg-6 px-lg-6 rounded-end">
                                            <!--begin:Heading-->
                                            <h4 class="fs-6 fs-lg-4 text-gray-800 fw-bold mt-3 mb-3 ms-4">More
                                                Dashboards</h4>
                                            <!--end:Heading-->
                                            <!--begin:Menu item-->
                                            <div class="menu-item p-0 m-0">
                                                <!--begin:Menu link-->
                                                <a href="../../demo44/dist/dashboards/logistics.html"
                                                    class="menu-link py-2">
                                                    <span class="menu-title">Logistics</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                            <!--end:Menu item-->
                                            <!--begin:Menu item-->
                                            <div class="menu-item p-0 m-0">
                                                <!--begin:Menu link-->
                                                <a href="../../demo44/dist/dashboards/website-analytics.html"
                                                    class="menu-link py-2">
                                                    <span class="menu-title">Website Analytics</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                            <!--end:Menu item-->
                                            <!--begin:Menu item-->
                                            <div class="menu-item p-0 m-0">
                                                <!--begin:Menu link-->
                                                <a href="../../demo44/dist/dashboards/finance-performance.html"
                                                    class="menu-link py-2">
                                                    <span class="menu-title">Finance Performance</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                            <!--end:Menu item-->
                                            <!--begin:Menu item-->
                                            <div class="menu-item p-0 m-0">
                                                <!--begin:Menu link-->
                                                <a href="../../demo44/dist/dashboards/store-analytics.html"
                                                    class="menu-link py-2">
                                                    <span class="menu-title">Store Analytics</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                            <!--end:Menu item-->
                                            <!--begin:Menu item-->
                                            <div class="menu-item p-0 m-0">
                                                <!--begin:Menu link-->
                                                <a href="../../demo44/dist/dashboards/social.html"
                                                    class="menu-link py-2">
                                                    <span class="menu-title">Social</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                            <!--end:Menu item-->
                                            <!--begin:Menu item-->
                                            <div class="menu-item p-0 m-0">
                                                <!--begin:Menu link-->
                                                <a href="../../demo44/dist/dashboards/delivery.html"
                                                    class="menu-link py-2">
                                                    <span class="menu-title">Delivery</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                            <!--end:Menu item-->
                                            <!--begin:Menu item-->
                                            <div class="menu-item p-0 m-0">
                                                <!--begin:Menu link-->
                                                <a href="../../demo44/dist/dashboards/crypto.html"
                                                    class="menu-link py-2">
                                                    <span class="menu-title">Crypto</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                            <!--end:Menu item-->
                                            <!--begin:Menu item-->
                                            <div class="menu-item p-0 m-0">
                                                <!--begin:Menu link-->
                                                <a href="../../demo44/dist/dashboards/school.html"
                                                    class="menu-link py-2">
                                                    <span class="menu-title">School</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                            <!--end:Menu item-->
                                            <!--begin:Menu item-->
                                            <div class="menu-item p-0 m-0">
                                                <!--begin:Menu link-->
                                                <a href="../../demo44/dist/dashboards/podcast.html"
                                                    class="menu-link py-2">
                                                    <span class="menu-title">Podcast</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                            <!--end:Menu item-->
                                        </div>
                                        <!--end:Col-->
                                    </div>
                                    <!--end:Row-->
                                </div>
                                <!--end:Dashboards menu-->
                            </div>
                            <!--end:Menu sub-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                            data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-0 me-lg-2">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <span class="menu-title">Pages</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </span>
                            <!--end:Menu link-->
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown p-0">
                                <!--begin:Pages menu-->
                                <div class="menu-active-bg px-4 px-lg-0">
                                    <!--begin:Tabs nav-->
                                    <div class="d-flex w-100 overflow-auto">
                                        <ul
                                            class="nav nav-stretch nav-line-tabs fw-bold fs-6 p-0 p-lg-10 flex-nowrap flex-grow-1">
                                            <!--begin:Nav item-->
                                            <li class="nav-item mx-lg-1">
                                                <a class="nav-link py-3 py-lg-6 active text-active-primary" href="#"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#kt_app_header_menu_pages_pages">General</a>
                                            </li>
                                            <!--end:Nav item-->
                                        </ul>
                                    </div>
                                    <!--end:Tabs nav-->
                                    <!--begin:Tab content-->
                                    <div class="tab-content py-4 py-lg-8 px-lg-7">
                                        <!--begin:Tab pane-->
                                        <div class="tab-pane active w-lg-1000px" id="kt_app_header_menu_pages_pages">
                                            <!--begin:Row-->
                                            <div class="row">
                                                <!--begin:Col-->
                                                <div class="col-lg-8">
                                                    <!--begin:Row-->
                                                    <div class="row">
                                                        <!--begin:Col-->
                                                        <div class="col-lg-3 mb-6 mb-lg-0">
                                                            <!-- *********************************************** begin of defuse Pages *************************************-->
                                                            <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                                                data-kt-menu-placement="bottom-start"
                                                                class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                                                                <!--begin:Menu link-->
                                                                <span class="menu-link">
                                                                    <span class="menu-title">Defuse Pages</span>
                                                                    <span class="menu-arrow d-lg-none"></span>
                                                                </span>
                                                                <!--end:Menu link-->
                                                                <!--begin:Menu sub-->
                                                                <div
                                                                    class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px">
                                                                    <!--begin:Menu item-->
                                                                    <div class="menu-item">
                                                                        <!--begin:Menu link-->
                                                                        <a class="menu-link" href="defuse.php"
                                                                            title="Check out over 200 in-house components, plugins and ready for use solutions"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-trigger="hover"
                                                                            data-bs-dismiss="click"
                                                                            data-bs-placement="right">
                                                                            <span class="menu-icon">
                                                                                <i
                                                                                    class="ki-outline ki-rocket fs-2"></i>
                                                                            </span>
                                                                            <span class="menu-title">Defuse</span>
                                                                        </a>
                                                                        <!--end:Menu link-->
                                                                    </div>
                                                                    <!--end:Menu item-->
                                                                    <!--begin:Menu item-->
                                                                    <div class="menu-item">
                                                                        <!--begin:Menu link-->
                                                                        <a class="menu-link" href="defuse-add.php"
                                                                            title="Check out the complete documentation"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-trigger="hover"
                                                                            data-bs-dismiss="click"
                                                                            data-bs-placement="right">
                                                                            <span class="menu-icon">
                                                                                <i
                                                                                    class="ki-outline ki-rocket fs-2"></i>
                                                                            </span>
                                                                            <span class="menu-title">Defuse-add</span>
                                                                        </a>
                                                                        <!--end:Menu link-->
                                                                    </div>
                                                                </div>
                                                                <!--end:Menu sub-->
                                                            </div>
                                                            <!-- *********************************************** end of defuse Pages *************************************-->

                                                        </div>
                                                        <!--end:Col-->
                                                        <!--begin:Col-->
                                                        <div class="col-lg-3 mb-6 mb-lg-0">
                                                            <!--begin:Menu section-->
                                                            <div class="mb-6">
                                                                <!-- ************************************ begin of client Pages *************************************-->
                                                                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                                                    data-kt-menu-placement="bottom-start"
                                                                    class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                                                                    <!--begin:Menu link-->
                                                                    <span class="menu-link">
                                                                        <span class="menu-title">Clients</span>
                                                                        <span class="menu-arrow d-lg-none"></span>
                                                                    </span>
                                                                    <!--end:Menu link-->
                                                                    <!--begin:Menu sub-->
                                                                    <div
                                                                        class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px">
                                                                        <!--begin:Menu item-->
                                                                        <div class="menu-item">
                                                                            <!--begin:Menu link-->
                                                                            <a class="menu-link" href="defcli.php"
                                                                                title="Check out over 200 in-house components, plugins and ready for use solutions"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-trigger="hover"
                                                                                data-bs-dismiss="click"
                                                                                data-bs-placement="right">
                                                                                <span class="menu-icon">
                                                                                    <i class="fa-solid fa-users"></i>
                                                                                </span>
                                                                                <span class="menu-title">Defcli</span>
                                                                            </a>
                                                                            <!--end:Menu link-->
                                                                        </div>
                                                                        <!--end:Menu item-->
                                                                        <!--begin:Menu item-->
                                                                        <div class="menu-item">
                                                                            <!--begin:Menu link-->
                                                                            <a class="menu-link" href="defcli-add.php"
                                                                                title="Check out the complete documentation"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-trigger="hover"
                                                                                data-bs-dismiss="click"
                                                                                data-bs-placement="right">
                                                                                <span class="menu-icon">
                                                                                    <i class="fa-solid fa-users"></i>
                                                                                </span>
                                                                                <span
                                                                                    class="menu-title">Defcli-add</span>
                                                                            </a>
                                                                            <!--end:Menu link-->
                                                                        </div>
                                                                    </div>
                                                                    <!--end:Menu sub-->
                                                                </div>
                                                                <!-- ******************************* end of client Pages *************************************-->

                                                            </div>
                                                        </div>
                                                        <!--end:Col-->
                                                        <!--begin:Col-->
                                                        <div class="col-lg-3 mb-6 mb-lg-0">
                                                            <!--begin:Menu section-->
                                                            <div class="mb-6">
                                                                <!-- ************************************ begin of ticket Pages *************************************-->
                                                                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                                                    data-kt-menu-placement="bottom-start"
                                                                    class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                                                                    <!--begin:Menu link-->
                                                                    <span class="menu-link">
                                                                        <span class="menu-title">Tickets</span>
                                                                        <span class="menu-arrow d-lg-none"></span>
                                                                    </span>
                                                                    <!--end:Menu link-->
                                                                    <!--begin:Menu sub-->
                                                                    <div
                                                                        class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px">
                                                                        <!--begin:Menu item-->
                                                                        <div class="menu-item">
                                                                            <!--begin:Menu link-->
                                                                            <a class="menu-link" href="tickets.php"
                                                                                title="Check out over 200 in-house components, plugins and ready for use solutions"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-trigger="hover"
                                                                                data-bs-dismiss="click"
                                                                                data-bs-placement="right">
                                                                                <span class="menu-icon">
                                                                                    <i
                                                                                        class="fa-solid fa-ticket-simple"></i>
                                                                                </span>
                                                                                <span class="menu-title">Tickets</span>
                                                                            </a>
                                                                            <!--end:Menu link-->
                                                                        </div>
                                                                        <!--end:Menu item-->
                                                                        <!--begin:Menu item-->
                                                                        <div class="menu-item">
                                                                            <!--begin:Menu link-->
                                                                            <a class="menu-link" href="tickets-add.php"
                                                                                title="Check out the complete documentation"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-trigger="hover"
                                                                                data-bs-dismiss="click"
                                                                                data-bs-placement="right">
                                                                                <span class="menu-icon">
                                                                                    <i
                                                                                        class="fa-solid fa-ticket-simple"></i>
                                                                                </span>
                                                                                <span
                                                                                    class="menu-title">Tickets-add</span>
                                                                            </a>
                                                                            <!--end:Menu link-->
                                                                        </div>
                                                                    </div>
                                                                    <!--end:Menu sub-->
                                                                </div>
                                                                <!-- ******************************* end of ticket Pages *************************************-->

                                                            </div>
                                                            <!--end:Menu section-->
                                                        </div>
                                                        <!--end:Col-->
                                                    </div>
                                                    <!--end:Row-->
                                                </div>
                                                <!--end:Col-->
                                            </div>
                                            <!--end:Row-->
                                        </div>
                                        <!--end:Tab pane-->
                                    </div>
                                    <!--end:Tab content-->
                                </div>
                                <!--end:Pages menu-->
                            </div>
                            <!--end:Menu sub-->
                        </div>
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Menu holder-->
            </div>
            <!--end::Menu wrapper-->
            <!--begin::Navbar-->
            <div class="app-navbar flex-shrink-0">

                <!--begin::User menu-->
                <div class="app-navbar-item ms-1 ms-lg-4" id="kt_header_user_menu_toggle">
                    <!--begin::Menu wrapper-->
                    <div class="cursor-pointer symbol symbol-35px symbol-md-40px"
                        data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                        data-kt-menu-placement="bottom-end">
                        <img class="symbol symbol-35px symbol-md-40px" src="assets/media/avatars/300-5.jpg"
                            alt="user" />
                    </div>
                    <!--begin::User account menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                        data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-50px me-5">
                                    <img alt="Logo" src="assets/media/avatars/300-5.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Username-->
                                <div class="d-flex flex-column">
                                    <div class="fw-bold d-flex align-items-center fs-5">
                                        <?php
                                        if (isset($userConnected)) {
                                            // var_dump($userConnected);
                                            echo $userConnected->getUsenom();
                                        } elseif (isset($clientConnected)) {
                                            echo $clientConnected->getCctnom();
                                        } ?>

                                        <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">
                                            <?php
                                            if (isset($userConnected)) {
                                                echo 'Roxade';
                                            } elseif(isset($clientConnected)) {
                                                echo 'Client';
                                            }
                                            ?>

                                        </span>
                                    </div>
                                    <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">
                                    <?php
                                        if(isset($userConnected)){
                                            echo $userConnected->getUselogin();
                                        } elseif(isset($clientConnected)){
                                            echo $clientConnected->getCctemail();
                                        }
                                        ?>
                                    </a>
                                </div>
                                <!--end::Username-->
                            </div>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="../../demo44/dist/account/overview.html" class="menu-link px-5">Mon Profile</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <?php if(isset($clientConnected)) {  ?>
                        <div class="menu-item px-5">
                            <a href="../../demo44/dist/apps/projects/list.html" class="menu-link px-5">
                                <span class="menu-text">Mes Tickets</span>
                                <span class="menu-badge">
                                    <span class="badge badge-light-danger badge-circle fw-bold fs-7">3</span>
                                </span>
                            </a>
                        </div>
                        <?php 
                            } 
                        ?>
                        <?php if(isset($userConnected)) {  ?>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                            data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                            <a href="#" class="menu-link px-5">
                                <span class="menu-title">Gérer tickets </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <!--begin::Menu sub-->
                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="../../demo44/dist/account/referrals.html"
                                    class="menu-link px-5">En cours de traitement</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="../../demo44/dist/account/billing.html" class="menu-link px-5">Traité</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="../../demo44/dist/account/statements.html"
                                        class="menu-link px-5">Historique</a>
                                </div>
                                <!--end::Menu item-->
                                <?php 
                                } 
                                ?>
                                <!--begin::Menu separator-->
                                <div class="separator my-2"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                
                            </div>
                            <!--end::Menu sub-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                            data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                            <a href="#" class="menu-link px-5">
                                <span class="menu-title position-relative">Mode
                                    <span class="ms-5 position-absolute translate-middle-y top-50 end-0">
                                        <i class="ki-outline ki-night-day theme-light-show fs-2"></i>
                                        <i class="ki-outline ki-moon theme-dark-show fs-2"></i>
                                    </span></span>
                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                                data-kt-menu="true" data-kt-element="theme-mode-menu">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-0">
                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                        data-kt-value="light">
                                        <span class="menu-icon" data-kt-element="icon">
                                            <i class="ki-outline ki-night-day fs-2"></i>
                                        </span>
                                        <span class="menu-title">lumineux</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-0">
                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                                        <span class="menu-icon" data-kt-element="icon">
                                            <i class="ki-outline ki-moon fs-2"></i>
                                        </span>
                                        <span class="menu-title">Sombre</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-0">
                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                        data-kt-value="system">
                                        <span class="menu-icon" data-kt-element="icon">
                                            <i class="ki-outline ki-screen fs-2"></i>
                                        </span>
                                        <span class="menu-title">System</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5 my-1">
                            <a href="../../demo44/dist/account/settings.html" class="menu-link px-5">Parametre de compte</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="logout.php" class="menu-link px-5">Se déconnnecter</a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::User account menu-->
                    <!--end::Menu wrapper-->
                </div>
                <!--end::User menu-->
                <!--begin::Sidebar menu toggle-->
                <div class="app-navbar-item d-flex align-items-center d-lg-none ms-1 me-n2">
                    <a href="#" class="btn btn-icon btn-color-gray-500 btn-active-color-primary w-35px h-35px"
                        id="kt_app_sidebar_mobile_toggle">
                        <i class="ki-outline ki-burger-menu-2 fs-1"></i>
                    </a>
                </div>
                <!--end::Sidebar menu toggle-->
            </div>
            <!--end::Navbar-->
        </div>
        <!--end::Header wrapper-->
    </div>
    <!--end::Header container-->
</div>
<!--end::Header-->