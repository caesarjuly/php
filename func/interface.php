<?php
	include 'utils.php';
	interface IPillage{
		function emptyBankAccount();
		function burnDocument();
	}
	
	class Executive implements IPillage{
		function emptyBankAccount(){
			eh("Call CFO and ask to transfer funds to Swiss bank account.");
		}
		function burnDocument(){
			eh("Torch the office suite.");
		}
	}
	class Assistant implements IPillage{
		function emptyBankAccount(){
			eh("Go on Shopping spree with office credit card.");			
		}
		function burnDocument(){
			eh("Start small fire in the trash can.");
		}
	}
	
	$executive = new Executive();
	$executive->emptyBankAccount();
	$executive->burnDocument();