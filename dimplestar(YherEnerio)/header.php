<!DOCTYPE html>
<html lang="en">
    <style>
        .navbar-nav .nav-link {
  transition: color 0.3s ease;
}

.navbar-nav .nav-link:hover {
  color: #A5D6A7 !important; /* light green on hover */
}

footer img {
  filter: brightness(0) invert(1); /* makes footer logo white-ish */
  height: 40px;
}
        </style>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo isset($page_title) ? $page_title : "Dimple Star Transport"; ?></title>
  <link rel="icon" href="images/icon.ico" type="image/x-icon" />

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <!-- Custom CSS -->
  <style>
    body { font-family: 'Poppins', sans-serif; background:#f9f9f9; color:#333; }
    /* Carousel */
    #heroCarousel img { height: 450px; object-fit: cover; filter: brightness(70%); }
    .carousel-caption h1 { font-size: 2.5rem; text-shadow: 2px 2px 6px rgba(0,0,0,0.6); }
    .carousel-caption p { font-size: 1.2rem; text-shadow: 1px 1px 4px rgba(0,0,0,0.6); }
    .carousel .btn { font-weight: 600; border-radius: 30px; }
    /* Contact Card */
    .contact { text-align: center; padding: 40px 20px; background:#fff; border-radius:12px; margin:40px auto; max-width:600px; box-shadow:0 4px 12px rgba(0,0,0,0.1); }
  </style>
</head>
<body>
