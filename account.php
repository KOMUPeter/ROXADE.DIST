<?php
include 'config/config.inc.php';
include 'config/login.inc.php';

$titrePage = "Tableau de bord client ";

error_reporting(E_ALL);

include('include/html.inc.php');
?>

<body id="kt_app_body" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true"
    data-kt-app-sidebar-fixed="false" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>var defaultThemeMode = "light"; var themeMode; if (document.documentElement) { if (document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if (localStorage.getItem("data-bs-theme") !== null) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
    <style>
        .votre-div {
            /* Styles pour votre div contenant l'image */
            display: inline-block;
            position: relative;
        }

        .image-container {
            position: relative;
            display: inline-block;
        }

        #image-hover {
            max-width: 100%;
            max-height: 100%;
            width: auto;
            height: auto;
            transition: opacity 0.3s;
        }

        #image-hover:hover {
            opacity: 0.7;
        }

        #change-image {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            transition: opacity 0.3s;
        }

        #change-image:hover {
            opacity: 0.5;
        }
    </style>
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

                    <!--begin::Main-->


                    <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
                        <!--begin::Content wrapper-->
                        <div class="d-flex flex-column flex-column-fluid">

                            <!--begin::Toolbar-->
                            <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

                                <!--begin::Toolbar container-->
                                <div id="kt_app_toolbar_container"
                                    class="app-container  container-fluid d-flex flex-stack ">


                                    <!--begin::Content-->
                                    <div id="kt_app_content" class="app-content  flex-column-fluid ">

                                        <div class="container mt-4">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <!-- Menu de navigation du compte -->
                                                    <div class="list-group" id="demandeSelect">
                                                        <a href="#"
                                                            class="list-group-item list-group-item-action active"
                                                            data-value="tableau">Tableau de bord</a>
                                                        <a href="#" class="list-group-item list-group-item-action"
                                                            data-value="profile">Profile</a>
                                                        <a href="#" class="list-group-item list-group-item-action"
                                                            data-value="tickets">Vos derniers tickets</a>
                                                        <a href="#" class="list-group-item list-group-item-action"
                                                            data-value="informations">Informations de compte</a>
                                                        <a href="#" class="list-group-item list-group-item-action"
                                                            data-value="contacter">Nous contacter</a>
                                                        <a href="logout.php"
                                                            class="list-group-item list-group-item-action"
                                                            data-value="deconnexion">Déconnexion</a>
                                                    </div>

                                                </div>


                                                <div class="col-md-9 tableau show  votre-div">
                                                    <!-- Contenu principal du compte -->
                                                    <h1>Tableau de bord</h1>
                                                    <p>Bienvenue sur votre compte client.</p>
                                                    <div class="image-container">
                                                        <img id="image-hover" src="assets/media/avatars/300-30.jpg"
                                                            class="img-fluid rounded-circle" alt="Votre image de profil"
                                                            width="300" height="300">

                                                        <a id="change-image" href="#" style="display: none">Changez
                                                            l'image</a>
                                                    </div>
                                                </div>

                                                <div class="col-md-9 profile">
                                                    <h1>Profile</h1>
                                                    <!-- Contenu du profil -->

                                                    <!-- ... -->
                                                </div>
                                                <?php
                                                if (isset($clientConnected)) {
                                                    ?>
                                                    <div class="col-md-9 tickets">
                                                        <!-- Contenu principal du compte -->
                                                        <h1>Votre tickets poster</h1>
                                                        <?php
                                                        if (isset($clientConnected)) {
                                                            $result = __QUERY('SELECT ticid FROM tickets WHERE ticcli = ' . $clientConnected->getTiccli());

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

                                                    <div class="col-md-9 informations">
                                                        <!-- Contenu des informations de compte -->
                                                        <h1>Informations de compte</h1>
                                                        <!-- ... -->
                                                    </div>
                                                    <div class="col-md-9 contacter">
                                                        <!-- Contenu de la page de contact -->
                                                        <H1>Nous contacter</H1>

                                                        <form>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">Email
                                                                    address</label>
                                                                <input type="email" class="form-control"
                                                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                                                                <div id="emailHelp" class="form-text">We'll never share your
                                                                    email with anyone else.</div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputPassword1"
                                                                    class="form-label">Password</label>
                                                                <input type="password" class="form-control"
                                                                    id="exampleInputPassword1">
                                                            </div>
                                                            <div class="mb-3 form-check">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="exampleCheck1">
                                                                <label class="form-check-label" for="exampleCheck1">Check me
                                                                    out</label>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <?php
                                                }
                                                ?>


                                            <!--begin::Javascript-->
                                            <?php include('include/javascript.inc.php') ?>



                                            <script>
                                                $(document).ready(function () {
                                                    $('.tableau, .profile, .tickets, .informations, .contacter').hide();

                                                    $('.list-group-item').click(function () {
                                                        var demande = $(this).data('value');

                                                        $('.tableau, .profile, .tickets, .informations, .contacter').hide();

                                                        $('.' + demande).show();

                                                        if (demande === 'tableau') {
                                                            $('select[name="niveau"]').prop('required', false);
                                                        } else {
                                                            $('select[name="niveau"]').prop('required', true);
                                                        }
                                                    });
                                                });
                                            </script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const imageHover = document.getElementById("image-hover");
        const changeImageLink = document.getElementById("change-image");

        imageHover.addEventListener("mouseover", function () {
            changeImageLink.style.display = "block";
        });

        imageHover.addEventListener("mouseout", function () {
            changeImageLink.style.display = "none";
        });

        changeImageLink.addEventListener("click", function (e) {
            e.preventDefault();
            const fileInput = document.createElement("input");
            fileInput.type = "file";
            fileInput.accept = "image/*";

            fileInput.addEventListener("change", function () {
                const file = fileInput.files[0];

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        imageHover.src = e.target.result;
                        imageHover.style.width = "300px"; // Ajustez la largeur à 300px
                        imageHover.style.height = "300px"; // Ajustez la hauteur à 300px
                    };
                    reader.readAsDataURL(file);
                }
            });

            fileInput.click();
        });
    });
</script>




                                            <!--end::Javascript-->

</body>

</html>