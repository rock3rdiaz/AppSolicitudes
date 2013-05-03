<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Login</h1>

<p>Por favor proporcione su n&uacute;mero de c&eacute;dula y c&oacute;digo de n&oacute;mina:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'Usuario'); ?>
		<?php echo $form->textField($model,'username', array('placeholder'=>'Numero de cedula')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Contrase&ntilde;a'); ?>
		<?php echo $form->passwordField($model,'password',  array('placeholder'=>'Codigo de nomina')); ?>
		<?php echo $form->error($model,'password'); ?>
		<!--<p class="hint">
			Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.
		</p>-->
	</div>

	<div class="row rememberMe">
		<?php /*echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe');*/ ?>
	</div>

	<div class="row buttons">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'buttonType'=>'submit',
		    'type'=>'success',
		    'label'=>'Login',
		    'icon'=>'white ok'
		)); ?>	
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->




