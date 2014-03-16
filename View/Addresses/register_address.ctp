<h2>配送先入力</h2>
<div>
<?php echo $this->Form->create('Address');?>
	<table cellpadding='0' cellspacing='0'>
		<tr>
			<th>郵便番号</th>
			<td>
				<?php echo $this->Form->input('zip_first',array('div'=>false,'label'=>false,'size'=>3))?>
					-
				<?php echo $this->Form->input('zip_last',array('div'=>false,'label'=>false,'size'=>4))?>
			</td>
		</tr>
		<tr>
			<th>住所</th>
			<td>
				<table cellpadding='0' cellspacing='0'>
					<tr>
						<th>都道府県</th>
						<td><?php echo $this->Form->input('prefecture',array('div'=>false,'label'=>false,'size'=>'40'));?></td>
					</tr>
					<tr>
						<th>市区町村、番地</th>
						<td><?php echo $this->Form->input('address',array('div'=>false,'label'=>false,'size'=>'40'));?></td>
					</tr>
					<tr>
						<th>建物、マンション名</th>
						<td><?php echo $this->Form->input('address2',array('div'=>false,'label'=>false,'size'=>'40'));?></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<?php echo $this->Form->hidden('main',array('value'=>1));?>
	<?php echo $this->Form->end('入力内容を確認する');?>
</div>
				
<?php echo debug($errors);?>
<?php echo debug($member);?>
