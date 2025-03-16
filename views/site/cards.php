<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Kártyák';
?>
<div class="cards-table">
    <h1 class="main-title">Kártyák</h1>
    <table>
        <tr>
            <th>Neptun</th>
            <th>Teljes név</th>
            <th class="hide">Matrica</th>
            <th class="hide">Kiadás időpontja</th>
            <th style="text-align: center;">Kezelés</th>
            <th style="text-align: center;">Törlés</th>
        </tr>
        <?php foreach ($cards as $card) : ?>
            <tr>
                <td><?= $card->neptun ?></td>
                <td><?= $card->teljes_nev ?></td>
                <td class="hide"><?= $card->matrica ?></td>
                <td class="hide"><?= $card->kiadas_idopontja ?></td>
                <td style="text-align: center;">
                    <?= Html::a('<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#0d6efd" class="bi bi-arrow-up-right-circle-fill" viewBox="0 0 16 16">
                    <path d="M0 8a8 8 0 1 0 16 0A8 8 0 0 0 0 8m5.904 2.803a.5.5 0 1 1-.707-.707L9.293 6H6.525a.5.5 0 1 1 0-1H10.5a.5.5 0 0 1 .5.5v3.975a.5.5 0 0 1-1 0V6.707z"/>
                    </svg>', ['view-card', 'id' => $card->id], ['class' => 'btn btn-link']) ?>
                </td>
                <td style="text-align: center;">
                    <?= Html::beginForm(['site/cards'], 'post') ?>
                    <?= Html::hiddenInput('delete_id', $card->id) ?>
                    <?= Html::submitButton('<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="red" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                    </svg>', ['class' => 'btn btn-link', 'onclick' => 'return confirm("Biztosan törölni szeretné ezt a kártyát?")']) ?>
                    <?= Html::endForm() ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>