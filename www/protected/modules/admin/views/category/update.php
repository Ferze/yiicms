<?php
/* @var $this CategoryController */
/* @var $model Category */

/*$this->breadcrumbs=array(  //выключаем хлебные крошки
	'Categories'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
); */

$this->menu=array(
	array('label'=>'Список категорий', 'url'=>array('index')),
	array('label'=>'Создать категорию', 'url'=>array('create')),
	array('label'=>'Просмотр категории', 'url'=>array('index', 'id'=>$model->id)),
	//array('label'=>'Управление категориями', 'url'=>array('index')),
);
?>

<h1>Изменить категорию <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>