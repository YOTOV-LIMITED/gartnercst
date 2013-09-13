<?php
$this->breadcrumbs=array(
	'Gartners'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List Gartner', 'url'=>array('index')),
	array('label'=>'Create Gartner', 'url'=>array('create')),
	array('label'=>'Update Gartner', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Gartner', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Gartner', 'url'=>array('admin')),
);
?>

<h1>View Gartner #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'FirstName',
		'LastName',
		'Email',
		'Department',
		'DietaryRequirements',
		'OtherDietaryRequirements',
		'GuestFirstName',
		'GuestLastName',
		'GuestDietaryRequirements',
		'GuestOtherDietaryRequirements',
		'Static',
		'CreateTime',
		'UpdateTime',
	),
)); ?>
