<?php
/* @var $this UserController */
/* @var $model User */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->menu=array(
    array('label'=>'Создать пользователя', 'url'=>array('create')),

);

?>

<h1>Список пользователей</h1>

<p>
На этой странице вы можете просматривать зарегестрированных пользователей
</p>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        'id' => array(
            'name' => 'id',
            'headerHtmlOptions' => array('width' => '30')
        ),
		'username',
		'password',
        'created' => array(
            'name' => 'created',
            'value' => 'date("j.m.Y, H:i", $data->created)',
            'filter' => false,
        ),
		'ban' => array(
            'name' => 'ban',
            'value' => '($data->ban==1)?"Бан":" "',
            'filter' => array(0=>"Нет",1=>"Да"),
        ),
		'role' => array(
            'name' => 'role',
            'value'=>'($data->role==1)?"User":"Admin"',
),
		'email',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
