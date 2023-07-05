<?php 
class Maison
{
	private static $nbPiece = 7; 
	public static $espaceTerrain = '500m²'; 
	public $couleur = 'blanc'; 
	const HAUTEUR = '10m';
	private $nbPorte = 10;

	public static function getNbPiece()
	{
		return self::$nbPiece;
	}
	
	public function getNbPorte()
	{
		return $this->nbPorte;
	}
}

//TODO : En utilisant la class Maison, répondez aux questions suivantes :

// 1- Quel est le nombre de pièces de la maison?
echo "Le nombre de pièces de la maison est : " . Maison::getNbPiece() . "<br>";

//2- Quelle est la superficie du terrain ?
echo "La superficie du terrain est de " . Maison::$espaceTerrain . "<br>";

//3- Quelle est la hauteur de la maison
echo "Hauteur de la maison : " . Maison::HAUTEUR . "<br>";

//4- Créer un objet Maison(instancier la classe)
$maison = new Maison();

// 5- Quelle est la couleur de cette maison que vous aviez instancier ?
echo "La couleur de la maison est :". $maison->couleur . "<br>";

// 6- Quelle est le nombre de porte cette maison que vous aviez instancier ?
echo "Le nombre de porte cette maison est :". $maison->getNbPorte() . "<br>";
// 7- Modifiez la couleur de cette maison en 'rouge' puis afficher nouvelle couleur de la maison
$maison2 = new Maison;
$maison2->couleur = 'rouge';
echo "Couleur de la maison : " . $maison2->couleur . "<br>";