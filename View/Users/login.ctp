<?php echo $this->Html->css('users_login');?>
<?php echo $this->Session->flash();?>
<h2>メールアドレスとパスワードを入力してください</h2>
<?php echo $this->Form->create('User');?>
<table cellpadding='0' cellspacing='0'>
	<tr>
		<th>メールアドレス</th>
		<td>
			<?php echo $this->Form->input('email',array('div'=>false,'label'=>false,'size'=>40));?>
		</td>
	</tr>
	<tr>
		<th>パスワード</th>
		<td>
			<?php echo $this->Form->input('password',array('div'=>false,'label'=>false,'size'=>40));?>
		</td>
	</tr>
	<tr>
		<th></th>
		<td>
			<?php echo $this->Form->end('ログイン');?>
		</td>
	</tr>
</table>
