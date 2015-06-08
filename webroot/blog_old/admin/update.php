<?php
	require_once str_replace('//','/',dirname(__FILE__).'/../../dao/')."dao.php";
	$bdd=Dao::getInstance();
	// $news = $bdd->getLastNews();
    if(!empty($_GET["page"])){   
        $news = $bdd->getNewsByNumber($_GET["page"]);
        $number=$_GET["page"];
    }else{
        $news = $bdd->getList();
        $number=1;
    }
    // print_r($_GET)."\n";
    if(!empty($_GET["id"])){   
        $news = $bdd->getNewsById($_GET["id"]);
        // print_r($news);
        $id=$_GET["id"];
    }

    $mois = array(
        2=>"Janvier",
        3=>"Février",
        4=>"Mars",
        5=>"Avril",
        6=>"Mai",
        7=>"Juin",
        8=>"Juillet",
        9=>"Aout",
        10=>"Septembre",
        11=>"Octobre",
        12=>"Novembre",
        13=>"Décembre",
    );
    $dateNews = date("j ",strtotime($news['date']));
    $dateNews .= $mois[date("N",strtotime($news['date']))];
    $dateNews .= date(" Y",strtotime($news['date']));

    
   
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="./css/style.css" /> -->
    <link rel="stylesheet" href="../../assets/css/navbar.css" />
    <link rel="stylesheet" href="../assets/css/blog.css" />
    <link rel="stylesheet" href="../assets/css/admin.css" />
    <title>
        Update News
    </title>

</head>
    <body>
        <?php include("../../nav.php"); ?>

        <header id="bloc-page" class="page-header">
            <div id="titre_principal">
                <h3>Admin</h3>
            </div>   
        </header>
   
        <div class="container">

            <div class="row">
                <section id="news" class="col-md-9">
                	<article class="row">
                		<form class="well">
                			<legend>
                				<?= $news['title'] ?>
                			</legend>
                			<h4><?= $news['title'] ?></h4>
                		</form>
                	</article>
                </section>

                <section class="well col-md-3"></section>
            </div>
        </div>
        <footer class="container">

        </footer>
        <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
        <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>