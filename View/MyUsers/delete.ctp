<h1>ユーザーの削除</h1>
<p>よろしければ削除ボタンのを押してください</p>
<table>
<tr>
<th>ユーザー名</th>
<td><?php echo h($this->data['MyUser']['username']);?></td>
</table>
<?php echo $this->Form->create('MyUser',array('type'=>'delete'));?>
<?php echo $this->Form->input('id',array('tpye'=>'hidden'));?>
<?php echo $this->Form->end('削除');?>

