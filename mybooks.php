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
    <?php include("header.php");

		#open db
		@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

		#check - connect or not
		if($db->connect_error) {
			echo "Database couldn't connect due to:" . $db->connect_error;
			exit();
		}

		if(isset($_GET['reserve'])) {

			$bookid = $_GET['reserve']; //grab the value from the button so we can use in query

			$query = "UPDATE Book SET Reserved = 0 WHERE Reserved = 1 and BookID ='$bookid'" ;
			$update = $db->prepare($query);
			$update->execute();


		}

		$query = "SELECT Book.BookID, Book.Title, Author.FirstName, Author.LastName, Book.Pages, Book.Year, Book.ISBN FROM Book
		JOIN AuthorBook ON Book.BookID = AuthorBook.BookID
		JOIN Author ON Author.AuthorID = AuthorBook.AuthorID
		WHERE Book.Reserved=1";


		$stmt = $db->prepare($query); //prepares the query to fit SQL code, replace variables with values
		$stmt->bind_result($bookid, $title, $authorF, $authorL, $pages, $bookyear, $isbn); //store data that you take from db in virables, same number of variables as date you SELECT
		$stmt->execute();




		?>


		<!-- END HEADER -->

    <div class="abouthero">
      <img src="https://images.unsplash.com/photo-1533327325824-76bc4e62d560?ixlib=rb-0.3.5&s=2ecd3c887e0c1bd10a405af91db14a76&auto=format&fit=crop&w=1500&q=80">
    </div>

    <main id="maincolumn">

      <h1 class="mybooks">My Books</h1>

			<?php
			if(isset($_GET['reserve'])) {
				echo ('<p style="text-align: center"> Your book is reserved! </p>');
			}

			?>

      <div class="center" style="overflow-x:auto;">
        <table class="centertable">
          <tr class="categories">
            <th>Title</th>
            <th>Author</th>
            <th>Pages</th>
            <th>Year</th>
            <th>ASIN</th>
            <th>Return</th>
          </tr>

					<?php

					while($stmt->fetch()) {
						echo '<tr class="row">
							<td>'.$title.'</td>
							<td hidden>'.$bookid.'</td>
		          <td>'.$authorF.' '.$authorL.'</td>
		          <td>'.$pages.'</td>
		          <td>'.$bookyear.'</td>
		         	<td>'.$isbn.'</td>

							<td>
							<form action="" method="get">
							<button class="button" name="reserve" id="'.$bookid.'" value="'.$bookid.'">Return</button>
							</form>

							</td>
						</tr>';
					}


					?>


        </table>
      </div>

    </main><!-- END maincolumn -->

    <!-- FOOTER -->
    <?php include("footer.php");  ?>
    <!-- END FOOTER -->
	</body>
</html>
