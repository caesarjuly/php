<?php
	require("page.inc;");

	class ServicesPage extends Page
	{
		private $row2buttons = array(
				'Re-engineering' => 'reengineering.php',
				'Standards Compliance' => 'standards.php',
				'Buzzword Compliance' => 'buzzword.php',
				'Mission Statements' => 'mission.php'
			);

		public function Display()
		{
			echo "<html>\n<head>\n";
			$this->DisplayTitle();
			$this->DisplayKeywords();
			$this->DisplayStyles();
			echo "</head>\n<body>\n";
			$this->DisplayHeader();
			$this->DisplayMenu($this->buttons);
			$this->DisplayMenu($this->row2buttons);
			echo $this->content;
			$this->DisplayFooter();
			echo "</body>\n</html>\n";

		}
	}

	$services = new ServicesPage();

	$services->content = "<p>继承自page扩展第二行的导航。</p>";

	$services->Display();
