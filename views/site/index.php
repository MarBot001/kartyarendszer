<?php

/** @var yii\web\View $this */

$this->title = 'Kártya nyilvántartó rendszer';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Kártya nyilvántartó rendszer</h1>
        <p class="lead">Cégnév Kft.</p>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-6 mb-2">
                <h3>Összes kiadott kedvezménykártya:</h3>
                <h4><?= $totalCards ?> db</h4>
            </div>
            <div class="col-lg-6 mb-1">
            <h3>Képzési szintenként kiadott kártyák:</h3>
            <ul>
                <?php foreach ($cardCounts as $kepzesSzint => $count): ?>
                    <li><?= ucfirst($kepzesSzint) ?>: <?= $count ?> db</li>
                <?php endforeach; ?>
            </ul>
        </div>

    </div>
</div>
