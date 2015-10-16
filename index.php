<?php
header('Content-Type: text/html; charset=utf-8');
// Welche Seite soll angezeigt werden?
$thisPage = $_SERVER['QUERY_STRING']; empty($thisPage) ? $thisPage = "willkommen" : "";
if(($pos = strpos($thisPage, "&")) !== FALSE) {$subPage = substr($thisPage, $pos+1);}

// Validierung
if (isset($_POST["raus"])) {
	// Name
	if(empty($_POST["name"])) {$fehler .= "Bitte geben Sie Ihren Namen an<br/>";} else {$name = validate($_POST["name"]);}
	// Vorname
	if(empty($_POST["vorname"])) {$fehler .= "Bitte geben Sie Ihren Vornamen an<br/>";} else {$vorname = validate($_POST["vorname"]);}
	// Mail
	if(empty($_POST["mail"])) {$fehler .= "Bitte geben Sie eine Mail-Adresse an (Format: vorname.nachname@test.de)<br/>";} else {$mail = validate($_POST["mail"]);}
	// Nachricht
	if(empty($_POST["nachricht"])) {$fehler .= "Bitte geben Sie eine Nachricht an<br/>";} else {$nachricht = validate($_POST["nachricht"]);}


if ($fehler) {
	$thisPage = "kontakt";
	$confirmation = "<div class='confirmation'>$fehler</div>";

	}
else {
	include ("send.php");
	$thisPage = "mail";
	header("refresh: 10, url=index.php");
	}
}

function validate($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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
if ($thisPage !== "willkommen") {$jtbg = "style='background-color:rgb(249,189,118);'";}
// 4. Accordion
$a = "style='display:none;'";
	if ($subPage == "radfahren" || $subPage=="wandern") {
	$stmt = $db->prepare("SELECT * FROM accordion WHERE name = ?");
	$stmt->bindValue(1, $subPage, PDO::PARAM_STR);
	$stmt->execute();
	$a = "style='display:block;'";
	};
// 5. Formatierung der Titel für die Lightbox
if(($pos = strpos($thisPage, "&")) !== FALSE) {
	$imgtitel = ucfirst(substr($thisPage, $pos+1));
	}
 else $imgtitel = ucfirst($thisPage);
include("nav.php");
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Homepage Hotel Restaurant Pfeffermühle, Paderborn">
    <meta name="author" content="Hotel Restaurant Pfeffermühle">
    <link rel="icon" href="../../favicon.ico">

    <title>Pfeffermühle - DEV</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
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
		  <a href="?willkommen">
		  <img src="img/logo.jpg" alt="Pfeffermühle" class="logo pull-right"/>
		  </a>
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
		          <a href="?hotel&zimmer"  aria-haspopup="true" aria-expanded="false" class="hotel">Hotel</a>
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
		          <a href="?gastronomie&restaurant"  aria-haspopup="true" aria-expanded="false">Gastronomie</a>
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
		          <a href="?veranstaltungen&feiern"   aria-haspopup="true" aria-expanded="false">Veranstaltungen</a>
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
		          <a href="?aktivitaten&radfahren"   aria-haspopup="true" aria-expanded="false">Aktivitäten</a>
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
		          <a href="?sehenswertes&region"  aria-haspopup="true" aria-expanded="false">Sehenswertes</a>
		          <ul class="dropdown-menu">
		            <li class="region"><a href="?sehenswertes&region">Region</a></li>
		            <li class="divider-vertical sub"></li>
		            <li class="paderborn"><a href="?sehenswertes&paderborn">Stadt Paderborn</a></li>
		            <li class="divider-vertical sub"></li>
		            <li class="umgebung"><a href="?sehenswertes&umgebung">Umgebung</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="?sehenswertes&anfrage">Anfrage</a></li>
		          </ul>
		        </li>
		        <li class="divider-vertical"></li>
		        <li class="kontakt"><a href="?kontakt">Kontakt</a></li>
		      </ul>
		        </li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
	  </div>

    <div class="jumbotron" <?=$jtbg;?>>
	    <?php
		    if ($row->slider != NULL) {
				// Arrays mit Bildernamen
				$slider =  array 	(
									0 => array ("Willkommen1", "Willkommen2", "Willkommen3", "Willkommen4", "Willkommen5"),
									1 => array ("Hotel-Zimmer1","Hotel-Zimmer2","Hotel-Zimmer3","Hotel-Zimmer4", "Hotel-Zimmer5"),
									2 => array ("Hotel-Appart1", "Hotel-Appart2", "Hotel-Appart3", "Hotel-Appart4","Hotel-Appart5"),
									3 => array ("Hotel-Frueh1","Hotel-Frueh2", "Hotel-Frueh3","Hotel-Frueh4","Hotel-Frueh5"),
									4 => array ("GASTRO_REST1","GASTRO_REST2","GASTRO_REST3","GASTRO_REST4"),
									5 => array ("GASTRO_BIER1","GASTRO_BIER2","GASTRO_BIER3","GASTRO_BIER4", "GASTRO_BIER5"),
									6 => array ("GASTRO_FEIERN1","GASTRO_FEIERN4","GASTRO_FEIERN5"),
									7 => array ("GASTRO_CATER1", "GASTRO_CATER2","GASTRO_CATER3","GASTRO_CATER4","GASTRO_CATER5"),
									8 => array ("SEHEN_STADTPADER1","SEHEN-STADTPADER2","SEHEN-STADTPADER3","SEHEN-STADTPADER4","SEHEN-STADTPADER5")
									);

				// Welche Seite?
				if($thisPage == "willkommen") {$n = 0;}
				elseif ($subPage == "zimmer"){$n=1;}
				elseif ($subPage == "appartement"){$n=2;}
				elseif ($subPage == "fruehstueck"){$n=3;}
				elseif ($subPage == "restaurant"){$n=4;}
				elseif ($subPage == "bierstube"){$n=5;}
				elseif ($subPage == "gfeiern" OR $subPage == "feiern"){$n=6;}
				elseif ($subPage == "catering"){$n=7;}
				elseif ($subPage == "paderborn"){$n=8;}
				// Array durchlaufen
				echo '<ul class="bxslider" style="margin-left: -2.5em;">';
					foreach ($slider[$n] as $img) {
						echo '<li><img src="img/slider/'.$img.'.jpg" /></li>';
					}
				echo "</ul>";
		    }
		    else echo "<img src='$row->jumbo'/>";
		?>
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
					<!-- Aktuelles -->
				   <?php
				   if ($thisPage == "aktuelles") {
					   include("aktuelles.php");
					   echo '
					   	<a href="admin/index.php" style="float:right;">Login</a>
					   ';
					   }

					   else  echo $row->p;
					   ?>
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
					      <p>
					        '.$acc->body.'
					        </p>
					        <p>
					        <a class="panel-link" href="'.$acc->link.'" target="_blank">Weitere Informationen</a>
					        </p>
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
	        <div class="col-md-3 col-sm-6 col-xs-6">
		        <div class="thumbnail">
			        <a href="<?php echo $row->img1;?>" data-lightbox="thumbnail" data-title="<?php echo $imgtitel;?>">
						<img src="<?php echo $row->img1;?>" class="img-responsive"/>
			        </a>
		        </div>
	        </div>
	        <div class="col-md-3 col-sm-6 col-xs-6">
		        <div class="thumbnail">
			        <a href="<?php echo $row->img2;?>" data-lightbox="thumbnail" data-title="<?php echo $imgtitel;?>">
						<img src="<?php echo $row->img2;?>" class="img-responsive"/>
			        </a>
		        </div>
	        </div>
	        <div class="col-md-3 col-sm-6 col-xs-6" >
		        <div class="thumbnail">
			        <a href="<?php echo $row->img3;?>" data-lightbox="thumbnail" data-title="<?php echo $imgtitel;?>">
						<img src="<?php echo $row->img3;?>" />
			        </a>
		        </div>
	        </div>

	        <div class="col-md-3 col-sm-6 col-xs-6" >
		        <div class="thumbnail">
			        <a href="<?php echo $row->img4;?>" data-lightbox="thumbnail" data-title="<?php echo $imgtitel;?>">
						<img src="<?php echo $row->img4;?>" />
			        </a>
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
									<a href="'.$gallery_out->img.'" data-lightbox="galerie" data-title="'.$imgtitel.'">
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
    <script src="js/lightbox.js"></script>
    <script src="js/jquery.bxslider.min.js"></script>
  </body>
</html>

<script>
	$(document).ready(function(){
  $('.bxslider').bxSlider({
	  mode: 'fade',
	  auto: true,
	  controls: false,
	  pager: false,
	  speed:2000,
	  pause:8000,
	  easing: 'ease-in-out'

  });
});
</script>