<?php
header('Content-Type: text/html; charset=utf-8');
// Welche Seite soll angezeigt werden?

// db
include("../conn.php");
include("upload.php");
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

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/lightbox.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
     <link href="../css/style.css" rel="stylesheet">

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
		  <img src="../img/logo.jpg" alt="Pfeffermühle" class="logo pull-right"/>
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
		        <li class="aktuelles"><a href="../index.php">Zur Homepage</a></li>

		       		      </ul>
		        </li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
	  </div>

    <div class="container">
	    <div class="line light"></div>
    </div>

    <div class="container">
	    <h1>
		   Neuen Eintrag für "Aktuelles" erstellen
	    </h1>
	   <div class="row">
		   <div class="col-md-12">
			   <div class="copy">
				   <div class="alert-danger"><?=$confirmation;?></div>
				   	<form name="upload" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="upload" value="1" />
							<input type="file" name="document"  id="input-file" style="margin-bottom:10px;"/>
							<button type="submit" class="btn btn-default" >Hochladen</button>
						</form>
			   </div>
		   </div>
	   </div>
    </div>

    <div class="container">
	    <?php include("content.php");?>
    </div>

        <div class="container">
		  <div class="line light btmspace"></div>
		  <div class="line bold"></div>
	  </div>

    </div> <!-- /container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>