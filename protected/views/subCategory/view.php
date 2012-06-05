<?php
$this->breadcrumbs=array(
	'Sub Categories'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SubCategory', 'url'=>array('index')),
	array('label'=>'Create SubCategory', 'url'=>array('create')),
	array('label'=>'Update SubCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SubCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SubCategory', 'url'=>array('admin')),
);
?>

<h1>SubCategory <?php echo $model->sub_category_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'sub_category_name',
		'sub_category_description',
//		'parent_id',
	),
)); ?>


<br><br>
<h1>Media</h1>
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $mediaProvider,
    'itemView' => '/media/_view',
));
?>