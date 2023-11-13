$.ajax({
    url: './defuse-switch.php?f=active&n=' + $(this).data('id') + '&c=' + $(this).is(':checked')
});


// 
async function afficherFilms() {
    // Assuming 'this' refers to an expected element in the context of an event listener or a known element
    const id = this.dataset.id;
    const isChecked = $(this).is(':checked');
    
    try {
        const response = await fetch(`./defuse-switch.php?f=active&n=${id}&c=${isChecked}`);
        if (response.ok) {
            const films = await response.json();
            console.log(films);
        } else {
            throw new Error('Network response was not ok.');
        }
    } catch (error) {
        console.error('Error fetching or parsing data:', error);
    }
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