<html>
<head>
  <meta charset="UTF-8">
  <title>Guide Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 <style></style>
 <link rel="stylesheet" type="text/css" href="/assets/style.css">
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <span class="navbar-brand">Welcome <?php echo $this->session->userdata['name']; ?>!</span>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container -->
  </nav>
  <div class="main-container">
    <div class="container">
      <?php 
      if ($this->session->flashdata('success'))
      {
        ?>
        <div class="alert alert-success">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Nice!</strong>
          <?php 
          foreach($this->session->flashdata('success') as $s){
            echo $s;
          }
          ?>
        </div>
        <?php
      }
      if ($this->session->flashdata('errors'))
      {
        ?>
        <div class="alert alert-danger">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Error!</strong>
          <?php 
          foreach($this->session->flashdata('errors') as $error){
            echo $error;
          }
          ?>
        </div>
        <?php
      }
      ?>
    </div>
    <div class="container">
      <h1><?php echo "{$guide['name']}'s profile"; ?></h1>
      <?php  echo "<form action='/guides/edit_guide/{$guide['id']}' method='post'><button class='btn btn-sm btn-primary'>Edit <span class='glyphicon glyphicon-edit'></button></form>"; ?>
      <h3>Name: <?php echo $guide['name']; ?></h3>
      <?php echo "<img src='/uploads/{$guide['image']}'>"; ?>
      <h4>Email: <?php echo $guide['email']; ?></h4>
      <!-- DOB is not populated correctly into the form field -->
      <h4>Date of Birth: <?php echo $guide['dob']; ?></h4>
      <?php
      echo "<h4>Rating: ";
      for ($i = 0; $i < $guide['rating']; $i++)
      {
        echo "<img src='/assets/star.png' height='25' width='25'>";
      }
      $star = 5 - $guide['rating'];
      for ($i = 0; $i < $star; $i++)
      {
        echo "<img src='/assets/blank.png' height='25' width='25'>";
      }
      echo "</h4>";
      echo "<h4>Price: \${$guide['price']}</h4>";
      echo "<h4>Location: {$guide['location']}</h4>";
     ?>
    </div>
  </div>
</body>
</html>