<?php
$this->breadcrumbs=array(
	'Sub Categories',
);

$this->menu=array(
	array('label'=>'Create SubCategory', 'url'=>array('create')),
	array('label'=>'Manage SubCategory', 'url'=>array('admin')),
);
?>

<h1>Sub Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
