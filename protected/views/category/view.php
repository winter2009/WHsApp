<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
	array('label'=>'Update Category', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Category', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Category', 'url'=>array('admin')),
    array('label'=>'Add Sub Category', 'url'=>array('subCategory/create', 'gid'=>$model->id)),
);
?>

<h1>View Category #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category_name',
		'category_description',
	),
)); ?>

<br>
<br>
<h1>Sub Categories</h1>
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $subCategoryProvider,
    'itemView' => '/subCategory/_view',
));
?>