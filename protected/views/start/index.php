<div class="photo_upload_wrap">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mesh_start',
        'htmlOptions'=>array('class'=>'form'),
	 'action'=>$this->createUrl('start/index'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
    <p>
   <?php echo $form->label($model,'display_name'); ?>
 
   <?php echo $form->textField($model,'display_name',array('placeholder'=>'Enter Display Name')); ?>
    </p>
    
    <p>
    <?php echo $form->label($model,'hometown'); ?>
 
   <?php echo $form->textField($model,'hometown',array('placeholder'=>'Your Hometown')); ?>
        
    </p>
    <p>
        	<?php echo CHtml::submitButton('Next', array('class'=>'btn btn-primary')); ?>
    </p>
<?php $this->endWidget(); ?>
    
    		<div class="upload_piture">
           
      
                 <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/mesh/views/images/upload_photo01_img.png" />
<?php
                 $this->widget('application.extensions.xupload.XUpload',array(

                     'url'=>Yii::app()->createAbsoluteUrl('start/uploadprofilepics'),
                     'attribute'=>'display_picture',
                     'model'=>$model,
                     'previewImages'=>true,
                     
));
?>
            </div>
    
    
    
</div>