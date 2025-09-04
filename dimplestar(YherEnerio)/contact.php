<?php 
  $page_title = "Contact Us - Dimple Star Transport"; 
  include("header.php"); 
  include("navbar.php"); 
?>

<!-- Page Header -->
<div class="py-5 text-center text-white" style="background-color: #2E7D32;">
  <div class="container">
    <h1 class="fw-bold">Contact Us</h1>
    <p class="lead">We’d love to hear from you</p>
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

<!-- Contact Section -->
<div class="container my-5">
  <div class="row g-5">

    <!-- Contact Info -->
    <div class="col-md-5">
      <h3 class="text-success fw-bold mb-3">Dimple Star Transport</h3>
      <p>
        Block 1 Lot 10, Southpoint Subdivision <br>
        Brgy. Banay-Banay, Cabuyao, Laguna <br>
        <strong>Phone:</strong> 0929 209 0712
      </p>
      <div class="mt-3">
        <p><i class="bi bi-envelope-fill text-success"></i> support@dimplestar.com</p>
        <p><i class="bi bi-telephone-fill text-success"></i> +63 929 209 0712</p>
      </div>
    </div>

    <!-- Contact Form -->
    <div class="col-md-7">
      <div class="card shadow border-0">
        <div class="card-body p-4">
          <h4 class="mb-4 fw-bold text-success">Send us a Message</h4>
          <form class="needs-validation" action="messageexec.php" method="POST" novalidate>
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input id="name" type="text" name="name" class="form-control" required>
              <div class="invalid-feedback">Please enter your name.</div>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input id="email" type="email" name="email" class="form-control" placeholder="example@email.com" required>
              <div class="invalid-feedback">Please enter a valid email.</div>
            </div>
            <div class="mb-3">
              <label for="subject" class="form-label">Subject</label>
              <input id="subject" type="text" name="subject" class="form-control" required>
              <div class="invalid-feedback">Please enter a subject.</div>
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Message</label>
              <textarea id="message" name="message" rows="5" class="form-control" required></textarea>
              <div class="invalid-feedback">Please enter your message.</div>
            </div>
            <button type="submit" class="btn btn-success px-4">Submit</button>
          </form>
        </div>
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

<!-- Bootstrap JS + Validation -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Bootstrap form validation
  (() => {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  })()
</script>
</body>
</html>
