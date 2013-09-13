<?php
$this->breadcrumbs=array(
	'Gartners'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Gartner', 'url'=>array('index')),
	array('label'=>'Create Gartner', 'url'=>array('create')),
	array('label'=>'View Gartner', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Gartner', 'url'=>array('admin')),
);
?>

<h1>Update Gartner <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>