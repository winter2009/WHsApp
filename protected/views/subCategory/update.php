<?php
$this->breadcrumbs=array(
	'Sub Categories'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SubCategory', 'url'=>array('index')),
	array('label'=>'Create SubCategory', 'url'=>array('create')),
	array('label'=>'View SubCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SubCategory', 'url'=>array('admin')),
);
?>

<h1>Update SubCategory <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>