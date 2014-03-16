<h1>ユーザーの編集</h1>
<?php echo $this->Form->create('MyUser');?>
<?php echo $this->Form->input('username');?>
<?php echo $this->Form->input('password');?>
<?php echo $this->Form->input('id',array('type'=>'hidden'));?>
<?php echo $this->Form->end('編集');?>
