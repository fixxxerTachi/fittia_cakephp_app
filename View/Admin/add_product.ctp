<style type='text/css'>
label{ padding: 5px; }
</style>
<h2>商品追加</h2>
<?php echo $this->Form->create('Product',array(
	'enctype'=>'multipart/form-data'));?>
<table cellpadding='0' cellspacing='0'>
<tr><th>ブランド</th>
<td><?php echo $this->Form->input('brand_id',array(
		'type'=>'select',
		'div'=>false,
		'label'=>false,
		'options'=>$brands,
	));?></td></tr>

<tr><th>Color</th>
<td><?php echo $this->Form->input('color_id',array(
		'type'=>'radio',
		'div'=>false,
		'label'=>true,
		'optons'=>$colors,
	));?></td></tr>
<tr><th>Type</th>
<td><?php echo $this->Form->input('type_id',array(
		'type'=>'radio',
		'div'=>false,
		'label'=>true,
		'options'=>$types,
	));?></td></tr>
<tr><th>売価</th>
<td><?php echo $this->Form->input('price',array(
		'type'=>'text',
		'div'=>false,
		'label'=>false,
	));?></td></tr>
<tr><th>画像</th>
<td><?php echo $this->Form->input('image',array(
		'type'=>'file',
		'div'=>false,
		'label'=>false,
	));?></td></tr>
</table>
<?php echo $this->Form->end('追加');?>
