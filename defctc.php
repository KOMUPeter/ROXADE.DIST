<?php
include 'config/config.inc.php';
include 'config/login.inc.php';

$titrePage = "Liste des contacts";

include('include/html.inc.php')
    ?>

<body id="kt_app_body" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true"
    data-kt-app-sidebar-fixed="false" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            <?php include('include/header.inc.php') ?>
            <!--end::Header-->
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <select class="form-select" aria-label="Sélectionnez le client">
                            <option value="" selected>Sélectionner le client</option>
                            <?php
                            $result = __QUERY("SELECT clinom FROM clients");
                            // Vérifiez si des données ont été trouvées
                            if (__ROWS($result) > 0) {
                                while ($row = __ARRAY($result)) {
                                    // Utilisez chaque valeur clinom pour créer une option
                                    $clinom = $row['clinom'];
                                    $cliid = $row['cliid'];
                                    echo "<option value='$clinom'>$clinom</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php $result = __QUERY("SELECT * FROM clients_contacts WHERE cctcli = .'$cliid'. ");
                        // Vérifiez si des données ont été trouvées
                        if (__ROWS($result) > 0) { ?>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">Actif</th>
                                        <th>Civilité</th>
                                        <th>Prénom</th>
                                        <th>Nom</th>
                                        <th>Fixe</th>
                                        <th>Portable</th>
                                        <th>Email</th>
                                        <th>Supprimer</th>
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
                                                    <input class="form-check-input " data-id="<?= $row['cctid'] ?>" type="checkbox"
                                                        <?php if ($row['cctactive'] == 1) { ?> checked="checked" <?php } ?>>
                                                    <span class="form-check-label fw-semibold text-muted"
                                                        for="kt_modal_connected_accounts_google"></span>
                                                </label>
                                            </td>
                                            <td><a href="defctc-add.php?id=<?= $row['cctid'] ?>&n=edit"><?= $row['cctcivilite'] ?></a></td>
                                            <td><a href="defctc-add.php?id=<?= $row['cctid'] ?>&n=edit"><?= $row['cctprenom'] ?></a></td>
                                            <td><a href="defctc-add.php?id=<?= $row['cctid'] ?>&n=edit"><?= $row['cctnom'] ?></a></td>
                                            <td><a href="defctc-add.php?id=<?= $row['cctid'] ?>&n=edit"><?= $row['cctfixe'] ?></a></td>
                                            <td><a href="defctc-add.php?id=<?= $row['cctid'] ?>&n=edit"><?= $row['cctportable'] ?></a></td>
                                            <td><a href="defctc-add.php?id=<?= $row['cctid'] ?>&n=edit"><?= $row['cctemail'] ?></a></td>
                                            <td class="text-center">
                                                <div class="text-nowrap">
                                                    <a href="javascript:confirmDeleteClient(<?= $row['cctid'] ?>);"><i
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
                </div>
            </div>
        </div>
    </div>
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
    </script>
    <!--end::Javascript-->
</body>