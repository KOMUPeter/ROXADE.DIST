<?php
include 'config/config.inc.php';
include 'config/login.inc.php';

$titrePage = "Définition des clients";
error_reporting(E_ALL);

include('include/html.inc.php')
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
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item">
                                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                        </li>
                                        <!--end::Item-->

                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">
                                            <a href="/defcli.php" class="text-muted text-hover-primary">
                                                Liste des clients </a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                        </li>
                                        <!--end::Item-->

                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">
                                                <span>
                                                    Nouveau client </span>
                                        </li>
                                        <!--end::Item-->


                                    </ul>
                                    <!--end::Breadcrumb-->
                                </div>
                                <!--end::Page title-->
                                <!--begin::Actions-->
                                <div class="d-flex align-items-center gap-2 gap-lg-3">


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
                                <form method="post" action="defcli.php">
                                    <?php
                                    randomToken();
                                    addToken();
                                    if (isset($_GET['n']) == "new") {
                                        ?>
                                        <input type="hidden" name="action" value="add">
                                        <input type="hidden" name="id" value="0">
                                        <?php
                                    } else {
                                        ?>
                                        <input type="hidden" name="action" value="edit">
                                        <input type="hidden" name="id"
                                               value="<?= isset($_GET['n']) ? $_GET['n'] : '' ?>">

                                        <?php
                                    }
                                    ?>

                                    <div class="mb-10">
                                        <label class="form-label required">Nom</label>
                                        <input type="text" class="form-control form-control-solid" maxlength="100"
                                               required name="nom" placeholder="Nom du client">
                                    </div>
                                    <div class="mb-10">
                                        <label class="form-label required">Adresse</label>
                                        <textarea rows="3" class="form-control form-control-solid"
                                                  required name="adresse" placeholder="Adresse postale du client"></textarea>
                                    </div>
                                    <div class="mb-10">
                                        <label class="form-label required">Code postal</label>
                                        <input type="text" class="form-control form-control-solid" maxlength="9"
                                               required name="code-postal" placeholder="Code postal du client">
                                    </div>
                                    <div class="mb-10">
                                        <label class="form-label required">Ville</label>
                                        <input type="text" class="form-control form-control-solid" maxlength="50"
                                               required name="ville" placeholder="Ville du client">
                                    </div>
                                    <div class="mb-10">
                                        <label class="form-label">Site web</label>
                                        <input type="url" class="form-control form-control-solid" maxlength="200"
                                               name="site-web" placeholder="Adresse du site internet du client">
                                    </div>
                                    <div class="mb-10">
                                        <label class="form-label">Téléphone</label>
                                        <input type="text" class="form-control form-control-solid" maxlength="25"
                                                name="telephone" placeholder="Téléphone du client">
                                    </div>
                                    <div class="mb-10">
                                        <label class="form-label">Adresse Email</label>
                                        <input type="email" class="form-control form-control-solid" maxlength="120"
                                                name="email" placeholder="Adresse email du client">
                                    </div>
                                    <div class="mb-10">
                                        <label
                                            class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                            <!--begin::Inputs-->
                                            <input class="form-check-input" name="google" type="checkbox" value="1"
                                                   id="kt_modal_connected_accounts_google" checked="checked">


                                            <!--end::Inputs-->

                                            <!--begin::Label-->
                                            <span class="form-check-label fw-semibold text-muted"
                                                  for="kt_modal_connected_accounts_google"> Compte actif</span>
                                            <!--end::Label-->
                                        </label>
                                    </div>
                                    <h5>Contacts</h5>
                                    <?php
                                    /*
                                     * Afficher ici un <table> avec les contacts éventuels du client et la possibilité en ajax d'en ajouter
                                     * Il faudra utiliser la fonction $.ajax de JQuery et créer des inputs hidden pour valider le formulaire
                                     * avec les coordonnées du client + les coordonnées de X contacts...
                                     */
                                    ?>
                                    <div class="mb-10">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                            Enregistrer</button>
                                        <a href="defcli.php" class="btn btn-secondary">Annuler</a>
                                    </div>
                                </form>

                            </div>
                            <!--end::Content container-->
                        </div>
                        <!--end::Content-->

                    </div>
                    <!--end::Content wrapper-->


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
    <!--end::Javascript-->

</body>
<!--end::Body-->

</html>
