<?php

//Générer une chaîne aléatoire d'une longueur aléatoire entre 6 et 8

//Afficher cette chaîne dans l'image

//-> avec une police aléatoire par caractère au format ttf se trouvant dans le dossier fonts

//-> si je rajoute un fichier ttf il doit être automatiquement pris en compte

//-> avec une position aléatoire par caractère

//-> avec un angle aléatoire par caractère

//-> avec une couleur aléatoire par caractère

//-> avec une taille aléatoire par caractère

//-> la couleur de fond doit être aléatoire

// -> ajouter par dessus une nombre aléatoire de formes géométriques aléatoires de couleurs déjà
// utilisées par le texte sur des positions aléatoires

header("Content-type: image/png");

$image = imagecreate(450, 80);

$caract = "abcdefghijklmnopqrstuvwxyz";
$randomStr = "";
$randomCaptha = rand(6,8);

//on construit la chaîne de caractère aléatoire 
for ($i=0; $i <= $randomCaptha; $i++) {
    $randomStr = $randomStr.$caract[rand(0, strlen($caract)-1)];
}

// on obtient un Array ( [0] => ../fonts/AleviRou.ttf [1] => ../fonts/DarkFont.ttf [2] => ../fonts/Habana-Vieja-demo.ttf )
// on récupèrera un font aléatoire en piochant une clé et récupérer sa value grâce à array_rand()
$fonts = glob("../fonts/*.ttf");

//width
$x = rand(25,35);

for($i=0; $i <= $randomCaptha; $i++) {
    //on défini une couleur aléatoire qu'on ajoutera a notre tableau $color[] à chaque itération, chaque index aura une couleur différente
    $color[] = imagecolorallocate($image, rand(1,254), rand(1,254), rand(1,254 ));
    //on dessine le text avec la couleur en index $i et le font piocher aléatoirement
    imagettftext($image, rand(25,60), rand(-45,45), $x, rand(45,50), $color[$i], $fonts[array_rand($fonts)], $randomStr[$i]);
    //décale la lettre suivante d'une valeur width aléatoire
    $x = $x + rand(40,50);
}

//on défini le nombre de formes qu'aura notre captcha
$drawForm = rand(3,6);

for($i=0 ; $i<=$drawForm ; $i++){
    //pour chaque itération on dessinera une forme aléatoire entre 1 et 3->(default) du switch à une pos aléatoire d'une couleur déjà utilisé avec la variable $color défini plus haut
    $form = rand(1,3);
    switch ($form) {
        case 1:
            imageline($image, rand(100,350), rand(0,200), rand(0,200), rand(0,200), $color[array_rand($color)]);
            break;
        case 2:
            imagerectangle($image, rand(100,350), rand(0,200), rand(0,200), rand(0,200), $color[array_rand($color)]);
            break;
        default:
            imageellipse($image, rand(100,350), rand(0,200), rand(0,200), rand(0,200), $color[array_rand($color)]);
            break;
    }
}

imagepng($image);
