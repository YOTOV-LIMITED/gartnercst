<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gartner-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'FirstName'); ?>
		<?php echo $form->textField($model,'FirstName',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'FirstName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LastName'); ?>
		<?php echo $form->textField($model,'LastName',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'LastName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Department'); ?>
		<?php echo $form->textField($model,'Department'); ?>
		<?php echo $form->error($model,'Department'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DietaryRequirements'); ?>
		<?php echo $form->textField($model,'DietaryRequirements'); ?>
		<?php echo $form->error($model,'DietaryRequirements'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'OtherDietaryRequirements'); ?>
		<?php echo $form->textField($model,'OtherDietaryRequirements',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'OtherDietaryRequirements'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'GuestFirstName'); ?>
		<?php echo $form->textField($model,'GuestFirstName',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'GuestFirstName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'GuestLastName'); ?>
		<?php echo $form->textField($model,'GuestLastName',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'GuestLastName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'GuestDietaryRequirements'); ?>
		<?php echo $form->textField($model,'GuestDietaryRequirements'); ?>
		<?php echo $form->error($model,'GuestDietaryRequirements'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'GuestOtherDietaryRequirements'); ?>
		<?php echo $form->textField($model,'GuestOtherDietaryRequirements',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'GuestOtherDietaryRequirements'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Static'); ?>
		<?php echo $form->textField($model,'Static'); ?>
		<?php echo $form->error($model,'Static'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CreateTime'); ?>
		<?php echo $form->textField($model,'CreateTime',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'CreateTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'UpdateTime'); ?>
		<?php echo $form->textField($model,'UpdateTime',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'UpdateTime'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->