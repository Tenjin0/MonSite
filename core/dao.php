<?php
	class Dao{
		private static $myInstance;
		private $connection = null;
		public $numberOfNews;
		private static $config;
		private function __construct(){
			$connection = null;
		}

		public function getConnection(){
			// echo "je passe par getConnection\n";
			// if(!self::$connection){
			// echo "connection n'existe pas\n";
			//var_dump(self::$config$);
			if (!isset($connection)){
				$DB_hostname = self::$config['hostname'];
				$DB_name = self::$config['database'];
				$DB_login = self::$config['login'];
				$DB_password = self::$config['password'];
				try{
					$this->connection = new PDO("mysql:host=".$DB_hostname.";dbname=".$DB_name.";chartset=utf8",$DB_login,$DB_password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,PDO::MYSQL_ATTR_INIT_COMMAND=> 'SET NAMES utf8'));
					$this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
					return $this->connection;
				}
				catch(PDOException $e){
					if(Config::$debug >=1){
						exit('Erreur : ' . $e->getMessage());    
					} else {
						exit('Impossible de se connecter a la base de données');
					}			
				}
			}
			
		}

		public static function getInstance($config=null){
			if(isset($config)){
				self::$config = $config;
			}else{
				exit("ERREUR base de données");
			}
			if(!self::$myInstance){
				self::$myInstance = new Dao();
				self::$myInstance->getConnection();
				
			}
			self::$myInstance->numberOfNews = self::$myInstance->requestNumberOfNews();
			return self::$myInstance;
		}
		public function getList(){
			$sql = "SELECT idNews,title from news,source WHERE news.fk_idsource = source.idSource ORDER BY news.date desc";
			return $this->execRequest($sql,'select');
		}

		public function getLastNews(){
			$sql = "SELECT *, 1 as position from news,source WHERE news.fk_idsource = source.idSource ORDER BY news.date desc limit 1";
			return $this->execRequest($sql,'select');
		}

		public function getPreviousNews($id){
			$sql = "SELECT idNews,title FROM news,source ORDER BY news.date desc WHERE news.fk_idsource = source.idSource AND news.date < (SELECT date FROM news WHERE news.idNews = $id)";
			return $this->execRequest($sql,'select');
		}

		public function getNextNews($id){
			$sql = "SELECT * from news,source WHERE news.idNews=$id AND news.fk_idsource = source.idSource";
			return $this->execRequest($sql,'select');
		}

		public function getNewsById($id){
			$sql = " SELECT *,(select count(*) from news where date > n.date order by date desc) +1 as position from news as n,source WHERE n.idNews= 1 AND n.fk_idsource = source.idSource ";
			return $this->execRequest($sql,'select');
		}

		// Premiere news qui est la plus récente commence par 1 
		public function getNewsByNumber($number){
			if($number < 1 || $number > self::getNumberOfNews()){
				$number=1;
			} 
			// echo "number apres vérification $number\n";
			$sql = "SELECT *,$number as position from news,source WHERE news.fk_idsource = source.idSource ORDER BY news.date desc LIMIT :number, 1";
			$reponse = $this->getConnection()->prepare($sql);
			$reponse->bindValue('number', $number-1, PDO::PARAM_INT);
			$reponse->execute();
			$données = $reponse->fetch();
			$reponse->closeCursor();
			return $données;

		}

		public function RequestNumberOfNews(){
			$sql = "SELECT count(idNews) from news";
			return $this->execRequest($sql,'select');
		}

		public  function getNumberOfNews(){
			return $this->numberOfNews;
		}

		// public function getNewsByMonth($month){

		// }

		public  function execRequest( $sql, $type ,$data=array()){
			$reponse = $this->getConnection()->prepare($sql);
			$reponse->execute($data);
			if ($type == 'select'){
				try {

				if (empty($données = $reponse->fetchAll())){
					$données = null;
				} 
				$reponse->closeCursor();
				return $données;
				} catch(PDOException $ex) {
				   die('Erreur : ' . $ex->getMessage());
				   return null;
				}
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
