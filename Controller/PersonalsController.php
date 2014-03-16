<?php
class PersonalsController extends AppController{
	public $name = 'Personals';
	public $uses = array('Personal','Board');
	public $scaffold;

}

