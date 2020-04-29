<?php

/**
 * @package PHP MapTiler, Simple Map Tiles Generator
 * @version 1.0 (2020.04.29)
 * @author  Sylvain Langler
 * @license	GNU/GPL http://www.gnu.org/licenses/gpl.html
 */

require('./resources/maptiler.php');

// Premier argument = l'image
$img = $argv[1];

// Le dossier dans lequel seront mises les images (ex: carte_1 pour l'image ./originaux/carte_1.jpg)
$folder = basename(explode('.', $img)[0]);

// Si le dossier n'existe pas on le créé
if (!file_exists('./' . $folder)) {
	mkdir('./' . $folder);
}

// Initialisation du script pour générer les images
$map_tiler = new MapTiler($img, array(
	'tiles_path' => './' . $folder,
	'zoom_max' => 6
));

// Execution
try {

	$map_tiler->process(true);
} catch (Exception $e) {
	echo $e->getMessage();
	echo $e->getTraceAsString();
}
