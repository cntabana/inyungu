<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'igu-voucher-management-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

	    	
		<div class="row">
		<?php 
		$model2=new IguCredit;
		echo $form->labelEx($model2,'Credit'); ?>
		<?php 
		echo $form->dropDownList($model2, 'id', GxHtml::listDataEx(IguCredit::model()->findAllAttributes(null, true)), array('prompt'=>'Select Credit')); ?>
		<?php echo $form->error($model2,'id'); ?>
		</div><!-- row -->
		
		
<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->
<?php
if( Yii::app()->user->status ==3){
if(isset($_GET['id'])){
?>
<div class="well">
        <table class="table table-striped table-bordered">
		<thead>
		<th colspan='2'><center>Ikarita y abonnement</center></th>
		</thead>
          <tbody>
	<?php
		
		//echo 'select v.vouchenumber,c.id,c.cash,c.days from igu_credit c ,igu_voucher v,igu_voucher_management vm where c.id=v.idcredit and v.id = vm.idvoucher and status = 1 and v.idcredit='.$_GET["id"].'limit 1';
		$data=Yii::app()->db->createCommand('select v.vouchernumber,c.id,c.cash,c.days from igu_credit c ,igu_voucher v,igu_voucher_management vm where c.id=v.idcredit and v.id = vm.idvoucher and status = 1 and v.idcredit='.$_GET["id"].' limit 1')->queryAll();
	   foreach($data as $row){
		?>
            <tr>
              <td width="50%">Voucher number</td>
              <td>
              	<div >
                  <div ><input type='password' value='<?php echo $row['vouchernumber'];?>' readonly></div>
                </div>
              </td>
            </tr>
			<tr>
              <td width="50%">Cash</td>
              <td>
              	<div >
                  <div ><?php echo $row['cash'].' frw';?></div>
                </div>
              </td>
            </tr>
			<tr>
              <td width="50%">Days</td>
              <td>
              	<div >
                  <div ><?php echo $row['days'];?></div>
                </div>
              </td>
            </tr>
            <?php
			} 
			?>
          </tbody>
        </table>
<?php
 }
}
?>