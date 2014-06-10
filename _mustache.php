<?php 
	require("Mustache/Autoloader.php");
	Mustache_Autoloader::register();

	class customMustache extends Mustache_Engine {
		function compile($saveas=false) {
			$html  = ob_get_contents();
			ob_end_clean();

			if (!$saveas) {
				$saveas = current(explode(".", basename($_SERVER["PHP_SELF"])));
			}

			if ($_GET["version"]) {
				$saveas .= "_".$_GET["version"];
			}

			$savepath = "output/".$saveas.".html";

			// Write HTML			
			$fr = fopen($savepath, "w");
			fwrite($fr, $html);
			fclose($fr);

			echo $html;
			echo '<a href="'.$savepath.'" target="preview" style="display:block;font-size:12px;background-color:#E607CB;color:#fff;padding:5px;text-decoration:none;text-align:center;"><code>Runtime version. Click to open compiled HTML address.</code></a>';
		}

		function addIndex($list, $keyName="index") {
			$withKeys = array();
			foreach ($list as $k => $v) {
				$withKeys[] = array_merge($v, array($keyName=>$k));
			}

			return($withKeys);
		}


		function version($name=false, $var="version") {
			if ($_GET[$var] == $name) {
				return(true);
			} else {
				return(false);
			}
		}


		function display($templateName, $viewData=false) {
			echo $this->render($templateName, $viewData);
		}
	}


	// Create instance
	$mustache = new customMustache(array(
		'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . "/templates", array("extension" => ".html"))
	));

	$included_files = get_included_files();


	ob_start();
?>
