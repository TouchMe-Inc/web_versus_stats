<?php

	class StatsService
	{
        private $pdo;
		private $steamApiKey;
		private $steamIDs = array();
		private $players = array();

		public function __construct($host, $user, $pass, $db, $charset)
        {
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $opt = array(
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            );

            $this->pdo = new PDO($dsn, $user, $pass, $opt);
		}

        public function __destruct() {
            $this->pdo = null;
        }

		public function addSteamId($steamID) {
			$this->steamIDs[] = $steamID;
		}

		public function getPlayer($steamID) {
			return $this->players[$steamID];
		}

		public function getPlayers($perPage) 
		{
            $stmt = $this->pdo->prepare('SELECT `last_name`, `played_time`, `rating`, `steam_id` FROM vs_players WHERE `rating` > 0 ORDER BY `rating` DESC LIMIT :perPage');
            $stmt->execute(array('perPage' => $perPage));
        
            $data = array();
        
            while ($row = $stmt->fetch()) {
                $data[] = $row;
            }

            return $data;
		}
	}

?>