<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="photo_upload_wrap3">
	<div class="upload_piture">
            <img src="images/upload_photo01_img.png" />
            <a href="#">Upload Picture</a>
            </div>
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mesh_Start_personal',
	 'action'=>$this->createUrl('start/professionalprofile  '),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
    <p class="p_form">
           <?php echo $form->label($model,'education'); ?>
 
   <?php echo $form->dropDownList($model,'education', $model->getSchools()); ?>

    </p>
	     		
    <p class="p_form">
           <?php echo $form->label($model,'coursework'); ?>
         <?php echo $form->textarea($model,'coursework'); ?>

			</p>
    
            <p class="p_form1">
           <?php echo $form->label($model,'company'); ?>
         <?php echo $form->textfield($model,'company'); ?>

			</p>
     		<p class="p_form1">
          <?php echo $form->label($model,'experience'); ?>
         <?php echo $form->textarea($model,'experience'); ?>

			</p>
                     <p>
        	<?php echo CHtml::submitButton('Next', array('class'=>'btn btn-primary')); ?>
    </p>
    </form>
   <?php $this->endwidget() ?> 
    		
    
    
    
</div>
