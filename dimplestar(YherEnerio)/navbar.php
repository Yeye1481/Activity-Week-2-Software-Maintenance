<?php

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">
      <img src="images/logo.png" alt="Dimple Star Transport" height="40" class="d-inline-block align-text-top me-2">
      Dimple Star Transport
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="terminal.php">Terminals</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="routeschedule.php">Routes / Schedules</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="book.php">Book Now</a>
        </li>
      </ul>
      <div class="navbar-nav">
        <?php if(isset($_SESSION['user_id'])): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user me-1"></i> Welcome, <?php echo $_SESSION['user_name']; ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              
           
              <li><a class="dropdown-item text-danger" href="?logout=true"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
            </ul>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="signlog.php"><i class="fas fa-sign-in-alt me-1"></i>Login / Sign Up</a>
          </li>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>