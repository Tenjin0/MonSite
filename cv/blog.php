<?php 
	require_once str_replace('//','/',dirname(__FILE__).'/')."dao.php";
	$bdd=Dao::getInstance();
	// $news = $bdd->getLastNews();
    if(!empty($_GET["page"])){   
        $news = $bdd->getNewsByNumber($_GET["page"]);
        $number=$_GET["page"];
    }else{
        $news = $bdd->getLastNews();
         $number=1;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="./css/style.css" /> -->
    <link rel="stylesheet" href="./css/navbar.css" />
    <link rel="stylesheet" href="./css/blog.css" />
    <title>
        Mon site
    </title>

</head>
    <body>
        <nav id="mainbar" class="navbar navbar-inverse" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                    </button>
                    <img class="navbar-brand" src="images/mini_logo2.png" alt="Logo de Tenji 2" id="logo1" />
                    <span class="navbar-brand"><label>Patrice Petit</label></span>     
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav" >
                        <li><a class="bar" href="#">Blog</a></li>
                        <li><a class="bar" href="cv.php">CV</a></li>
                        <li><a class="bar" href="#">Contact</a></li>
                        <li class="dropdown"> 
                            <a class="bar "data-toggle="dropdown" href="#">Projets<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <hr class="separator">
                                <li class="dropdown-header">PHP</li>
                                <li><a href="#">LibraryOnline</a></li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Java/J2EE</li>
                                <li><a href="#">LibraryOnline</a></li>
                                <li class="divider"></li>
                                <li class="dropdown-header">NodeJS</li>
                                <li><a href="#">real time chat</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> <!-- Navigation-->

        <header id="bloc-page" class="page-header">
            <div id="titre_principal">
                <h3>Carnets de bords <?= $number ?></h3>
            </div>   
        </header>
   
         
        <div class="container">

            <div class="row" id="banniere_image">
                <div class="col-sm-12 "id="banniere_description">
                    bla bla bla
                    <a href="#" class="bouton_rouge">Voir l'article <img src="images/flecheblanchedroite.png" alt="" /></a>
                </div>
            </div>

            <div class="row">
                <section id="news" class="col-md-9">
                        <article>
                            <h4>
                                <img src="images/<?= $news["icon"] ?>" alt="Linux" class="ico_categorie" />
                                <label><?php echo utf8_encode($news["title"])."\n";?></label>
                            </h4>
                            <?php 
                                $paragrapheContenu = explode("\n",utf8_encode($news["content"]));
                                foreach($paragrapheContenu as $key=>$value){
                                    if (!empty(substr($value,0, strlen($value)-1))){
                                        echo "<p>".substr($value,0, strlen($value)-1)."</p>";
                                    }
                                }

                            ?>
                        </article>
                        <span> <a href="http://<?= $news["urlSite"]."/".$news["source_link"] ?>">source : <?=utf8_encode($news["name"]); ?></a>
                        </span>
                        <ul class="pager">
                            <?php 
                                if ($news["position"] > 1){

                                
                            ?>
                                <li class="previous active"><a href="./blog.php?page=<?=$news["position"]-1?>">&larr; Older </a></li>
                            <?php
                                } else {
                            ?>
                                <li class="previous disabled"><a class="disabled" href="">&larr; Older</a></li>
                            <?php } 
                                if ($news["position"] < Dao::getNumberOfNews()){
                            ?>
                                <li class="next active"><a href="./blog.php?page=<?=$news["position"]+1 ?>"> Next &rarr;</a></li>
                            <?php
                                } else {

                            
                            ?>

                            <li class="next disabled"><a class="disabled"href=""> Next &rarr;</a></li>
                            <?php } ?>
                        </ul>


                </section>

                <section class="well col-md-3"></section>
            </div>
        </div>
        <footer class="row">
            <div class="col-md-4 col-sm-6" id="photos">
                <h4>Photos</h4>
                <p><img src="images/photo1.jpg" alt="Photographie" /><img src="images/photo2.jpg" alt="Photographie" /><img src="images/photo3.jpg" alt="Photographie" /><img src="images/photo4.jpg" alt="Photographie" /></p>
            </div>
            <div class="col-md-4 col-sm-6" id="videos">
                <h4>Videos</h4>
                <p></p>
            </div>
            <div class="col-md-4 col-sm-12" id="liens"/>
                <h4>Mes liens</h4>
                <p></p>
            </div>
            <!-- <div class="row">
            <p>Copyright Tenji - Tous droits réservés
            <a href="#">Me contacter !</a></p>
            </div> -->
        </footer>
        <script src="./bower_components/jquery/dist/jquery.min.js"></script>
        <script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>