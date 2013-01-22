<?php
	include 'utils.php';
	
	class Employee{
		private $name;
		const PI = "3.141592653";
		
		function __construct(){
			$this->name = "Sky";
			echo "Hello! Sky!<br>";
		}
		function __destruct(){
			echo "Goodbye!";
		}
		function hello(){
			echo "Hello!";
		}
		function __set($propName, $value){
			$this->$propName = $value;
		}
		function __get($propName){
			return $this->$propName;
		}
	}
	
	$employee = new Employee();
	eh($employee->name);
	$employee->name = "July";
	eh($employee->name);
	$employee->newProp = "newProp";
	eh($employee->newProp);
	eh(Employee::PI);
	eh(Employee::hello());