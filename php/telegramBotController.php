<?php

/**

 * Telegram Bot Controller.

 * OL3 - Innovation Tecnologies

 * Licenza X11

 */

class TelegramBotController {



    private $bot_id = "";

    

    public function __construct($bot_id) {

        $this->bot_id = $bot_id;        

    }

	

	function sendAPIRequest($url) {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_HEADER, false);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($ch);

        curl_close($ch);

        return $result;

    }



	public function telegramApiCommand($api) {

        $url = 'https://api.telegram.org/bot' . $this->bot_id . '/' . $api;

        $reply = $this->sendAPIRequest($url, $content);

		return json_decode($reply, true);

    }

						

	public function updateContactCollection() {

		$ret = array();

		$req=$this->telegramApiCommand("getUpdates");		

		$i=0;

		foreach($req['result'] as $result_record) {															

			$ret[$i] = $result_record["message"]["from"]["id"];

			$i=$i+1;

		}		

		return $ret; 

	}

	

	public function sendMessage($msg,$chatid){		

		$apiCommand = "sendMessage?text=".$msg."&chat_id=".$chatid;		

		$req=$this->telegramApiCommand($apiCommand);					

	}

}

?>
