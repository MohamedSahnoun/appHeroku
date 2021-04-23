<?php
include_once 'fragments/header.php';
include_once 'autoload.php';
$historyRepository = new HistoryRepository();
$personnes = $historyRepository->findAll();

?>

<table class="table">
    <tr>
        <th>ByWho</th>
        <th>Date</th>
        <th>Type</th>
        <th>Modification</th>

    </tr>
    <?php foreach ($personnes as $personne) {

        ?>
        <tr>
            <td ><?= $personne->bywho?></td>
            <td><?= $personne->date ?></td>
            <td><?= $personne->type ?></td>
            <td> <?= $personne->modification ?></td>







        </tr>
        <?php

    }
    ?>
