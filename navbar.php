<?php
$lang = isset($_GET['lang']) && $_GET['lang'] === 'am' ? 'am' : 'en';
$tr = [
  'en' => [
    'home' => 'Home',
    'blog' => 'Blog',
    'services' => 'Services',
    'packages' => 'Packages',
    'gallery' => 'Gallery',
    'our_team' => 'Our Team',
    'about_us' => 'About Us',
    'contact' => 'Contact',
    'login' => 'Login',
    'reservation' => 'Reservation',
    'brand' => 'YOK CATERING SERVICE',
  ],
  'am' => [
    'home' => 'መነሻ',
    'blog' => 'ብሎግ',
    'services' => 'አገልግሎቶች',
    'packages' => 'ፓኬጆች',
    'gallery' => 'ጋለሪ',
    'our_team' => 'ቡድናችን',
    'about_us' => 'ስለ እኛ',
    'contact' => 'አግኙን',
    'login' => 'ግባ',
    'reservation' => 'ቦታ ያስይዙ',
    'brand' => 'ዮክ የምግብ ዝግጅት',
  ]
];
$tr = $tr[$lang];
function navUrl($file) {
  global $lang;
  return $file . '?lang=' . $lang;
}
?>
<style>
</style>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;700&display=swap" rel="stylesheet">
<style>
  body {
    z-index: 1000;
  }
  a {
    text-decoration: none;
  }
  .navbar {
    padding: 0.2rem 0;
  }
  .yok-logo {
    width: 36px;
    height: 36px;
    object-fit: cover;
    margin-right: 8px;
    vertical-align: middle;
    border-radius: 50%;
  }
  .navbar-nav {
    display: flex;
    gap: 1.2rem;
    margin-left: 1.5rem;
    list-style: none;
  }
  .container-fluid {
    display: flex;
    align-items: center;
  }
  #navbarNav {
    flex: 1;
    justify-content: center;
  }
  .navbar-btns {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-left: auto;
    gap: 0.7rem;
  }
  .navbar-brand {
    font-family: 'Lexend', Arial, Helvetica, sans-serif;
    font-size: 1.32rem;
    font-weight: 700;
    color: #fff !important;
    letter-spacing: 0px;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: color 0.2s;
  }
  .navbar-brand:hover {
    color: #ff0000ff!important;
  }
  .yok-logo {
    width: 50px;
    height: 50px;
    object-fit: cover;
    margin-right: 10px;
    vertical-align: middle;
    border-radius: 50%;
    box-shadow: 0 2px 8px #00c37a55;
    border: 2px solid #fff;
    background: #fff;
    transition: box-shadow 0.2s, border 0.2s;
  }
  .navbar-nav .nav-link {
    color: #fff !important;
    font-family: 'Lexend', Arial, Helvetica, sans-serif;
    font-weight: 500;
    font-size: 0.9rem;
    letter-spacing: 0.2px;
    padding: 0.2rem 0.2rem 0.1rem 0.2rem;
    border-radius: 0px;
    background: none !important;
    transition: background 0.2s, color 0.2s, border 0.2s;
    position: relative;
    margin: 0 2px;
  }
  .navbar-nav .nav-link:hover,
  .navbar-nav .nav-link:focus,
  .navbar-nav .nav-link.active {
    color: #ff0000 !important;
    background: #fff;
    border-bottom: none;
    box-shadow: 0 2px 8px #00c37a33;
  }
  .navbar-gap {
    gap: 1.2rem;
  }
  .navbar-btns-gap {
    gap: 0.7rem;
  }
  .nav-btn-login {
    border-radius: 20px;
    font-family: 'Lexend', Arial, Helvetica, sans-serif;
    font-weight: 200;
    background: transparent;
    color: #fff !important;
    border: 1px solid #fff;
    padding: 0.5rem 0.7rem;
    font-size: 0.7rem;
    letter-spacing: 1px;
    transition: background 0.2s, color 0.2s, box-shadow 0.2s, border 0.2s, transform 0.3s;
  }
  .nav-btn-login:hover {
    color: #ff0000 !important;
    font-weight: 700;
    background-color: #fff;
  }
  .nav-btn-reservation {
    border-radius: 0;
    font-family: 'Lexend', Arial, Helvetica, sans-serif;
    font-weight: 700;
    background: #ff0000;
    color: #fff !important;
    border: none;
    padding: 0.7rem 2rem;
    font-size: 1rem;
    transition: background 0.2s, color 0.2s, box-shadow 0.2s, border 0.2s, transform 0.3s;
  }
  .nav-btn-reservation:hover {
    background: transparent;
    color: #fff !important;
    border: 2px solid #fff;
    padding: 0.7rem 2rem;
  }
  .navbar-toggler {
    border: none;
    background: transparent !important;
    color: #fff !important;
    font-size: 1.3rem;
    outline: none;
    box-shadow: none !important;
    transition: color 0.2s;
  }
  .navbar-toggler:focus {
    outline: none;
    color: #00c37a !important;
    box-shadow: 0 0 0 2px #00c37a !important;
  }
  .navbar .navbar-collapse {
    background: transparent;
  }
  @media (max-width: 991.98px) {
    .navbar-nav .nav-link {
      padding: 0.5rem 0.7rem 0.3rem 0.7rem;
      font-size: 1rem;
    }
    .navbar-brand {
      font-size: 1.1rem;
    }
    .yok-logo {
      width: 32px;
      height: 32px;
    }
    .nav-btn-login, .nav-btn-reservation {
      font-size: 0.95rem;
      padding: 0.32rem 0.7rem;
    }
  }
</style>
</style>
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= navUrl('index.php') ?>">
      <img src="frontend/img/logo.png" alt="YOK Catering Logo" class="yok-logo">
      <?= $tr['brand'] ?>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav" style="display: flex; align-items: center; gap: 1.2rem;">
        <li class="nav-item"><a class="nav-link" href="<?= navUrl('index.php') ?>"><?= $tr['home'] ?></a></li>
        <li class="nav-item"><a class="nav-link" href="<?= navUrl('blog.php') ?>"><?= $tr['blog'] ?></a></li>
        <li class="nav-item"><a class="nav-link" href="<?= navUrl('services.php') ?>"><?= $tr['services'] ?></a></li>
        <li class="nav-item"><a class="nav-link" href="<?= navUrl('packages.php') ?>"><?= $tr['packages'] ?></a></li>
        <li class="nav-item"><a class="nav-link" href="<?= navUrl('gallery.php') ?>"><?= $tr['gallery'] ?></a></li>
        <li class="nav-item"><a class="nav-link" href="<?= navUrl('ourteam.php') ?>"><?= $tr['our_team'] ?></a></li>
        <li class="nav-item"><a class="nav-link" href="<?= navUrl('about.php') ?>"><?= $tr['about_us'] ?></a></li>
        <li class="nav-item"><a class="nav-link" href="<?= navUrl('contact.php') ?>"><?= $tr['contact'] ?></a></li>
        <li class="nav-item navbar-btns">
          <div class="loglang">
          <button id="lang-switch-btn" class="btn btn-outline-light" style="font-weight: 700; margin-bottom: 0.5rem;">አማ/EN</button>
          <a href="<?= navUrl('login.php') ?>" class="btn btn-outline-light nav-btn-login" style="margin-bottom: 0.5rem;"><?= $tr['login'] ?></a>
          </div>
          <a href="<?= navUrl('reservation.php') ?>" class="btn nav-btn-reservation"><?= $tr['reservation'] ?></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<script>
  // Language switcher logic
  document.addEventListener('DOMContentLoaded', function() {
    var btn = document.getElementById('lang-switch-btn');
    if (!btn) return;
    btn.addEventListener('click', function() {
      var url = new URL(window.location.href);
      var currentLang = url.searchParams.get('lang') || 'en';
      var newLang = currentLang === 'en' ? 'am' : 'en';
      url.searchParams.set('lang', newLang);
      window.location.href = url.toString();
    });
  });
</script>