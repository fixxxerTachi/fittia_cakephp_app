<h2>ユーザーの削除</h2>
<p>削除ボタンを押して下さい</p>
<table>
<tr><th>ユーザー名</th>
<td><?php echo h($this->data['User']['name']);?></td></tr>
<tr><th>備考</th>
<td><?php echo nl2br(h($this->data['User']['description']))?></td></tr>
</table>

<?php echo $this->Form->create('User',array('type'=>'delete'));?>
<?php echo $this->Form->input('id',array('type'=>'hidden'));?>
<pre>
<?php print_r($data);?>
</pre>

<?php endif; ?>
