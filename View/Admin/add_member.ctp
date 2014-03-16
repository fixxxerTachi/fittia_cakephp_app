<?php echo $this->Form->create('Admin');?>
<?php echo $this->Form->input('username',array('div'=>false,'label'=>'ユーザー名'));?>
<?php echo $this->Form->input('password',array('div'=>false,'label'=>'パスワード'));?>
<?php echo $this->Form->end('追加');?>

