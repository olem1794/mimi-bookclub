<!DOCTYPE html >
<html>
	<head>
		<title>Mimi’s Tea&Books</title>
		<meta charset="utf-8" />
		<link rel="icon" sizes="57x57" href="img/favicon.png">
		<link href="mimi.css" type="text/css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	</head>

  <body>
    <!-- HEADER -->
    <?php include("header.php"); ?>
    <!-- END HEADER -->
      <div class="slider">
        <img class="slide" id="slide-1" src="img/hero.jpg"></a>
        <img class="slide" id="slide-2" src="https://images.unsplash.com/photo-1460533893735-45cea2212645?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=68d073664dd5d8d90557a56bc28a7806&auto=format&fit=crop&w=1600&q=80"></a>
        <img class="slide" id="slide-3" src="https://images.unsplash.com/photo-1533327325824-76bc4e62d560?ixlib=rb-0.3.5&s=2ecd3c887e0c1bd10a405af91db14a76&auto=format&fit=crop&w=1500&q=80"></a>
        <img class="slide" id="slide-4" src="https://images.unsplash.com/24/Tea-Time.png?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=cc91dd70317f66b78f9a6198dd55b031&auto=format&fit=crop&w=1500&q=80"></a>
        <img class="slide" id="slide-5" src="https://images.unsplash.com/photo-1506545526820-9fd2eb7865c5?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=f453168394c5248d120a9fa1fcd70472&auto=format&fit=crop&w=1650&q=80"></a>
      </div>

      <div class="dotslide">
        <a href="#slide-1"><i class="fas fa-circle"></i></a>
        <a href="#slide-2"><i class="fas fa-circle"></i></a>
        <a href="#slide-3"><i class="fas fa-circle"></i></a>
        <a href="#slide-4"><i class="fas fa-circle"></i></a>
        <a href="#slide-5"><i class="fas fa-circle"></i></a>
      </div>


    <main id="maincolumn">

      <section id="intro">
        <h1>Welcome!</h1>
        <p> Mimi’s Book Club is a dedicated reading community, where you can discuss the latest releases, share recommendations and find your next favorite read. As a special treat to our members, we also pair our books with a unique blend of herbs and tea, so when you are ready to snuggle up with your new pick, also enjoy the benefits of a curated tea. So grab your cozy blanket, turn on that boiler and get ready to be transported to the magical realm of the written word.</p>
      </section>

      <div class="leaf">
        <i class="fas fa-leaf fa-flip-horizontal"></i><i class="fas fa-leaf"></i>
      </div>

      <div id="toppicks">
        <h2 class="picks">Top Picks</h2>

        <div class="grid hp">
          <div class="topbook">
          <img src="http://www.wrbh.org/wp-content/uploads/2017/08/Harry-Potter-Goblet-of-Fire.jpg"></a>
          <a href="browse.php"><h3>Harry Potter #4</h3></a>
          <h4>J.K Rowling</h4>
          <div class="rate">
          <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
          </div>
        </div>
        </div>

        <div class="grid sw">
          <div class="topbook">
          <img src="http://images.penguinrandomhouse.com/cover/700jpg/9781524797188"></a>
          <a href="browse.php"><h3>Something in the Water</h3></a>
          <h4>Catherine Steadman</h4>
          <div class="rate">
            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
          </div>
        </div>
        </div>

        <div class="grid bi">
          <div class="topbook">
          <img src="https://images-na.ssl-images-amazon.com/images/I/41X2BhEvF4L.jpg"></a>
          <a href="browse.php"><h3>The Book Of Ideas</h3></a>
          <h4>Radim Malinic</h4>
          <div class="rate">
            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
          </div>
        </div>
        </div>

        <div class="grid lifire">
          <div class="topbook">
            <img src="http://paulpen.com/wp-content/uploads/2016/01/Light-of-the-fireflies-Paul-Pen-Cover-hi.jpg"></a>
           <a href="browse.php"><h3>The Light Of The Fireflies</h3></a>
          <h4>Paul Pen</h4>
          <div class="rate">
            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></i><i class="far fa-star"></i>
          </div>
        </div>
        </div>
      </div><!-- END Top Picks -->

      <div class="leaf">
        <i class="fas fa-leaf fa-flip-horizontal"></i><i class="fas fa-leaf"></i>
      </div>

    </main><!-- END maincolumn -->

    <!-- FOOTER -->
    <?php include("footer.php");  ?>
    <!-- END FOOTER -->
	</body>
</html>
