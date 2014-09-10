<?php 
	/*
		https://github.com/morningtoast/flatout2
	*/

	require("Mustache/Autoloader.php");
	Mustache_Autoloader::register();

	class customMustache extends Mustache_Engine {
		function compile($saveas=false) {
			$html     = ob_get_contents();
			$savepath = "output/";

			ob_end_clean();

			if (!$saveas) {
				$saveas = current(explode(".", basename($_SERVER["PHP_SELF"])));
			} else {
				if (strpos($saveas, "/") !== false) {
					$savepath = $_SERVER["DOCUMENT_ROOT"];
				}

			}

			if ($_GET["version"]) {
				$saveas .= "_".$_GET["version"];
			}

			$savepath = $savepath.$saveas.".html";

			// Write HTML			
			$fr = fopen($savepath, "w");
			fwrite($fr, $html);
			fclose($fr);

			echo $html;
			echo '<a href="'.$savepath.'" target="preview" style="display:block;font-size:12px;background-color:#E607CB;color:#fff;padding:5px;text-decoration:none;text-align:center;"><code>Runtime version. Click to open compiled HTML address.</code></a>';


			return($savepath);
		}

		function addIndex($list, $keyName="index") {
			$withKeys = array();
			foreach ($list as $k => $v) {
				$withKeys[] = array_merge($v, array($keyName=>$k));
			}

			return($withKeys);
		}

		function version($name=false, $var="version") {
			if (!$name and !isset($_GET[$var])) {
				return(true);
			} else {
				if ($_GET[$var] == $name) {
					return($name);
				} else {
					return(false);
				}
			}
		}


		function display($templateName, $viewData=false) {
			echo $this->render($templateName, $viewData);
		}
	}


	// Create instance
	$mustache = new customMustache(array(
		'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . "/templates", array("extension" => ".html")),
		'partials_loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . "/templates", array("extension" => ".html"))		
	));

	ob_start();
?>
