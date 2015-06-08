<?php //debug($this)?>
<?php //debug($_SESSION['User'])?>

<nav id="mainbar" class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
            </button>
            <!-- <img class="navbar-brand" src="assets/images/mini_logo2.png" alt="Logo de Tenji 1" id="logo1" /> -->
            <span class="navbar-brand"><label>Patrice Petit</label></span>     
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav" >
                <li><a class="bar" href="#">Blog</a></li>
                <li><a class="bar" href="cv.php">CV</a></li>
                <li><a class="bar" href="#">Contact</a></li>
                <li class="dropdown"> 
                    <a class="bar" data-toggle="dropdown" href="#">Projets<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
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
            <div class="navbar-right">
                <!-- <div class="row"> -->
                    <!-- <form class="navbar-form topbar-search" id="topbar-search" method="get" action="/search" role="search"> -->
                   <form class="navbar-form navbar-left" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control input-sm" placeholder="Search">
                            <span class="input-group-btn">
                            <button type="reset" class="btn btn-default btn-sm">
                                <span class="text-warning glyphicon glyphicon-remove">
                                    <span class="sr-only">Close</span>
                                </span>
                            </button>
                                <button type="submit" class="btn btn-warning btn-sm">
                                    <span class="glyphicon glyphicon-search">
                                        <span class="sr-only">Search</span>
                                    </span>
                                </button>
                            </span>
                        </div>
                    </form>
                    <ul class="submenu nav navbar-nav"> 
                        <?php  if(isset($_SESSION['User'])){?>
                            <li><a class="bar" id="btn-account" href="<?php  echo  REFFERER.DS.'users/account/' ?>">Mon Compte</a></li>
                            <li><a class="bar" id="btn-logout" href="<?php  echo  REFFERER.DS.'users/logout/' ?>">Se déconnecter</a></li>
                        <?php } else {?>
                        
                       <!--  <button type="submit" class="col-md-3 btn login-btn">S&#39;inscrire</button> -->
                        <li><a class="bar" id="btn-signin" href="<?php  echo  REFFERER.DS.'users/signin/' ?>">S&#39;inscrire</a><li>
                         <li>            
                            <a id="btn-login" data-toggle="dropdown" class="bar dropdown-toggle" href="<?php  echo  REFFERER.DS.'users/login/' ?>">Login <b class=" caret"></b></a>
                            <form method="POST"class="navformlog dropdown-menu" action="<?php  echo  REFFERER.DS.'users/login/' ?>" >
                                <div class="form-group">
                                    
                                    <input type="text" placeholder="email@email.com" onclick="return false;" class=" inputdropdown form-control input-sm" id="inputError" />
                                    <input type="password" placeholder="Password" class="inputdropdown form-control input-sm" name="password" id="Password1" />
                                     <button id="signIn"type="submit" class="inputdropdown btn btn-success col-md-12 btn-sm">Sign in</button>
                                </div>
                            </form>
                        </li> 
                        <?php  } ?>
                    </ul>
                <!-- </div> -->
                
            </div>
        </div>
    </div> <!-- container fluid -->
</nav> <!-- Navigation-->

