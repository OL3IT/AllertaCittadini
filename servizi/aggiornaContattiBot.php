<?php

/**

 * Aggiorna rubrica Bot.

 * OL3 - Innovation Tecnologies

 * Licenza X11

 */



 //tutto il necessario per controllare i bot telegram 

 include("../php/telegramBotController.php");

 //tutto il necessario per accedere al db

 include("../php/Connessione.php");

		

$query="SELECT BOTS.BotID, BOTS.BotDescription FROM  BOTS WHERE BOTS.BotType='TELEGRAM';";



$connSelect = new Connessione;

$link = $connSelect->getConnection();

$num=0;

$messag1="Ti sei registrato al servizio ";

$messag2=". Riceverai messaggi da questo contatto solo in caso di necessità.";

if($risultati= $link->query($query)){	



	if(@$risultati->num_rows > 0)

	{

		while ($row = $risultati->fetch_assoc()) {

			$num=0;

			$bot_id=$row['BotID'];						

			$bot_des=$row['BotDescription'];

			$messaggio = $messag1.$bot_des.$messag2;		

			$telegramBC = new TelegramBotController($bot_id);

			$contatti = $telegramBC->updateContactCollection();

			$conneInsert = new Connessione();

			$linkInsert = $conneInsert->getConnection();

			foreach($contatti as $contatto) {

				$insert="INSERT INTO BOTS_CONTATTI (BotID,ContactID) VALUES (";

				//fai insert di bot_id e user id				

				$insert = $insert."'".$bot_id."','".$contatto."');";

				if ($linkInsert->query($insert) === TRUE){				

					$num=$num+1;				

					$req = $telegramBC->sendMessage($messaggio,$contatto);

				}	

				

			}

			$linkInsert->close();

			echo "Sono stati aggiunti ".$num." contatti sul bot ".$bot_des."(".$bot_id.(")");

			echo "</br>";

		}	

		$risultati->close();  

	}else{

		echo "NESSUN DATO";

	}		

} 

$link->close();

 		

?>

