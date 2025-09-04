<?php 
  $page_title = "Home - Dimple Star Transport"; 
  include("header.php"); 
  include("navbar.php"); 
?>

<!-- Hero Carousel -->
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="slide/images/b1.png" class="d-block w-100" alt="Bus 1">
      <div class="carousel-caption d-none d-md-block">
        <h1 class="fw-bold">Travel Safely with Dimple Star</h1>
        <p>Affordable • Reliable • Comfortable</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="slide/images/b2.png" class="d-block w-100" alt="Bus 2">
      <div class="carousel-caption d-none d-md-block">
        <h1 class="fw-bold">Comfort on the Road</h1>
        <p>Experience smooth and safe journeys</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="slide/images/b3.png" class="d-block w-100" alt="Bus 3">
      <div class="carousel-caption d-none d-md-block">
        <h1 class="fw-bold">Your Destination, Our Priority</h1>
        <p>Connecting cities with comfort</p>
      </div>
    </div>
  </div>
  <!-- Controls -->
  <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<!-- Contact -->
<div class="container my-5">
  <div class="text-center">
    <h2 class="text-success fw-bold">Contact Us</h2>
    <p class="fs-5"><strong>0929 209 0712</strong></p>
    <p>Block 1 Lot 10, Southpoint Subd.<br>Brgy Banay-Banay, Cabuyao, Laguna</p>
    <p><small class="text-muted"><?php include_once("php_includes/date_time.php"); ?></small></p>
  </div>
</div>

<?php include("footer.php"); ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Auto Slide -->
<script>
  const heroCarousel = document.querySelector('#heroCarousel');
  const carousel = new bootstrap.Carousel(heroCarousel, {
    interval: 4000, // auto-slide every 4 seconds
    ride: 'carousel'
  });
</script>
</body>
</html>
