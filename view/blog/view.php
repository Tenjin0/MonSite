<?php ?>

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
                    <img class="ico-news col-md-1" src="<?php echo REFFERER.DS ?>/images/<?= $news["icon"] ?>" alt="<?= $news["icon"] ?>"/>
                    <h4 class="title col-md-11"><?php echo $news["title"]."\n";?>
                        <div class="row subtitle">
                            <h5></h5>
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
            <?php if(!isset($news["name"])){ ?>
            <div> <a href="http://<?= $news["urlSite"]."/".$news["source_link"] ?>">source  <?$news["name"]; ?></a>
            </span>
            <?php } ?>
            <div>publié le <?= $news['date']?></span>
            <ul class="pager">
                <?php 
                    if ($news["position"] > 1){
                    
                ?>
                    <li class="previous active"><a href="./<?=$news["position"]-1?>">&larr; Older </a></li>
                <?php
                    } else {
                ?>
                    <li class="previous disabled"><a class="disabled" href="">&larr; Older</a></li>
                <?php } 
                    if ($news["position"] < $news['totalNumber']){
                ?>
                    <li class="next active"><a href="./<?=$news["position"]+1 ?>"> Next &rarr;</a></li>
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
        <p><img src="<?php echo REFFERER.DS ?>images/photo1.jpg" alt="Photographie" /><img src="<?php echo REFFERER.DS ?>images/photo2.jpg" alt="Photographie" /><img src="<?php echo REFFERER.DS ?>images/photo3.jpg" /><img src="<?php echo REFFERER.DS ?>images/photo4.jpg" alt="Photographie" /></p>
    </div>
    <div class="col-md-4 col-sm-6" id="videos">
        <h4>Videos</h4>


        <p></p>
    </div>
    <div class="col-md-4 col-sm-12" id="liens"/>
        <h4>Mes liens</h4>
            <ul>
                <li><a href="http://www.ecole-ipssi.com/">Ecole IPSSIS</a></li>
                
            </ul>

        <p></p>
    </div>
</div>


