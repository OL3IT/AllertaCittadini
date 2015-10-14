<!DOCTYPE html>

<html>
	<head>

	</head>

	<body>				

		<?php 		

		// ************* Sostituire a BOTID l'ID del vostro BOT ********************

		session_start(); // Starting Session

		$error ="";
		

			if(isset($_POST)){

				$numinvii=0;				

				$botid="BOTID";				

				if(isset($_POST['terremototest'])){
					

					$mess="*TEST* ALLERTA TERREMOTO A TEST";

					$numinvii = inviaMessaggi($botid,$mess);

					echo "E' stato inviato il messaggio '".$mess."' a ".$numinvii." contatti.";

				}

				

				if(isset($_POST['alluvionetest'])){			


					$mess="ALLERTA ALLUVIONE A TEST";

					$numinvii = inviaMessaggi($botid,$mess);

					echo "E' stato inviato il messaggio '".$mess."' a ".$numinvii." contatti.";

				}

				

				if(isset($_POST['grandinetest'])){			


					$mess="ALLERTA GRANDINE A TEST";

					$numinvii = inviaMessaggi($botid,$mess);

					echo "E' stato inviato il messaggio '".$mess."' a ".$numinvii." contatti.";

				}

				

			}		

		

		

		function inviaMessaggi($bot_id,$messaggio){				

				

			//tutto il necessario per controllare i bot telegram 

			include("../php/telegramBotController.php");

			//tutto il necessario per accedere al db

			include("../php/Connessione.php");

					

			$query="SELECT BotID,ContactID FROM BOTS_CONTATTI WHERE BotID='".$bot_id."';";



			$connSelect = new Connessione;

			$link = $connSelect->getConnection();

			$num=0;

			if($risultati= $link->query($query)){

			 

				if(@$risultati->num_rows > 0)

				{

					while ($row = $risultati->fetch_assoc()) {

						$contact_id=$row['ContactID'];									

						$telegramBC = new TelegramBotController($bot_id);						

						$req = $telegramBC->sendMessage($messaggio,$contact_id);

						$num=$num+1;						

					}	

					$risultati->close();  

				}else{

					echo "NESSUN DATO";

				}		

			} 

			$link->close();

			return($num);			

		}

		?>

	</body>

</html>
