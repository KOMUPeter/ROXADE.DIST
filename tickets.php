<?php

require_once('config/config.inc.php');
require_once('config/login.inc.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$titrePage = "Tickets en cours";

include 'include/html.inc.php';
?>

<!--end::Head-->

<!--begin::Body-->

<body id="kt_app_body" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true"
    data-kt-app-sidebar-fixed="false" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>var defaultThemeMode = "light"; var themeMode; if (document.documentElement) { if (document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if (localStorage.getItem("data-bs-theme") !== null) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
    <!--end::Theme mode setup on page load-->
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            <?php include('include/header.inc.php') ?>
            <!--end::Header-->

            <!--begin::wrapper-->
            <div class="app-wrapper d-flex" id="kt_app_wrapper">
                <!--begin::wrapper container-->
                <div class="app-container container-fluid d-flex">
                    <!--begin::Sidebar-->
                    <?php include('include/sidebar.inc.php') ?>
                    <!--end::Sidebar-->

                    <!--begin::Main-->

                    <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
                        <!--begin::Content wrapper-->
                        <div class="d-flex flex-column flex-column-fluid">

                            <!--begin::Toolbar-->
                            <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

                                <!--begin::Toolbar container-->
                                <div id="kt_app_toolbar_container"
                                    class="app-container  container-fluid d-flex flex-stack ">

                                    <!--begin::Page title-->
                                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                                        <!--begin::Title-->
                                        <h1
                                            class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                            Définition des clients
                                        </h1>
                                        <!--end::Title-->


                                        <!--begin::Breadcrumb-->
                                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                            <!--begin::Item-->
                                            <li class="breadcrumb-item text-muted">
                                                <a href="/index.php" class="text-muted text-hover-primary">
                                                    Accueil </a>
                                            </li>
                                            <!--end::Item-->

                                        </ul>
                                        <!--end::Breadcrumb-->
                                    </div>
                                    <!--end::Page title-->
                                    <!--begin::Actions-->
                                    <div class="d-flex align-items-center gap-2 gap-lg-3">

                                        <!--begin::Primary button-->
                                        <a href="tickets-add.php?n=new" class="btn btn-sm fw-bold btn-primary">
                                            <i class="fa fa-plus-circle"></i> Nouveau ticket</a>
                                        <!--end::Primary button-->
                                    </div>
                                    <!--end::Actions-->


                                </div>
                                <!--end::Toolbar container-->
                            </div>
                            <!--end::Toolbar-->

                            <!--begin::Content-->
                            <div id="kt_app_content" class="app-content  flex-column-fluid ">
                                <!--begin::Content container-->
                                <div id="kt_app_content_container" class="app-container  container-fluid ">

                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    Type
                                                </th>
                                                <th>
                                                    Niveau
                                                </th>
                                                <th>
                                                    Titre
                                                </th>
                                                <th>
                                                    Descriptif
                                                </th>
                                                <th>
                                                    Prise en charge
                                                </th>
                                            </tr>
                                        </thead>
                                        <?php $result = __QUERY("SELECT * FROM tickets");
                                        if (__ROWS($result) > 0) { ?>
                                            <tbody>

                                                <?php while ($row = __ARRAY($result)) { ?>
                                                    <tr>
                                                        <td class="text-center">
                                                            <?php echo $row['tictype']; ?>
                                                        </td>
                                                        <td class="font-weight-bold text-center">
                                                            <?php
                                                            if ($row['ticniveau'] == 1) {
                                                                echo '<h4 class="text-primary">';
                                                                echo $row['ticniveau'];
                                                            } elseif ($row['ticniveau'] == 2) {
                                                                echo '<h4 class="text-warning">';
                                                                echo $row['ticniveau'];
                                                            } elseif ($row['ticniveau'] == 3) {
                                                                echo '<h4 class="text-danger">';
                                                                echo $row['ticniveau'];
                                                            }
                                                            ?>

                                                        </td>
                                                        <td>
                                                            <?php echo $row['tictitre']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['ticdescriptif']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['ticpec']; ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                </div>
                                <!--end::Content container-->
                            </div>
                            <!--end::Content-->


                            <!--end:::Main-->

                        </div>

                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Page-->
                <!--end::App-->
            </div>

            <!--begin::Scrolltop-->
            <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
                <i class="ki-outline ki-arrow-up"></i>
            </div>
            <!--end::Scrolltop-->

            <!--begin::Javascript-->
            <?php include('include/javascript.inc.php') ?>
            <script type="text/javascript">

                $(document).ready(function () {
                    $('.form-check-input').click(function () {
                        $.ajax({
                            url: './defuse-switch.php?f=active&n=' + $(this).data('id') + '&c=' + (isChecked ? 'true' : 'false'),
                        });
                    });
                });

                function confirmDeleteClient(n) {
                    Swal.fire({
                        title: "Confirmation",
                        text: "Confirmez-vous la suppression de ce client ?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Oui',
                        cancelButtonText: 'Non'
                    }).then((result) => {
                        if (result.value) {
                            window.location = 'defcli.php?action=delete&n=' + n
                        }
                    });
                }
            </script>
            <!--end::Javascript-->

</body>
<!--end::Body-->

</html>