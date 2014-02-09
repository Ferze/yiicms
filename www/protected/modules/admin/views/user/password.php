<?php
/* @var $this UserController */
/* @var $model User */

$this->menu=array(
    array('label'=>'Список пользователей', 'url'=>array('index')),
    array('label'=>'Создать пользователя', 'url'=>array('create')),
    array('label'=>'Просмотр пользователя', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Изменить пользователя', 'url'=>array('update', 'id'=>$model->id))
);
?>

<p>Введите новый пароль</p><br>


<?php
    echo CHtml::form();
    echo CHtml::textField('password');
    echo CHtml::endForm();
    echo CHtml::submitButton('Изменить пароль');
?>