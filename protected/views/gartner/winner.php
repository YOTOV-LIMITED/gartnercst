<?php 
	$form = $this->beginWidget('CActiveForm', array(
			//'enableClientValidation'=>true,
			'htmlOptions' => array(
				'name' => "creator",
				'class' => 'form-horizontal'	
				)
			)); 
?>
	<div class="" style="margin-left:-20px;">
			<h3>To register for the Gartner Stamford and Trumbull Associates Holiday Party,</h3>
			<h3>Please complete the fields below:</h3>
			<p></p>
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
	<div class="control-group <?php if($model->getError('Department')){ echo 'error';}?>">
			<fieldset>
			<label><?php echo $model->getAttributeLabel('Department')?>:</label>
			<?php echo $form->dropDownList($model, 'Department', $departments, array('class' => 'input-xlarge'));?>
			<?php if($model->getError('Department')){?><span class="help-inline"><?php echo $model->getError('Department')?></span><?php }?>
			</fieldset>
	</div>
	</div>
<div id="thehiddenDietary" style="display:none;">
	<div class="span6">
		<div class="control-group">
			<fieldset>
			<label><?php echo $model->getAttributeLabel('DietaryRequirements')?>:</label>
			<?php echo $form->dropDownList($model, 'DietaryRequirements', $requirements, array('class' => 'input-xlarge', 'name' => 'showDietary', 'onchange' => 'showGuest();'));?>
			</fieldset>
		</div>
	</div>
	<div class="span6">	
	<div class="control-group"> 
			<fieldset>
			<label><?php echo $model->getAttributeLabel('OtherDietaryRequirements')?>:</label>
			<?php echo CHtml::activeTextArea($model,'OtherDietaryRequirements',array('placeholder'=> 'Other Dietary Requirements', 'class' => 'input-xlarge')); ?>
			</fieldset>
	</div>
	</div> 
</div>
<div id="theshowDietary" style="display:block;">
	<div class="span12">
		<div class="control-group">
			<fieldset>
			<label><?php echo $model->getAttributeLabel('DietaryRequirements')?>:</label>
			<?php echo $form->dropDownList($model, 'DietaryRequirements', $requirements, array('class' => 'input-xlarge', 'name' => 'showDietarys', 'onchange' => 'showGuest();'));?>
			</fieldset>
		</div>
	</div>
</div>
	<div class="control-group form-inline <?php if($model->getError('optionsRadios')){ echo 'error';}?>" style="width:900px;">
		<div class="span2" style="width:180px;">
		Are you bringing a guest?
		</div>
		<label class="radio span1" style="width:50px;">Yes
		<?php 
			echo $form->radioButton(
					$model, 
					'optionsRadios', 
					$htmlOptions = array(
						'name' => 'optionsRadios', 
						'value' => 'option1', 
						'onclick' => 'showGuests();'));
		?>
		</label>
		<label class="radio span1" style="width:50px;">No
		<?php 
			echo $form->radioButton(
					$model, 
					'optionsRadios', 
					$htmlOptions = array(
						'name' => 'optionsRadios', 
						'value' => 'option2',
						'checked' => 'checked', 
						'onclick' => 'showGuest();'));
		?>
		</label>
		<?php if($model->getError('optionsRadios')){?><span class="help-inline"><?php echo $model->getError('optionsRadios')?></span><?php }?>
	</div>	
	<div id="guestinfo" style="display:none;">
		<div class="control-group span12">
			<h3>If yes, please complete the following fields.</h3>
			<p></p>
		</div>
	<div class="span6">
		<div class="control-group">
			<fieldset>
			<label><?php echo $model->getAttributeLabel('GuestFirstName')?>:</label>
			<?php echo $form->textField($model,'GuestFirstName',array('placeholder'=> 'Guest First Name', 'class' => 'input-xlarge')); ?>
			</fieldset>
		</div>
	</div>
	<div class="span6">
	<div class="control-group">
		<fieldset>
		<label><?php echo $model->getAttributeLabel('GuestLastName')?>:</label>
		<?php echo $form->textField($model,'GuestLastName',array('placeholder'=> 'Guest Last Name', 'class' => 'input-xlarge')); ?>
		</fieldset>
	</div>
	</div>
<div id="theshowGuest" style="display:block;">		
	<div class="span12">
		<div class="control-group">
			<fieldset>
			<label><?php echo $model->getAttributeLabel('GuestDietaryRequirements')?>:</label>
			<?php echo $form->dropDownList($model, 'GuestDietaryRequirements', $requirements, array('class' => 'input-xlarge', 'name' => 'showGuestRequires', 'onchange' => 'showGuest();'));?>
			</fieldset>
		</div>
	</div>
</div>
<div id="thehiddenGuest" style="display:none;">	
	<div class="span6">
		<div class="control-group">
			<fieldset>
			<label><?php echo $model->getAttributeLabel('GuestDietaryRequirements')?>:</label>
			<?php echo $form->dropDownList($model, 'GuestDietaryRequirements', $requirements, array('class' => 'input-xlarge', 'name' => 'showGuestRequire', 'onchange' => 'showGuest();'));?>
			</fieldset>
		</div>
	</div>
	<div class="span6">	
	<div class="control-group"> 
			<fieldset>
			<label><?php echo $model->getAttributeLabel('GuestOtherDietaryRequirements')?>:</label>
			<?php echo CHtml::activeTextArea($model,'GuestOtherDietaryRequirements',array('placeholder'=> 'GuestOther Dietary Requirements', 'class' => 'input-xlarge')); ?>
			</fieldset>
	</div>
	</div>
</div>	
	</div>	 
	<div style="margin:auto;width:500px;">
		<div class="span3" style="margin-right:30px;margin-bottom:30px;">
		<?php echo CHtml::submitButton('Submit', $htmlOptions=array('class' =>'btn btn-large')); ?>
		</div>
		<?php //echo CHtml::resetButton('Reset', $htmlOptions=array('class' =>'btn btn-large')); ?>
<?php $this->endWidget(); ?>
<script type="text/javascript">
function showGuest(){
var table=document.creator;
if(table.showDietarys.value!=9){
	document.getElementById("thehiddenDietary").style.display="none";
	document.getElementById("theshowDietary").style.display="block";
}
if(table.showDietarys.value==9){
	document.getElementById("thehiddenDietary").style.display="block";
	document.getElementById("theshowDietary").style.display="none";
}
if(table.showGuestRequires.value==9){
	document.getElementById("thehiddenGuest").style.display="block";
	document.getElementById("theshowGuest").style.display="none";
}

for(i=0;i<table.optionsRadios.length;i++){
    if(table.optionsRadios[i].checked==true) {
        if(table.optionsRadios[i].value=='option2') {
        	document.getElementById("guestinfo").style.display="none";
        } 
        break;
    }
}
}
function showGuests(){
	document.getElementById("guestinfo").style.display="block";
}


</script>