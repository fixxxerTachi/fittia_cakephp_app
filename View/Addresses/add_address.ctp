<script type='text/javascript' src='http://ajaxzip3.googlecode.com/svn/trunk/ajaxzip3/ajaxzip3.js'></script>
<script type='text/javascript'>
$(function(){
	$('#address_search').click(function(){
		AjaxZip3.zip2addr(
		'data[Member][zip_first]',
		'data[Member][zip_last]',
		'data[Member][prefecture]',
		'data[Member][address]')
	});


});
</script>

<h2>配送先入力</h2>
<div>
<?php echo $this->Form->create('Address');?>
	<table cellpadding='0' cellspacing='0'>
		<tr>
			<th>郵便番号</th>
			<td>
				<?php echo $this->Form->input('zip_first',array('type'=>'text','div'=>false,'label'=>false,'size'=>3))?>
					-
				<?php echo $this->Form->input('zip_last',array('type'=>'text','div'=>false,'label'=>false,'size'=>4))?>
				<?php echo $this->Html->link('郵便番号から住所検索','javascript:void(0)',array('id'=>'address_search'));?>
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
						<th>市区町村</th>
						<td><?php echo $this->Form->input('address',array('div'=>false,'label'=>false,'size'=>'40'));?></td>
					</tr>
					<tr>
						<th>番地、建物、マンション名</th>
						<td><?php echo $this->Form->input('address2',array('div'=>false,'label'=>false,'size'=>'40'));?></td>
					</tr>
					<tr>
						<th>電話番号</th>
						<td>
							<?php echo $this->Form->input('tel1',array('div'=>false,'label'=>false,'size'=>4));?>
							-
							<?php echo $this->Form->input('tel2',array('div'=>false,'label'=>false,'size'=>4));?>
							-
							<?php echo $this->Form->input('tel3',array('div'=>false,'label'=>false,'size'=>4));?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<?php echo $this->Form->end('入力内容を確認する');?>
</div>
				
