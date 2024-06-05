<?php echo $this->extend("/template/layout"); ?>
<?php echo $this->section("css"); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<?php echo $this->endSection(); ?>
<?php echo $this->section("content") ?>

<select name="" id="selectSample">
    <?php foreach ($sample as $samples) { ?>
        <option value="<?=$samples["id_sample"]?>" ><?=$samples["name"]?></option>

        <?php }?>
</select>

<select name="" id="selectProject">
    <?php foreach ($project as $projects) { ?>
        <option value="<?=$projects["id_project"]?>" >
        <?=$projects["codigo"]?> - <?=$projects["name"]?>
        </option>

        <?php }?>
</select>


<div class="container mt-5">
        <div id="input-container" class="row">
            <input type="text" id="divInput" >
        </div>
        
    </div>
<button id="btnSaveSample">Enviar</button>
<?php echo $this->endSection(); ?>
<?php echo $this->section("Scripts") ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="js/samples/createSample.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<?php echo $this->endSection(); ?>