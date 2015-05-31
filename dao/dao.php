<?php
	require_once("config.php");
	class Dao{
		private static $myInstance;
		private $connection;
		public $numberOfNews;

		private function __contruct(){
			
		}

		public function getConnection(){
				// echo "je passe par getConnection\n";
			// if(!self::$connection){
				// echo "connection n'existe pas\n";
				try{
					$this->connection = new PDO("mysql:host=".DB_hostname.";dbname=".DB_name.";chartset=utf8",DB_login,DB_password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
					return $this->connection;
				}
				catch(Exception $e){
					 die('Erreur : ' . $e->getMessage());    
				}
			// }	
		}
		public static function getInstance(){

			if(!self::$myInstance){
				self::$myInstance = new Dao();
				self::$myInstance->getConnection();
			}
			self::$myInstance->numberOfNews = self::$myInstance->requestNumberOfNews();
			return self::$myInstance;
		}
		public function getList(){
			$sql = "SELECT idNews,title from news,source WHERE news.fk_idsource = source.idSource ORDER BY news.date desc";
			return $this->execRequest($sql);
		}

		public function getLastNews(){
			$sql = "SELECT *, 1 as position from news,source WHERE news.fk_idsource = source.idSource ORDER BY news.date desc limit 1";
			return $this->execRequest($sql);
		}

		public function getPreviousNews($id){
			$sql = "SELECT idNews,title FROM news,source ORDER BY news.date desc WHERE news.fk_idsource = source.idSource AND news.date < (SELECT date FROM news WHERE news.idNews = $id)";
			return $this->execRequest($sql);
		}

		public function getNextNews($id){
			$sql = "SELECT * from news,source WHERE news.idNews=$id AND news.fk_idsource = source.idSource";
			return $this->execRequest($sql);
		}

		public function getNewsById($id){
			$sql = " SELECT *,(select count(*) from news where date > n.date order by date desc) +1 as position from news as n,source WHERE n.idNews= 1 AND n.fk_idsource = source.idSource ";
			return $this->execRequest($sql);
		}

		// Premiere news qui est la plus récente commence par 1 
		public function getNewsByNumber($number){
			if($number < 1 || $number > self::getNumberOfNews()){
				$number=1;
			} 
			// echo "number apres vérification $number\n";
			$sql = "SELECT *,$number as position from news,source WHERE news.fk_idsource = source.idSource ORDER BY news.date desc LIMIT :number, 1";
			$reponse = self::$connection->prepare($sql);
			$reponse->bindValue('number', $number-1, PDO::PARAM_INT);
			$reponse->execute();
			$données = $reponse->fetch();
			$reponse->closeCursor();
			return $données;

		}

		public function RequestNumberOfNews(){
			$sql = "SELECT count(idNews) from news";
			return $this->execRequest($sql);
		}

		public  function getNumberOfNews(){
			return $this->numberOfNews;
		}

		public function getNewsByMonth($month){

		}

		private function execRequest($sql){
			$reponse = $this->getConnection()->query($sql);
			try {

				if (!empty($données = $reponse->fetchAll())){
					// print_r($données);
					// echo "\n";
					// foreach ($données as $key => $value) {
					// 	$données[$key] = self::utf8_converter($value);
					// 	# code...
					// }
					if(count($données) == 1){
						$données = self::utf8_converter($données);	
						// print_r($données);
						$données = $données[0];
					} else if (count($données) > 1){
					// print_r($données);
						// echo "je passe par la\n";
						// $données = $données[0];
						foreach ($données as $key => $value) {
							$données[$key] = self::utf8_converter($value);
							# code...
						}
					}
				} else {
					$données = null;
				}
				$reponse->closeCursor();
				// $runset($pdo);
				// print_r($reponse);
      			// unset($reponse);
      			// self::$connection=NULL;
				return $données;
			} catch(PDOException $ex) {
			   die('Erreur : ' . $ex->getMessage());
			   return null;
			}
		}

		private static function utf8_converter($array){
	        array_walk_recursive($array, function(&$item, $key){
	            if(!mb_detect_encoding($item, 'utf-8', true)){
	                    $item = utf8_encode($item);
	            }
	        });
 
        	return $array;
    	}	
	}

// SELECT *,(select count(*) from news where date > t.date order by date desc) +1 as position FROM `news` as t order by date desc;
	
?>
