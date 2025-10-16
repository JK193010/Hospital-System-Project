<?php
session_start();
require_once __DIR__ . '/../includes/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Letik Hospital – Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .hero {
      background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                  url('https://raw.githubusercontent.com/letik-hospital/public-images/main/hero.jpg') 
                  no-repeat center center/cover;
      height: 70vh;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      text-align: center;
    }

    .hero h1 {
      font-size: 3.2rem;
      font-weight: 800;
      text-shadow: 0 2px 6px rgba(0,0,0,0.7);
    }

    .hero p {
      font-size: 1.25rem;
      max-width: 700px;
      margin: 1rem auto;
      text-shadow: 0 1px 3px rgba(0,0,0,0.7);
    }

    .service-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border: none;
      border-radius: 12px;
      overflow: hidden;
      height: 100%;
    }
    .service-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    }
    .service-img {
      height: 200px;
      width: 100%;
      object-fit: cover;
    }

    footer {
      background-color: #212529;
      color: #adb5bd;
    }

    .nav-link.active {
      color: #0d6efd !important;
      font-weight: 600;
    }
  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold text-primary" href="home.php">Letik Hospital</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item ms-2">
            <a class="btn btn-outline-primary btn-sm" href="dashboard.php">Dashboard</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="hero">
    <div class="container">
      <h1 class="display-5 fw-bold">Caring for You, Every Step of the Way</h1>
      <p class="lead">Advanced medical care with compassion — 24/7 emergency services, expert doctors, and state-of-the-art labs.</p>
      <a href="#services" class="btn btn-light btn-lg me-3">Our Services</a>
      <a href="#contact" class="btn btn-outline-light btn-lg">Contact Us</a>
    </div>
  </section>

  <section id="services" class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Our Core Services</h2>
        <p class="text-muted">Delivering excellence in every department</p>
      </div>
      <div class="row g-4">
        <!-- Doctors -->
        <div class="col-md-4">
          <div class="card service-card">
            <img src="https://www.google.com/imgres?q=kenyan%20doctors&imgurl=https%3A%2F%2Fhealth21initiative.org%2Fwp-content%2Fuploads%2F2018%2F08%2FCredit-iStock-veronicadana.jpg&imgrefurl=https%3A%2F%2Fhealth21initiative.org%2Farticle%2F21st-century-healthcare-delivery-kenya%2F&docid=yehaD6Am7YLfQM&tbnid=eUzeIDrAPI6gIM&vet=12ahUKEwitrrqHmqiQAxWAZqQEHcGyOM8QM3oECGkQAA..i&w=1961&h=1385&hcb=2&ved=2ahUKEwitrrqHmqiQAxWAZqQEHcGyOM8QM3oECGkQAA" class="service-img" alt="Expert Doctors">
            <div class="card-body">
              <h5 class="card-title">Expert Doctors</h5>
              <p class="card-text">Board-certified physicians dedicated to your health and recovery.</p>
            </div>
          </div>
        </div>
        <!-- Nurses -->
        <div class="col-md-4">
          <div class="card service-card">
            <img src="https://raw.githubusercontent.com/letik-hospital/public-images/main/nurses.jpg" class="service-img" alt="Compassionate Nursing">
            <div class="card-body">
              <h5 class="card-title">Compassionate Nursing</h5>
              <p class="card-text">24/7 care from our highly trained and empathetic nursing staff.</p>
            </div>
          </div>
        </div>
        <!-- Laboratory -->
        <div class="col-md-4">
          <div class="card service-card">
            <img src="https://raw.githubusercontent.com/letik-hospital/public-images/main/lab.jpg" class="service-img" alt="Advanced Laboratory">
            <div class="card-body">
              <h5 class="card-title">Advanced Labs</h5>
              <p class="card-text">Fast, accurate diagnostics with cutting-edge laboratory technology.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="contact" class="py-5">
    <div class="container">
      <h2 class="text-center mb-4">Get in Touch</h2>

      <?php if (isset($_SESSION['success_msg'])): ?>
        <div class="alert alert-success text-center">
          <?= htmlspecialchars($_SESSION['success_msg']); unset($_SESSION['success_msg']); ?>
        </div>
      <?php elseif (isset($_SESSION['error_msg'])): ?>
        <div class="alert alert-danger text-center">
          <?= htmlspecialchars($_SESSION['error_msg']); unset($_SESSION['error_msg']); ?>
        </div>
      <?php endif; ?>

      <div class="row justify-content-center">
        <div class="col-md-6">
          <form method="post" action="contact_process.php">
            <div class="mb-3">
              <label class="form-label">Full Name</label>
              <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Message</label>
              <textarea class="form-control" name="message" rows="4" placeholder="Type your message..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <footer class="text-center py-4 text-light">
    <div class="container">
      <p class="mb-1">&copy; 2025 Letik Hospital. All Rights Reserved.</p>
      <p class="mb-0">24/7 Emergency Line: <strong>+251 XXX XXX XXX</strong></p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>