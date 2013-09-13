<?php
$this->breadcrumbs=array(
	'Gartners',
);

$this->menu=array(
	array('label'=>'Create Gartner', 'url'=>array('create')),
	array('label'=>'Manage Gartner', 'url'=>array('admin')),
);
?>

<h1>Gartners</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
