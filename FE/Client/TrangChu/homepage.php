<!DOCTYPE html>
<html>
  <head>
    <title>Shop Home Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">My Shop</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Products</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="fa fa-shopping-cart"></i> Cart <span class="badge">3</span></a></li>
      </ul>
    </div>
  </div>
</nav>
    <!-- Main Content -->
    <div class="container">
      <h1>Shop</h1>
      <div class="row">
        <div class="col-sm-4">
          <div class="card">
            <img src="item1.jpg" alt="Item 1" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Item 1</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              <a href="#" class="btn btn-primary">Buy Now</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <img src="item2.jpg" alt="Item 2" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Item 2</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              <a href="#" class="btn btn-primary">Buy Now</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <img src="item3.jpg" alt="Item 3" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Item 3</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              <a href="#" class="btn btn-primary">Buy Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </body>
</html>
