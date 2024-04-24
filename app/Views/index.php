<?php echo $this->extend("/template/layout"); ?>

<?php echo $this->section("content"); ?>
<div>
    <p>Bienvenido <?= session("user")["full_name"] ?></p>
</div>

<?php echo $this->endSection();
