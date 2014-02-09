<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
	'Pages'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Создание страницы', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#page-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление страницами</h1>

<p>
На этой странице вы можете создавать, изменять и удалять страницы
</p>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'page-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id' => array(
		    'name' => 'id',
            'headerHtmlOptions' => array('width' => '30')
		),
		'title',
		'created' => array(
            'name' => 'created',
            'value' => 'date("j.m.Y, H:i", $data->created)',
            'filter' => false,
        ),
		'status' => array(
            'name' => 'status',
            'value' => '($data -> status == 1 )? "Доступно":"Скрыто"',
            'filter' => array(0=>'Скрывать',1=>'Показывать')
        ),
		'category_id' => array(
            'name' => 'category_id',
            'value' => '$data->category->title',
            'filter' => Category::all()
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
));
?>
