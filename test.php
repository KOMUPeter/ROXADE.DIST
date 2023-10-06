<?php

 $(document).ready(function () {
    $('.form-check-input').click(function () {
        // get users id
        var userId = $(this).data('id');
        
        // get state button
        var isActive = $(this).is(':checked') ? 1 : 0;
        
        // perfom ajax action
        $.ajax({
            url: './defcli-actif.php?n=' + userId + '&c=' + isActive,
            success: function (response) {
                console.log('Mise à jour réussie.');
            },
            error: function () {
                console.log('Erreur lors de la mise à jour.');
            }
        });
    });
});


<?php
randomToken();
addToken();
$n = isset($_GET['n']) ? $_GET['n'] : '';
?>
<input type="hidden" name="action"
    value="<?= $n === "new" ? "add" : ($n === "edit" ? "edit" : "") ?>">
<input type="hidden" name="id"
    value="<?= isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : "0" ?>">

                                    <?php
                                        randomToken();
                                        addToken();
                                    ?>
                                        <input type="hidden" name="action"
                                            value = "<?= $_GET['n'] ?>" >

                                        <input type="hidden" name="id"
                                            value="<?= $_GET['id']  ?>">