<?php
// Welche Seite soll angezeigt werden?
$thisPage = $_SERVER['QUERY_STRING']; empty($thisPage) ? $thisPage = "aktuelles" : "";
echo "<p>thisPage ".$thisPage."</p>";

if(($pos = strpos($thisPage, "&")) !== FALSE) {
	$subPage = substr($thisPage, $pos+1);
	}
echo "<p>subPage ".$subPage."</p>";
// db
include("conn.php");
if (isset($subPage)) {
	$stmt = $db->prepare("SELECT * FROM content WHERE subnav = ? LIMIT 1");
	$stmt->bindValue(1, $subPage, PDO::PARAM_STR);
}
else {
	$stmt = $db->prepare("SELECT * FROM content WHERE nav = ? LIMIT 1");
	$stmt->bindValue(1, $thisPage, PDO::PARAM_STR);
}

$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_OBJ);

// Besonderheiten
// 1. Sind Bilder vorhanden (z.B. Preise)
$row->img1 == "" ? $d = "style='display:none;'" :"";
// 2. Auf der Seite "Galerie" Thumbnails aus eigener DB "gallery" einbindnden
$g = "style='display:none;'";
if ($subPage == "galerie") {
	$stmt = $db->prepare("SELECT * FROM gallery");
	$stmt->execute();
	$g = "style='display:block;'";
	}
// 3. Wenn nicht Startseite/Aktuelles, dann anderer jumbotron Background
if ($thisPage !== "aktuelles") {$jtbg = "style='background-color:rgb(249,189,118);'";}


// Active-Status
if ( $thisPage=="aktuelles") { $current = 'aktuelles' ;}
// Hotel
if ( $subPage=="zimmer") { $current = 'zimmer'; $hotel='open' ;}
// Gastronomie
if ( $subPage=="zimmer") { $current = 'zimmer'; $hotel='open' ;}
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Homepage Hotel Restaurant Pfeffermühle, Paderborn">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Pfeffermühle - DEV</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">.<?php echo $current; ?> >a{color:rgb(218,109,50) !important;}</style>
  </head>

  <body>
	  <div class="container">
		  <div class="line bold"></div>
		  <div class="line light topspace"></div>
	  </div>
	  <div class="container">
		  <img src="img/logo.gif" alt="Pfeffermühle" class="logo pull-right" width="860"/>
	  </div>
	  <div class="container">
		<nav class="navbar navbar-default  ">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li class="aktuelles"><a href="?aktuelles">Aktuelles</a></li>
		        <li class="divider-vertical"></li>

		        <!-- HOTEL -->
		        <li class="dropdown <?=$hotel;?>">
		          <a href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hotel</a>
		          <ul class="dropdown-menu ">
		            <li class="zimmer"><a href="?hotel&zimmer">Zimmer</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="?hotel&appartement">Appartement</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="?hotel&fruehstueck">Frühstück</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="?hotel&preise">Preise</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="?hotel&galerie">Galerie</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="?hotel&anfrage">Anfrage</a></li>
		          </ul>
		        </li>
		        <li class="divider-vertical"></li>


		        <!-- GASTRONOMIE -->
		         <li class="dropdown">
		          <a href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gastronomie</a>
		          <ul class="dropdown-menu">
		            <li><a href="?gastronomie&restaurant">Restaurant</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="?gastronomie&bierstube">Bierstube</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="?gastronomie&speisekarte">Speisekarte</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="?gastronomie&feiern">Feiern</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="?gastronomie&catering">Catering</a></li>
		             <li class="divider-vertical sub"></li>
		            <li><a href="?gastronomie&anfrage">Anfrage</a></li>
		          </ul>
		        </li>
		        <li class="divider-vertical"></li>
		       <li class="dropdown">
		          <a href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Veranstaltungen</a>
		          <ul class="dropdown-menu">
		            <li><a href="?veranstaltungen&feiern">Feiern</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="?veranstaltungen&meeting">Meeting</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="?veranstaltungen&anfrage">Anfrage</a></li>
		          </ul>
		        </li>
		        <li class="divider-vertical"></li>
		       <li class="dropdown">
		          <a href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aktivitäten</a>
		          <ul class="dropdown-menu">
		            <li><a href="?aktivitaten&radfahren">Radfahren</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="?aktivitaten&wandern">Wandern</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="?aktivitaten&andere">Andere Aktivitäten</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="?aktivitaten&anfrage">Anfrage</a></li>
		          </ul>
		        </li>
		          <li class="divider-vertical"></li>
		       <li class="dropdown">
		          <a href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">sehenswertes</a>
		          <ul class="dropdown-menu">
		            <li><a href="?sehenswertes&region">region</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="?sehenswertes&paderborn">Stadt Paderborn</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="?sehenswertes&umgebung">Umgebung</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="?sehenswertes&anfrage">Anfrage</a></li>
		          </ul>
		        </li>
		        <li class="divider-vertical"></li>
		        <li><a href="?kontakt">kontakt</a></li>
		      </ul>
		        </li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
	  </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" <?=$jtbg;?>>
      <div class="container">
	  		<img src="<?php echo $row->jumbo;?>" alt="Willkommen"/>
       </div>
    </div>

    <div class="container">
	    <div class="line light"></div>
    </div>

    <div class="container">
	    <h1>
		    <?php echo $row->headline;?>
	    </h1>
	   <div class="row">
		   <div class="col-md-12">
			   <div class="copy">
				   <?php echo $row->p;?>
			   </div>
		   </div>
	   </div>
	<!-- Standard thumbnails (4 Stück) -->
      <div class="row imgrow" <?=$d;?> name="standard">
	        <div class="col-md-3 col-xs-6">
		        <div class="thumbnail">
	          <img src="<?php echo $row->img1;?>" class="img-responsive"/>
		        </div>
	        </div>
	        <div class="col-md-3 col-xs-6">
		        <div class="thumbnail">
	          <img src="<?php echo $row->img2;?>" class="img-responsive"/>
		        </div>
	        </div>
	        <div class="col-md-3 col-xs-6" >
		        <div class="thumbnail">
	          <img src="<?php echo $row->img3;?>" />
		        </div>
	        </div>
	        <div class="col-md-3 col-xs-6">
		        <div class="thumbnail">
	          <img src="<?php echo $row->img4;?>"/>
		        </div>
	        </div>
      </div>
      <div class="row imgrow" <?=$g;?> name="galerie">
	      <?php
		      while ($gall = $stmt->fetch(PDO::FETCH_OBJ)) {
			      echo '
			      	<div class="col-md-3 col-xs-6">
				  		<div class="thumbnail">
				  			<img src="'.$gall->img.'" class="img-responsive"/>
				  		</div>
				  	</div>
				  	';
		      }
		      ?>

      </div>
    </div>

        <div class="container">
		  <div class="line light btmspace"></div>
		  <div class="line bold"></div>
	  </div>

    </div> <!-- /container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">


	$(document).ready(function () {
		/*
        $('ul.nav > li').click(function (e) {
            //e.preventDefault();
            $('ul.nav > li').removeClass('active');
            $(this).addClass('active');
        });



        $('li.dropdown a').click(function (e) {
            //e.preventDefault();
            $('li.dropdown a').parent().removeClass('active');
            $(this).parent().addClass('active');
        });


        $('li.dropdown a').click(function (e) {
            //e.preventDefault();
            $('li.dropdown a').parent().removeClass('open');
            $(this).parent().addClass('open');
        });


	    $('body').on('click', function (e) {
		    if (!$('li.dropdown').is(e.target)
			&& $('li.dropdown').has(e.target).length === 0
			&& $('.open').has(e.target).length === 0
			) {
				$('li.dropdown').removeClass('open');
				$('li.dropdown').removeClass('active');
    		}
		});
		*/

    });

    </script>

  </body>
</html>

