
<?php echo $this->Html->css('input_select');?>
<h2>ログインフォーム</h2>
<h3>オンラインショップ会員のかたはこちら</h3>
<div>
	<?php echo $this->Form->create('User',array('url'=>array('controller'=>'users','action'=>'login')));?>
	<table cellpadding='0' cellspacing='0'>	
		<tr>
			<th>メールアドレス</th>
			<td>
				<?php echo $this->Form->input('email',array('div'=>false,'label'=>false,'size'=>'40'));?>
			</td>
		</tr>
		<tr>
			<th>パスワード</th>
			<td>
				<?php echo $this->Form->input('password',array('div'=>false,'label'=>false,'size'=>'40'));?>
			</td>
		</tr>
	</table>
	<?php echo $this->Form->end('login');?>
</div>

<h3>新規ご登録のかたはこちら</h3>
<p class='title'><?php echo $this->Html->link('新規メンバー登録',array('controller'=>'users','action'=>'add'),array('id'=>'new'));?></p>

<h3>会員登録せずに買物を続ける場合はこちら</h3>
<p class='title'><?php echo $this->Html->link('お客様情報、配送先を入力する',array('action'=>'customerInfo','none'),array('id'=>'none'));?></p>
<script type='text/javascript'>
$('#mainvisual #menu_select').css('backgroundColor','#99f');
</script>
