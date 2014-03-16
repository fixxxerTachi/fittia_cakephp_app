<?php echo $this->Html->script('select_lens.js');?>
<h2>レンズを選択する</h2>
<?php echo $this->Form->create('Lens');?>
<div>
		<?php echo $this->Form->input('is_leveled',array(
			'type'=>'select',
			'div'=>false,
			'label'=>false,
			'options'=>array(
							'1'=>'度なしレンズを選択',
							'2'=>'度つきレンズを選択',
						),
			));
		?>
</div>
<div>
	<h3>度なしレンズの種類を選択してください</h3>
	<?php echo $this->Form->input('no_lens_id',array(
		'type'=>'radio',
		'div'=>false,
		'label'=>true,
		'options'=>$no_lens,
	));?>
</div>


<?php echo $this->Form->end('選択');?>

