<?php
include 'config/config.inc.php';
include 'config/login.inc.php';

if (!isset($_GET['c']) || !isset($_GET['n'])) {
    header('location: defcli.php');
    exit;
}

if (isset($_GET['c']) && isset($_GET['n']) && $_GET['n'] === 'new') {
    $contactName = '';
    $contactAdr = "";
    $contactCp = "";
    $contactVille = "";
    $contactUrl = "";
    $contactTel = "";
    $contactEmail = "";
    $contactId = 0;

        } else {
            $application->addToast('danger', 'Contact', 'contact introuvable, veuillez vérifier l\'existence du Contact !');
            exit;
        }

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
                                            Nouveau contact / modifier un contact
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
                                                <a href="/defcli-add.php?n=[id du client]"
                                                    class="text-muted text-hover-primary">
                                                    [nom du client] </a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                            </li>
                                            <!--end::Item-->

                                            <!--begin::Item-->
                                            <li class="breadcrumb-item text-muted">
                                                <span>
                                                    Nouveau contact / Modifier un contact </span>
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
                                        ?>
                                        <input type="hidden" name="action" value="contact">
                                        <input type="hidden" name="id" value="<?= $_GET['n'] ?>">
                                        <input type="hidden" name="client" value="<?= $_GET['c'] ?>">

                                        <div class="mb-10">
                                            <label class="form-label required">Civilité</label>
                                            <select class="form-control form-control-solid" required name="civilite">
                                                <option value="" selected>-- Sélectionnez --></option>
                                                <option value="M.">Monsieur</option>
                                                <option value="Mme">Madame</option>
                                            </select>
                                        </div>
                                        <div class="mb-10">
                                            <label class="form-label required">Prénom</label>
                                            <input type="text" class="form-control form-control-solid" maxlength="35"
                                                required name="prenom" placeholder="Prénom du contact"
                                                value="<?= $contactPrenom ?>">
                                        </div>
                                        <div class="mb-10">
                                            <label class="form-label required">Nom</label>
                                            <input type="text" class="form-control form-control-solid" maxlength="50"
                                                required name="nom" placeholder="Nom du contact"
                                                value="<?= $contactName ?>">
                                        </div>
                                        <div class="mb-10">
                                            <label class="form-label">Téléphone fixe</label>
                                            <input type="text" class="form-control form-control-solid" maxlength="25"
                                                name="tel-fixe" value="<?= $contactFixe ?>"
                                                placeholder="N° de téléphone fixe">
                                        </div>
                                        <div class="mb-10">
                                            <label class="form-label">Téléphone portable</label>
                                            <input type="text" class="form-control form-control-solid" maxlength="25"
                                                name="tel-portable" value="<?= $contactPortable ?>"
                                                placeholder="N° de téléphone portable">
                                        </div>
                                        <div class="mb-10">
                                            <label class="form-label required">Adresse Email</label>
                                            <input type="email" class="form-control form-control-solid" required
                                                maxlength="120" name="email" value="<?= $contactEmail ?>"
                                                placeholder="Adresse email du contact">
                                        </div>
                                        <div class="mb-10">
                                            <label
                                                class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                <!--begin::Inputs-->
                                                <input class="form-check-input" name="actif" type="checkbox" value="1"
                                                    id="kt_modal_connected_accounts_google" checked="checked">


                                                <!--end::Inputs-->

                                                <!--begin::Label-->
                                                <span class="form-check-label fw-semibold text-muted"
                                                    for="kt_modal_connected_accounts_google">
                                                    Compte actif</span>
                                                <!--end::Label-->
                                            </label>
                                        </div>

                                        <div class="mb-10">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                                Enregistrer</button>
                                            <a href="defcli-add.php?n=<?= $_GET['c'] ?>"
                                                class="btn btn-secondary">Annuler</a>
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