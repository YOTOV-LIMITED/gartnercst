<?php
$this->breadcrumbs=array(
	'Gartners'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Gartner', 'url'=>array('index')),
	array('label'=>'Manage Gartner', 'url'=>array('admin')),
);
?>

<h1>Create Gartner</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>