<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'Új kártya regisztrálása';



?>

<div class="card-form">
    <h1 class="main-title">Új kártya regisztrálása</h1>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'teljes_nev')->textInput(['class' => 'form-control'])->label('Teljes név') ?>

    <?= $form->field($model, 'szul_hely')->textInput(['class' => 'form-control'])->label('Születési hely') ?>

    <?= $form->field($model, 'szul_ido')->input('date', ['class' => 'form-control'])->label('Születési idő') ?>

    <?= $form->field($model, 'neptun')->textInput(['class' => 'form-control'])->label('Neptun') ?>

    <?= $form->field($model, 'email')->textInput(['class' => 'form-control'])->label('Email cím') ?>

    <?= $form->field($model, 'diakigazolvany')->textInput(['class' => 'form-control', 'placeholder' => 'Azonosító szám: 01234567891 (11 számjegy)'])->label('Diákigazolvány szám') ?>

    <?= $form->field($model, 'evfolyam')->textInput(['class' => 'form-control'])->label('Évfolyam') ?>

    <?= $form->field($model, 'kepzes_szint')->dropDownList([
        'bsc' => 'Alapképzés (Bsc/BA)',
        'foszk' => 'Felsőoktatási szakképzés (FOSZK)',
        'tanari' => 'Osztatlan mesterképzés (tanári)',
        'msc' => 'Mesterképzés (Msc/MA)'
    ], ['class' => 'form-control'])->label('Képzési szint') ?>

    <?= $form->field($model, 'kepzes_munkarend')->dropDownList([
        'NAP' => 'Nappali',
        'LEV' => 'Levelező',
        'EST' => 'Esti',
        'TAV' => 'Távoktatás'
    ], ['class' => 'form-control'])->label('Képzési munkarend') ?>

    <?= $form->field($model, 'szak')->input('text', ['list' => 'datalistOptions', 'class' => 'form-control'])->label('Szak') ?>
    <datalist id="datalistOptions">
        <option value="Mezőgazdasági és élelmiszeripari gépészmérnöki">Mezőgazdasági és élelmiszeripari gépészmérnöki</option>
        <option value="Mezőgazdasági mérnöki">Mezőgazdasági mérnöki</option>
        <option value="Anglisztika">Anglisztika</option>
        <option value="Közösségszervezés">Közösségszervezés</option>
        <option value="Szlavisztika">Szlavisztika</option>
        <option value="Gazdálkodási és menedzsment">Gazdálkodási és menedzsment</option>
        <option value="Turizmus-vendéglátás">Turizmus-vendéglátás</option>
        <option value="Mérnökinformatikus">Mérnökinformatikus</option>
        <option value="Programtervező informatikus">Programtervező informatikus</option>
        <option value="Gépészmérnöki">Gépészmérnöki</option>
        <option value="Járműmérnöki">Járműmérnöki</option>
        <option value="Repülőmérnöki">Repülőmérnöki</option>
        <option value="Közlekedésmérnöki">Közlekedésmérnöki</option>
        <option value="Képi ábrázolás">Képi ábrázolás</option>
        <option value="Csecsemő- és kisgyermeknevelő">Csecsemő- és kisgyermeknevelő</option>
        <option value="Óvodapedagógus">Óvodapedagógus</option>
        <option value="Tanító">Tanító</option>
        <option value="Sportszervezés">Sportszervezés</option>
        <option value="Edző">Edző</option>
        <option value="informatikus könyvtáros">informatikus könyvtáros</option>
        <option value="Szociálpedagógia">Szociálpedagógia</option>
        <option value="Biológia">Biológia</option>
        <option value="Kémia">Kémia</option>
        <option value="Mezőgazdasági">Mezőgazdasági</option>
        <option value="Gyógy- és fűszernövények">Gyógy- és fűszernövények</option>
        <option value="Légijármű-vezetés">Légijármű-vezetés</option>
        <option value="Műszaki">Műszaki</option>
        <option value="Osztatlan tanárképzés">Osztatlan tanárképzés</option>
        <option value="Andragógia">Andragógia</option>
        <option value="Környezettudomány">Környezettudomány</option>
        <option value="Mentálhigiénés közösség- és kapcsolatépítő">Mentálhigiénés közösség- és kapcsolatépítő</option>
        <option value="Szociálpedagógia">Szociálpedagógia</option>
        <option value="Közgazdásztanár">Közgazdásztanár</option>
        <option value="Mérnöktanár">Mérnöktanár</option>
    </datalist>

    <?= $form->field($model, 'matrica')->dropDownList([
        '2324II' => '2023/2024/II',
        '2425I' => '2024/2025/I',
        '2425II' => '2024/2025/II',
        '2526I' => '2025/2026/I',
        '2526II' => '2025/2026/II',
        '2627I' => '2026/2027/I',
        '2627II' => '2026/2027/II',
        '2728I' => '2027/2028/I',
        '2728II' => '2027/2028/II',
        '2829I' => '2028/2029/I',
        '2829II' => '2028/2029/II',
        '2930I' => '2029/2030/I',
        '2930II' => '2029/2030/II',
        '3031I' => '2030/2031/I',
        '3031II' => '2030/2031/II'
    ], ['class' => 'form-control'])->label('Kártya matrica') ?>

    <div class="form-group">
        <?= Html::submitButton('Regisztráció', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>