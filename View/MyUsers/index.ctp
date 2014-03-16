<h2>ユーザー一覧</h2>
<table>
<tr>
<th>NO</th>
<th>Name</th>
<th>操作</th>
</tr>
<?php foreach($userData as $data):?>
<tr>
<td><?php echo h($data['MyUser']['id']);?></td>
<td><?php echo h($data['MyUser']['username']);?></td>
<td><?php echo $this->Html->link('編集',array('action'=>'edit',$data['MyUser']['id']));?> 
	<?php echo $this->Html->link('削除',array('action'=>'delete',$data['MyUser']['id']));?>
</td></tr>
<?php endforeach;?>
</table>

