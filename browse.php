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

			$query = "UPDATE Book SET Reserved = 1 WHERE Reserved = 0 and BookID ='$bookid'" ;
			$update = $db->prepare($query);
			$update->execute();

			// echo ('<script type="text/javascript">window.alert("Thanks, your book is reserved!")</script>');

		}

		$searchtitle = "b";
		$searchauthor = "c";

		if (isset($_POST) && !empty($_POST)) {
			$searchtitle = trim($_POST['title']);
			$searchauthor = trim($_POST['author']);
		}

		/*SELECT * FROM Book
		JOIN AuthorBook ON Book.BookID = AuthorBook.BookID
		JOIN Author ON Author.AuthorID = AuthorBook.AuthorID
		WHERE Book.Title LIKE '%' */

		$query = "SELECT Book.Reserved, Book.BookID, Book.Title, Author.FirstName, Author.LastName, Book.Pages, Book.Year, Book.ISBN FROM Book
		JOIN AuthorBook ON Book.BookID = AuthorBook.BookID
		JOIN Author ON Author.AuthorID = AuthorBook.AuthorID";

		#first scenario
		if($searchtitle && !$searchauthor) { //title but no author
			$query = $query . " WHERE Book.Title LIKE '%" . $searchtitle . "%' "; //??
		}
		#second scenario
		if(!$searchtitle && $searchauthor) { //author but no title
			$query = $query . " WHERE Author.FirstName LIKE '%" . $searchauthor . "%' ";
		}
		#third scenario
		if($searchtitle && $searchauthor) { //search both
			$query = $query . " WHERE Book.Title LIKE '%" . $searchtitle . "%' AND Author.FirstName LIKE '%" . $searchauthor . "%' ";
		}


		$stmt = $db->prepare($query); //prepares the query to fit SQL code, replace variables with values
		$stmt->bind_result($reserved, $bookid, $title, $authorF, $authorL, $pages, $bookyear, $isbn); //store data that you take from db in virables, same number of variables as date you SELECT
		$stmt->execute();





		?>
    <!-- END HEADER -->

    <div class="abouthero">
      <img src="https://images.unsplash.com/photo-1514823529749-16594073828c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=41dce261369a9ad34212781680079089&auto=format&fit=crop&w=1650&q=80">
    </div>

    <main id="maincolumn">

      <h1>Find Your Next Literary Companion</h1>

			<?php
			if(isset($_GET['reserve'])) {
				echo ('<p style="text-align: center"> Your book is reserved! </p>');
			}

			?>

      <form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="browsing">
        <input id="title" class="field" type="text" name="title" placeholder="Book Title">
        <input id="author" class="field" type="text" name="author" placeholder="Author">

        <input class="button" type="submit" value="Search">
			</form>

      <div class="center" style="overflow-x:auto;">
        <table class="centertable">
          <tr class="categories">
            <th>Title</th>
            <th>Author</th>
            <th>Pages</th>
            <th>Year</th>
            <th>ASIN</th>
            <th>Reserve</th>
          </tr>

					<?php

					while($stmt->fetch()) {

						echo '<tr class="row">
							<td>'.$title.'</td>

							<td hidden>'.$bookid.'</td>
							<td hidden>'.$reserved.'</td>

		          <td>'.$authorF.' '.$authorL.'</td>
		          <td>'.$pages.'</td>
		          <td>'.$bookyear.'</td>
		         	<td>'.$isbn.'</td>';

							if ($reserved===1) {
							echo '<td>
							<form action="" method="get">
							<button disabled class="button" style="background-color: #D3D3D3" ><del>Reserve</del></button>
							</form>
							</td>';
						} else {
							echo '<td>
							<form action="" method="get">
							<button class="button" name="reserve" value="'.$bookid.'">Reserve</button>
							</form>
							</td>';
						}

							echo '</tr>';

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
