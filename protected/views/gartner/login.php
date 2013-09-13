<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<div class="span12">
		<div class="control-group <?php if($model->getError('username')){ echo 'error';}?>">
			<fieldset>
			<label><?php echo $model->getAttributeLabel('username')?>:</label>
			<?php echo $form->textField($model,'username',array('placeholder'=> 'username', 'class' => 'input-xlarge')); ?>
			<?php if($model->getError('username')){?><span class="help-inline"><?php echo $model->getError('username')?></span><?php }?>
			</fieldset>
		</div>
	</div>
	<div class="span12">
		<div class="control-group <?php if($model->getError('password')){ echo 'error';}?>">
			<fieldset>
			<label><?php echo $model->getAttributeLabel('password')?>:</label>
			<?php echo $form->passwordField($model,'password',array('placeholder'=> 'password', 'class' => 'input-xlarge')); ?>
			<?php if($model->getError('password')){?><span class="help-inline"><?php echo $model->getError('password')?></span><?php }?>
			</fieldset>
		</div>
	</div>
	<div class="span2">
		<?php echo CHtml::submitButton('Submit', $htmlOptions=array('class' =>'btn btn-large')); ?>
		</div>
	<div style="height:280px;float:left;"></div>
	<div class="" style="margin:auto;width:500px;">
		

<?php $this->endWidget(); ?>
</div><!-- form -->
