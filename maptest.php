<?php
include('model/class_map.php');

$map = new Map;
$map->get_geo_info();
var_dump($map);
?>
<html>
<head>
<script src='http://openlayers.org/api/OpenLayers.js'></script>
</head>
<body>
<div id='Map'></div>
<script>
<?php
foreach($map->markers as $marker){
	echo "var div= '<div>". $marker['name'] . $marker['url'] . "</div>'";
}
</script>
</body>
</html>
