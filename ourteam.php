<?php
// ourteam.php - YOK Catering Team Page
$teamFile = __DIR__ . '/frontend/db/team.json';
$cacheFile = __DIR__ . '/frontend/db/team.cache.php';
$cacheTime = 60 * 10; // 10 minutes

if (file_exists($cacheFile) && filemtime($cacheFile) > filemtime($teamFile) && (time() - filemtime($cacheFile) < $cacheTime)) {
    // Use cached data
    $team = include $cacheFile;
} else if (file_exists($teamFile)) {
    $teamData = file_get_contents($teamFile);
    $team = json_decode($teamData, true);
    // Save to cache
    file_put_contents($cacheFile, '<?php return ' . var_export($team, true) . ';');
} else {
    $team = [];
}
$lang = isset($_GET['lang']) && $_GET['lang'] === 'am' ? 'am' : 'en';
$tr = [
  'en' => [
    'title' => 'Our Team',
    'hero_title' => 'Meet Our Team',
    'hero_desc' => 'Dedicated professionals making your events unforgettable with passion, creativity, and excellence.',
    'values' => 'Our Values',
    'values_desc' => 'The principles that guide everything we do',
    'passion' => 'Passion',
    'passion_desc' => 'We pour our hearts into every dish and event, ensuring excellence in everything we create.',
    'excellence' => 'Excellence',
    'excellence_desc' => 'We strive for perfection in every detail, from food quality to service delivery.',
    'teamwork' => 'Teamwork',
    'teamwork_desc' => 'Our collaborative approach ensures seamless coordination and outstanding results.'
  ],
  'am' => [
    'title' => 'ቡድናችን',
    'hero_title' => 'ቡድናችንን ያግኙ',
    'hero_desc' => 'በፍቅር፣ በፈጠራና በብልጥነት የሚያስታውሱ ሙያዊ ሰራተኞች።',
    'values' => 'ዋና እሴቶቻችን',
    'values_desc' => 'ሁሉንም የምናደርገውን መመሪያ መሆናቸውን የምናምነው መሠረቶች',
    'passion' => 'ፍቅር',
    'passion_desc' => 'ሁሉንም ምግብና ዝግጅት በፍቅር እና በትክክል እንደምናደርግ እናምናለን።',
    'excellence' => 'ብልጥነት',
    'excellence_desc' => 'በሁሉም ዝርዝር ውስጥ ብልጥነትን ለማሳደግ እንጥራለን።',
    'teamwork' => 'ቡድን ስራ',
    'teamwork_desc' => 'በቡድን ስራ በተስተናጋጅነት የተሟላ ውጤት እንዲደርስ እናምናለን።'
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
    .team-hero {
      background: linear-gradient(135deg, rgba(0, 102, 0, 0.9) 0%, rgba(255, 0, 0, 0.8) 100%);
      padding: 120px 0 80px;
      position: relative;
      overflow: hidden;
    }
    
    .team-hero::before {
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
    
    .team-hero-content {
      position: relative;
      z-index: 2;
      text-align: center;
      color: white;
    }
    
    .team-hero h1 {
      font-size: 3.5rem;
      font-weight: 700;
      margin-bottom: 1rem;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }
    
    .team-hero p {
      font-size: 1.25rem;
      opacity: 0.95;
      max-width: 600px;
      margin: 0 auto;
    }
    
    .team-section {
      padding: 80px 0;
      background: white;
    }
    
    .team-card {
      background: white;
      border-radius: 20px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.1);
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      height: 100%;
      border: 2px solid #006600;
      display: flex;
      flex-direction: column;
    }
    
    .team-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 30px 60px rgba(0,0,0,0.15);
      border-color: #ff0000;
    }
    
    .team-card-image {
      position: relative;
      overflow: hidden;
      flex: 1 1 auto;
      height: 100%;
      display: flex;
    /* ...existing code... */
      height: 100%;
      object-fit: cover;
      border-radius: 0 !important;
      display: block;
      transition: transform 0.3s ease;
      flex: 1 1 auto;
      min-height: 0;
    }
    
    .team-card:hover .team-img {
      transform: scale(1.1);
    }
    
    .team-social {
      position: static;
      background: rgba(0, 102, 0, 0.9);
      padding: 15px;
      display: flex;
      justify-content: center;
      gap: 15px;
      transition: none;
    }
    
    .team-social-link {
      color: white;
      font-size: 18px;
      transition: transform 0.3s ease;
    }
    
    .team-social-link:hover {
      transform: scale(1.2);
      color: white;
    }
    
    .team-card-content {
      padding: 30px;
      background: white;
    }
    
    .team-name {
      font-size: 1.5rem;
      font-weight: 700;
      color: #006600;
      margin-bottom: 8px;
    }
    
    .team-role {
      color: #ff0000;
      font-weight: 600;
      font-size: 1.1rem;
      margin-bottom: 15px;
    }
    
    .team-bio {
      color: #333;
      line-height: 1.6;
      margin: 0;
    }
    
    .team-values {
      padding: 80px 0;
      background: #f8f9fa;
    }
    
    .team-values h2 {
      color: #006600;
      font-weight: 700;
      margin-bottom: 1rem;
    }
    
    .team-values .lead {
      color: #333;
      font-size: 1.2rem;
    }
    
    .value-card {
      text-align: center;
      padding: 40px 20px;
      border-radius: 15px;
      background: white;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      height: 100%;
      border: 2px solid #006600;
    }
    
    .value-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 30px rgba(0,0,0,0.1);
      border-color: #ff0000;
    }
    
    .value-icon {
      width: 80px;
      height: 80px;
      background: linear-gradient(135deg, #006600, #ff0000);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 20px;
      font-size: 32px;
      color: white;
    }
    
    .value-card h4 {
      color: #006600;
      font-weight: 700;
      margin-bottom: 15px;
    }
    
    .value-card p {
      color: #333;
      line-height: 1.6;
      margin: 0;
    }
    
    @media (max-width: 768px) {
      .team-hero h1 {
        font-size: 2.5rem;
      }
      
      .team-hero p {
        font-size: 1.1rem;
      }
      
      .team-card-content {
        padding: 20px;
      }
      
      .team-name {
        font-size: 1.3rem;
      }
    }
  </style>
<body class="ourteam-page">
<?php include 'navbar.php'; ?>
  <!-- Team Hero Section -->
  <section class="team-hero">
    <div class="container">
      <div class="team-hero-content">
        <h1><?= $tr['hero_title'] ?></h1>
        <p><?= $tr['hero_desc'] ?></p>
      </div>
    </div>
  </section>
<?php include 'admin/statbar.php'; ?>

  <!-- Team Section -->
  <section class="team-section">
    <div class="container">
      <div class="row justify-content-center">
        <?php foreach ($team as $member): ?>
          <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="team-card">
              <div class="team-card-image">
                <img src="<?= htmlspecialchars($member['img']) ?>" alt="<?= htmlspecialchars($member['role']) ?>" class="team-img img-fluid">

              </div>
              <div class="team-card-content">
                <h4 class="team-name"><?= htmlspecialchars($member['name']) ?></h4>
                <p class="team-role"><?= htmlspecialchars($member['role']) ?></p>
                <p class="team-bio"><?= htmlspecialchars($member['bio']) ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Team Values Section -->
  <section class="team-values">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center mb-5">
          <h2><?= $tr['values'] ?></h2>
          <p class="lead"><?= $tr['values_desc'] ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="value-card">
            <div class="value-icon">
              <i class="fas fa-heart"></i>
            </div>
            <h4><?= $tr['passion'] ?></h4>
            <p><?= $tr['passion_desc'] ?></p>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="value-card">
            <div class="value-icon">
              <i class="fas fa-star"></i>
            </div>
            <h4><?= $tr['excellence'] ?></h4>
            <p><?= $tr['excellence_desc'] ?></p>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="value-card">
            <div class="value-icon">
              <i class="fas fa-users"></i>
            </div>
            <h4><?= $tr['teamwork'] ?></h4>
            <p><?= $tr['teamwork_desc'] ?></p>
          </div>
        </div>
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
