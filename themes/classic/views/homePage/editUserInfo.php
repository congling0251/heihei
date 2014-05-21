
<div class="editinfo_form well">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'UserInfo-form',
	'enableClientValidation'=>true,
         'enableAjaxValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">资料修改</p>
	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'realname'); ?>
		<?php echo $form->textField($model,'realname'); ?>
		<?php echo $form->error($model,'realname'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'sex'); ?>
		<?php echo $form->radioButtonList($model,'sex',array('male'=>'男','female'=>'女'),array('separator'=>'&nbsp;')); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'age'); ?>
		<?php echo $form->textField($model,'age'); ?>
		<?php echo $form->error($model,'age'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'college'); ?>
		<?php echo $form->textField($model,'college'); ?>
		<?php echo $form->error($model,'college'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'company'); ?>
		<?php echo $form->textField($model,'company'); ?>
		<?php echo $form->error($model,'company'); ?>
	</div>
	<div class="row">
                
		<?php echo $form->labelEx($model,'headphoto'); ?>
		<?php echo $form->FileField($model,'headphoto'); ?>
		<?php echo $form->error($model,'headphoto'); ?>
		<div class='row'>
			<div class="col-md-6">
	        	<?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/uploads/'.$model->headphoto,'', array('id' =>'imageView' )); ?>
			</div>
			<div class="col-md-6">
	        	<label>请选择jpg,png或者gif类型的图片，大小不超过10M</label>
			</div>

    	</div>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('修改'); ?>
	</div>
<?php $this->endWidget(); ?>
</div>