<?php
header('Content-Type: text/html; charset=utf-8');
// Welche Seite soll angezeigt werden?
$thisPage = $_SERVER['QUERY_STRING']; empty($thisPage) ? $thisPage = "aktuelles" : "";
if(($pos = strpos($thisPage, "&")) !== FALSE) {$subPage = substr($thisPage, $pos+1);}

	if (!empty($_POST)) {
		include ("send.php");
		$thisPage = "mail";
		header("refresh: 5, url=index.php");
	}

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
// 2. Auf der Seite "Galerie" Thumbnails aus eigener DB "gallery" einbinden
$g = "style='display:none;'";
// 3. Wenn nicht Startseite/Aktuelles, dann anderer jumbotron Background
if ($thisPage !== "aktuelles") {$jtbg = "style='background-color:rgb(249,189,118);'";}
// 4. Accordion
$a = "style='display:none;'";
	if ($subPage == "radfahren" || $subPage=="wandern") {
	$stmt = $db->prepare("SELECT * FROM accordion WHERE name = ?");
	$stmt->bindValue(1, $subPage, PDO::PARAM_STR);
	$stmt->execute();
	$a = "style='display:block;'";
	};
include("nav.php");
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

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
     <link href="css/style.css" rel="stylesheet">

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
		  <img src="img/logo.jpg" alt="Pfeffermühle" class="logo pull-right" width="860"/>
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
		        <li class="dropdown <?=$hotel;?>" id="myDropdown">
		          <a href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="hotel">Hotel</a>
		          <ul class="dropdown-menu">
		            <li class="zimmer"><a href="?hotel&zimmer">Zimmer</a></li>
		            <li class="divider-vertical sub"></li>
		            <li class="appartement"><a href="?hotel&appartement">Appartement</a></li>
		            <li class="divider-vertical sub"></li>
		            <li class="fruehstueck"><a href="?hotel&fruehstueck">Frühstück</a></li>
		            <li class="divider-vertical sub"></li>
		            <li class="preise"><a href="?hotel&preise">Preise</a></li>
		            <li class="divider-vertical sub"></li>
		            <li class="galerie"><a href="?hotel&galerie">Galerie</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="?hotel&anfrage">Anfrage</a></li>
		          </ul>
		        </li>
		        <li class="divider-vertical"></li>


		        <!-- GASTRONOMIE -->
		         <li class="dropdown <?=$gastronomie;?>">
		          <a href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gastronomie</a>
		          <ul class="dropdown-menu">
		            <li class="restaurant"><a href="?gastronomie&restaurant">Restaurant</a></li>
		            <li class="divider-vertical sub"></li>
		            <li class="bierstube"><a href="?gastronomie&bierstube">Bierstube</a></li>
		            <li class="divider-vertical sub"></li>
		            <li class="speisekarte"><a href="?gastronomie&speisekarte">Speisekarte</a></li>
		            <li class="divider-vertical sub"></li>
		            <li class="gfeiern"><a href="?gastronomie&gfeiern">Feiern</a></li>
		            <li class="divider-vertical sub"></li>
		            <li class="catering"><a href="?gastronomie&catering">Catering</a></li>
		             <li class="divider-vertical sub"></li>
		            <li><a href="?gastronomie&anfrage">Anfrage</a></li>
		          </ul>
		        </li>

		        <!-- VERANSTALTUNGEN -->
		        <li class="divider-vertical"></li>
		       <li class="dropdown <?=$veranstaltungen;?>">
		          <a href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Veranstaltungen</a>
		          <ul class="dropdown-menu">
		            <li class="feiern"><a href="?veranstaltungen&feiern">Feiern</a></li>
		            <li class="divider-vertical sub"></li>
		            <li class="meeting"><a href="?veranstaltungen&meeting">Meeting</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="?veranstaltungen&anfrage">Anfrage</a></li>
		          </ul>
		        </li>

		        <!-- AKTIVITÄTEN -->
		        <li class="divider-vertical"></li>
		       <li class="dropdown <?=$aktivitaeten;?>">
		          <a href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aktivitäten</a>
		          <ul class="dropdown-menu">
		            <li class="radfahren"><a href="?aktivitaten&radfahren">Radfahren</a></li>
		            <li class="divider-vertical sub"></li>
		            <li class="wandern"><a href="?aktivitaten&wandern">Wandern</a></li>
		            <li class="divider-vertical sub"></li>
		            <li class="andere"><a href="?aktivitaten&andere">Andere Aktivitäten</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="?aktivitaten&anfrage">Anfrage</a></li>
		          </ul>
		        </li>

		        <!-- SEHENSWERTES -->
		          <li class="divider-vertical"></li>
		       <li class="dropdown <?=$sehenswertes;?>">
		          <a href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">sehenswertes</a>
		          <ul class="dropdown-menu">
		            <li class="region"><a href="?sehenswertes&region">region</a></li>
		            <li class="divider-vertical sub"></li>
		            <li class="paderborn"><a href="?sehenswertes&paderborn">Stadt Paderborn</a></li>
		            <li class="divider-vertical sub"></li>
		            <li class="umgebung"><a href="?sehenswertes&umgebung">Umgebung</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="?sehenswertes&anfrage">Anfrage</a></li>
		          </ul>
		        </li>
		        <li class="divider-vertical"></li>
		        <li class="kontakt"><a href="?kontakt">kontakt</a></li>
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

	   <!-- Accordion -->
	   <div class="panel-group" id="accordion" <?=$a;?>>
		<?php
			$count = 0;
		      while ($acc = $stmt->fetch(PDO::FETCH_OBJ)) {
			      echo '
			      	<div class="panel panel-default">
					    <div class="panel-heading">
					      <h4 class="panel-title">
					        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$count.'">
									'.$acc->heading.'
							</a>
					      </h4>
					    </div>
					    <div id="collapse'.$count.'" class="panel-collapse collapse">
					      <div class="panel-body">
					        '.$acc->body.'
					      </div>
					    </div>
					  </div>
				';
				$count++;
		      }
		?>
		 </div>

	<!-- Standard thumbnails (4 Stück) -->
      <div class="row imgrow" <?=$d;?>>
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
    <!-- Galerie (beliebig) -->
			<?php
		    	if ($subPage == "galerie") {
					$gallery_db = $db->prepare("SELECT img FROM gallery");
					$gallery_db->execute();

					echo '<div class="row imgrow">';

					while ($gallery_out = $gallery_db->fetch(PDO::FETCH_OBJ)) {
				    	echo '
					    	<div class="col-md-3 col-xs-6">
								<div class="thumbnail">
									<img src="'.$gallery_out->img.'" class="img-responsive"/>
						  		</div>
						  	</div>
						';
		      		}

		      		echo ' </div>';
    			}
			?>
	  <?php if ($thisPage == "kontakt" || $subPage=="anfrage") {include("form.php");}?>

    </div>

        <div class="container">
		  <div class="line light btmspace"></div>
		  <div class="line bold"></div>
	  </div>

    </div> <!-- /container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
	    $(document).ready (function(){
$('#myDropdown dropdown-menu>a').click(function(e) {
    e.stopPropagation();
});
});
$(document).ready(function(){
$('.collapse').on('show', function(){
    $(this).parent().find(".icon-chevron-left").removeClass("icon-chevron-left").addClass("icon-chevron-down");
}).on('hide', function(){
    $(this).parent().find(".icon-chevron-down").removeClass("icon-chevron-down").addClass("icon-chevron-left");
});
});
	    </script>
  </body>
</html>