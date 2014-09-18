<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      subcategory		</th>
 		<th width="80px">
		      idcategory		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->subcategory; ?>
		</td>
       		<td>
			<?php echo $row->idcategory; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
