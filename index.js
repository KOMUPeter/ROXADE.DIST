$.ajax({
    url: './defuse-switch.php?f=active&n=' + $(this).data('id') + '&c=' + $(this).is(':checked')
});


// 
async function afficherFilms() {
    const reponse = await fetch('./defuse-switch.php?f=active&n=' + this.dataset.id + '&c=' + $(this).is(':checked'));
    const films = await reponse.json();
    console.log(films);
}

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.toggle-actif').forEach(function (element) {
        element.addEventListener('click', function () {
            fetch('./defuse-switch.php?f=active&n=' + element.getAttribute('data-id') + '&c=' + element.checked, {
                method: 'GET'
            });
        });
    });

    document.querySelectorAll('.toggle-admin').forEach(function (element) {
        element.addEventListener('click', function () {
            fetch('./defuse-switch.php?f=admin&n=' + element.getAttribute('data-id') + '&c=' + element.checked, {
                method: 'GET'
            });
        });
    });
});