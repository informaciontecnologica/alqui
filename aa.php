<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
  <?php include 'controles/cabezera.php' ; ?>
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 200px;
      height: 200px;
      margin: auto;
  }
  </style>
</head>
<body>

    <div class="container">
  <br>
  <div style=" width: 400px;">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
          <img src="imagenes/IS1j754p8h9g020000000000.jpg" width="460" height="145" alt=""/>
        
      </div>

      <div class="item">
        <img src="imagenes/IS5a3bsvuhu1xj1000000000.jpg" alt="Chania" width="260" height="245">
      </div>
    
      <div class="item">
        <img src="imagenes/IS5a3bsvuhu1xj1000000000.jpg" alt="Chania" width="260" height="245">
      </div>

      <div class="item">
         <img src="imagenes/IS5a3bsvuhu1xj1000000000.jpg" alt="Chania" width="260" height="245">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  </div>
</div>

</body>
</html>