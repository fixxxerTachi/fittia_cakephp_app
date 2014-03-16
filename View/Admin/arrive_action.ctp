<?php echo $this->Form->create('Product');?>
商品番号　<?php echo $this->Form->input('brand',array(
				'type'=>'select',
				'div'=>false,
				'label'=>false,
				'options'=>$brands,
			));?> - 
		<?php echo $this->Form->input('color',array(
				'type'=>'select',
				'div'=>false,
				'label'=>false,
				'options'=>$colors,
			));?> - 
		<?php echo $this->Form->input('id',array(
				'type'=>'text',
				'div'=>false,
				'label'=>false,
				'size'=>2,
				'style'=>'font-size:15px;width:50px;height:10px;',
			));?>
		<?php echo $this->Form->submit('検索',array('div'=>false));?>
<?php echo $this->Form->end();?>

<div>
<?php if(isset($product)):?>
<p><?php echo $brands[$product['Product']['brand_id']] . '-' . $colors[$product['Product']['color_id']] . '-' . $product['Product']['id'] ?></p> 
<p> 在庫数　<?php echo $product['Product']['quantity'] ?> </p>
<?php echo $this->Form->create('Product',array('url'=>array('controller'=>'Admin','action'=>'addQuantity')));?>
<?php echo $this->Form->input('arrival',array(
	'type'=>'text',
	'div'=>false,
	'label'=>false,
	'size'=>'2',
	'style'=>'width:50px',
));?>
<?php echo $this->Form->hidden('id',array('value'=>$product['Product']['id']));?>
<?php echo $this->Form->hidden('quantity',array('value'=>$product['Product']['quantity']));?>
<?php echo $this->Form->submit('追加',array('div'=>false));?>
<?php echo $this->Form->end();?>
<?php endif;?>
</div>
