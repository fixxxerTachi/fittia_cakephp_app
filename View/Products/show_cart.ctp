<?php if(!isset($cart_items)):?>
	<div id='empty_message'><?php echo( 'カートには何も入っていません'); ?></div>
	<div><?php echo $this->Html->link('商品一覧に戻る',array('action'=>'catalogue'),array('id'=>'back'));?></div>
<?php else: ?>

<h2>カートには<?php echo count($this->Session->read('cart'));?>点の商品が入っています</h2>
<?php foreach($cart_items as $key =>  $ci):?>
<div>
	<?php 
		if(!$ci['Product']['image']){	
			$path="{$ci['Brand']['code']}/{$ci['Type']['name']}/{$ci['Color']['name']}.gif";
		}else{
			$path=$ci['Product']['image'];
		}
		;?>
	<?php $code="{$ci['Brand']['code']}-{$ci['Color']['code']}-{$ci['Product']['id']}";?>
	<div id='cart_img'>
			<?php echo $this->Html->image($path,array(
				'width'=>180,
				'height'=>120,
			));?>
	</div><!-- end : cart_img -->
	<div id='cart_info'>
			<table cellpadding='0' cellspacing='0'>
				<tr><th>商品番号</th><td><?php echo $code ?></td></tr>
				<tr><th>color</th><td><?php echo $ci['Color']['name'] ?>
					<?php echo $this->Html->image("color_icons/{$ci['Color']['icon']}",
						array('width'=>40,'height'=>20)
					);?>
					</td></tr>
				<tr><th>価格</th><td><?php echo number_format($ci['Product']['price']) ?>円</td></tr>
			</table>

			<div id='select_lens'>
			<?php $i=$this->Session->read('cart');?>
			<?php if(!isset($i[$key]['Lens'])):?>
				<?php echo $this->Html->link('レンズを選択する',array('controller'=>'Lens','action'=>'select',$key),array('class'=>'select_lens'));?>
			<?php else:?>
			<ul>
				<?php if($i[$key]['Lens']['is_leveled']=='1'):?>
				<li><?php echo $lens_options['n'][$i[$key]['Lens']['no_lens_id']];?>

					(<?php echo number_format( $lens_price['n'][$i[$key]['Lens']['no_lens_id']]);?>円)
				
					<?php echo $this->Html->link('変更',array('controller'=>'lens','action'=>'select',$key),array('class'=>'changeLink'));?>
				</li>
				<?php else:?>
				<li><?php echo $lens_options['e'][$i[$key]['Lens']['enkin_lens_id']];?>
				</li>
				<li><?php echo $lens_options['l'][$i[$key]['Lens']['leveled_lens_id']];?>
					(<?php echo number_format($lens_price['l'][$i[$key]['Lens']['leveled_lens_id']]);?>円)	
				<?php echo $this->Html->link('変更',array('controller'=>'lens','action'=>'select',$key),array('class'=>'changeLink'));?>
				</li>
								<?php endif;?>
			</ul>
			<?php endif;?>
			</div>
		
			<div id='del'><?php echo $this->Html->link('カートから削除', array('action'=>'delItem',$key));?>
			</div>
	</div><!--end: cart_info -->
</div>
<?php endforeach;?>
<div id='total'>
	<p>合計:<?php echo number_format($total);?>円</p>
</div>

<div id='lens_data'>
<h2>レンズデータ</h2>
	<?php if($message=='member_lens_data'):?>
		<?php $lens_info=$this->Session->read('member_lens_info');?>
		<?php if($lens_info && !is_null($lens_info['LensInfo']['level_r'])):?>
		<table cellpadding='0' cellspacing='0' id='table_data'>
			<tr><th></th><th>SPH球面度数</th><th>CYL乱視度数</th></tr>
			<tr><th>右目</th><td><?php echo $lens_info['LensInfo']['level_r'];?></td><td><?php echo $lens_info['LensInfo']['astig_r'];?></td</tr>
		<tr><th>左目</th><td><?php echo $lens_info['LensInfo']['level_l'];?></td><td><?php echo $lens_info['LensInfo']['astig_l'];?></td></tr>
		</table>
		<p class='changeData'><?php echo $this->Html->link('レンズデータ変更',array('controller'=>'lens','action'=>'addInfo'));?></p>
		<?php else:?>
		<p class='changeData'><?php echo $this->Html->link('レンズデータを入力',array('controller'=>'Lens','action'=>'addInfo'));?></p>
		<?php endif;?>
	<?php else:?>
	<?php echo "<p class='changeDataMessage'>{$message}</p>";?>
	<?php endif;?>
</div>

<div>
	<?php echo $this->Html->link('商品一覧に戻る',array('action'=>'catalogue'),array('id'=>'back'));?>
	<?php echo $this->Html->link('カートを空にする',array('action'=>'emptyCart'),array('id'=>'empty'));?>
	<?php echo $this->Html->link('ご注文手続きへ',array('action'=>'inputSelect'),array('id'=>'input_cart'));?>
</div>
<?php endif;?>
