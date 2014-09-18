<div>

	<h1>  
	     <?php 
		       if(isset($_GET['id'])) {
			        echo '';
					$readonly = 'readonly';
			    }
			   else {
				   echo 'Iyandikishe';
				   $readonly = '';
			   }
			   
			   ?> 
	</h1>
</div>
<div class="row-fluid">
	
    <div class="span6 offset3">
<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>"Uzuza ibyo usabwa",
	));
	
?>
<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'user-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Utuzu turiho aka kantu'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'nitegeko kuhuzuza'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model, 'username', array('maxlength' => 32,'readonly'=>$readonly)); ?>
		<?php echo $form->error($model,'username'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model, 'password', array('maxlength' => 32)); ?>
		<?php echo $form->error($model,'password'); ?>
		</div><!-- row -->
		<div class="row">
		<?php //echo $form->labelEx($model,'status'); ?>
		<?php echo $form->hiddenField($model, 'status',array('value'=>1)); ?>
		<?php //echo $form->error($model,'status'); ?>
		</div><!-- row -->
		<div class="row">
		<?php //echo $form->labelEx($model,'salt'); ?>
		<?php //echo $form->textField($model, 'salt', array('maxlength' => 32)); ?>
		<?php //echo $form->error($model,'salt'); ?>
		</div><!-- row -->

		<?php
echo GxHtml::submitButton(Yii::t('app', 'Kanda'));
$this->endWidget();
?>
</div><!-- form -->
<?php $this->endWidget();?>

    </div>

</div>