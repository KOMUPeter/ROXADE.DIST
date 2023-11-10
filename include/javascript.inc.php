<!--begin::Javascript-->
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="assets/js/widgets.bundle.js"></script>
<script src="assets/js/custom/widgets.js"></script>
<script src="assets/js/custom/apps/chat/chat.js"></script>
<script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="assets/js/custom/utilities/modals/create-app.js"></script>
<script src="assets/js/custom/utilities/modals/create-project/type.js"></script>
<script src="assets/js/custom/utilities/modals/create-project/budget.js"></script>
<script src="assets/js/custom/utilities/modals/create-project/settings.js"></script>
<script src="assets/js/custom/utilities/modals/create-project/team.js"></script>
<script src="assets/js/custom/utilities/modals/create-project/targets.js"></script>
<script src="assets/js/custom/utilities/modals/create-project/files.js"></script>
<script src="assets/js/custom/utilities/modals/create-project/complete.js"></script>
<script src="assets/js/custom/utilities/modals/create-project/main.js"></script>
<script src="assets/js/custom/utilities/modals/users-search.js"></script>

<!-- Include SweetAlert script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

<!--end::Custom Javascript-->
<!--end::Javascript-->

<?php
if (isset($_SESSION['toasts'])) {
	if (is_array($_SESSION['toasts'])) {
		foreach ($_SESSION['toasts'] as $toast) {
			?>
			<!-- mettre ici un div -->

			<div class=" position-fixed top-0 end-0 p-3  toast show"  style="z-index: 11" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="5000">
				<div class="toast-header bg-<?= $toast['type'] ?> d-flex justify-content-between">
					<h5 class="mr-auto text-light ">
						<?= $toast['titre'] ?>
					</h5>
					<button type="button" class="btn-close custom-close" data-bs-dismiss="toast" aria-label="Fermer"></button>

						<!-- <span aria-hidden="true">&times;</span> -->
					</button>
				</div>
				<div class="toast-body">
					<?= $toast['message'] ?>
				</div>
			</div>
			
			<?php
		}
	}
}
$_SESSION['toasts'] = array();
?>

<script type="text/javascript">
	$(document).ready(function () {
		$('.toast').toast();
		console.log('domready toasts');
	})
</script>


<script>
window.addEventListener('load', () => {
    // Récupérez la valeur stockée dans le stockage local
    const storedMode = localStorage.getItem('themeMode');

    if (storedMode !== null) {
        currentMode = parseInt(storedMode);
    } else {
        currentMode = 0; // Utilisez une valeur par défaut si aucune valeur n'est stockée
    }

    // Appliquez le mode en fonction de la valeur récupérée
    const userImage = document.getElementById('user-image');
    const contactImage = document.getElementById('contact-image'); // Ajoutez cette ligne pour sélectionner l'image de contact

    if (currentMode === 0) {
        userImage.src = '../assets/media/avatars/icon-user.png';
        contactImage.src = '../assets/media/avatars/icon-user.png';
    } else if (currentMode === 1) {
        userImage.src = '../assets/media/avatars/white-icon-user.png';
        contactImage.src = '../assets/media/avatars/white-icon-user.png';
    }
}); 

// Sélectionnez les boutons de bascule de mode et l'image de l'utilisateur
const lightModeButton = document.getElementById('light-mode');
const darkModeButton = document.getElementById('dark-mode');
const systemModeButton = document.getElementById('system-mode');
const userImage = document.getElementById('user-image');
const contactImage = document.getElementById('contact-image'); // Ajoutez cette ligne pour sélectionner l'image de contact

// Gardez une trace du mode actuel (0 pour lumineux, 1 pour sombre, 2 pour système)
let currentMode = 0;

lightModeButton.addEventListener('click', () => {
    currentMode = 0;
    userImage.src = '../assets/media/avatars/icon-user.png';
    contactImage.src = '../assets/media/avatars/icon-user.png';
    // Stockez la valeur actuelle dans le stockage local
    localStorage.setItem('themeMode', currentMode);
});

darkModeButton.addEventListener('click', () => {
    currentMode = 1;
    userImage.src = '../assets/media/avatars/white-icon-user.png';
    contactImage.src = '../assets/media/avatars/white-icon-user.png';
    localStorage.setItem('themeMode', currentMode);
});

systemModeButton.addEventListener('click', () => {
    currentMode = 2;
});

</script>

