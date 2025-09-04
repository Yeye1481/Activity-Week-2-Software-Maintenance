<?php 
  $page_title = "Routes & Schedules - Dimple Star Transport"; 
  include("header.php"); 
  include("navbar.php"); 
?>

<!-- Page Header -->
<div class="py-5 text-center text-white" style="background-color: #2E7D32;">
  <div class="container">
    <h1 class="fw-bold">Routes & Schedules</h1>
    <p class="lead">Travel made easier with Dimple Star Transport</p>
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

<!-- Content -->
<div class="container my-5">

  <!-- Route Map -->
  <div class="text-center mb-4">
    <img src="images/route.png" class="img-fluid rounded shadow" alt="Route Map">
    <h5 class="mt-3 text-muted">(All trips are vice versa)</h5>
  </div>

  <!-- Schedule Table -->
  <div class="card shadow border-0">
    <div class="card-body">
      <h3 class="text-success fw-bold mb-3">Daily Schedules</h3>
      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
          <thead class="table-success text-center">
            <tr>
              <th>Origin</th>
              <th>Regular Schedule</th>
              <th>Destination</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Ali Mall Cubao Terminal</td>
              <td>9:00 am / 10:00 am / 1:00 pm / 4:00 pm</td>
              <td>San Jose</td>
            </tr>
            <tr>
              <td>Alabang Terminal</td>
              <td>6:00 am / 7:00 am / 2:00 pm / 6:00 pm / 10:00 pm</td>
              <td>San Jose</td>
            </tr>
            <tr>
              <td>Cabuyao Terminal</td>
              <td>8:00 am / 9:00 am / 4:00 pm / 8:00 pm</td>
              <td>San Jose</td>
            </tr>
            <tr>
              <td>España Terminal</td>
              <td>4:30 am / 5:30 am / 12:00 nn / 4:00 pm / 8:00 pm</td>
              <td>San Jose</td>
            </tr>
            <tr>
              <td>San Lazaro Terminal</td>
              <td>3:00 am / 4:30 am / 11:00 am / 3:00 pm / 7:00 pm</td>
              <td>San Jose</td>
            </tr>
            <tr>
              <td>Pasay Terminal</td>
              <td>5:00 am / 6:00 am / 1:00 pm / 3:00 pm</td>
              <td>San Jose</td>
            </tr>
          </tbody>
        </table>
      </div>
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
