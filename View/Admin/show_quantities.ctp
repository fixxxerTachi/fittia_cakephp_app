<table cellpadding='0' cellspacing='0'>
<tr><th>商品番号</th><th>価格</th><th>在庫</th></tr>
<?php foreach($products as $p):?>
<tr>
	<td><?php echo "{$brands[$p['Product']['brand_id']]}-{$colors[$p['Product']['color_id']]}-{$p['Product']['id']}";?></td>
	<td><?php echo $p['Product']['price'];?></td>
	<td>
	<?php echo $this->Form->create('Product',array('url'=>array('controller'=>'Admin','action'=>'changeQuantity')));?>
	<?php echo $this->Form->hidden('id',array('value'=>$p['Product']['id']));?>
	<?php echo $this->Form->input('quantity',array(
		'type'=>'text',
		'div'=>false,
		'label'=>false,
		'value'=>$p['Product']['quantity'],
		'size'=>'2',
		'before'=>'',
		'after'=>'',
		'style'=>'font-size:17px;width:50px;height:20px;',
	));?>
	<?php echo $this->Form->submit('変更',array('div'=>false));?>	
	<?php echo $this->Form->end();?>
	</td>
</tr>
<?php endforeach;?>

</table>
