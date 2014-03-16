 <?php echo $this->Html->css('order_register.css');?>
 <h2>注文を確定しました</h2>
 <div class='back'><?php echo $this->Html->link('トップに戻る',array('controller'=>'Products','action'=>'catalogue'),array('id'=>'back'));?></div>
 <script type='text/javascript'>
 $('#menu_select,#menu_input,#menu_info,#menu_payment,#menu_confirm,#menu_complete').css('background','#99f');
 </script>
