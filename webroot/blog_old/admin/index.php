<?php
	require_once str_replace('//','/',dirname(__FILE__).'/../../dao/')."dao.php";
	$bdd=Dao::getInstance();
	// $news = $bdd->getLastNews();
    
    $listnews = $bdd->getList();
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
    <title>
        Admin
    </title>

</head>
    <body>
        <?php include("../../lib/nav.php"); ?>

        <header id="bloc-page" class="page-header">
            <div id="titre_principal">
                <h3>Admin</h3>
            </div>   
        </header>
   
         
        <div class="container">

            <div class="row">
                <section id="news" class="col-md-9">
                    <article>
                        <a href="insert.php?id=<?=$news["id"]?>">Insert</a>
                    </article>
                    <article>
                        <?php 
                        foreach($listnews as $news){
                            echo "<div>";
                            echo $news["title"];
                        
                       ?>
                       <span><a href="update.php?id=<?=$news["idNews"]?>">edit</a></span>
                       <span><a href="remove.php?id=<?=$news["idNews"]?>">remove</a></span>
                       <?php 
                            echo "</div>";
                        } 

                       ?>
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