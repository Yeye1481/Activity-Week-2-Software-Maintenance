<?php 
  $page_title = "Terminals - Dimple Star Transport"; 
  include("header.php"); 
  include("navbar.php"); 
?>

<!-- Page Header -->
<div class="py-5 text-center text-white" style="background-color: #2E7D32;">
  <div class="container">
    <h1 class="fw-bold">Our Terminals</h1>
    <p class="lead">Find us in key locations across Metro Manila and Mindoro</p>
  </div>
</div>

<!-- Session Welcome -->
<div class="container mt-4 text-end">
  <?php
    session_start();
    if(isset($_SESSION['email'])){
      echo "<p>Welcome, <strong>{$_SESSION['email']}</strong>! 
              <a href='logout.php' class='btn btn-success btn-sm'>Logout</a></p>";
    } else {
      echo "<a href='signlog.php' class='btn btn-outline-success btn-sm'>SignUp / Login</a>";
    }
  ?>
</div>

<!-- Terminals Section -->
<div class="container my-5">

  <!-- España Terminal -->
  <div class="card mb-5 shadow border-0">
    <div class="card-body">
      <h3 class="text-success fw-bold">España Terminal</h3>
      <div class="ratio ratio-16x9 mb-3">
        <iframe 
          src="https://maps.google.com.ph/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Dimple+Star,+836BAntipoloStSampaloc,521,Manila&amp;t=h&amp;ie=UTF8&amp;ll=14.6125312,120.9948033&amp;spn=0.011772,0.021136&amp;z=14&amp;output=embed"
          width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">
        </iframe>
      </div>
      <p class="mb-1"><strong>Contact:</strong></p>
      <p class="text-muted">+63 2 985 1451 / +63 908 926 9163</p>
      <a href="https://www.google.com/maps/place/Dimple+Star/@14.6125312,120.9948033,770m" target="_blank" class="btn btn-outline-success btn-sm">
        View Larger Map
      </a>
    </div>
  </div>

  <!-- San Jose Terminal -->
  <div class="card mb-5 shadow border-0">
    <div class="card-body">
      <h3 class="text-success fw-bold">San Jose Terminal</h3>
      <div class="ratio ratio-16x9 mb-3">
        <iframe 
          src="https://maps.google.com.ph/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Dimple+Star+Transport,+BonifacioSt,SanJose,OccidentalMindoro&amp;t=h&amp;ie=UTF8&amp;ll=12.3540632,121.0618653&amp;spn=0.011772,0.021136&amp;z=14&amp;output=embed"
          width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">
        </iframe>
      </div>
      <p class="mb-1"><strong>Contact:</strong></p>
      <p class="text-muted">+63 2 668 4151 / +63 921 568 6449</p>
      <a href="https://www.google.com/maps/place/Dimple+Star+Transport/@14.6143711,120.9841972,458m" target="_blank" class="btn btn-outline-success btn-sm">
        View Larger Map
      </a>
    </div>
  </div>

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
