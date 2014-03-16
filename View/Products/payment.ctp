<?php echo $this->Html->css('payment');?>
<h2>お支払方法選択</h2>
<?php echo $this->Session->flash();?>
<form name='payment' method='post' action=''>

	<div>
		<?php echo $this->Form->input('payment',array(
		'type'=>'radio',
		'options'=>$payments,
		'legend'=>false,
		'separator'=>'</div><div class="input radio">',
		));?>
	</div>
<p>
	<input type='submit' value='入力内容を確認する' />
</p>
<script type='text/javascript'>
$('#menu_select,#menu_input,#menu_info,#menu_payment').css('background','#99f');
</script>
