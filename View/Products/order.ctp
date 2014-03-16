<?php echo 'session["cart"]'.debug($this->Session->read('cart'));?>
<?php echo 'session["total"]'. debug($this->Session->read('total'));?>
<?php echo 'session["member"]'. debug($this->Session->read('member'));?>
<?php echo 'session["member_info"] ' . debug($this->Session->read('member_info'));?>
<?php echo 'session["sendTo"]' . debug($this->Session->read('sendTo'));?>
<?php echo 'session["payment"]' . debug($this->Session->read('payment'));?>
