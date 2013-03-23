<!DOCTYPE html>
<html>
  <head>
    <title>Excel Upload Scripts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  <body>
	 <div class="container">
		<div class="hero-unit">
			<h1>Excel Automatic Upload</h1>
			<p>Choose Excel File</p>
			<form action="upload_file.php" method="post" enctype="multipart/form-data">
				<label for="file">Filename:</label>
				<input type="file" name="file" id="file"><br>
				<input type="submit" name="submit" value="Submit">
			</form>
		</div>
	</div>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>