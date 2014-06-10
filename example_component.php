<? require_once("_mustache.php"); ?>
<html>
<head>
	<title>A component</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		body { font-family:arial,helvetica,sans-serif;}
	</style>
</head>
<body>
	<? $mustache->display("example_template", array("name" => "Awesomesauce")); ?>
</body>
</html>
<? $mustache->compile(); ?>
