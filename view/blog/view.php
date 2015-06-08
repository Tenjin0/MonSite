<?php ?>

 <div class="row">
                <section id="news" class="col-md-9">
                        <article>

                            <div class="row newstitle">
                                <img class="ico-news col-md-1" src="/images/<?= $news["icon"] ?>" alt="<?= $news["icon"] ?>"/>
                                <h4 class="title col-md-11"><?=$news["title"];?>
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
                        <span> <a href="<?php echo $news['source_link'] ?>">source"</a>
                        </span>
 
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

