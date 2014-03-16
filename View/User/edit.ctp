<h2>ユーザーの<?php echo $isEdit ? '編集' : '新規追加'; ?></h2>
<?php echo $this->Form->create('User') ?>
<?php echo $this->Form->input('name') ?>
<?php echo $this->Form->input('description') ?>

<?php
if($isEdit):
	echo $this->Form->input('id',array('type'=>'hidden'));
endif;
?>
<?php echo $this->Form->end($isEdit ? '修正' : '追加') ?>



