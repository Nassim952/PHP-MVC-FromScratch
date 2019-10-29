<?php

/*
	Variables : 
	Commence par un $
	Commence pas par un chiffre
	Camel Case
	En anglais

	5 Types :
	- Integer
	- String
	- Float
	- Boolean
	- null
*/
$myFirstname = "Yves";

//Constantes
define("MACONSTANTE", "valeur");
echo MACONSTANTE;


//Conditions
$age = 18;
if($age === "18"){
	echo "tout juste majeur";
}elseif(){

}else{

}


$age = 19;

if($age >= 18){
	echo "majeur";
}else{
	echo "mineur";
}

// Condition ternaire
// instruction (condition)?vrai:faux;
echo ($age >=18 )?"majeur":"mineur";


$genre = "Mr";
switch ($genre) {
	case 'Mr':
		echo "Bonjour Monsieur";
		
	case 'Mme':
		echo "Bonjour Madame";
		
	default:
		echo "Bonjour";
		
}

if($genre == "Mr"){
	echo "Bonjour Monsieur";
	echo "Bonjour Madame";
	echo "Bonjour";
}else if($genre == "Mme"){
	echo "Bonjour Madame";
	echo "Bonjour";
}else{
	echo "Bonjour";
}

for($i=0; $i<100; ++$i){

}

$i = 0;
echo $i++; //0
echo $i; // 1
echo ++$i; //2
echo $i+1; //3
echo $i=$i+1;//3
echo --$i;//2
echo $i+=2;//4
echo $i;//4

$cpt = 0;
while($cpt < 100){

	$cpt++;
}


do{

}while();


//Tableau

//$myArray = array();
$myArray = [];

$student = ["GELIN", "Enzo", 4, 14, 12];
//Enzo GELIN a une moyenne de 10,5
echo $student[1]." ".$student[0]." a une moyenne de ".(($student[2]+$student[3]+$student[4]*2)/4);

//Les dimensions

$classroom = [[],[[],[[[],[[]]],[]]]];

//echo $classroom;
print_r($classroom);
var_dump($classroom);

$classroom = [
				["GELIN", "Enzo", 4, 14, 12],
				["WASIK", "Côme", 10, 11, 11],
				["BESSON", "Loan", 14, 14, 18]
			];


echo $classroom[2][0];

$classroom[2][]=15;
//$classroom[2][5]=15;

$student = [
			"firstname"=>"Pierre", 
			"lastname"=>"Louise", 
			"age"=>19];

//Afficher : Prénom nom a age ans
echo $student["firstname"]." ".$student["lastname"]." a ".$student["age"]." ans";


$student[]="test";



$classroom = [
				0=>["GELIN", "Enzo", 4, 14, 12],
				1=>["WASIK", "Côme", 10, 11, 11],
				2=>["BESSON", "Loan", 14, 14, 18]
			];

foreach ($classroom as $key=>$student) {
	
	
}






