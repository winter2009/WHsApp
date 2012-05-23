<?php
$this->breadcrumbs=array(
	'Medias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Media', 'url'=>array('index')),
	array('label'=>'Manage Media', 'url'=>array('admin')),
);
?>

<h1>Create Media</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>