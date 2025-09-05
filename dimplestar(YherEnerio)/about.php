<?php 
  $page_title = "About Us - Dimple Star Transport"; 
  include("header.php"); 
  include("navbar.php"); 
?>

<!-- Page Header -->
<div class="py-5 text-center text-white" style="background-color: #2E7D32;">
  <div class="container">
    <h1 class="fw-bold">About Us</h1>
    <p class="lead">Our history, mission, and vision in serving commuters</p>
  </div>
</div>

<!-- Session Welcome -->
<div class="container mt-4 text-end">
  <?php
    if(isset($_SESSION['email'])){
      echo "<p>Welcome, <strong>{$_SESSION['email']}</strong>! 
              <a href='logout.php' class='btn btn-success btn-sm'>Logout</a></p>";
    } else {
      echo "<a href='signlog.php' class='btn btn-outline-success btn-sm'>SignUp / Login</a>";
    }
  ?>
</div>

<!-- About Section -->
<div class="container my-5">
  <div class="row align-items-center">
    <div class="col-lg-6 mb-4">
      <img src="images/oldbus.jpg" class="img-fluid rounded shadow" alt="Old Dimple Star Bus">
    </div>
    <div class="col-lg-6">
      <h2 class="text-success fw-bold">Our History</h2>
      <p>
        Photo taken on October 16, 1993: Napat Transit (now Dimple Star Transport) 
        bus NVR-963 (Fleet No. 800) going to Alabang with jeepneys under the Light Rail 
        Line in Taft Ave near United Nations Avenue, Ermita, Manila.
      </p>
      <p>
        In May 2004, Napat Transit officially became <strong>Dimple Star Transport</strong>, 
        expanding its routes and commitment to safe, affordable, and reliable transportation 
        for commuters in Metro Manila and Mindoro Province.
      </p>
    </div>
  </div>
</div>

<!-- Mission & Vision -->
<div class="container my-5">
  <div class="row text-center">
    <div class="col-md-6 mb-4">
      <div class="card border-0 shadow h-100">
        <div class="card-body">
          <h3 class="text-success fw-bold">Mission</h3>
          <p>To provide superior transport service to Metro Manila and Mindoro Province commuters.</p>
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-4">
      <div class="card border-0 shadow h-100">
        <div class="card-body">
          <h3 class="text-success fw-bold">Vision</h3>
          <p>To lead the bus transport industry through innovative and reliable service to the riding public.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- FB Like (Optional) -->
<div class="container text-center my-4">
  <?php include_once("php_includes/fblike.php"); ?>
</div>

<!-- Date/Time -->
<div class="container text-center mb-5">
  <p class="text-muted">
    <?php include_once("php_includes/date_time.php"); ?>
  </p>
</div>

<?php include("footer.php"); ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
