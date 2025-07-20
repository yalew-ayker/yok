<?php
$lang = isset($_GET['lang']) && $_GET['lang'] === 'am' ? 'am' : 'en';
$tr = [
  'en' => [
    'title' => 'Our Services',
    'desc' => 'Explore our wide range of catering services for every occasion.',
  ],
  'am' => [
    'title' => 'አገልግሎታችን',
    'desc' => 'ለሁሉም ዝግጅት የሚስተካከሉ በርካታ የምግብ አገልግሎቶቻችንን ያግኙ።',
  ]
];
$tr = $tr[$lang];
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="frontend/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <title>Our Services - YOK Catering</title>
  <style>
    .custom-footer {
      background: linear-gradient(135deg, #006600 0%, #003300 60%) !important;
      background-image: url('frontend/img/home1.jpg') no-repeat center center/cover opacity(0.3) !important;
      color: white !important;
      position: absolute !important;
      width: 100% !important;
      padding: 60px 0 30px !important;
      overflow: auto !important;
      scrollbar-width: none !important;
      -ms-overflow-style: none !important;
}
    .services-hero {
      background: linear-gradient(135deg, rgba(0, 102, 0, 0.9) 0%, rgba(255, 0, 0, 0.8) 100%);
      padding: 120px 0 80px;
      position: relative;
      overflow: hidden;
    }
    
    .services-hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('frontend/img/home1.jpg') center/cover;
      opacity: 0.1;
      z-index: 1;
    }
    
    .services-hero-content {
      position: relative;
      z-index: 2;
      text-align: center;
      color: white;
    }
    
    .services-hero h1 {
      font-size: 3.5rem;
      font-weight: 700;
      margin-bottom: 1rem;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }
    
    .services-hero p {
      font-size: 1.25rem;
      opacity: 0.95;
      max-width: 600px;
      margin: 0 auto;
    }
    
    .services-section {
      padding: 80px 0;
      background: white;
    }
    
    .service-custom {
      background: white;
      border-radius: 20px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.1);
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      height: 100%;
      border: 2px solid #006600;
    }
    
    .service-custom:hover {
      transform: translateY(-10px);
      box-shadow: 0 30px 60px rgba(0,0,0,0.15);
      border-color: #ff0000;
    }
    
    .service-custom .card-img-top {
      width: 100%;
      height: 200px;
      object-fit: cover;
      transition: transform 0.3s ease;
    }
    
    .service-custom:hover .card-img-top {
      transform: scale(1.05);
    }
    
    .service-custom h2 {
      color: #006600;
      font-weight: 700;
      margin-bottom: 15px;
    }
    
    .service-custom p {
      color: #333;
      line-height: 1.6;
      margin-bottom: 20px;
    }
    
    .service-custom .btn-success {
      background: #006600;
      border-color: #006600;
      border-radius: 15px;
      padding: 10px 25px;
      font-weight: 600;
      transition: all 0.3s ease;
    }
    
    .service-custom .btn-success:hover {
      background: #ff0000;
      border-color: #ff0000;
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(255, 0, 0, 0.3);
    }
    
    /* Modern card hover effect for services */
    .service-modern-card {
      border-radius: 1.2rem;
      box-shadow: 0 4px 24px rgba(0,102,0,0.10);
      transition: transform 0.25s cubic-bezier(.4,0,.2,1), box-shadow 0.25s cubic-bezier(.4,0,.2,1);
      overflow: hidden;
      border: 2.5px solid #006600;
      background: #fff;
      position: relative;
    }
    .service-modern-card:hover {
      transform: translateY(-8px) scale(1.035);
      box-shadow: 0 16px 40px rgba(0,102,0,0.18), 0 2px 8px rgba(255,0,0,0.10);
      z-index: 2;
      border-color: #ff0000;
    }
    .service-modern-img {
      width: 100%;
      height: 260px;
      object-fit: cover;
      border-top-left-radius: 1.2rem;
      border-top-right-radius: 1.2rem;
      transition: filter 0.25s;
    }
    .service-modern-card:hover .service-modern-img {
      filter: brightness(0.97) saturate(1.15);
    }
    .service-modern-title {
      font-family: 'Lexend', 'Oswald', Arial, sans-serif;
      font-weight: 700;
      color: #006600;
      font-size: 1.08rem;
      margin-bottom: 0.25rem;
      margin-top: 0.25rem;
    }
    .service-modern-desc {
      color: #333;
      font-size: 0.95rem;
      min-height: 32px;
      margin-bottom: 0.7rem;
    }
    .service-modern-btn {
      background: linear-gradient(90deg,#006600,#ff0000);
      color: #fff;
      border-radius: 1.2em;
      padding: 0.6em 1.7em;
      font-weight: 700;
      font-size: 1.08em;
      box-shadow: 0 2px 12px #ff000033;
      border: none;
      transition: background 0.2s, box-shadow 0.2s, transform 0.15s;
      margin-bottom: 0.5rem;
    }
    .service-modern-btn:hover {
      background: linear-gradient(90deg,#ff0000,#006600);
      box-shadow: 0 6px 18px #ff000055;
      transform: translateY(-2px) scale(1.04);
    }
    
    @media (max-width: 768px) {
      .services-hero h1 {
        font-size: 2.5rem;
      }
      
      .services-hero p {
        font-size: 1.1rem;
      }
    }
  </style>

<body class="services-page">
    <header>
      <?php include 'navbar.php'; ?>
    </header>
  <!-- Services Hero Section -->
  <section class="services-hero">
    <div class="container">
      <div class="services-hero-content">
        <h1><?= $tr['title'] ?></h1>
        <p><?= $tr['desc'] ?></p>
      </div>
    </div>
  </section>
<?php include 'admin/statbar.php'; ?>
  <!-- Services Section -->
  <section class="services-section">
    <div class="container">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
      <?php
      $servicesFile = __DIR__ . '/frontend/db/services.json';
      $servicesImgDir = 'frontend/img/services/';
      $services = file_exists($servicesFile) ? json_decode(file_get_contents($servicesFile), true) : [];
      if ($services && count($services)) {
        foreach ($services as $srv) {
          echo '<div class="col">';
          echo '<div class="service-modern-card mb-3">';
          // Image
          if (!empty($srv['img'])) {
            $imgPath = $servicesImgDir . basename($srv['img']);
            $imgFile = __DIR__ . '/' . $imgPath;
            if (file_exists($imgFile)) {
              echo '<img src="' . $imgPath . '" alt="Service Image" class="service-modern-img">';
            } else {
              echo '<img src="frontend/img/home1.jpg" alt="Service" class="service-modern-img">';
            }
          } else {
            echo '<img src="frontend/img/home1.jpg" alt="Service" class="service-modern-img">';
          }
          // Card body
          echo '<div class="px-2 pb-2 pt-1 text-center">';
          echo '<div class="service-modern-title">' . htmlspecialchars($srv['title']) . '</div>';
          echo '<div class="service-modern-desc">' . nl2br(htmlspecialchars($srv['desc'])) . '</div>';
          echo '<a href="reservation.php" class="btn service-modern-btn"><i class="fa fa-utensils me-2"></i>Order Now</a>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
      } else {
        echo '<div class="alert alert-info">No services posted yet.</div>';
      }
      ?>
      </div>
    </div>
  </section>
  <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<div id="page-zip-overlay"></div>
<style>
  #page-zip-overlay {
    position: fixed;
    z-index: 9999;
    top: 0; left: 0; width: 100vw; height: 100vh;
    background: #fff;
    pointer-events: none;
    transform: translateX(-100%);
    transition: transform 0.6s cubic-bezier(.7,0,.3,1);
  }
  body.page-zip-transition #page-zip-overlay {
    pointer-events: all;
    transform: translateX(0);
    transition: transform 0.6s cubic-bezier(.7,0,.3,1);
  }
  body.page-zip-transition > *:not(#page-zip-overlay) {
    filter: blur(2px) brightness(0.7);
    transition: filter 0.3s;
  }
  body {
    transition: none;
  }
</style>
<script>
  // On page load, ensure overlay is hidden
  window.addEventListener('pageshow', function() {
    document.body.classList.remove('page-zip-transition');
    document.getElementById('page-zip-overlay').style.transform = 'scaleX(0)';
  });

  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('a[href]').forEach(function(link) {
      // Only intercept local links (not _blank, not external, not anchors)
      if (
        link.target === '' &&
        link.href &&
        link.origin === window.location.origin &&
        !link.href.endsWith('#') &&
        !link.href.startsWith('javascript:')
      ) {
        link.addEventListener('click', function(e) {
          e.preventDefault();
          // Start zip transition
          document.body.classList.add('page-zip-transition');
          setTimeout(function() {
            window.location.href = link.href;
          }, 500); // match CSS transition duration
        });
      }
    });
  });
</script>
</body>
</html>
