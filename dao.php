<?php
	
	class Dao{
		private static $myInstance;
		private static $connection;
		public static $numberOfNews;

		private function __contruct(){
			
		}

		public static function getConnection(){

			if(!self::$connection){
				try{
					self::$connection = new PDO("mysql:host=localhost;dbname=MonSite;chartset=utf8","root","patman00",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));	
				}
				catch(Exception $e){
					 die('Erreur : ' . $e->getMessage());    
				}
			}	
		}
		public static function getInstance(){

			if(!self::$myInstance){
				self::getConnection();
				self::$myInstance = new Dao();
			}
			self::$numberOfNews = self::$myInstance->requestNumberOfNews();
			return self::$myInstance;
		}
		public function getList(){
			$sql = "SELECT id,title from news ORDER BY news.date desc";
			return $this->execRequest($sql);
		}

		public function getLastNews(){
			$sql = "SELECT * from news ORDER BY news.date desc limit 1";
			return $this->execRequest($sql);
		}

		public function getPreviousNews(){

		}

		public function getNewsById($id){
			$sql = "SELECT * from news WHERE news.id=$id";
			return $this->execRequest($sql);
		}

		// Premiere news qui est la plus récente commence par 1 
		public function getNewsByNumber($number){
			if($number < 1 || $number > self::getNumberOfNews()){
				$number=1;
			} 
			echo "number apres vérification $number\n";
			$sql = "SELECT * from news ORDER BY news.date desc LIMIT :number, 1";
			$reponse = self::$connection->prepare($sql);
			$reponse->bindValue('number', $number-1, PDO::PARAM_INT);
			$reponse->execute();
			$données = $reponse->fetch();
			// $reponse->closeCursor();
			return $données;

		}
		public function getNextNews(){

		}

		public function RequestNumberOfNews(){
			$sql = "SELECT count(id) from news";
			return $this->execRequest($sql)[0];
		}

		public static function getNumberOfNews(){
			return self::$numberOfNews;
		}

		public function getNewsByMonth($month){

		}

		private function execRequest($sql){
			$reponse = self::$connection->query($sql);
			if (!empty($données = $reponse->fetchAll())){
				if(count($données) == 1){
					$données = $données[0];	
				}
			} else {
				// echo "je passe par la\n";
				$données = null;
			}
			$reponse->closeCursor();
			return $données;
		}
	}

	
?>
