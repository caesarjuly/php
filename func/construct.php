<?php
	include 'utils.php';
	class Employee{
		private $name;
		
		function __construct(){
			eh("Employee is constructed!");
		}
		function setName($name){
			$this->name = $name;
		}
		function getName(){
			return $this->name;
		}
		
	}
	class Executive extends Employee{
		function __construct(){
			eh("Executive is constructed!");
			parent::__construct();
		}
		function pillageCompany(){
			eh("I'm selling company assets to finance my yacht!");
		}
	}
	class CEO extends Executive{
		function __construct(){
			eh("CEO is constructed!");
			parent::__construct();
		}
		function getFacelift(){
			eh("nip nip tuck tuck");
		}
	}
	$ceo = new CEO();
	