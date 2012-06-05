<?php
$this->breadcrumbs=array(
//	'Medias'=>array('index'),
    'Category'=>array('category/index'),
    $category->category_name => array('category/view/'.$category->id),
    $subcategory->sub_category_name => array('subCategory/view/'.$subcategory->id),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Media', 'url'=>array('index')),
	array('label'=>'Create Media', 'url'=>array('create')),
	array('label'=>'Update Media', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Media', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Media', 'url'=>array('admin')),
);
?>

<h1>Media <?php echo $model->media_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'media_name',
		'media_url',
		'media_created',
		'media_modified',
		'media_description',
		'sub_category_id',
	),
)); ?>
