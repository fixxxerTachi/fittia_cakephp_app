<?php echo $this->Html->css('my_site');?>
<h2><?php echo $infos['User']['family_name'];?>さんの登録情報</h2>
<table cellpadding='0' cellspacing='0'>
	<tr>
		<th>お名前</th>
		<td>
			<?php echo $infos['User']['family_name'] . ' ' . $infos['User']['first_name'];?>
		</td>
	</tr>
	<tr>
		<th>ご住所</th>
		<td>
			<p>〒<?php echo $infos['User']['zip_first'] . '-' . $infos['User']['zip_last'];?></p>
			<p><?php echo $infos['User']['prefecture'] . $infos['User']['address'];?>
			<?php echo $infos['User']['address2'];?></p>
		<?php if(!$this->Session->read('mainAddress')):?>
			<p class='change_address'>ここに配送します</p>
		<?php else:?>
			<p class='change_address'><?php echo $this->Html->link('配送先指定',array('action'=>'changeAddress','main'));?></p>
		<?php endif;?>
		</td>
	</tr>
	<tr>
		<th>電話番号</th>
		<td>
			<?php echo $infos['User']['tel1'] . '-' . $infos['User']['tel2'] . '-' .$infos['User']['tel3'];?>
		</td>
	</tr>
	<tr>
		<th>メールアドレス</th>
		<td><?php echo $infos['User']['email'];?></td>
	</tr>
</table>
<div id='change_info'><?php echo $this->Html->link('登録情報を変更する',array('action'=>'changeInfo'));?></div>

<h2>ご登録住所一覧</h2>
<?php if(!$infos['Address']):?>
<p class='no_item'>登録住所はありません</p>
<?php endif;?>
<?php foreach($infos['Address'] as $address):?>
<div class='list_wrapper'>
<div class='address_list'>
	<p>〒<?php echo $address['zip_first'] . '-' . $address['zip_last'];?></p>
	<p><?php echo $address['prefecture']  . $address['address'];?>
	<?php echo $address['address2']?></p>

</div><!-- end: address_list-->
<?php if($address['flag']):?>
	<p class='change_address'><?php echo 'ここに配送します';?></p>
<?php else:?>
	<p class='change_address'><?php echo $this->Html->link('配送先指定',array('action'=>'changeAddress',$address['id']));?></p>
<?php endif;?>
</div><!-- end:list_wrapper -->
<?php endforeach;?>
<div class='add_address'><?php echo $this->Html->link('配送先を追加する',array('controller'=>'Addresses','action'=>'addAddress'));?></div>

<h2>レンズデータ</h2>
<?php if(!$infos['LensInfo']['id']):?>
<p class='no_item'>レンスデータが登録されていません</p>
<div class='add_address'><?php echo $this->Html->link('レンズデータを追加する',array('controller'=>'lens','action'=>'addInfo'));?></div>
<?php else:?>
<div class='addresslist'>
<table class='lens_info' cellpadding='0' cellspacing='0'>
<tr><th></th><th>SPH球面度数</th><th>CYL乱視度数</th></tr>
<tr><th>右目</th><td><?php echo $infos['LensInfo']['level_r'];?></td><td><?php echo $infos['LensInfo']['astig_r'];?></td></tr>
<tr><th>左目</th><td><?php echo $infos['LensInfo']['level_l'];?></td><td><?php echo $infos['LensInfo']['astig_l'];?></td></tr>
</table>
<div class='add_address'><?php echo $this->Html->link('レンズデータを変更する',array('controller'=>'lens','action'=>'editInfo',$infos['LensInfo']['id']));?></div>

</div>
<?php endif;?>

<h2>ご購入履歴です</h2>
	<?php if(!$infos['Order']):?>
	<p class='no_item'> ご購入履歴はありません</p>
	<?php endif;?>
	<?php foreach(($infos['Order']) as $orders):?>
	<div class='bought_list'>
		<?php foreach($orders['Product'] as $p):?>

			<h3>お買い上げ日 : <?php $date=new DateTime($orders['created']); echo $date->format('Y-m-d');?></h3>
			<?php if($p['image']):?>
			<?php $path=$p['image'];?>
			<?php else:?>
			<?php $path="{$p['Brand']['code']}/{$p['Type']['name']}/{$p['Color']['name']}.gif";?>
			<?php endif;?>
		<div class='bought_left'>
			<p><?php echo $this->Html->image($path,array('width'=>180,'height'=>'120'));?></p>
			<p>商品番号 : <?php echo "	{$p['Brand']['code']}-{$p['Color']['code']}-{$p['id']}";?></p>
			<p>Color: 
				<?php echo $this->Html->image('color_icons/' . $p['Color']['icon'] , array('width'=>30,'height'=>12));?>
			</p>
		</div><!--end: bought_left-->
		<div class='bought_right'>
			<p>配送先:
			<?php if($orders['Address']):?>
				<?php echo $orders['Address']['prefecture'] . $orders['Address']['address'] . $orders['Address']['address2'];?>
			<?php else:?>
				<?php echo $orders['User']['prefecture'] . $orders['User']['address'] . $orders['User']['address2'];?>
			<?php endif;?>
			</p>
		<p>お買い上げ合計 : <?php echo number_format($orders['total']);?>円</p>
		<p>お支払い方法 : <?php echo $orders['Payment']['name'];?></p>

			<!--出荷ステータス-->
			<?php 
				$s=$p['OrdersProduct']['shipped_id'];
				$r=$p['OrdersProduct']['returned_id'];
				$c=$p['OrdersProduct']['canceled_id'];
				$today=new DateTime();
				$sDate=new DateTime($orders['created']);
				$sDate->modify('+8 day');

			?>
			<p>出荷状態 : <?php echo $shipped[$s];?></p>
		<?php if($s=='2'):?><!-- ////////出荷待ちで -->
			<p class='cancel'><?php 
				if($c=='1'){	//////--キャンセルまだだったらキャンセルボタンを表示--////
					echo $this->Html->link($canceled[$c],array(
						'controller'=>'orders','action'=>'cancelAction',$p['OrdersProduct']['id']));
				}else{
					echo $canceled[$c];
				}
				?>
			</p>
		<?php endif;?>
		<!-- 返品表示-->
		<?php if($s=='1' && $sDate > $today  && $r==1):?><!-- //////出荷済みで8日以内で返品状態でなかったら返品ボタン表示-->
			<p class='return'><?php echo $this->Html->link($returned[$r],array(
					'controller'=>'orders','action'=>'returnAction',$p['OrdersProduct']['id']));?>
			</p>
		<?php elseif($r!='1'):?>			<!-- 返品処理中のものはその状態を表示-->
			<p class='return'><?php echo $returned[$r];?></p>
		<?php endif;?>
		</div><!--end:bought_right-->
		<?php endforeach;?>
	</div><!-- bought_list-->
	<?php endforeach;?>
<ul id='back_navi'>
<li><?php echo $this->Html->link('商品検索に戻る',array('controller'=>'Products','action'=>'catalogue'));?></li>
<li><?php echo $this->Html->link('カート情報に戻る',array('controller'=>'Products','action'=>'confirmCart'));?></li>
</ul>
