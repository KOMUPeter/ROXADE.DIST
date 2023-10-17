<?php
include 'config/config.inc.php';
include 'config/login.inc.php';



/*
 *
 * Cette page ne sera utilisé que par les clients (qui se connecteront avec les login / password des contacts
 *
 */

/*
$clientName = '';
$clientAdr = "";
$clientCp = "";
$clientVille = "";
$clientUrl = "";
$clientTel = "";
$clientEmail = "";
$clientId = 0;

if (isset($_GET['id']) && is_numeric($_GET['id']) && isset($_GET['n']) && $_GET['n'] == 'edit') {
    // $clientId = intval($_GET['id']);
    // Load user from database using ID
    $client = new Client();
    if ($client->LoadClientFromID($_GET['id'])) {
        // fetch client fields
        $clientName = $client->getClinom();
        $clientAdr = $client->getCliadr();
        $clientCp = $client->getClicp();
        $clientVille = $client->getCliville();
        $clientUrl = $client->getCliurl();
        $clientTel = $client->getClitel();
        $clientEmail = $client->getCliemail();

    } else {
        echo "Client not found.";
        exit;
    }
}

*/
$ticket = new Tickets();

if (isset($_POST)) {
    // Retrieve form data
    $ticcli = $_POST['ticcli'];
    $ticcct = $_POST['ticcct'];
    $tictype = $_POST['tictype'];
    $ticniveau = $_POST['ticniveau'];
    $tictitre = $_POST['tictitre'];
    $ticdescriptif = $_POST['ticdescriptif'];
    $ticpec = $_POST['ticpec'];
    $fichiers = $_FILES['fichiers']['name'];

    // Call the function to add the ticket to the database
    $ticid = addTickets($ticcli, $ticcct, $tictype, $ticniveau, $tictitre, $ticdescriptif, $ticpec, $fichiers);
    
    // Use the $ticid as needed
    // Redirect or display a success message
}

$titrePage = "Création d'un ticket";
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
                                        Création d'un ticket
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
                                            <a href="/tickets.php" class="text-muted text-hover-primary">
                                                Tickets en cours </a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                        </li>
                                        <!--end::Item-->

                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">
                                                <span>
                                                    Nouveau ticket </span>
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
                                <form method="post" action="tickets.php" enctype="multipart/form-data">
                                    <?php
                                    randomToken();
                                    addToken();
                                    $n = isset($_GET['n']) ? $_GET['n'] : '';
                                    ?>
                                    <input type="hidden" name="action" value="<?= $n === "new" ? "add" : ($n === "edit" ? "edit" : "") ?>">
                                    <input type="hidden" name="id"
                                           value="<?= isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : "0" ?>">

                                    <div class="mb-10">
                                        <label class="form-label required">Demande</label>
                                        <select class="form-control" name="demande" required id="demandeSelect">
                                            <option value="" selected>-- Sélectionnez --</option>
                                            <option value="E">Demande d'évolution</option>
                                            <option value="C">Correction d'un bug</option>
                                        </select>
                                    </div>
                                    <!-- Ce div ne concerne que la demande d'évolution / Doit être caché et désactivé pour une correction de bug -->
                                    <div class="mb-10 urgence">
                                        <label class="form-label required">Urgence</label>
                                        <select class="form-control" name="niveau" required>
                                            <option value="" selected>-- Sélectionnez --</option>
                                            <option value="3">Demande à traiter en urgence</option>
                                            <option value="2">Demande importante</option>
                                            <option value="1">Demande mineure</option>
                                        </select>
                                    </div>
                                    <!-- Ce div ne concerne que la correction d'un bug / Doit être caché et désactivé pour une demande d'évolution -->
                                    <div class="mb-10 niveau">
                                        <label class="form-label required">Sévérité</label>
                                        <select class="form-control" name="niveau" required>
                                            <option value="" selected>-- Sélectionnez --</option>
                                            <option value="3">Blocage en cours : correction impérative</option>
                                            <option value="2">Dysfonctionnement : correction urgente</option>
                                            <option value="1">Non bloquant : correction mineure</option>
                                        </select>
                                    </div>
                                    <div class="mb-10">
                                        <label class="form-label required">Titre</label>
                                        <input type="text" class="form-control form-control-solid" required name="titre">
                                    </div>
                                    <!-- adapter le placeholder suivant si c'est une correction ou une demande -->
                                    <div class="mb-10">
                                        <label class="form-label required">Descriptif</label>
                                        <textarea rows="10" class="form-control form-control-solid" required name="descriptif"
                                                  placeholder="Veuillez décrire ici votre demande [ou bug] de façon la plus détaillée possible."></textarea>
                                    </div>
                                    <?php
                                    for ($i = 1; $i <= 6; $i++) {
                                    ?>
                                    <div class="mb-10">
                                        <label class="form-label required">Pièce jointe #<?=$i ?></label>
                                        <input type="file" class="file-custom" name="fichier<?=$i ?>">
                                    </div>
                                    <?php
                                    }
                                    ?>

                                    <div class="mb-10">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                            Enregistrer</button>
                                        <a href="tickets.php" class="btn btn-secondary">Annuler</a>
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

 <script>
    $(document).ready(function () {
        // Cache les divs "Urgence" et "Niveau" par défaut
        $('.urgence, .niveau').hide();

        // Surveille le changement de la sélection "Demande"
        $('#demandeSelect').change(function () {
            var demande = $(this).val();
            if (demande === 'E') {
                // Si la demande est une évolution, affiche la div "Urgence" et masque la div "Niveau"
                $('.urgence').show();
                $('.niveau').hide();
                // Désactiver la validation pour le champ "Sévérité"
                $('select[name="niveau"]').prop('required', false);
            } else if (demande === 'C') {
                // Si la demande est une correction de bug, masque la div "Urgence" et affiche la div "Niveau"
                $('.urgence').hide();
                $('.niveau').show();
                // Activer la validation pour le champ "Sévérité"
                $('select[name="niveau"]').prop('required', true);
            } else {
                // Si aucune sélection n'est faite, cache les deux divs et active la validation pour le champ "Sévérité"
                $('.urgence, .niveau').hide();
                $('select[name="niveau"]').prop('required', true);
            }
        });
    });
</script>
    <!--end::Javascript-->

</body>
<!--end::Body-->

</html>
