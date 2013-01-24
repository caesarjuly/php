<?php
class Page
{
	//attributes
	public $content;
	public $title = "Euphoria's first template!";
	public $keywords = "Euphoria, First, template";
	public $buttons = array("Home"     => "home.php",
							"Contact"  => "contact.php",
							"Services" => "services.php",
							"Site Map" => "map.php"
							);

	//operations
	public function __set($name, $value)
	{
		$this->$name = $value;
	}

	public function Display()
	{
		echo "<html>\n<head>\n";
		$this->DisplayTitle();
		$this->DisplayKeywords();
		$this->DisplayStyles();
		echo "</head>\n<body>\n";
		$this->DisplayHeader();
		$this->DisplayMenu($this->buttons);
		echo $this->content;
		$this->DisplayFooter();
		echo "</body>\n</html>\n";

	}

	public function DisplayTitle()
	{
		echo "<title>".$this->title."</title>";
	}

	public function DisplayKeywords()
	{
		echo "<meta name=\"keywords\"
			content=\"".$this->keywords."\"/>";
		echo "<meta content=\"text/html;charset=utf-8\" http-equiv=\"content-type\">";
	}

	public function DisplayStyles()
	{
	?>
		<style type="text/css">

		</style>
	<?php
	}

	public function DisplayHeader()
	{
	?>
		<h1>My First Template</h1>
	<?php
	}

	public function DisplayMenu($buttons)
	{
		//button size
		$width = 100/count($buttons);

		while (list($name, $url) = each($buttons)) {
			$this->DisplayButton($width, $name, $url,
								!$this->IsUrlCurrentPage($url));
		}

	}

	public function IsUrlCurrentPage($url)
	{
		if(strpos($_SERVER['PHP_SELF'], $url) == false)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function DisplayButton($width, $name, $url, $active = true)
	{
		if($active)
		{
			echo "<p width=\"".$width."%\">
			<a href=\"".$url."\">
			<span class=\"menu\">".$name."</span></a>";
		}
		else
		{
			echo "<p width\"".$width."%\">
			<span class=\"menu\">".$name."</span></a>";
		}
	}

	public function DisplayFooter()
	{
	?>
		<p class="foot">&copy; Euphoria's Test.</p>
	<?php
	}
}
