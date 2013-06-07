<?php
	//format the output as html
	//and call the dump_array repeatedly
	
	echo "\n<!--BEGIN VARIABLE DUMP-->\n\n";

	echo "<!--BEGIN GET VAR-->\n";
	echo "<!--".dump_array($_GET)."-->\n\n";

	echo "<!--BEGIN POST VAR-->\n";
	echo "<!--".dump_array($_POST)."-->\n\n";

	if (isset($_SESSION)) {
		echo "<!--BEGIN SESSION VAR-->\n";
		echo "<!--".dump_array($_SESSION)."-->\n\n";
	}

	echo "<!--BEGIN COOKIE VAR-->\n";
	echo "<!--".dump_array($_COOKIE)."-->\n\n";

	echo "\n<!--END VARIABLE DUMP-->\n\n";

	/**
	 * list the variables 
	 * @param  [array] $array 
	 * @return [string] $string 
	 */
	function dump_array($array)
	{
		if(is_array($array)){
			$size = count($array);
			$string = "";
			if ($size) {
				$count = 1;
				$string .= " Array\n(\n ";
				foreach ($array as $var => $value) {
					$string .= " [".$var."] => ".$value;
					if ($count++ < $size) {
						$string .= ",\n";
					}
				}
				$string .= " \n)\n";
			}
			return $string;
		}else{
			return $array;
		}
	}
?>