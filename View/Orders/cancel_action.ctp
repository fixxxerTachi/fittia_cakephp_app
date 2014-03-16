<?php echo $this->Html->css('description');?>
	<h2>本当にこの商品をキャンセルしますか</h2>
	<div id='contents'>
		<div class='list_img'>
			<?php $path=$megane['Brand']['code'] . '/' . $megane['Type']['name'] . 
				'/' . $megane['Color']['name'] . '.gif';?>

				<?php echo $this->Html->image(
					$path,array('width'=>300,'height'=>200));?>

				<table cellpadding='0' cellspacing='0'>
					<tr>
						<th>商品コード</th>
						<td><?php echo $megane['Brand']['code'] ?>-<?php echo $megane['Color']['code'] ?>-<?php echo $megane['Product']['id'];?></td>
					</tr>
					<tr>
						<th>価格</th>
						<td><?php echo number_format($megane['Product']['price']) . '円';?></td>
					</tr>
					<tr>
						<th>target</th>
						<td><?php echo $this->Html->image($sexes[$megane['Brand']['sex_id']]  . '_icon.gif',
							array('width'=>'40', 'height'=>'15'));?>
							<?php echo $this->Html->image($targets[$megane['Brand']['target_id']] . '_icon.gif',
							array('width'=>'40','height'=>'15')); ?>
						</td>
					</tr>
					<tr>
						<th>color</th>
						<td><?php echo $megane['Color']['name'];?>
							<?php echo $this->Html->image('color_icons/' . $megane['Color']['icon'],
								array('width'=>30,'height'=>12));?>
						</td>
					</tr><tr>	
						<th>ご購入日</th>
						<td>
							<?php echo $order['Order']['created'];?>
						</td>
					</tr>
				</table>
		</div><!--end: list_img-->

		<div class='list_article'>
			<ul>
				<li><?php echo $this->Html->image('brand/' . $megane['Brand']['img'],array('width'=>340,'height'=>200));?></li>
				<li><?php echo $megane['Brand']['description'];?></li>
			</ul>
		</div><!--end: list_article -->

	</div><!--end:contents -->
	<div id='menu'>
		<?php echo $this->Form->create('');?>
		<?php echo $this->Form->end('購入をやめる');?>
	</div>
<?php debug($order);?>
<?php debug($ordered);?>
