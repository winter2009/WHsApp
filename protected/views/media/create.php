<?php
$this->breadcrumbs=array(
	'Category'=>array('category/index'),
    $category->category_name => array('category/view/'.$category->id),
    $subcategory->sub_category_name => array('subCategory/view/'.$subcategory->id),
	'Create',
);

//$this->menu=array(
//	array('label'=>'List Media', 'url'=>array('index')),
//	array('label'=>'Manage Media', 'url'=>array('admin')),
//);
?>

<h1>Create Media</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>