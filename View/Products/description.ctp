	<h2>商品詳細</h2>
	<div id='contents'>
		<div class='list_img'>
			<?php 
			if(!$megane['Product']['image']){	
				$path=$megane['Brand']['code'] . '/' . $megane['Type']['name'] . 
					'/' . $megane['Color']['name'] . '.gif';
			}else{
				$path=$megane['Product']['image'];
			}
			;?>

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
							array('width'=>'45', 'height'=>'18'));?>
							<?php echo $this->Html->image($targets[$megane['Brand']['target_id']] . '_icon.gif',
							array('width'=>'45','height'=>'18')); ?>
						</td>
					</tr>
					<tr>
						<th>color</th>
						<td><?php echo $megane['Color']['name'];?>
							<?php echo $this->Html->image('color_icons/' . $megane['Color']['icon'],
								array('width'=>30,'height'=>12));?>
						</td>
					</tr>
					<tr>
						<th>在庫</th>
						<td><?php if($megane['Product']['quantity'] > 2) echo 'あり';
									else if($megane['Product']['quantity']  <= 2 && $megane['Product']['quantity'] >= 1) echo '<span class="least">残りわずか</span>';
									else if($megane['Product']['quantity'] < 1) echo '<span class="wait">入荷待ち</span>';
							?>
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
		<?php echo $this->Html->link('商品一覧に戻る',
			array('action'=>'catalogue'),
			array('id'=>'back','escape'=>false));?>
		<?php if($megane['Product']['quantity']!=0):?>
		<?php echo $this->Html->link('カートに入れる',
			array('action'=>'cartInsert',$megane['Product']['id']),
			array('id'=>'input_cart','escape'=>false));	
		?>
		<?php else:?>
		<?php echo $this->Html->link('予約する',
			array('action'=>'cartInsert',$megane['Product']['id']),
			array('id'=>'input_cart','escape'=>false));
		?>
		<?php endif;?>

	</div>
