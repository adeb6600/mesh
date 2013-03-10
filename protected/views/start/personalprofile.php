<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<div class="photo_upload_wrap">
    <div class="photo_upload_wrap_form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mesh_Start_personal',
	 'action'=>$this->createUrl('start/index'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
    <p>
   <?php echo $form->label($model,'aboutme'); ?>
 
   <?php echo $form->textArea($model,'aboutme',array('placeholder'=>'About Me')); ?>
    </p>
        
    <p>
        	<?php echo CHtml::submitButton('Next', array('class'=>'btn btn-primary')); ?>
    </p>
<?php $this->endWidget(); ?>
    </div>
    		<div class="upload_piture">
            <img src="images/upload_photo01_img.png" />
            <a href="#">Upload Picture</a>
            </div>
    
    
    
</div>