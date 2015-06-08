<?php
    // ini_set('display_errors', 1);
    // error_reporting(E_ALL);
    include("../lib/auth.php");
    require_once("../lib/config.php");
    require_once str_replace('//','/',dirname(__FILE__).'/../lib/')."dao.php";

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

    include("../partials/header.php");
?>



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

                            <div class="row newstitle">
                                <img class="ico-news col-md-1" src="assets/images/<?= $news["icon"] ?>" alt="<?= $news["icon"] ?>"/>
                                <h4 class="title col-md-11"><?php echo $news["title"]."\n";?>
                                    <div class="row subtitle">
                                        <h5>sous titre</h5>
                                    </div>
                                </h4>
                            </div>

                            <div class="row">
                                <div>
                                    <?php
                                        $paragrapheContenu = explode("\n",$news["content"]);
                                        foreach($paragrapheContenu as $key=>$value){
                                            if (!empty(substr($value,0, strlen($value)-1))){
                                                echo "<p>".substr($value,0, strlen($value)-1)."</p>";
                                            }
                                        }
                                    ?>
                                </div>
                            
                            </div>
                        </article>
                        <span> <a href="http://<?= $news["urlSite"]."/".$news["source_link"] ?>">source : <?= $news["name"]; ?></a>
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
                                if ($news["position"] < $bdd->getNumberOfNews()){
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
            
           
        </div> <!-- container -->

        <?php include("../partials/footer.php");?>
        <?php //include("../lib/debug.php");?>
  