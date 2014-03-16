<?php echo $this->Html->css('add_info');?>
<?php echo $this->Html->script('select_lens.js');?>
<?php echo $this->Form->create('LensInfo');?>
<div>
	<h2>レンズの度数を入力してください</h2>
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
<div><input type='submit' value='登録' /></div>
</form>
