<script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
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
		'legend'=>false,
		'label'=>true,
		'options'=>$no_lens,
	));?>
</div>


<div>
	<h3>近視、遠視を選択してください</h3>
	<?php echo $this->Form->input('enkin_lens_id',array(
		'type'=>'radio',
		'legend'=>false,
		'label'=>true,
		'options'=>$enkin_lens,
	));?>
</div>

<div>
	<h3>度つきレンズの種類を選択してください</h3>
	<?php echo $this->Form->input('leveled_lens_id',array(
		'type'=>'radio',
		'legend'=>false,
		'label'=>true,
		'options'=>$leveled_lens,
	));?>
</div>


<div>
	<h3>レンズ情報の取得方法を選択してください</h3>
	<?php echo $this->Form->input('send_lens_id',array(
		'type'=>'radio',
		'legend'=>false,
		'label'=>true,
		'options'=>$send_lens,
	));?>
</div>


<div>
	<h3>レンズの度数を入力してください</h3>
	<table cellpadding='0' cellspacing='0'>
	<tr><th></th><th>SPH球面度数</th><th>CYL乱視度数</th></tr>
	<tr><th>右目</th>
		<td>
			<?php echo $this->Form->input('level_r',array(
				'type'=>'select',
				'div'=>false,
				'label'=>false,
			));?>
		</td>
		<td>
			<?php echo $this->Form->input('astig_r',array(
				'type'=>'select',
				'div'=>false,
				'label'=>false,
			));?>
		</td></tr>
	<tr><th>左目</th>
		<td>
			<?php echo $this->Form->input('level_l',array(
				'type'=>'select',
				'div'=>false,
				'label'=>false,
			));?>
		</td>
		<td>
			<?php echo $this->Form->input('astig_l',array(
				'type'=>'select',
				'div'=>false,
				'label'=>false,
			));?>
		</td></tr>
	</table>
</div>

<?php echo $this->Form->end('選択');?>

