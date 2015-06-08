<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="./css/style.css" /> -->

<!--     <link rel="stylesheet" href="../../../MonSite/css/navbar.css" />
    <link rel="stylesheet" href="../../../MonSite/css/blog.css" />   -->
    <title>
        <?php  echo isset($title_for_layout)?$title_for_layout:'Mon Site' ?>
    </title>

</head>
    <body>
    
        <?php //include("partials/nav.php");?>
        
        <?php  //var_dump($this->vars); ?>

        <?php $pagesMenu = $this->request('Pages','getMenu'); ?>
        <h4> PAGES MENU  </h4>
        <?php  //var_dump($pagesMenu); ?>

        <div class="navbar navbar-default">
            <ul class="nav navbar-nav">
                <?php foreach ($pagesMenu as $key => $value) { ?>
                <li>
                    <a href="<?php echo BASE_URL. '/pages/view/'.$value['idNews'] ?>"><?=$value['title']?>  </a>
            </li>
                <?php  } ?>
            </ul>
        </div>
        <div class="container">
            <?php //$menu=  $this->request('Pages','getMenu'); ?>
            <?= $content_for_layout;?>
		
        </div>
        <?php include("partials/footer.php");?>
        
    