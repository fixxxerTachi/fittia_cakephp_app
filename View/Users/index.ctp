<h1>サンプルアプリ</h1>
<h2>ダッシュボード</h2>
<ul>
<li><?php echo $this->Html->link('お問い合わせ',array('controller'=>'contacts','action'=>'index'));?></li>
<br />
<li><?php echo $this->Html->link('ユーザー管理',array('action'=>'userlist'));?></li>
<br />
<li><?php echo $this->Html->link('ログアウト',array('action'=>'logout'));?></li>
</ul>

