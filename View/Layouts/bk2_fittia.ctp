<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>めがねのfittia | ご家族の目のを考えたサービス</title>
<meta name="keywords" content="fittia,フイッティア,フィッティング,石川,能登,羽咋,七尾,メガネ,眼鏡,近視,こども,学生,家族,視力,フレーム,レンズ,修理,割引,交換,キャンペーン,マックスバリュー,ベイモール"/>
<meta name="description" content="お子様、ご家族でメガネが必要になりましたら、七尾、羽咋めがねのフィッティアまでお越しください。メガネのフィッティング技術に長けたスタッフが、お客様ひとりひとりにピッタリなメガネを提案いたします" />

<?php echo $this->Html->css('bx_styles/bx_styles');?>
<?php echo $this->Html->css('common');?>
<script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<?php echo $this->Html->script('jquery.bxSlider.min.js');?>
<?php echo $this->Html->script('common');?>
</head>

<body>
<div id="container">

<div id='header'>
	<h1>めがねのフィッティア　あなたの個性にあわせたメガネを提案する能登のメガネ屋です</h1>
    <div id="logo"><a href="http://sandbox.winschool.jp/~tochigi/utsunomiya_k/kknhc045/index.html">
		<?php echo $this->Html->image("logo4.gif",array('width'=>"180" ,'height'=>"80", 'alt'=>"フィッティア"));?></a></div>
    <div id='header_shop'>
    	<ul>
        	<li><a href='shop.html'>七尾店</a></li>
            <li><a href='shop.html'>羽咋店</a></li>
        </ul>
    </div>

	<div id="navi">
    	<ul>
            <li><a href="http://sandbox.winschool.jp/~tochigi/utsunomiya_k/kknhc045/index.html"><img src="<?php echo $this->webroot ?>img/menubar/concept_off.gif" width="140" height="60" alt="フィッティアのこだわり" /></a></li>
	    	<li><a href="http://sandbox.winschool.jp/~tochigi/utsunomiya_k/kknhc045/family.html"><img src="<?php echo $this->webroot ?>img/menubar/family_off.gif" width="140" height="60" alt="家族の目のために" /></a></li>
            <li><a href="http://sandbox.winschool.jp/~tochigi/utsunomiya_k/kknhc045/catalogue.html"><img src="<?php echo $this->webroot ?>img/menubar/catalogue_off.gif" width="140" height="60" alt="商品リスト" /></a></li>
            <li><a href="http://sandbox.winschool.jp/~tochigi/utsunomiya_k/kknhc045/shop.html"><img src="<?php echo $this->webroot ?>img/menubar/shop_off.gif" width="140" height="60" alt="店舗案内" /></a></li>
            <li><a href="http://sandbox.winschool.jp/~tochigi/utsunomiya_k/kknhc045/contact.html"><img src="<?php echo $this->webroot ?>img/menubar/contact_off.gif" width="140" height="60" alt="お問いあわせ" /></a></li>
        </ul>
    </div><!-- end: navi-->
</div><!-- end : header -->
<div id="mainvisual">
<ul id='slider1'>
<li>
	<div>
		<?php echo $this->Html->link($this->Html->image(
			'products/brand/carufure_main_off.gif',
			array('width'=>"450", 'height'=>"265")),
			array('action'=>'brand','carufure'),array('escape'=>false))
		;?>
	</div>
	<div><?php echo $this->Html->link($this->Html->image(
			'products/brand/sikumi_main_off.gif',
			array('width'=>'450','height'=>'265')),
			array('action'=>'brand','sikumi'),array('escape'=>false))
		;?>
	</div>
</li>
<li>
	<div>
		<?php echo $this->Html->link($this->Html->image(
			'products/brand/ubu_main_off.gif',
			array('width'=>'450','height'=>'265')),
			array('action'=>'brand','ubu'),array('escape'=>false))
		;?>
	</div>
	<div>
		<?php echo $this->Html->link($this->Html->image(
			'products/brand/wellington_main_off.gif',
			array('width'=>'450','height'=>'265')),
			array('action'=>'brand','wellington'),array('escape'=>false))
		;?>
	</div>
</li>
</ul>
</div> 
<div id="main">
       <?php echo $content_for_layout;?> 
</div><!-- end: main -->
<div id="side">
	<ul>
    	<li><a href="http://sandbox.winschool.jp/~tochigi/utsunomiya_k/kknhc045/campaign.html#student"><img src="<?php echo $this->webroot ?>img/campaign/campaign_student_off.gif" width="200" height="144" alt="学生割" /></a></li>
        <li><a href="http://sandbox.winschool.jp/~tochigi/utsunomiya_k/kknhc045/campaign.html#family"><img src="<?php echo $this->webroot ?>img/campaign/campaign_family_off.gif" width="200" height="144" alt="家族割" /></a></li>
        <li><a href="http://sandbox.winschool.jp/~tochigi/utsunomiya_k/kknhc045/campaign.html#support"><img src="<?php echo $this->webroot ?>img/campaign/campaign_support_off.gif" width="200" height="144" alt="2年サポート" /></a></li>
        <li><?php echo $this->Html->link(
				$this->Html->image(
					"campaign/campaign_store_off.gif" ,
					array('width'=>"200", 'height'=>"144", 'alt'=>"オンラインストア")
				),
				array('action'=>'catalogue'),
				array('escape'=>false)
			);?>
        </li>
    </ul>
</div><!-- end: side -->
<div id="footer">
	<p>Copyright (C)2012 fittia megane All Rights Reserved.</p>
</div><!-- end: footer -->
</div><!-- end: conntainer-->
</body>
</html>
