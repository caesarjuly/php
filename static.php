<?php
	include 'utils.php';
	
	class Visitor{
		private static $visitors = 0;
		function __construct(){
			self::$visitors++;
		}
		static function getVisitors(){
			return self::$visitors;
		}
	}
	
	$visitor1 = new Visitor();
	eh(Visitor::getVisitors());
	$visitor2 = new Visitor();
	if($visitor2 instanceof Visitor)
		eh(Visitor::getVisitors());
		
	pt(get_class_methods("Visitor"));