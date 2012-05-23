<?php
$this->breadcrumbs=array(
	'Medias'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Media', 'url'=>array('index')),
	array('label'=>'Create Media', 'url'=>array('create')),
	array('label'=>'View Media', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Media', 'url'=>array('admin')),
);
?>

<h1>Update Media <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>