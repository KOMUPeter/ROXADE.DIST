<?php

require_once('config/config.inc.php');
require_once('config/login.inc.php');


error_reporting(E_ALL);
ini_set('display_errors', 1);


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$titrePage = "Définition des utilisateurs";

//conditions :

if (isset($_GET)) {

    if (isset($_GET['action'])) {

        //  modification de MDP

        if ($_GET['action'] == "password" && isset($_GET['n'])) {
            $user = new User();
            if ($user->LoadFromID($_GET['n'])) {
                $newPassword = $user->changePassword();

                $HTML = "<html><body><div>Support Roxade bonjour.</div><div>Votre nouveau mot de passe est : $newPassword</div></body></html>";
                $TEXT = "Support Roxade bonjour,\n\nVotre nouveau mot de passe est : " . $newPassword;
                $mail = new PHPMailer();
                $mail->From = "support@roxade.fr";
                $mail->FromName = "ROXADE";
                $mail->IsSMTP();
                $mail->Host = "mail.gandi.net";
                $mail->Port = 587;
                $mail->SMTPAuth = true;
                $mail->Username = "support@roxade.fr";
                $mail->Password = "E*9hwvkPT7b7M4%yE";
                $mail->Subject = mb_encode_mimeheader("Support ROXADE - Votre nouveau mot de passe");
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
                $mail->Send();

                if ($newPassword !== false) {
                    echo "Nouveau mot de passe généré : " . $newPassword;
                } else {
                    echo "Échec de la modification du mot de passe.";
                }
            }
        }
            // supression user

            if ($_GET['action'] == "delete" && isset($_GET['n'])) {
                $user = new User();
                if ($user->LoadFromID($_GET['n'])) {
                    if ($user->getUseid() != $userConnected->getUseid())
                        $user->deleteUser();
                }
            }
            header('Location: ' . basename($_SERVER['PHP_SELF']));
            exit;
       

    }
}

//Création du User

if (isset($_POST)) {
    if (isset($_POST['action'])) {
        // ajout utilisateur
        if ($_POST['action'] == "add") {
            $login = isset($_POST['login']) ? $_POST['login'] : '';
            $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
    
            // Vérifiez si l'utilisateur existe déjà
            if (!__FETCH("SELECT uselogin FROM users WHERE uselogin = '" . __STRING($login) . "'")) {
                $user = new User();
                $user->newRecord($login, $nom);
                $nouveauMotDePasse = $user->changePassword();
                //vérification admin
                $useadmin = isset($_POST['admin']) ? 1 : 0;
                $user->updateAdminStatus($useadmin);

                $HTML = "<html><body><div>Support Roxade bonjour.</div><div>Votre nouveau mot de passe est : $nouveauMotDePasse</div></body></html>";
                $TEXT = "Support Roxade bonjour,\n\nVotre nouveau mot de passe est : " . $nouveauMotDePasse;
                $mail = new PHPMailer();
                $mail->From = "support@roxade.fr";
                $mail->FromName = "ROXADE";
                $mail->IsSMTP();
                $mail->Host = "mail.gandi.net";
                $mail->Port = 587;
                $mail->SMTPAuth = true;
                $mail->Username = "support@roxade.fr";
                $mail->Password = "E*9hwvkPT7b7M4%yE";
                $mail->Subject = mb_encode_mimeheader("Support ROXADE - Votre nouveau mot de passe");
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
                $mail->Send();

                // $mail->addAddress('antoine020999@gmail.com'); // adresse du destinataire ici
                // $mail->addAddress($user->getUselogin());
                    if ($mail->Send()) {
                        echo "L'e-mail a été envoyé avec succès.";
                    } else {
                        echo "Échec de l'envoi de l'e-mail : " . $mail->ErrorInfo;
                    }
                
            } else {
                echo "Un utilisateur avec le même login existe déjà.";
            }
        }
            
            
        

        //edition utilisateur

        if ($_POST['action'] == 'edit' && isset($_POST['id']) && is_numeric($_POST['id']) && isset($_POST['login']) && isset($_POST['nom'])) {
            $userId = intval($_POST['id']);
            $newLogin = $_POST['login'];
            $newName = $_POST['nom'];
        
            $user = new User();
            if ($user->LoadFromID($userId)) {
                $user->updateEmail($newLogin);
                $user->updateName($newName);
        
                // Redirigez l'utilisateur après la mise à jour
                header('Location: defuse.php');
                exit;
            }
        }
        

    }
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
                                            Définition des utilisateurs
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
                                        <a href="defuse-add.php?n=new" class="btn btn-sm fw-bold btn-primary">
                                            <i class="fa fa-plus-circle"></i> Nouvel utilisateur</a>
                                        <!--end::Primary button-->
                                    </div>
                                    <!--end::Actions-->


                                </div>
                                <!--end::Toolbar container-->
                            </div>
                            <!--end::Toolbar-->

                            <!--begin::Content-->
                            <div id="kt_app_content" class="app-content  flex-column-fluid ">


                                <!-- AFFICHAGE DES USERS  -->
                                <!--begin::Content container-->
                                <div id="kt_app_content_container" class="app-container  container-fluid ">
                                    <?php $result = __QUERY("SELECT * FROM users");

                                    if (__ROWS($result) > 0) { ?>
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">
                                                        Actif
                                                    </th>
                                                    <th class="text-center">
                                                        Admin
                                                    </th>
                                                    <th>
                                                        Login
                                                    </th>

                                                    <th>
                                                        Nom
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
                                                                class="form-check form-switch form-switch-sm form-check-custom form-check-solid justify-content-center">
                                                                <!--begin::Input-->
                                                                <input class="form-check-input toggle-actif "
                                                                    data-id="<?= $row['useid'] ?>" type="checkbox"
                                                                    value="1" id="kt_modal_connected_accounts_google" <?php
                                                                    if ($row['useactive'] == 1) { ?> checked="checked">
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

                                                        <td class="text-center">
                                                            <label
                                                                class="form-check form-switch form-switch-sm form-check-custom form-check-solid justify-content-center">

                                                                <!--begin::Input-->
                                                                 <input class="form-check-input toggle-admin"
                                                                    data-id="<?= $row['useid'] ?>" type="checkbox"
                                                                    value="1" id="kt_modal_connected_accounts_google" <?php
                                                                    if ($row['useadmin'] == 1) { ?> checked="checked">
                                                                <?php
                                                                    }
                                                                    ?>
                                                                <span class="form-check-label fw-semibold text-muted"
                                                                    for="kt_modal_connected_accounts_google"></span>
                                                                <!--end::Label-->
                                                            </label>
                                                        </td>
                                                            
                                                        <td><a  href="defuse-add.php?id=<?= $row['useid'] ?>&n=edit">
                                                                <?= $row['uselogin'] ?>
                                                            </a></td>
                                                            
                                                        <td><a href="defuse-add.php?id=<?= $row['useid'] ?>&n=edit">
                                                                <?= $row['usenom'] ?>
                                                            </a></td>

                                                        

                                                        <td class="text-center">
                                                            <div class="text-nowrap">
                                                                <a
                                                                    href="javascript:confirmGeneratePassword(<?= $row['useid'] ?>);"><i
                                                                        class="fa fa-key text-warning"></i></a>
                                                                <a href="javascript:confirmDeleteUser(<?= $row['useid'] ?>);"><i
                                                                        class="fa fa-trash-alt text-danger"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php
                                    } ?>
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

            $(document).ready(function () {
                $('.toggle-actif').click(function () {
                    $.ajax({
                        url: './defuse-switch.php?f=active&n=' + $(this).data('id') + '&c=' + $(this).is(':checked')
                    });
                });

                $('.toggle-admin').click(function () {
                    $.ajax({
                        url: './defuse-switch.php?f=admin&n=' + $(this).data('id') + '&c=' + $(this).is(':checked')
                    });
                });
            });

            function confirmGeneratePassword(n) {
                Swal.fire({
                    title: "Confirmation",
                    text: "Confirmez-vous la génération d'un nouveau mot de passe pour cet utilisateur ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui',
                    cancelButtonText: 'Non'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'defuse.php?action=password&n=' + n
                    }
                    console.log('confirm generate password');
                });
            }

            function confirmDeleteUser(n) {
                Swal.fire({
                    title: "Confirmation",
                    text: "Confirmez-vous la suppression de cet utilisateur ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui',
                    cancelButtonText: 'Non'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'defuse.php?action=delete&n=' + n
                    }
                    console.log('confirm generate password');
                });
            }

        </script>
        <!--end::Javascript-->

</body>
<!--end::Body-->

</html>
