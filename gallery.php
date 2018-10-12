<!DOCTYPE html >
<html>
	<head>
		<title>Mimi’s Tea&Books</title>
		<meta charset="utf-8" />
		<link rel="icon" sizes="57x57" href="img/favicon.png">
		<link href="mimi.css" type="text/css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville|Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	</head>

  <body>
    <!-- HEADER -->
    <?php include("header.php");?>
		<!-- END HEADER -->
		<div class="abouthero">
			<img src="https://images.unsplash.com/photo-1519397652863-aad621636ac7?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=72d21f299330e8ff54564d2164579083&auto=format&fit=crop&w=1650&q=80">
		</div>

		<main id="maincolumn">

      <h1>Visual Shelf</h1>

			<?php
			#open db
			@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

			#check - connect or not
			if($db->connect_error) {
			  echo "Database couldn't connect due to:" . $db->connect_error;
			  exit();
			}

			$query = "SELECT * FROM Gallery";

			if($stmt = $db->prepare($query)){
					$stmt->bind_result($galleryID, $imgname, $imglocation);
					$stmt->execute(); //excute query

					while ($stmt->fetch()) {
						echo '<div class="responsive">
						  			<div class="gallery">
						      		<img class="cell" src="'.$imglocation .' ">
						  			</div>
									</div>';
					}
			}


		?>
</main>
		<!-- FOOTER -->
	 	<?php include("footer.php");  ?>
		<!-- END FOOTER -->
	</body>
</html>
