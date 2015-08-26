<?php
/*

-1. Datenbank anlegen, mit Testwerten füllen;

0. Formular zur Eingabe / Modifkation der Daten

1. DB-Verbindung aufbauen

2. Variablen mit Werten füllen

3. Ausgabe im Template

*/
?>


<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
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
		        <li><a href="#">Aktuell</a></li>
		        <li class="divider-vertical"></li>

		        <!-- HOTEL -->
		        <li class="dropdown">
		          <a href="#"  role="button" aria-haspopup="true" aria-expanded="false">Hotel</a>
		          <ul class="dropdown-menu">
		            <li><a href="#">Zimmer</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="#">Appartement</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="#">Frühstück</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="#">Preise</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="#">Galerie</a></li>
		          </ul>
		        </li>
		        <li class="divider-vertical"></li>


		        <!-- GASTRONOMIE -->
		         <li class="dropdown">
		          <a href="#"  role="button" aria-haspopup="true" aria-expanded="false">Gastronomie</a>
		          <ul class="dropdown-menu">
		            <li><a href="#">Restaurant</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="#">Bierstube</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="#">Speisekarte</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="#">Feiern</a></li>
		            <li class="divider-vertical sub"></li>
		            <li><a href="#">Catering</a></li>
		             <li class="divider-vertical sub"></li>
		            <li><a href="#">Anfrage</a></li>
		          </ul>
		        </li>
		        <li class="divider-vertical"></li>
		        <li><a href="tagung.html">tagung</a></li>
		        <li class="divider-vertical"></li>
		        <li><a href="#">urlaub</a></li>
		        <li class="divider-vertical"></li>
		        <li><a href="#">aktivitäten</a></li>
		        <li class="divider-vertical"></li>
		        <li><a href="#">sehenswertes</a></li>
		        <li class="divider-vertical"></li>
		        <li><a href="#">kontakt</a></li>
		      </ul>
		        </li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
	  </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
	  		<img src="img/willkommen.gif" alt="Willkommen"/>
       </div>
    </div>

    <div class="container">
	    <div class="line light"></div>
    </div>

    <div class="container">
	    <h1>Bleiben Sie bloß nicht da, wo der Pfeffer wächst.
		    <br/>
		    Besuchen Sie uns - wir freuen uns auf sie!
	    </h1>
	   <div class="row">
		   <div class="col-md-12">
			   <div class="copy">
		   Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			   </div>
		   </div>
	   </div>
      <div class="row imgrow">
	        <div class="col-md-3 col-xs-6">
		        <div class="thumbnail">
	          <img src="img/placeholder.gif" class="img-responsive"/>
		        </div>
	        </div>
	        <div class="col-md-3 col-xs-6">
		        <div class="thumbnail">
	          <img src="img/placeholder.gif" class="img-responsive"/>
		        </div>
	        </div>
	        <div class="col-md-3 col-xs-6" >
		        <div class="thumbnail">
	          <img src="img/placeholder.gif" />
		        </div>
	        </div>
	        <div class="col-md-3 col-xs-6">
		        <div class="thumbnail">
	          <img src="img/placeholder.gif"/>
		        </div>
	        </div>
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
        $('ul.nav > li').click(function (e) {
            //e.preventDefault();
            $('ul.nav > li').removeClass('active');
            $(this).addClass('active');
        });

        $('li.dropdown a').click(function (e) {
            e.preventDefault();
            $('li.dropdown a').parent().removeClass('active');
            $(this).parent().addClass('active');
        });


        $('li.dropdown a').click(function (e) {
            e.preventDefault();
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
    });
    </script>

  </body>
</html>

