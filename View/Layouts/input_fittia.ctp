<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>めがねのfittia | ご家族の目のを考えたサービス</title>
<meta name="keywords" content="fittia,フイッティア,フィッティング,石川,能登,羽咋,七尾,メガネ,眼鏡,近視,こども,学生,家族,視力,フレーム,レンズ,修理,割引,交換,キャンペーン,マックスバリュー,ベイモール"/>
<meta name="description" content="お子様、ご家族でメガネが必要になりましたら、七尾、羽咋めがねのフィッティアまでお越しください。メガネのフィッティング技術に長けたスタッフが、お客様ひとりひとりにピッタリなメガネを提案いたします" />

<?php echo $this->Html->css('input_common');?>
<script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<?php echo $this->Html->script('imagesLoaded');?>
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
		<?php if(!$user):?>
        	<li><?php echo $this->Html->link('会員登録',array('action'=>'users','action'=>'add'));?></li>
            <li><?php echo $this->Html->link('ログイン',array('action'=>'users','action'=>'login'));?></li>
		<?php else:?>
			<li id='header_message'>ようこそ、<?php echo $user;?>さん</li>
			<li><?php echo $this->Html->link('マイページ',array('controller'=>'users','action'=>'myPage'));?></li>
			<li><?php echo $this->Html->link('ログアウト',array('controller'=>'users','action'=>'logout'));?></li>
		<?php endif;?>
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
	<ul>
		<li id='menu_select'>1. 登録方法選択</li>
		<li id='menu_input'>2. お客様情報入力</li>
		<li id='menu_info'>3. お客様情報</li>
		<li id='menu_payment'>4. お支払い方法<br />選択</li>
		<li id='menu_confirm'>5. 最終確認</li>
		<li id='menu_complete'>6. 注文完了</li>
	</ul>
</div>
<div id="main">
       <?php echo $content_for_layout;?> 
</div><!-- end: main -->
<div id="side">
	<ul>
		<li><div id='cart_box'><?php echo $this->Html->link('Cart',array('action'=>'showCart'));?></div></li>
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
<div id='cart_side'>
<?php
	if($this->Session->read('cart')){
		$items=$this->Session->read('cart');
		$quantity=count($items);
		$total=$this->Session->read('total');
	}else{
		$quantity=0;
		$total=0;
	}
?>
<p><?php echo $this->Html->image('wellington_ico.gif',array('width'=>'60','height'=>'23'));?> ×　<?php echo $quantity;?></p>
<p>合計金額 : <?php echo number_format($total);?>円</p>
</div>


</div><!-- end: side -->
<div id="footer">
	<ul>
    	<li><a href="http://sandbox.winschool.jp/~tochigi/utsunomiya_k/kknhc045/concept.html">fittiaのこだわり</a></li>
        <li><a href="http://sandbox.winschool.jp/~tochigi/utsunomiya_k/kknhc045/family.html">家族の目のために</a></li>
        <li><a href="http://sandbox.winschool.jp/~tochigi/utsunomiya_k/kknhc045/catalogue.html">商品リスト</a></li>
        <li><a href="http://sandbox.winschool.jp/~tochigi/utsunomiya_k/kknhc045/shop.html">店舗情報</a></li>
        <li><a href="http://sandbox.winschool.jp/~tochigi/utsunomiya_k/kknhc045/contact.html">お問い合わせ</a></li>
    </ul>

	<p>Copyright (C)2012 fittia megane All Rights Reserved.</p>
</div><!-- end: footer -->
</div><!-- end: conntainer-->
</body>
</html>
