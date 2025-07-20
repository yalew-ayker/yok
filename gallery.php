<?php
$lang = isset($_GET['lang']) && $_GET['lang'] === 'am' ? 'am' : 'en';
$t = [
    'en' => [
        'title' => 'Gallery',
        'desc' => 'View photos from our past events and catering services.',
        'images' => 'Images',
        'videos' => 'Videos',
        'no_images' => 'No images in gallery yet.',
        'no_videos' => 'No videos in gallery yet.'
    ],
    'am' => [
        'title' => 'ጋለሪ',
        'desc' => 'ከዚህ በፊት የተደረጉትን ዝግጅቶቻችንን እና የምግብ አገልግሎታችንን በምስል ይመልከቱ።',
        'images' => 'ምስሎች',
        'videos' => 'ቪዲዮዎች',
        'no_images' => 'ምንም ምስል አልተጨመረም።',
        'no_videos' => 'ምንም ቪዲዮ አልተጨመረም።'
    ],
];
$tr = $t[$lang];
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
    .navbar {
      width: 100%;
      overflow-y: scroll !important;
      scrollbar-width: none !important;
      -ms-overflow-style: none !important;
    }
    .custom-footer {
      background: linear-gradient(135deg, #2c5530 0%, #1e3a22 100%);
      color: white;
      padding: 60px 0 30px;
      overflow: scroll;
      position: absolute;
      width: 100%;
    }
    .gallery-hero {
      background: linear-gradient(135deg, rgba(0, 102, 0, 0.9) 0%, rgba(255, 0, 0, 0.8) 100%);
      padding: 120px 0 80px;
      position: relative;
      overflow: hidden;
    }
    
    .gallery-hero::before {
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
    
    .gallery-hero-content {
      position: relative;
      z-index: 2;
      text-align: center;
      color: white;
    }
    
    .gallery-hero h1 {
      font-size: 3.5rem;
      font-weight: 700;
      margin-bottom: 1rem;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }
    
    .gallery-hero p {
      font-size: 1.25rem;
      opacity: 0.95;
      max-width: 600px;
      margin: 0 auto;
    }
    
    .gallery-section {
      padding: 80px 0;
      background: white;
    }
    
    .gallery-card {
      background: white;
      border-radius: 20px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.1);
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      margin-bottom: 30px;
      border: 2px solid #006600;
    }
    
    .gallery-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 30px 60px rgba(0,0,0,0.15);
      border-color: #ff0000;
    }
    
    .gallery-img, .gallery-video {
      width: 100%;
      height: 250px;
      object-fit: cover;
      transition: transform 0.3s ease;
    }
    
    .gallery-card:hover .gallery-img,
    .gallery-card:hover .gallery-video {
      transform: scale(1.05);
    }
    
    .nav-tabs .nav-link {
      color: #006600;
      border: 2px solid transparent;
      border-radius: 15px;
      margin: 0 5px;
      transition: all 0.3s ease;
    }
    
    .nav-tabs .nav-link.active {
      background: #006600;
      border-color: #006600;
      color: white;
    }
    
    .nav-tabs .nav-link:hover {
      border-color: #ff0000;
      color: #ff0000;
    }
    
    .nav-tabs .nav-link.active:hover {
      background: #ff0000;
      border-color: #ff0000;
      color: white;
    }
    
    @media (max-width: 768px) {
      .gallery-hero h1 {
        font-size: 2.5rem;
      }
      
      .gallery-hero p {
        font-size: 1.1rem;
      }
    }
  </style>
<body class="gallery-page">
  <!-- Gallery Hero Section -->
  <section class="gallery-hero">
    <div class="container">
      <div class="gallery-hero-content">
        <h1>Gallery</h1>
        <p>View photos from our past events and catering services.</p>
      </div>
    </div>
  </section>
<?php include 'admin/statbar.php'; ?>
<?php include 'navbar.php'; ?>
  <!-- Gallery Section -->
  <section class="gallery-section">
    <div class="container">
      <!-- Gallery Media (Images & Videos) from Uploads -->
      <?php
        $galleryDir = __DIR__ . '/frontend/img/gallery/';
        $metaFile = __DIR__ . '/admin/gallery_meta.json';
        $meta = file_exists($metaFile) ? json_decode(file_get_contents($metaFile), true) : ["order"=>[],"captions"=>[]];
        $media = glob($galleryDir . '*.{jpg,jpeg,png,gif,webp,mp4,webm,ogg}', GLOB_BRACE);
        $mediaNames = array_map('basename', $media);
        $ordered = array_values(array_unique(array_merge($meta['order'], $mediaNames)));
        $images = [];
        $videos = [];
        foreach ($ordered as $itemName) {
          if (!in_array($itemName, $mediaNames)) continue;
          $ext = strtolower(pathinfo($itemName, PATHINFO_EXTENSION));
          if (in_array($ext, ["mp4","webm","ogg"])) {
            $videos[] = $itemName;
          } else {
            $images[] = $itemName;
          }
        }
      ?>
      <ul class="nav nav-tabs justify-content-center mb-4" id="galleryTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="images-tab" data-bs-toggle="tab" data-bs-target="#images" type="button" role="tab" aria-controls="images" aria-selected="true"><?= $tr['images'] ?></button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="videos-tab" data-bs-toggle="tab" data-bs-target="#videos" type="button" role="tab" aria-controls="videos" aria-selected="false"><?= $tr['videos'] ?></button>
        </li>
      </ul>
      <div class="tab-content" id="galleryTabContent">
        <div class="tab-pane fade show active" id="images" role="tabpanel" aria-labelledby="images-tab">
          <div class="row justify-content-center">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 w-100 mx-0">
            <?php
              if ($images) {
                foreach ($images as $itemName) {
                  echo '<div class="col d-flex">';
                  echo '<div class="gallery-card w-100">';
                  echo '<img src="frontend/img/gallery/' . htmlspecialchars($itemName) . '" alt="Gallery Image" class="gallery-img">';
                  // Show caption if exists
                  if (!empty($meta['captions'][$itemName])) {
                    echo '<div class="p-2 text-center" style="font-size:1rem;color:#006600;font-weight:500;">' . htmlspecialchars($meta['captions'][$itemName]) . '</div>';
                  }
                  echo '</div>';
                  echo '</div>';
                }
              } else {
                echo '<div class="col-12"><div class="alert alert-info">' . $tr['no_images'] . '</div></div>';
              }
            ?>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">
          <div class="row justify-content-center">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 w-100 mx-0">
            <?php
              if ($videos) {
                foreach ($videos as $itemName) {
                  $ext = strtolower(pathinfo($itemName, PATHINFO_EXTENSION));
                  echo '<div class="col d-flex">';
                  echo '<div class="gallery-card w-100">';
                  echo '<video controls class="gallery-video"><source src="frontend/img/gallery/' . htmlspecialchars($itemName) . '" type="video/' . $ext . '"></video>';
                  // Show caption if exists
                  if (!empty($meta['captions'][$itemName])) {
                    echo '<div class="p-2 text-center" style="font-size:1rem;color:#006600;font-weight:500;">' . htmlspecialchars($meta['captions'][$itemName]) . '</div>';
                  }
                  echo '</div>';
                  echo '</div>';
                }
              } else {
                echo '<div class="col-12"><div class="alert alert-info">' . $tr['no_videos'] . '</div></div>';
              }
            ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <footer>
    <?php include 'footer.php'; ?>
  </footer>
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
