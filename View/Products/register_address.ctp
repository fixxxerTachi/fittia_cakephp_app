<h2>お客様情報入力</h2>
<div>
<?php echo $this->Form->create('Address');?>
				<?php echo $this->Form->input('zip_first')?>-
				<?php echo $this->Form->input('zip_last')?>
				都道府県<?php echo $this->Form->input('prefecture');?><br />
				市区町村、番地、建物、マンション名<br />
				<?php echo $this->Form->input('address');?>
				<?php echo $this->Form->input('email');?>
	<?php echo $this->Form->end('入力内容を確認する');?>
</div>
