<h1>サンプルアプリ</h1>
<h2>ユーザー管理</h2>
<h3>ユーザー削除</h3>
<?php echo $this->Form->create('User',array('type'=>'delete'));?>
<?php echo $this->Form->input('id',array('type'=>'hidden'));?>
<table>
<tr><th>Id</th><td><?php echo h($this->data['User']['id']);?></td>
</tr>
<tr><th>ユーザー名</th>
<td><?php echo h($this->data['User']['username'];?></td>
</tr>
</table>
<p>ユーザーを削除します。よろしければ削除ボタンを押してください</p>
<?php echo $this->Form->end('削除');?>
<div class='pageLInks'>
<p><?php echo $this->Html->link('戻る',array('action'=>'userlist'));?></p>
</div>
