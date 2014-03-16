<?php echo $this->Html->script('catalogue');?>
<?php $checked=$this->Session->read('conditions');?>
<script type='text/javascript'>
$(function(){
	if(!$('.ProcductOrder input:checked')){
		$('.ProductOrder input[value=new]').attr('checked',true);
	}
	$('.ProductOrder input').click(function(){
		$('.ProductOrder input').attr('checked',false);
		$(this).attr('checked',true);
	});
});
</script>
<h2>商品検索</h2>
<?php echo $this->Form->create('Product',array('action'=>'catalogue'));?>
<div id='search' >
	<dl>
		<dt>並べ変え順</dt>
		<dd>
		<?php echo $this->Form->input('order',array(
			'label'=>false,
			'type'=>'select',
			'multiple'=>'checkbox',
			'options'=>array('new'=>'新着順','price'=>'価格の安い順'),
			'separator'=>'</dd><dd>',
			'selected'=>$checked['order'],
			'class'=>'ProductOrder',
		));?>
		</dd>
	</dl>
	<dl>
		<dt>フレームの形</dt>
		<dd>
		<?php echo $this->Form->input('type',array(
			'label'=>false,
			'type'=>'select',
			'multiple'=>'checkbox',
			'options'=>array('oval'=>'oval','square'=>'square','wellington'=>'wellington'),
			'separator'=>'</dd><dd>',
			'selected'=>$checked['type'],
			'class'=>'type_select'
		));?>
		</dd>
	</dl>
	<dl>
		<dt>大人用 / こども用</dt>
		<dd>
		<?php echo $this->Form->input('target',array(
			'label'=>false,
			'type'=>'select',
			'multiple'=>'checkbox',
			'options'=>array('adults'=>'大人用','kids'=>'こども用'),
			'separator'=>'</dd><dd>',
			'selected'=>$checked['target']
		));?>
		</dd>
	</dl>
	<dl>
		<dt>女性用 / 男性用</dt>
		<dd>
		<?php echo $this->Form->input('sex',array(
			'label'=>false,
			'type'=>'select',
			'multiple'=>'checkbox',
			'options'=>array('female'=>'女性用','male'=>'男性用'),
			'separator'=>'</dd><dd>',
			'selected'=>$checked['sex']
		));?>
		</dd>
	</dl>

</div>
<div id='color'>
	<p>Color</p>
	<?php $colorList=array('black'=>'black','blue'=>'blue','brown'=>'brown','green'=>'green','lime'=>'lime','red'=>'red','pink'=>'pink','purple'=>'purple');?>
			<?php echo $this->Form->input('color',array(
				'type'=>'select',
				'multiple'=>'checkbox',
				'options'=>$colorList,
				'label'=>false,
				'selected'=>$checked['color'],
				)
			);?>
</div>

<div id='search_btn'><a href='javascript:void(0)'>Search</a></div>
<?php echo $this->Form->end();?>
<h2>商品一覧</h2>
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
				<?php echo $this->Html->link($this->Html->image(
					$path,array('width'=>180,'height'=>120)),
					array('action'=>'description',$list['Product']['id']),
					array('escape'=>false))
				;?>
			<?php else:?>
				<?php echo $this->Html->link($this->Html->image(
					$list['Product']['image'],array('width'=>180,'height'=>120)),
					array('action'=>'description',$list['Product']['id']),
					array('escape'=>false))
				;?>
			<?php endif;?>
			<ul>
				<li><span class='brand'>brand</span>&nbsp;  <?php echo $list['Brand']['name'] ?></li>
				<li><span class='brand'>price</span>&nbsp;&nbsp;&nbsp;<?php echo number_format($list['Product']['price']) . '円';?></li>
				<li><?php echo $this->Html->image($sexes[$list['Brand']['sex_id']] . "_icon.gif",array('width'=>'40','height'=>'18'));?>
					<?php echo $this->Html->image($targets[$list['Brand']['target_id']] . "_icon.gif",array('width'=>'40','height'=>'18'));?>
				</li>
				<?php if($list['Product']['quantity']=='0'):?>
				<li style='color: orange'>入荷待ち</li>
				<?php endif;?>
			</ul>
	</div><!-- end : products -->
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

