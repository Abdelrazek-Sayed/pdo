<?php if ($session->has('errors')) { ?>
    <div class="alert alert-danger">
        <?php foreach ($session->get('errors') as $error) { ?>
            <p><?= $error; ?></p>
        <?php }
        $session->remove('errors'); ?>
    </div>
<?php } ?>



<?php if ($session->has('success')) { ?>
    <div class=" alert alert-success">
        <?= $session->get('success'); ?>
    </div>
<?php }
$session->remove('success'); ?>


<?php if ($session->has('loginError')) { ?>
    <div class=" alert alert-success">
        <?= $session->get('loginError'); ?>
    </div>
<?php }
$session->remove('loginError'); ?>