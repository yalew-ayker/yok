<?php
$lang = isset($_GET['lang']) && $_GET['lang'] === 'am' ? 'am' : 'en';
$tr = [
  'en' => [
    'title' => 'Packages',
    'desc' => 'Discover our catering packages tailored for your needs.',
    'order_now' => 'Order Now',
    'no_packages' => 'No packages found.'
  ],
  'am' => [
    'title' => 'ፓኬጆች',
    'desc' => 'ለፍላጎትዎ የተሟላ የምግብ ፓኬጆቻችንን ያግኙ።',
    'order_now' => 'አሁን ይዘዙ',
    'no_packages' => 'ምንም ፓኬጅ አልተገኘም።'
  ]
];
$tr = $tr[$lang];
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
  <!-- Google Fonts: Oswald for navbar brand display font -->
  <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,600,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@700&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="frontend/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <title><?= $tr['title'] ?> - YOK Catering</title>
  <style>
    .custom-footer {
      background: linear-gradient(135deg, #2c5530 0%, #1e3a22 100%);
      color: white;
      padding: 60px 0 30px;
      overflow: scroll;
      position: absolute;
      width: 100%;
    }    
    .packages-hero {
      background: linear-gradient(135deg, rgba(0, 102, 0, 0.9) 0%, rgba(255, 0, 0, 0.8) 100%);
      padding: 120px 0 80px;
      position: relative;
      overflow: hidden;
    }
    
    .packages-hero::before {
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
    
    .packages-hero-content {
      position: relative;
      z-index: 2;
      text-align: center;
      color: white;
    }
    
    .packages-hero h1 {
      font-size: 3.5rem;
      font-weight: 700;
      margin-bottom: 1rem;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }
    
    .packages-hero p {
      font-size: 1.25rem;
      opacity: 0.95;
      max-width: 600px;
      margin: 0 auto;
    }
    
    .packages-section {
      padding: 80px 0;
      background: white;
    }
    .modern-packages-card {
      border-radius: 1.2rem;
      box-shadow: 0 4px 24px rgba(0,102,0,0.10);
      transition: transform 0.22s cubic-bezier(.4,0,.2,1), box-shadow 0.22s cubic-bezier(.4,0,.2,1);
      border: 2px solid #006600;
      background: #fff;
      overflow: hidden;
      position: relative;
      height: 100%;
      display: flex;
      flex-direction: column;
    }
    .modern-packages-card:hover {
      transform: translateY(-8px) scale(1.025);
      box-shadow: 0 16px 40px rgba(0,102,0,0.18), 0 2px 8px rgba(255,0,0,0.10);
      border-color: #ff0000;
      z-index: 2;
    }
    .modern-packages-img {
      width: 100%;
      height: 220px;
      object-fit: cover;
      border-top-left-radius: 1.2rem;
      border-top-right-radius: 1.2rem;
      transition: filter 0.22s;
    }
    .modern-packages-card:hover .modern-packages-img {
      filter: brightness(0.97) saturate(1.12);
    }
    .modern-packages-title {
      font-family: 'Lexend', 'Oswald', Arial, sans-serif;
      font-weight: 700;
      color: #006600;
      font-size: 1.18rem;
      margin-bottom: 0.4rem;
      margin-top: 0.7rem;
    }
    .modern-packages-desc {
      color: #333;
      font-size: 1.01rem;
      min-height: 38px;
      margin-bottom: 0.7rem;
    }
    .modern-packages-price {
      color: #ff0000;
      font-weight: 700;
      font-size: 1.08rem;
      margin-bottom: 0.7rem;
    }
    .modern-packages-btn {
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
      width: 100%;
    }
    .modern-packages-btn:hover {
      background: linear-gradient(90deg,#ff0000,#006600);
      box-shadow: 0 6px 18px #ff000055;
      transform: translateY(-2px) scale(1.04);
    }
    .text-success {
      color: #006600 !important;
    }
    
    @media (max-width: 768px) {
      .packages-hero h1 {
        font-size: 2.5rem;
      }
      
      .packages-hero p {
        font-size: 1.1rem;
      }
      .modern-packages-img {
        height: 140px;
      }
    }
  </style>
<body class="packages-page">
  <!-- Packages Hero Section -->
  <section class="packages-hero">
    <div class="container">
      <div class="packages-hero-content">
        <h1>Packages</h1>
        <p>Discover our catering packages tailored for your needs.</p>
      </div>
    </div>
  </section>
<?php include 'admin/statbar.php'; ?>
<?php include 'navbar.php'; ?>
  <!-- Packages Section -->
  <section class="packages-section">
    <div class="container">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
      <?php
      $packagesFile = __DIR__ . '/frontend/db/packages.json';
      $packages = [];
      if (file_exists($packagesFile)) {
        $json = file_get_contents($packagesFile);
        $packages = json_decode($json, true);
        if (!is_array($packages)) $packages = [];
      }
      if ($packages) {
        foreach ($packages as $pkg) {
          echo '<div class="col d-flex">';
          echo '<div class="modern-packages-card w-100 d-flex flex-column">';
          echo '<img src="' . htmlspecialchars($pkg['img']) . '" alt="' . htmlspecialchars($pkg['title']) . '" class="modern-packages-img">';
          echo '<div class="flex-grow-1 d-flex flex-column justify-content-between p-3">';
          echo '<div>';
          echo '<div class="modern-packages-title">' . htmlspecialchars($pkg['title']) . '</div>';
          echo '<div class="modern-packages-desc">' . nl2br(htmlspecialchars($pkg['desc'])) . '</div>';
          if (!empty($pkg['price'])) {
            echo '<div class="modern-packages-price">$' . htmlspecialchars($pkg['price']) . '</div>';
          }
          echo '</div>';
          echo '<a href="reservation.php" class="btn modern-packages-btn mt-2"><i class="fa fa-utensils me-2"></i>Order Now</a>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
      } else {
        echo '<div class="alert alert-info my-4">' . $tr['no_packages'] . '</div>';
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
