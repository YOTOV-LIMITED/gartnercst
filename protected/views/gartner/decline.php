<?php 
	$form = $this->beginWidget('CActiveForm', array(
			'enableClientValidation'=>true,
			'htmlOptions' => array(
				'class' => 'form-horizontal'	
				)
			)); 
?>
	<div class="control-group">
		<div class="span12">
			<h1>Decline</h1>
			<p>Sorry you are unable to attend the Gartner Stamford and Trumbull Associates Holiday Party, please indicate the reason below:</p>
		</div>
	</div>	
	<div class="span6">
		<div class="control-group <?php if($model->getError('FirstName')){ echo 'error';}?>">
			<fieldset>
			<label><?php echo $model->getAttributeLabel('FirstName')?>:</label>
			<?php echo $form->textField($model,'FirstName',array('placeholder'=> 'First Name', 'class' => 'input-xlarge')); ?>
			<?php if($model->getError('FirstName')){?><span class="help-inline"><?php echo $model->getError('FirstName')?></span><?php }?>
			</fieldset>
		</div>
	</div>
	<div class="span6">
	<div class="control-group <?php if($model->getError('LastName')){ echo 'error';}?>">
			<fieldset>
			<label><?php echo $model->getAttributeLabel('LastName')?>:</label>
			<?php echo $form->textField($model,'LastName',array('placeholder'=> 'Last Name', 'class' => 'input-xlarge')); ?>
			<?php if($model->getError('LastName')){?><span class="help-inline"><?php echo $model->getError('LastName')?></span><?php }?>
			</fieldset>
	</div>
	</div>
	<div class="span12">
	<div class="control-group <?php if($model->getError('Email')){ echo 'error';}?>">
		<fieldset>
		<label><?php echo $model->getAttributeLabel('Email')?>:</label>
		<?php echo $form->textField($model,'Email',array('placeholder'=> 'Email', 'class' => 'input-xlarge')); ?>
		<?php if($model->getError('Email')){?><span class="help-inline"><?php echo $model->getError('Email')?></span><?php }?>
		</fieldset>
	</div>
	</div>
	<div class="span12">
	<div class="control-group <?php if($model->getError('DeclineReason')){ echo 'error';}?>">
		<fieldset>
		<label><?php echo $model->getAttributeLabel('DeclineReason')?>:</label>
		<?php echo CHtml::activeTextArea($model,'DeclineReason',array('placeholder'=> 'Decline Reason', 'class' => 'input-xlarge')); ?>
		<?php if($model->getError('DeclineReason')){?><span class="help-inline"><?php echo $model->getError('DeclineReason')?></span><?php }?>
		</fieldset>
	</div>
	</div>
<div class="row">
	<div class="control-group">
		<div class="controls" style="float:right;margin-right:100px;">
			<label class="checkbox">
			</label>
			<button type="submit"  class="btn btn-large">submit</button>
		</div>
	</div>
<?php $this->endWidget(); ?>