<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use PhpParser\Node\Stmt\Label;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Bejelentkezés';
?>
<div class="site-login">
    <h1>Bejelentkezés</h1>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ],
            ]); ?>

            <?= $form->field($model, 'username')->label('Felhasználónév')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->label('Jelszó')->passwordInput() ?>


            <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                'label' => 'Emlékezz rám',
            ]) ?>

            <div class="form-group">
                <div>
                    <?= Html::submitButton('Bejelentkezés', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>


        </div>
    </div>
</div>
