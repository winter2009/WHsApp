<?php
$this->breadcrumbs=array(
	'Sub Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SubCategory', 'url'=>array('index')),
	array('label'=>'Manage SubCategory', 'url'=>array('admin')),
);
?>

<h1>Create SubCategory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>