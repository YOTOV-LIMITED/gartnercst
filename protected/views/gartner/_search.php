<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Id'); ?>
		<?php echo $form->textField($model,'Id',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FirstName'); ?>
		<?php echo $form->textField($model,'FirstName',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LastName'); ?>
		<?php echo $form->textField($model,'LastName',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Department'); ?>
		<?php echo $form->textField($model,'Department'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DietaryRequirements'); ?>
		<?php echo $form->textField($model,'DietaryRequirements'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'OtherDietaryRequirements'); ?>
		<?php echo $form->textField($model,'OtherDietaryRequirements',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'GuestFirstName'); ?>
		<?php echo $form->textField($model,'GuestFirstName',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'GuestLastName'); ?>
		<?php echo $form->textField($model,'GuestLastName',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'GuestDietaryRequirements'); ?>
		<?php echo $form->textField($model,'GuestDietaryRequirements'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'GuestOtherDietaryRequirements'); ?>
		<?php echo $form->textField($model,'GuestOtherDietaryRequirements',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Static'); ?>
		<?php echo $form->textField($model,'Static'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CreateTime'); ?>
		<?php echo $form->textField($model,'CreateTime',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UpdateTime'); ?>
		<?php echo $form->textField($model,'UpdateTime',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->