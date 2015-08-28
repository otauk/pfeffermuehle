    	<!-- Kontaktformular -->
		<form class="form-horizontal" action="send.php" method="POST">
		  <div class="form-group">
		    <label for="name" class="col-sm-2 control-label">Name</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="name" name="name" placeholder="Mustermann">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="vorname" class="col-sm-2 control-label">Vorname</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="vorname" name="vorname"  placeholder="Max">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="mail" class="col-sm-2 control-label">E-Mail</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="mail" name="mail" placeholder="max@mustermann.de">
		    </div>
		  </div>
		<div class="form-group">
		  <label for="comment" class="col-sm-2 control-label">Ihre Nachricht</label>
		  <div class="col-sm-10">
			  <textarea class="form-control" rows="5" id="comment" name="nachricht" ></textarea>
		  </div>
		</div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Absenden</button>
		    </div>
		  </div>
		</form>