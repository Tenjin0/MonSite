<?php
	require_once str_replace('//','/',dirname(__FILE__).'/../dao/')."dao.php";
	$bdd=Dao::getInstance();
	// $news = $bdd->getLastNews();
    if(!empty($_GET["page"])){   
        $news = $bdd->getNewsByNumber($_GET["page"]);
        $number=$_GET["page"];
    }else{
        $news = $bdd->getLastNews();
         $number=1;
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
    <link rel="stylesheet" href="../assets/css/navbar.css" />
    <link rel="stylesheet" href="./assets/css/blog.css" />
    <title>
        Mon Blog
    </title>

</head>
    <body>
        <?php include("../nav.php");?>

        <header id="bloc-page" class="page-header">
            <div id="titre_principal">
                <h3>Carnets de bords</h3>
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
                            <h4 class="row">
                                <img class="ico-news col-md-1" src="assets/images/<?= $news["icon"] ?>" alt="<?= $news["icon"] ?>"/>
                                    <label class="title col-md-11"><?php echo utf8_encode($news["title"])."\n";?>
                                        <div class="row subtitle">
                                        soustitre
                                        </div>
                                </label>
                            </h4>
                            <div class="row">
                                <div>
                                    <?php
                                        $paragrapheContenu = explode("\n",utf8_encode($news["content"]));
                                        foreach($paragrapheContenu as $key=>$value){
                                            if (!empty(substr($value,0, strlen($value)-1))){
                                                echo "<p>".substr($value,0, strlen($value)-1)."</p>";
                                            }
                                        }
                                    ?>
                                </div>
                            
                            </div>
                        </article>
                        <span> <a href="http://<?= $news["urlSite"]."/".$news["source_link"] ?>">source : <?=utf8_encode($news["name"]); ?></a>
                        </span>
                        <span>publié le <?= $dateNews?></span>
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
        <footer class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6" id="photos">
                    <h4>Photos</h4>
                    <p><img src="assets/images/photo1.jpg" alt="Photographie" /><img src="assets/images/photo2.jpg" alt="Photographie" /><img src="assets/images/photo3.jpg" alt="Photographie" /><img src="assets/images/photo4.jpg" alt="Photographie" /></p>
                </div>
                <div class="col-md-4 col-sm-6" id="videos">
                    <h4>Videos</h4>
                    <p></p>
                </div>
                <div class="col-md-4 col-sm-12" id="liens"/>
                    <h4>Mes liens</h4>
                    <p></p>
                </div>
            </div>
            
            <div class="row">
            <p>Copyright Tenji - Tous droits réservés
            <a href="#">Me contacter !</a></p>
            </div>
        </footer>
        <script src="../bower_components/jquery/dist/jquery.min.js"></script>
        <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>