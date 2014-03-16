<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>めがねのfittia | ご家族の目のを考えたサービス</title>
<meta name="keywords" content="fittia,フイッティア,フィッティング,石川,能登,羽咋,七尾,メガネ,眼鏡,近視,こども,学生,家族,視力,フレーム,レンズ,修理,割引,交換,キャンペーン,マックスバリュー,ベイモール"/>
<meta name="description" content="お子様、ご家族でメガネが必要になりましたら、七尾、羽咋めがねのフィッティアまでお越しください。メガネのフィッティング技術に長けたスタッフが、お客様ひとりひとりにピッタリなメガネを提案いたします" />

<?php echo $this->Html->css('common');?>
<?php if( $this->action=='' || $this->action=='catalogue' || $this->action=='brand') echo $this->Html->css('catalogue');?>
<?php if( $this->action=='description') echo $this->Html->css('description');?>
<?php if( $this->action=='brand') echo $this->Html->css('brand');?>
<?php if( $this->action=='showCart') echo $this->Html->css('show_cart');?>
<?php echo $this->Html->css('style2.css');?>
<script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<?php echo $this->Html->script('imagesLoaded');?>
<?php echo $this->Html->script('common');?>
<?php echo $this->Html->script('jquery.easing.js');?>
<?php echo $this->Html->script('script.js');?>
<script type="text/javascript">
 $(document).ready( function(){	
		var buttons = { previous:$('#jslidernews2 .button-previous') ,
						next:$('#jslidernews2 .button-next') };			 
		$('#jslidernews2').lofJSidernews( { interval:5000,
											 	easing:'easeInOutQuad',
												duration:1200,
												auto:true,
												mainWidth:660,
												mainHeight:265,
												navigatorHeight		: 89,
												navigatorWidth		: 230,
												maxItemDisplay:3,
												buttons:buttons } );						
	});

</script>
<style>
	
	ul.lof-main-wapper li {
		position:relative;	
	}
</style>
<script type="text/javascript">

  var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36603077-1']);
	  _gaq.push(['_trackPageview']);

	    (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
					  })();

</script>
</head>
<body>
<div id="container">

<div id='header'>
	<h1>めがねのフィッティア　あなたの個性にあわせたメガネを提案する能登のメガネ屋です.</h1>
    <div id="logo"><a href="http://sandbox.winschool.jp/~tochigi/utsunomiya_k/kknhc045/index.html">
		<?php echo $this->Html->image("logo4.gif",array('width'=>"180" ,'height'=>"80", 'alt'=>"フィッティア"));?></a></div>
    <div id='header_shop'>
    	<ul>
		<?php if(!isset($user) || !$user):?>
        	<li><?php echo $this->Html->link('会員登録',array('controller'=>'users','action'=>'add'));?></li>
            <li><?php echo $this->Html->link('ログイン',array('controller'=>'users','action'=>'login'));?></li>
		<?php else:?>
			<li id='header_message'>ようこそ、<?php echo $user;?>さん</li>
			<li><?php echo $this->Html->link('マイページ',array('controller'=>'Users','action'=>'myPage'));?></li>
			<li><?php echo $this->Html->link('ログアウト',array('controller'=>'Users','action'=>'logout'));?></li>
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
	<div id="jslidernews2" class="lof-slidecontent" style="width:900px; height:265px;">
	<div class="preload"><div></div></div>
            
            
            <div  class="button-previous">Previous</div>
                   
    		 <!-- MAIN CONTENT --> 
              <div class="main-slider-content" style="width:900px; height:265px;">
                <ul class="sliders-wrap-inner">
                    <li>
                         	<?php echo $this->Html->link(
								$this->Html->image('ubu_1.png',array('width'=>'650','height'=>'265')),
								array('action'=>'brand','UBU'),
								array('escape'=>false)
							);?> 
                    </li> 
                   <li>
					  <?php echo $this->Html->link(
					  	$this->Html->image('wellington_1.png',array('width'=>'650','height'=>'265')),
						array('action'=>'brand','WEL'),
						array('escape'=>false)
						);?>
						 <!--
                         <div class="slider-description">
                           <div class="slider-meta"><a target="_parent" title="Newsflash 2" href="#Category-2">/ Newsflash 2 /</a> 	<i> — Monday, February 15, 2010 12:42</i></div>
                            <h4>Content of Newsflash 2</h4>
                            <p>Joomla! makes it easy to launch a Web site of any kind. Whether you want a brochure site or you are...
                            <a class="readmore" href="#">Read more </a>
                            </p>
                         </div>
						-->
                    </li> 
                   <li>
					  <?php echo $this->Html->link(
					  	$this->Html->image('carufure_2.png',array('width'=>'650','height'=>'265')),
						array('action'=>'brand','CRF'),
						array('escape'=>false)
					);?>
						<!--
                        <div class="slider-description">
                          <div class="slider-meta"><a target="_parent" title="Newsflash 3" href="#Category-3">/ Newsflash 3 /</a> 	<i> — Monday, February 15, 2010 12:42</i></div>
                            <h4>Content of Newsflash 3</h4>
                            <p>With a library of thousands of free Extensions, you can add what you need as your site grows. Don't...
                            <a class="readmore" href="#">Read more </a>
                            </p>
                         </div>
						-->
                    </li> 
                    <li>
					  <?php echo $this->Html->link(
					  	$this->Html->image('493_3.png',array('width'=>'650','height'=>'265')),
						array('action'=>'brand','SKM'),
						array('escape'=>false)
					);?>
						<!--
                        <div class="slider-description">
                          <div class="slider-meta"><a target="_parent" title="Newsflash 4" href="#Category-4">/ Newsflash 4 /</a>	<i> — Monday, February 15, 2010 12:42</i></div>
                            <h4>Content of Newsflash 4</h4>
                            <p>Joomla! 1.5 - 'Experience the Freedom'!. It has never been easier to create your own dynamic Web...
                            <a class="readmore" href="#">Read more </a>
                            </p>
                         </div>
					-->
                    </li> 
                  </ul>  	
            </div>
 		   <!-- END MAIN CONTENT --> 
           <!-- NAVIGATOR -->
           	<div class="navigator-content">
                  <div class="navigator-wrapper">
                        <ul class="navigator-wrap-inner">
                          <li>
                                <div>
									<?php echo $this->Html->image('ubu_1.png');?>
                                </div>    
                            </li>
                             <li>
                                <div>
									<?php echo $this->Html->image('wellington_1.png');?>
									<!--
                                    <span>20.01.2010</span> -In id, mauris viverra asperiores, bibendum in id. Eu molestie. Ac sit eu. ..
								-->
                                </div>    
                            </li>
                
                            <li>
                                <div>
									<?php echo $this->Html->image('carufure_2.png');?>
									<!--
                                    <span>20.01.2010</span> - In id, mauris viverra asperiores, bibendum in id. Eu molestie. Ac sit eu. ..
								-->
                                </div>     
                            </li>
                            
                           <li>
                                <div>
									<?php echo $this->Html->image('493_3.png');?>
									<!--
                                    <span>20.01.2010</span> - In id, mauris viverra asperiores, bibendum in id. Eu molestie. Ac sit eu. ..
								-->
                                </div>
                            </li>    
                        </ul>
                  </div>
   
             </div> 
          <!----------------- END OF NAVIGATOR --------------------->
          <div class="button-next"></div>
 
 		 <!-- BUTTON PLAY-STOP -->
          <div class="button-control"><span></span></div>
          <!-- END OF BUTTON PLAY-STOP -->
           
 </div> 


</div>
<div id="main">
       <?php echo $content_for_layout;?> 
</div><!-- end: main -->
<div id="side">
	<ul>
		<li><div id='cart_box'><?php echo $this->Html->link('Cart',array('controller'=>'products','action'=>'showCart'));?></div></li>
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
    	<li><a href="http://sandbox.winschool.jp/~tochigi/utsunomiya_k/kknhc045/index.html">fittiaのこだわり</a></li>
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
