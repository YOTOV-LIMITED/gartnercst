<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FirstName')); ?>:</b>
	<?php echo CHtml::encode($data->FirstName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LastName')); ?>:</b>
	<?php echo CHtml::encode($data->LastName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email')); ?>:</b>
	<?php echo CHtml::encode($data->Email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Department')); ?>:</b>
	<?php echo CHtml::encode($data->Department); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DietaryRequirements')); ?>:</b>
	<?php echo CHtml::encode($data->DietaryRequirements); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OtherDietaryRequirements')); ?>:</b>
	<?php echo CHtml::encode($data->OtherDietaryRequirements); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('GuestFirstName')); ?>:</b>
	<?php echo CHtml::encode($data->GuestFirstName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GuestLastName')); ?>:</b>
	<?php echo CHtml::encode($data->GuestLastName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GuestDietaryRequirements')); ?>:</b>
	<?php echo CHtml::encode($data->GuestDietaryRequirements); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GuestOtherDietaryRequirements')); ?>:</b>
	<?php echo CHtml::encode($data->GuestOtherDietaryRequirements); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Static')); ?>:</b>
	<?php echo CHtml::encode($data->Static); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreateTime')); ?>:</b>
	<?php echo CHtml::encode($data->CreateTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UpdateTime')); ?>:</b>
	<?php echo CHtml::encode($data->UpdateTime); ?>
	<br />

	*/ ?>

</div>