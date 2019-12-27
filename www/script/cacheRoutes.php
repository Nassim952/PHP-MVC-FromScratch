<?php

//Récupérer le fichier yaml
$listOfRoutes = yaml_parse_file("../routes.yml");

//Le fichier devra s'appeler "routes.cache.php"
$data = var_export($listOfRoutes, true);

file_put_contents("../cache/routes.cache.php", "<?php ".$data);