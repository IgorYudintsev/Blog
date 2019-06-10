<?php
use  yii\widgets\ActiveForm;
use yii\helpers\Html;
/* @var $this yii\web\View */
?>
<h1>user/edit</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
<?php $form=ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?>
<?= $form->field($update,'email')?>
<?= $form->field($update,'name')?>
<?= $form->field($update,'about')?>
<?= $form->field($update,'country')?>
<?= $form->field($update,'avatar')->fileInput()?>

<div class="form-group">
    <?=Html::submitButton('Submit',['class'=>'btn btn-primary'])?>
</div>
<? $form=ActiveForm::end();?>
