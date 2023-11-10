<?php

require_once('config/config.inc.php');
require_once('config/login.inc.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['action']) && isset($contactConnected)) {

    if (isset($_POST['demande']) && isset($_POST['niveau']) && isset($_POST['titre']) && isset($_POST['descriptif'])) {
        $ticket = new Tickets();
        $ticket->newRecord($contactConnected->getCctcli(), $contactConnected->getCctid(), $_POST['demande'], $_POST['niveau'], $_POST['titre'], $_POST['descriptif']);

        // chemin vers le dossier de sauvegarde de fichiers.
        $uploadDirectory = '/assets/fichiers';
        // on appelle les fichiers qui on été envoyé jusqu'a un maximum de 6
        for ($i = 1; $i <= 6; $i++) {

            // filename me sert a modifier le format des nom et de présentation , je souhaite donc uniformiser tout cela(id sera un variable prenant l'id du ticket liée)
            $filename = 'fichier' . $i;

            if (isset($_FILES[$filename]) && $_FILES[$filename]['error'] === UPLOAD_ERR_OK) {
                // Vérifiez si le fichier a été correctement téléchargé
                $originalName = $_FILES[$filename]['name'];
                $targetFile = $uploadDirectory . $ticket->getTicid() . '_' . $i;

                // Déplace le fichier téléchargé vers  asses/fichiers .
                if (move_uploaded_file($_FILES[$filename]['tmp_name'], $targetFile)) {
                    __QUERY('INSERT INTO tickets_fichiers (tiftic , tifname , tiftype , tifsize)
                    VALUES (' . $ticket->getTicid() . ' "' . __STRING($_FILES[$filename]['name']) . '","' . __STRING($_FILES[$filename]['type']) . '", ' . $_FILES[$filename]['size'] . ')');

                } else {
                    $application->addToast('danger', 'Envoie de fichiers', 'Un ou plusieurs de vos fichiers n\'ont pas pu être enregistré.');
                }
            }
        }
    }
    header('location: index.php');
    exit;
}

if (isset($_POST['action']) && isset($userConnected)) {
    if ($_POST['action'] == 'prise-en-charge') {
        // Check if the ticket can be taken by the user
        $ticket = new Tickets();
        if ($ticket->loadFromId($_POST['ticket'])) {
            if ($ticket->getTicpec() == 0) {
                // Update the database with the user ID
                $ticket->priseEnCharge($userConnected->getUselogin(), $userConnected->getUseid());
                $application->addToast('success', 'Prise en charge', 'Vous avez bien pris en charge le ticket n°' . $ticket->getTicid());
            } else {
                $application->addToast('danger', 'Prise en charge', 'Le ticket n°' . $ticket->getTicid() . ' a déja été pris en charge par ' . $ticket->getTicpecus());
            }
        }

    }

    if ($_POST['action'] == 'annuler_Prise_EnCharge') {
        // Check if the ticket can be canceled
        $ticket = new Tickets();
        if ($ticket->loadFromId($_POST['ticket'])) {
            if ($ticket->getTicpec() == 1 && isset($userConnected) && $ticket->getTicpecuse() == $userConnected->getUseid()) {
                // Update the database with the user ID
                $ticket->nonPriseEnCharge($userConnected->getUselogin(), $userConnected->getUseid());
                $application->addToast('success', 'Annuler prise en charge', 'Prise en charge annuler le ticket n°' . $ticket->getTicid());;
            } else {
                $application->addToast('danger', 'Annuler prise en charge', 'Vous ne pouvez pas annuler le ticket n°' . $ticket->getTicid());            }
        }

    }
    
    header('location: index.php');
    exit;
}


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
                                            Tickets en cours
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

                                    <?php
                                    if (isset($userConnected)) {
                                        $result = __QUERY("SELECT ticid FROM tickets");

                                        if (__ROWS($result) > 0) { ?>
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
                                                            Client
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
                                                <tbody>
                                                    <?php
                                                    while ($row = __ARRAY($result)) {
                                                        $ticket = new Tickets($row['ticid']);
                                                        ?>

                                                        <tr>
                                                            <td class="text-center">
                                                                <?= $ticket->getBadgeType() ?>
                                                            </td>
                                                            <td class="font-weight-bold text-center">
                                                                <?= $ticket->getBagdeNiveau() ?>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div><a href="client.php?n=<?= $ticket->getTiccli() ?>">
                                                                        <?= $ticket->getClientNom() ?>
                                                                    </a></div>
                                                                <div class="text-muted">
                                                                    <?= $ticket->getContactNom() ?>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <?= $ticket->getTictitre() ?>
                                                            </td>
                                                            <td>
                                                                <?= nl2br($ticket->getTicdescriptif()); ?>
                                                            </td>

                                                            <td class="text-center">
                                                                <?php if ($ticket->getTicpec() != 1) { ?>
                                                                    <div>
                                                                        <form method="post"
                                                                            class="d-flex align-items-center justify-content-center g-3"
                                                                            onsubmit="return confirmAction();">
                                                                            <?= $ticket->getIconePEC() ?>
                                                                            <input type="hidden" name="action" value="prise-en-charge">
                                                                            <input type="hidden" name="ticket"
                                                                                value="<?= $ticket->getTicid() ?>">
                                                                            <button class="btn btn-sm shadow ms-2" type="submit">Prends
                                                                                le Ticket</button>
                                                                        </form>
                                                                    </div>
                                                                <?php } else { ?>
                                                                    <div class="d-flex align-items-center">
                                                                        <?= $ticket->getIconePEC() ?>
                                                                        <div>
                                                                        <p class="ml-2">Ticket pris par:
                                                                            <?= $ticket->getTicpecuse() ?>
                                                                        </p>
                                                                        <form method="post"
                                                                            class="d-flex align-items-center justify-content-center g-3"
                                                                            onsubmit="return unConfirmAction();">
                                                                            <input type="hidden" name="action" value="annuler_Prise_EnCharge">
                                                                            <input type="hidden" name="ticket"
                                                                                value="<?= $ticket->getTicid() ?>">
                                                                            <button class="btn btn-sm shadow ms-2" type="submit"><small><small><small>Annuler Prise EnCharge</small></small></small></button>
                                                                        </form>
                                                                        </div>
                                                                    </div>
                                                                <?php 
                                                                } 
                                                            ?>
                                                            </td>
                                                        </tr>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if (isset($contactConnected)) {
                                        $result = __QUERY('SELECT ticid FROM tickets WHERE ticcli = ' . $contactConnected->getCctid());

                                        if (__ROWS($result) > 0) { ?>
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
                                                <tbody>
                                                    <?php
                                                    while ($row = __ARRAY($result)) {
                                                        $ticket = new Tickets($row['ticid']);
                                                        ?>

                                                        <tr>
                                                            <td class="text-center">
                                                                <?= $ticket->getBadgeType() ?>
                                                            </td>
                                                            <td class="font-weight-bold text-center">
                                                                <?= $ticket->getBagdeNiveau() ?>
                                                            </td>
                                                            <td>
                                                                <?= $ticket->getTictitre() ?>
                                                            </td>
                                                            <td>
                                                                <?= nl2br($ticket->getTicdescriptif()); ?>
                                                            </td>

                                                            <td class="text-center">
                                                                <?= $ticket->getIconePEC() ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                            <?php
                                        }
                                    }
                                    ?>
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


                function confirmAction() {
                    return confirm("Etes-vous sûr de vouloir prendre le ticket ?");
                }

                function unConfirmAction() {
                    return confirm("Etes-vous sûr de vouloir annuler le ticket ?");
                }
                
                function prendreEnCharge(ticid) {

                    $.ajax({
                        type: 'POST',
                        url: 'tickets.php',
                        data: { action: 'prise-en-charge', ticid: ticid }
                    });
                }

                function annulerPriseEnCharge(ticid) {

                    $.ajax({
                        type: 'POST',
                        url: 'tickets.php',
                        data: { action: 'annuler_Prise_EnCharge', ticid: ticid }
                    });
                }



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
        </div>
    </div>
</body>
<!--end::Body-->

</html>