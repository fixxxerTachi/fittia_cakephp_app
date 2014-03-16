<?php echo $this->Html->css('customer_info');?>
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
<h2>お客様情報入力</h2>
<?php echo $this->Session->flash();?>
<div>
<?php echo $this->Form->create('Member');?>
	<table cellpadding='0' cellspacing='0'>
		<tr>
			<th>お名前</th>
			<td>
				姓　<?php echo $this->Form->input('family_name',array('div'=>false,'label'=>false,'size'=>20)); ?>
				名　<?php echo $this->Form->input('first_name',array('div'=>false,'label'=>false,'size'=>20)); ?>
			</td>
		</tr>
		<tr>
			<th>ふりがな</th>
			<td>
				せい<?php echo $this->Form->input('family_furigana',array('div'=>false,'label'=>false,'size'=>20)); ?>
				めい<?php echo $this->Form->input('first_furigana',array('div'=>false,'size'=>'20','label'=>false));?>
			</td>
		</tr>
		<tr>
			<th>郵便番号</th>
			<td>
				<?php echo $this->Form->input('zip_first',array('type'=>'text','size'=>3,'div'=>false,'label'=>false))?>-
				<?php echo $this->Form->input('zip_last',array('type'=>'text','size'=>4,'div'=>false,'label'=>false));?>
				<?php echo $this->Html->link('郵便番号から住所検索','javascript:void(0)',array('id'=>'address_search'));?>
			</td>
		</tr>
		<tr>
			<th>ご住所</th>
			<td>
				<table cellpadding='0' cellspacing='0'>
					<tr><th>都道府県</th><td><?php echo $this->Form->input('prefecture',array('div'=>false,'label'=>false,'size'=>20));?></td></tr>
					<tr><th>市区町村</th><td><?php echo $this->Form->input('address',array('div'=>false,'label'=>false,'size'=>'45'));?></td></tr>
					<tr><th>番地、建物、マンション名</th><td><?php echo $this->Form->input('address2',array('div'=>false,'label'=>false,'size'=>'40'));?></td></tr> </table>
			</td>
		</tr>
		<tr>
			<th>電話番号</th>
			<td>
				<?php echo $this->Form->input('tel1',array('div'=>false,'label'=>false,'size'=>4))?>
				-
				<?php echo $this->Form->input('tel2',array('div'=>false,'label'=>false,'size'=>4))?>
				-
				<?php echo $this->Form->input('tel3',array('div'=>false,'label'=>false,'size'=>4)) ?>
			</td>
		</tr>
		<tr>
			<th>メールアドレス</th>
			<td>
				<?php echo $this->Form->input('email',array('div'=>false,'label'=>false,'size'=>40));?>
			</td>
		</tr>
		<?php if(isset($flag) && $flag!='none'): ?>
		<tr>
			<th>お客様パスワード</th>
			<td>
				<?php echo $this->Form->input('password',array('div'=>false,'label'=>false,'size'=>40));?>
			</td>
		</tr>
		<?php endif;?>
	</table>
	<?php echo $this->Form->end('入力内容を確認する');?>
</div>


<script type='text/javascript'>
<?php if(!$this->Session->read('payment')):?>
$('#menu_select,#menu_input').css('backgroundColor','#99f');
<?php else:?>
$('#menu_select,#menu_input,#menu_payment').css('background','#99f');
<?php endif;?>
</script>

