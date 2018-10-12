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
    <?php include("header.php");  ?>
    <!-- END HEADER -->

    <div class="abouthero">
      <img src="https://images.unsplash.com/photo-1510130516110-a0052e9b5947?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=5b0ef31ee62a1a2b0e52b58d60d8e339&auto=format&fit=crop&w=1650&q=80">
    </div>

    <main id="maincolumn">

      <h1>Contact Us</h1>

      <form method="post" class="contact">
        <input class="field" type="text" name="name" required="*" placeholder="Name"/> <br>
        <input class="field" type="text" name="email" required="*" placeholder="Email"/> <br>
        <input class="field" type="text" name="title" required="*" placeholder="Title"/> <br>
        <textarea  class="field mes" type="text" name="message" placeholder="Message"></textarea> <br>

        <input class="button" type="submit" value="Send">
      </form>


    </main><!-- END maincolumn -->

    <!-- FOOTER -->
    <?php include("footer.php");  ?>
    <!-- END FOOTER -->
	</body>
</html>
