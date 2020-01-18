<?php
include_once 'custom_functions.php';
$species_message_id_default = "";
if(CheckFile(null, "species_message_id.php"))	$species_message_id = VarLoad(null, "species_message_id.php");			//Load saved option file
else{
	$species_message_id = $species_message_id_default;
	VarSave(null, "species_message_id.php", $species_message_id);
}

$Aquatic = "🐟"; //:fish:
$Avian = "🐦"; //:bird:
$Bat = "🦇"; //:bat:
$Bear = "🐻"; //:bear:
$Canine = "🐕"; //:dog:
$Deer = "🦌";//:deer:
$Dolphin = "🦈"; //:dolphin:
$Dragon = "🐉"; //:dragon:
$Equine = "🐴"; //:horse:
$Feline = "😺"; //:smiley_cat:
$Fox = "🦊"; //:fox:
$Hybrid = "🔀"; //:twisted_rightwards_arrows:
$Mouse = "🐭"; //:mouse: 
$Pokemon = "🍎"; //:apple
$Protogen = "🤖"; //:robot;
$Rabbit = "🐰"; //:rabbit:
$Reptile = "🦎"; //:lizard:
$Sergal = "🧀"; //:cheese: 
$Shapeshifter = "🔷"; //:small_blue_diamond
$Wolf = "🐺"; //:wolf:

$Goat = "🐐"; //:goat:
$Human = "🚶"; //:person_walking: 
$Kobold = "🍆"; //:eggplant:
$Misc = "🤷"; //:person_shrugging: ///Unlisted Species
$Otter = "🍿"; //:popcorn:
$Panda = "🐼"; //:panda_face:
$Penguin = "🐧"; //:penguin:
$Raccoon = "🕳️"; //:hole:
$Shark = "🦈"; //:shark:
$Squirrel = "🌰"; //:chestnut:

//Message copy-pasta:
$species_message_text = "**Role Menu: Species**
:fish: : `Aquatic`
:bird: : `Avian`
:bat: : `Bat`
:bear: : `Bear`
:dog: : `Canine`
:deer: : `Deer`
:dragon: : `Dragon`
:horse: : `Equine`
:smiley_cat: : `Feline`
:fox: : `Fox`
:twisted_rightwards_arrows: : `Hybrid`
:basketball: : `Kangaroo`
:mouse: : `Mouse`
:apple: : `Pokemon`
:robot: : `Protogen`
:rabbit: : `Rabbit`
:lizard: : `Reptile`
:cheese: : `Sergal`
:small_blue_diamond: : `Shapeshifter`
:wolf: : `Wolf`
:goat: : `Goat`
:person_walking: : `Human`
:eggplant: : `Kobold`
:person_shrugging: : `Misc/Unlisted Species`
:popcorn: : `Otter`
:panda_face: : `Panda`
:penguin: : `Penguin`
:hole: : `Raccoon`
:shark: : `Shark` 
:chestnut: : `Squirrel`";
?>
