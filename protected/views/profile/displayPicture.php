<?php 
$form = $this->beginWidget('CActiveForm' ,array(
	'id' => 'display-picture-form',
	'action' => array('profile/addDisplayPicture'),
	'enableAjaxValidation' => false,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
));
?>
<div>
	<?php echo CHtml::errorSummary($profile,'File'); ?>
	<?php echo CHtml::label('File Location:', 'display_picture'); ?>
	<?php echo CHtml::activeFileField($profile, 'display_picture'); ?>
</div>
<div>
	<?php echo CHtml::submitButton('Import'); ?>
</div>

<?php $this->endWidget(); ?>