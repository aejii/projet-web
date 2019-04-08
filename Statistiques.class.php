<?php

	/**
	* 
	*/
	class Statistiques 
	{
		private $nb = 0;
		private $id;
		private $page;
		private $ip;
		private $login;

		public $serveur;
		public $host;
		public $base;
		public $user;
		public $pass;
		public $jour;

		public $nbrTotalId = 1;

		function __construct()
		{
			try {

				require('connection.php');

				$this->serveur= $serveur;
				$this->host= $host;
				$this->base= $base;
				$this->user= $user;
				$this->pass= $pass;

				$this->jour= ''.date('d m Y');

				$db = new PDO($serveur.":host=".$host.";dbname=".$base, $user, $pass);
				$sql = "select id, ip, page, nbr, login, jour from statistique";
				$bool = false;

				foreach ($db->query($sql) as $ligne) {
					$this->ip = getip();
					if (isset($_SESSION['login'])) {
						
					}else{
						$_SESSION['login'] = "no login";
					}
					if ($ligne['page']==$_SERVER['PHP_SELF'] and $ligne['jour']==$this->jour and $ligne['login']==$_SESSION['login'] and $ligne['ip']==getip()) {
						$bool = true;
						$this->nb = $ligne['nbr']+1;
						$this->id = $ligne['id'];
						$this->page = $_SERVER['PHP_SELF'];
						//echo "cookies 'update' <br/>";
					}
				}

				if ($bool) {
					$sql = "update statistique set nbr = ".$this->nb." where id = ".$this->id;
					$db->query($sql);
				} else {
					$this->page = $_SERVER['PHP_SELF'];
					$this->nbr = 1;
					$this->ip = getip();
					if (isset($_SESSION['login'])) {
						$sql = "insert into statistique (ip, page, nbr, login, jour) VALUES (\"".$this->ip."\",\"".$_SERVER['PHP_SELF']."\", 1,\"".$_SESSION['login']."\",'".''.date('d m Y')."')";
					} else {
						$sql = "insert into statistique (ip, page, nbr, login, jour) VALUES (\"".$this->ip."\",\"".$_SERVER['PHP_SELF']."\", 1,\"no login\",'".''.date('d m Y')."')";
					}
					
					$db->query($sql);
				}
			} catch (PDOException $e) {
				echo "Erreur :".$e->getMessage();
			}
		}

		public function getDailyStats()
		{
			$chaineFinal = "<table><tr><th>ip</th><th>page</th><th>nombre acces :</th><th>login :</th><th>Jour :</th></tr>";
			$finDeChaine = "</table>";
			include_once ('connection.php');
			$db = new PDO($this->serveur.":host=".$this->host.";dbname=".$this->base, $this->user, $this->pass);
			$sql = "select id, ip, page, nbr, login, jour from statistique";
				foreach ($db->query($sql) as $ligne) {
					$chaineFinal = $chaineFinal. "<tr><td>".$ligne['ip']."</td><td>".$ligne['page']."</td><td>".$ligne['nbr']."</td><td>".$ligne['login']."</td><td>".$ligne['jour']."</td></tr>";
				}
			echo $chaineFinal.$finDeChaine;
		}


		public function getDailyStatsAe()
		{
			$chaineFinal = '<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
			<thead>
				<tr>
					<th>ip</th>
					<th>page</th>
					<th>nombre acces :</th>
					<th>login :</th>
					<th>Jour :</th>
				</tr>
            </thead>
            <tbody>';
			$finDeChaine = "</tbody></table>";
			include_once ('connection.php');
			$db = new PDO($this->serveur.":host=".$this->host.";dbname=".$this->base, $this->user, $this->pass);
			$sql = "select id, ip, page, nbr, login, jour from statistique";
				foreach ($db->query($sql) as $ligne) {
					$chaineFinal = $chaineFinal. "<tr><td>".$ligne['ip']."</td><td>".$ligne['page']."</td><td>".$ligne['nbr']."</td><td>".$ligne['login']."</td><td>".$ligne['jour']."</td></tr>";
				}
			echo $chaineFinal.$finDeChaine;
		}


		public function getStatsBtIp()
		{
			$chaineFinal = "<table><tr><th>ip</th><th>page</th><th>nombre acces</th></tr>";
			$finDeChaine = "</table>";
			include_once ('connection.php');
			$db = new PDO($this->serveur.":host=".$this->host.";dbname=".$this->base, $this->user, $this->pass);
			
			$sql = "select SUM(nbr) as nbr, ip, page from statistique group by page, ip";
					foreach ($db->query($sql) as $ligne) {
						$chaineFinal = $chaineFinal. "<tr><td>".$ligne['ip']."</td><td>".$ligne['page']."</td><td>".$ligne['nbr']."</td></tr>";
					}			


			echo $chaineFinal.$finDeChaine;
		}

	}

	function getip() {

			//echo 'Adresse IP du visiteur : '.get_ip();
			// IP si internet partagé
			if (isset($_SERVER['HTTP_CLIENT_IP'])) {
				return $_SERVER['HTTP_CLIENT_IP'];
			}
			// IP derrière un proxy
			elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				return $_SERVER['HTTP_X_FORWARDED_FOR'];
			}
			// Sinon : IP normale
			else {
				return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
			}
		}
?>