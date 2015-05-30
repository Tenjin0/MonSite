<?php 
	require_once str_replace('//','/',dirname(__FILE__).'/')."dao.php";

	// $connection = Dao::getConnection();
  	// var_dump($connection);
	$bdd=Dao::getInstance();
	// echo Dao::getNumberOfNews();
	
	//$total = $bdd->getList();

	for ($num=0; $num < 4; $num++) { 
		echo "numero de départ fonction $num\n";
		$total = $bdd->getNewsByNumber($num);
		echo $total["title"]."\n";
		echo "numero apres passage dans la fonction $num\n";
		echo "------------------\n\n";
	}

	// $news = $bdd->getLastNews();

?>