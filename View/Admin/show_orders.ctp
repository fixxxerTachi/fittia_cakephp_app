<?php echo $this->Html->css('admin_show_orders');?>
<?php echo $this->Paginator->first() . $this->Paginator->numbers() . $this->Paginator->last();?>
<table cellpadding='0' cellspacing='0'>
<tr><th>order_id</th><th>member</th><th>user</th><th>address</th><th>total</th><th>date</th><th>statement</th></tr>

<?php foreach($orders as $o):?>
	<tr>
	<td><?php echo $o['Order']['id'];?></td>
	<td><?php echo $this->Html->link($o['Member']['family_name'],array('action'=>'showMember',$o['Member']['id']));?></td>
	<td><?php echo $this->Html->link($o['User']['family_name'],array('action'=>'showUser',$o['User']['id']));?></td>
	<td><?php if(!is_null($o['Address']['id'])){
					echo $this->Html->link('anther',array('action'=>'showAddress',$o['Address']['id']));
				}else{
					echo '-';}?>
	</td>
	<td><?php echo $o['Order']['total'];?></td>
	<td><?php $d=new DateTime($o['Order']['created']); echo $d->format('Y-m-d');?></td> 
	<td>
		<?php foreach($o['Product'] as $key=> $p):?>
				<ul>
				<li>商品番号 : <?php echo $brands[$p['brand_id']];?>-<?php echo $colors[$p['color_id']];?>-<?php echo $p['id'];?></li>
				<li>出荷状態 : <?php if($p['OrdersProduct']['shipped_id']=='1'){
										echo $p['OrdersProduct']['shipped_date'];
									}else{ 
										echo "<span class='note'>{$status['s'][$p['OrdersProduct']['shipped_id']]}</span>";
										echo $this->Form->create('Order',array('url'=>array('controller'=>'Admin','action'=>'changeShipped')));
										echo $this->Form->input('shipped_id',array(
													'type'=>'select',
													'options'=>$status['s'],
													'label'=>false,
													'div'=>false,
													'before'=>"<li class='form_select'>",
													'after'=>"</li>"));
										echo $this->Form->hidden('id',array('value'=>$o['Order']['id']));
										echo $this->Form->hidden('op',array('value'=>$p['OrdersProduct']['id']));
										echo "<li class='form_end'>{$this->Form->submit('送信',array('div'=>false))}</li>";
										echo $this->Form->end();
									}
								;?>
				</li>
				<li>キャンセル状態 : <?php if($p['OrdersProduct']['canceled_id']=='1'){
											echo $status['c'][$p['OrdersProduct']['canceled_id']];
											}else{
												echo "<span class='note'>{$status['c'][$p['OrdersProduct']['canceled_id']]}</span>";
												if($p['OrdersProduct']['canceled_id']=='2'){
														echo $this->Form->create('Order',array('url'=>array('controller'=>'Admin','action'=>'changeCanceled')));
														echo $this->Form->input('canceled_id',array(
															'type'=>'select',
															'options'=>$status['c'],
															'label'=>false,
															'div'=>false,
															'before'=>"<li class='form_select'>",
															'after'=>"</li>"));
														echo $this->Form->hidden('pid',array('value'=>$p['id']));
														echo $this->Form->hidden('id',array('value'=>$o['Order']['id']));
														echo $this->Form->hidden('op',array('value'=>$p['OrdersProduct']['id']));
														echo "<li class='form_end'>{$this->Form->submit('送信',array('div'=>false))}</li>";
														echo $this->Form->end();
												}
											}?>
				</li>
				<li>返品状態: <?php if($p['OrdersProduct']['returned_id']=='1'){
											echo $status['r'][$p['OrdersProduct']['returned_id']];
									}else{
										echo "<span class='note'>{$status['r'][$p['OrdersProduct']['returned_id']]}</span>";
										if($p['OrdersProduct']['returned_id']=='2' || $p['OrdersProduct']['returned_id']=='3'){
											echo $this->Form->create('Order',array('url'=>array('controller'=>'Admin','action'=>'changeReturned')));
											echo $this->Form->input('returned_id',array(
												'type'=>'select',
												'options'=>$status['r'],
												'label'=>false,
												'div'=>false,
												'before'=>"<li class='form_select'>",
												'after'=>'</li>'));
											echo $this->Form->hidden('pid',array('value'=>$p['id']));
											echo $this->Form->hidden('op',array('value'=>$p['OrdersProduct']['id']));
											echo "<li class='form_end'>{$this->Form->submit('送信',array('div'=>false))}</li>";
											echo $this->Form->end();
										}

									}?>
				</li>
				<li>在庫 : <?php echo $this->Html->link($p['quantity'],array('action'=>'showQuantities',$p['id']));?></li>
			</ul>
		<?php endforeach;?>
	</td>
</tr>
<?php endforeach;?>
</table>

