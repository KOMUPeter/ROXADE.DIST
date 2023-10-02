<?php

require_once ('config/config.inc.php');
require_once ('config/login.inc.php');


error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$titrePage = "Définition des clients";


/*
if (isset($_GET['action'])) {
    if ($_GET['action'] == "password" && isset($_GET['n'])) {
        $user = new User();
        if ($user->LoadFromID($_GET['n'])) {
            $newPassword = $user->changePassword();
            if ($newPassword !== false) {
                echo "Nouveau mot de passe généré : " . $newPassword;
            } else {
                echo "Échec de la modification du mot de passe.";
            }
        }
    }
    if ($_GET['action'] == "delete" && isset($_GET['n'])) {
        $user = new User();
        if ($user->LoadFromID($_GET['n'])) {
            if ($user->getUseid() != $userConnected->getUseid()) $user->deleteUser();
        }
    }

    header('Location: ' . basename($_SERVER['PHP_SELF']));
    exit;
}

if(isset($_POST['action'])){
    $user = new User();

    print_r($_POST);
    if($_POST['action'] == 'add'){
        $login = isset($_POST['login']) ;

        if (!__FETCH("SELECT uselogin FROM users WHERE uselogin = '" . __STRING($login) . "'")) {
            $user->newRecord($_POST['login'] , $_POST['nom'] );
            // Ajouter les zones useactive & useadmin
            $nouveauMotDePasse = $user->changePassword();

            $HTML = "<html><body><div>Support Roxade bonjour.</div></body>";
            $TEXT = "Votre nouveau mot de passe est : " . $nouveauMotDePasse;
            $mail = new PHPMailer();
            $mail->From = "support@roxade.fr";
            $mail->FromName = "ROXADE";
            $mail->IsSMTP();
            $mail->Host = SMTP_HOST;
            $mail->Port = SMTP_PORT;
            $mail->SMTPAuth = true;
            $mail->Username = SMTP_LOGIN;
            $mail->Password = SMTP_PASSWORD;
            $mail->Subject = mb_encode_mimeheader("Votre mot de passe Roxade");
            $mail->Body = $HTML;
            $mail->AltBody = $TEXT;
            $mail->IsHTML(true);
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mail->addAddress($user->getUselogin());
            if ($mail->Send()) {

                // Prévoir envoi email via phpmailer
                return ($password);
            } else {
                return false; //echec de l'envoie

            }



        } else {
            // echo "Un utilisateur avec le même login existe déjà.";
        }

    }
    if($_POST['action'] == 'edit'){
        if ($user->LoadFromLogin($_POST['login'])) {
            $user->setUsenom($_POST['nom']);

        }
    }
    exit;
}
*/

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
                            <div id="kt_app_toolbar_container" class="app-container  container-fluid d-flex flex-stack ">

                                <!--begin::Page title-->
                                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                                    <!--begin::Title-->
                                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                        Définition des clients
                                    </h1>
                                    <!--end::Title-->


                                    <!--begin::Breadcrumb-->
                                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">
                                            <a href="/index.php" class="text-muted text-hover-primary">
                                                Accueil                            </a>
                                        </li>
                                        <!--end::Item-->

                                    </ul>
                                    <!--end::Breadcrumb-->
                                </div>
                                <!--end::Page title-->
                                <!--begin::Actions-->
                                <div class="d-flex align-items-center gap-2 gap-lg-3">

                                    <!--begin::Primary button-->
                                    <a href="defcli-add.php?n=new" class="btn btn-sm fw-bold btn-primary">
                                        <i class="fa fa-plus-circle"></i> Nouveau client</a>
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
                                <?php $result = __QUERY("SELECT * FROM clients");

                                // Vérifiez si des données ont été trouvées
                                if (__ROWS($result) > 0) { ?>
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th class="text-center">
                                                Actif
                                            </th>
                                            <th>
                                                Nom
                                            </th>
                                            <th>
                                                Code postal / Ville
                                            </th>
                                            <th>
                                                Contacts
                                            </th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        // Boucle foreach pour parcourir les données
                                        while ($row = __ARRAY($result)) {
                                            ?>
                                            <tr>
                                                <td class="text-center">
                                                    <label
                                                        class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                        <!--begin::Input-->
                                                        <input class="form-check-input" name="google" type="checkbox"
                                                               value="1" id="kt_modal_connected_accounts_google"
                                                            <?php
                                                            if($row['clieactive'] == 1 ){ ?>

                                                               checked="checked">
                                                        <?php
                                                        }
                                                        ?>

                                                        <!--end::Input-->

                                                        <!--begin::Label-->
                                                        <span class="form-check-label fw-semibold text-muted"
                                                              for="kt_modal_connected_accounts_google"></span>
                                                        <!--end::Label-->
                                                    </label>
                                                </td>

                                                <td><a href="defcli-add.php?n=<?= $row['cliid'] ?>">  <?= $row['clinom'] ?> </a></td>
                                                <td><a href="defcli-add.php?n=<?= $row['cliid'] ?>">  <?= $row['clicp']." ".$row['cliville'] ?> </a></td>

                                                <td>
                                                    <?php
                                                    /*
                                                     * Afficher ici le ou les contacts rattachés au client et un lien vers defcli-ctc.php?n=[id-contact] pour l'édition
                                                     */
                                                    ?>
                                                    <a href="defctc-add.php?c=<?= $row['cliid'] ?>&n=new">  ajouter un contact </a>
                                                </td>
                                                <td class="text-center">
                                                    <div class="text-nowrap">
                                                        <a href="javascript:confirmDeleteClient(<?= $row['cliid'] ?>);"><i
                                                                class="fa fa-trash-alt text-danger"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                    <?php
                                }  ?>
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

    <script type="text/javascript">

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
                    window.location='defcli.php?action=delete&n='+n
                }
            });
        }
    </script>
    <!--end::Javascript-->

</body>
<!--end::Body-->

</html>


