<h2><?php echo $lists[0]['Brand']['name'];?>の商品一覧です</h2>
<div class='paginator'>
	<ul>
		<?php echo $this->Paginator->prev('<li class="prev_page">前</li>',array('escape'=>false));?>
		<?php echo $this->Paginator->numbers(array(
			'tag'=>'li',
			'separator'=>'',
		));?>;
		<?php echo $this->Paginator->next('<li class="next_page">次</li>',array('escape'=>false));?>
	</ul>
</div>

<div id='products_list'>
<?php foreach($lists as $list):?>
	<div class='products'>
			<?php if(!$list['Product']['image']):?>
			<?php $path=$list['Brand']['code'] . '/' . $list['Type']['name'] . 
				'/' . $list['Color']['name'] . '.gif';?>
			<?php else:?>
			<?php $path=$list['Product']['image'];?>
			<?php endif;?>
				<?php echo $this->Html->link($this->Html->image(
					$path,
					array('width'=>180,'height'=>120)),
					array('action'=>'description',$list['Product']['id']),
					array('escape'=>false))
				;?>
			
			<ul>
				<li>brand | <?php echo $list['Brand']['name'] ?></li>
				<li>price&nbsp; | <?php echo number_format($list['Product']['price']) . '円';?></li>
				<li><?php echo $this->Html->image($sexes[$list['Brand']['sex_id']] . "_icon.gif",array('width'=>'35','height'=>'15'));?>
					<?php echo $this->Html->image($targets[$list['Brand']['target_id']] . "_icon.gif",array('width'=>'35','height'=>'15'));?>
				</li>
			</ul>
	</div>
<?php endforeach;?>
</div>

<div class='paginator'>
	<ul>
		<?php echo $this->Paginator->prev('<li class="prev_page">前</li>',array('escape'=>false));?>
		<?php echo $this->Paginator->numbers(array(
			'tag'=>'li',
			'separator'=>'',
		));?>;
		<?php echo $this->Paginator->next('<li class="next_page">次</li>',array('escape'=>false));?>
	</ul>
</div>
