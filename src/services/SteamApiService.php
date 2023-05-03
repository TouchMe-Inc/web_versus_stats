<?php

	class SteamApiService
	{
		private $steamApiKey;
		private $steamIDs = array();
		private $players = array();

		public function __construct($steamApiKey) {
			$this->steamApiKey = $steamApiKey;
		}

		public function addSteamId($steamID) {
			$this->steamIDs[] = $steamID;
		}

		public function getPlayer($steamID)
		{
			return $this->players[$steamID];
		}

		public function loadPlayers() 
		{
			$url = "https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=" . $this->steamApiKey . "&steamids=" . implode(",", $this->steamIDs);
			$response = @file_get_contents($url);

			if ($response == false) {
				throw new Exception("No response to address $url");
			}

			$content = json_decode($response, true);

			foreach ($content['response']['players'] as $player) {
				$this->players[$player['steamid']] = $player;
			}

			return $this->players;
		}
	}

?>