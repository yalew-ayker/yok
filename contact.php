<?php
$lang = isset($_GET['lang']) && $_GET['lang'] === 'am' ? 'am' : 'en';
$tr = [
  'en' => [
    'title' => 'Contact Us',
    'hero_title' => 'Get In Touch',
    'hero_desc' => "Ready to create an unforgettable event? Let's discuss your vision and bring it to life with our exceptional catering services.",
    'find_us' => 'Find Us',
    'open_in_maps' => 'Open in Google Maps',
    'contact_info' => 'Contact Information',
    'address' => 'Address',
    'address_val' => 'Lafto, Addis Ababa, Ethiopia',
    'phone' => 'Phone',
    'email' => 'Email',
    'business_hours' => 'Business Hours',
    'business_hours_val' => 'Mon - Sat: 8:00 AM - 8:00 PM',
    'follow_us' => 'Follow Us',
    'contact_stats_events' => 'Events Catered',
    'contact_stats_services' => 'Services',
    'contact_stats_experience' => 'Years Experience',
    'contact_stats_clients' => 'Happy Clients',
    'contact_section_title' => 'Contact Information',
    'contact_section_address' => 'Address',
    'contact_section_phone' => 'Phone',
    'contact_section_email' => 'Email',
    'contact_section_hours' => 'Business Hours',
  ],
  'am' => [
    'title' => 'አግኙን',
    'hero_title' => 'ያግኙን',
    'hero_desc' => 'የማይረሳ ዝግጅት ለመፍጠር ዝግጅትዎን እና ራዕይዎን እንደጋግማለን።',
    'find_us' => 'አካባቢያችንን ያግኙ',
    'open_in_maps' => 'በGoogle ካርታ ይክፈቱ',
    'contact_info' => 'የእኛን መረጃ',
    'address' => 'አድራሻ',
    'address_val' => 'ላፍቶ፣ አዲስ አበባ፣ ኢትዮጵያ',
    'phone' => 'ስልክ',
    'email' => 'ኢሜይል',
    'business_hours' => 'የስራ ሰዓት',
    'business_hours_val' => 'ሰኞ - ቅዳሜ፡ 2:00 - 2:00 ሰዓት',
    'follow_us' => 'ተከታተሉን',
    'contact_stats_events' => 'የተደረጉ ዝግጅቶች',
    'contact_stats_services' => 'አገልግሎቶች',
    'contact_stats_experience' => 'ዓመታት ልምድ',
    'contact_stats_clients' => 'ደስተኛ ደንበኞች',
    'contact_section_title' => 'የእኛን መረጃ',
    'contact_section_address' => 'አድራሻ',
    'contact_section_phone' => 'ስልክ',
    'contact_section_email' => 'ኢሜይል',
    'contact_section_hours' => 'የስራ ሰዓት',
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
  <title><?= $tr['title'] ?> - YOK Catering</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="frontend/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
    .contact-hero {
      background-image: url('frontend/img/home1.jpg') no-repeat center center/cover opacity(0.3) !important;
      background: linear-gradient(135deg, rgba(0, 102, 0, 0.9) 0%, rgba(255, 0, 0, 0.8) 100%);
      padding: 120px 0 80px;
      width: 100%;
      z-index: 1000;
      position: relative;
      overflow: hidden;
    }
    
    .contact-hero::before {
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
    
    .contact-hero-content {
      position: relative;
      z-index: 2;
      text-align: center;
      color: white;
    }
    
    .contact-hero h1 {
      font-size: 3.5rem;
      font-weight: 700;
      margin-bottom: 1rem;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }
    
    .contact-hero p {
      font-size: 1.25rem;
      opacity: 0.95;
      max-width: 600px;
      margin: 0 auto;
    }
    
    .contact-section {
      padding: 80px 0;
      background: #f8f9fa;
    }
    
    .contact-card {
      background: white;
      border-radius: 20px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.1);
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .contact-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 30px 60px rgba(0,0,0,0.15);
    }
    
    .contact-info-card {
      background: linear-gradient(135deg, #006600 0%, #ff0000 100%);
      color: white;
      padding: 40px;
      height: 100%;
    }
    
    .contact-info-item {
      display: flex;
      align-items: center;
      margin-bottom: 30px;
      padding: 20px;
      background: rgba(255,255,255,0.1);
      border-radius: 15px;
      backdrop-filter: blur(10px);
    }
    
    .contact-info-icon {
      width: 60px;
      height: 60px;
      background: rgba(255,255,255,0.2);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 20px;
      font-size: 24px;
    }
    

    
    .social-links {
      display: flex;
      gap: 15px;
      margin-top: 20px;
    }
    
    .social-link {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      text-decoration: none;
      transition: all 0.3s ease;
      background: #fff;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    
    .social-link svg {
      width: 26px;
      height: 26px;
      object-fit: contain;
      display: block;
    }
    
    .social-link:hover {
      transform: scale(1.13) rotate(-6deg);
      box-shadow: 0 4px 16px rgba(0,0,0,0.2);
      color: white;
      background: #e6ffe6;
    }
    
    .map-section {
      padding: 80px 0;
      background: white;
    }
    
    .map-container {
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }
    
    .btn-outline-primary {
      border: 2px solid #006600;
      color: #006600;
      border-radius: 15px;
      padding: 12px 30px;
      font-weight: 600;
      transition: all 0.3s ease;
    }
    
    .btn-outline-primary:hover {
      background: #006600;
      border-color: #006600;
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(0, 102, 0, 0.3);
    }
    

    
    .contact-stats {
      background: linear-gradient(135deg, #006600 0%, #ff0000 100%);
      padding: 60px 0;
      color: white;
    }
    
    .stat-item {
      text-align: center;
      padding: 20px;
    }
    
    .stat-number {
      font-size: 3rem;
      font-weight: 700;
      margin-bottom: 10px;
    }
    
    .stat-label {
      font-size: 1.1rem;
      opacity: 0.9;
    }
    
    @media (max-width: 768px) {
      .contact-hero h1 {
        font-size: 2.5rem;
      }
      
      .contact-hero p {
        font-size: 1.1rem;
      }
      
      .contact-info-card {
        padding: 30px 20px;
      }
    }
  </style>
</head>
<body>
  <?php include 'navbar.php'; ?>
  
  <!-- Hero Section -->
  <section class="contact-hero">
    <div class="container">
      <div class="contact-hero-content">
        <h1><?= $tr['hero_title'] ?></h1>
        <p><?= $tr['hero_desc'] ?></p>
      </div>
    </div>
  </section>
  
  
  <!-- Map Section -->
  <section class="map-section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h3 class="text-center mb-5"><?= $tr['find_us'] ?></h3>
          <div class="map-container">
            <iframe 
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.1234567890123!2d38.74489167798773!3d8.953092883124711!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOMKwNTcnMTEuMSJOIDM4wrA0NCc0MS42IkU!5e0!3m2!1sen!2set!4v1234567890123"
              width="100%" 
              height="450" 
              style="border:0;" 
              allowfullscreen="" 
              loading="lazy" 
              referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>
          <div class="text-center mt-4">
            <a href="https://maps.google.com/?q=8.953092883124711,38.74489167798773" target="_blank" class="btn btn-outline-primary btn-lg">
              <i class="fas fa-map-marker-alt me-2"></i>
              <?= $tr['open_in_maps'] ?>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  
<?php
// Dynamic stats for Events Catered, Services, and Experience
$ordersFile = __DIR__ . '/frontend/db/orders.txt';
$orders = file_exists($ordersFile) ? file($ordersFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
$orderCount = count($orders);
$servicesFile = __DIR__ . '/frontend/db/services.json';
$services = file_exists($servicesFile) ? json_decode(file_get_contents($servicesFile), true) : [];
$serviceCount = is_array($services) ? count($services) : 0;
$baseEvents = 600;
$totalEvents = $baseEvents + $orderCount;
$experienceYears = date('Y') - 2014;
?>

<style>
@media (max-width: 991.98px) {
  .contact-stats .row > [class^='col-'] { flex: 0 0 50%; max-width: 50%; }
}
@media (max-width: 575.98px) {
  .contact-stats .row > [class^='col-'] { flex: 0 0 100%; max-width: 100%; }
}
.stat-number.static { font-size: 2.2rem; font-weight: 700; color:rgb(255, 255, 255); letter-spacing: 1px; }
.stat-item { display: flex; flex-direction: column; align-items: center; justify-content: center; }
.stat-number-icon-wrap { display: flex; align-items: center; justify-content: center; gap: 0.5em; }
.stat-number { display: inline-block; vertical-align: middle; font-size: 2.2rem; font-weight: 700; margin-bottom: 0.2em; color: #fff; }
.stat-icon { display: inline-block; vertical-align: middle; font-size: 2.1rem; color: #fff !important; filter: drop-shadow(0 2px 6px rgba(0,0,0,0.13)); margin-left: 0.4em; }
</style>
<script>
// Animated counting for stats (skip static 24/7)
function animateCount(el, target, duration = 1200) {
  let start = 0;
  let startTime = null;
  function animateStep(timestamp) {
    if (!startTime) startTime = timestamp;
    const progress = Math.min((timestamp - startTime) / duration, 1);
    el.textContent = Math.floor(progress * (target - start) + start);
    if (progress < 1) {
      requestAnimationFrame(animateStep);
    } else {
      el.textContent = target;
    }
  }
  requestAnimationFrame(animateStep);
}
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.stat-number:not(.static)').forEach(function(el) {
    const target = parseInt(el.getAttribute('data-count'), 10);
    animateCount(el, target);
  });
});
</script>
  
  <!-- Contact Section -->
  <section class="contact-section">
    <div class="container">
      <div class="row">
        <!-- Contact Information -->
        <div class="col-lg-8 mx-auto">
          <div class="contact-card contact-info-card">
            <h3 class="mb-4"><?= $tr['contact_info'] ?></h3>
            
            <div class="contact-info-item">
              <div class="contact-info-icon">
                <i class="fas fa-map-marker-alt"></i>
              </div>
              <div>
                <h6 class="mb-1"><?= $tr['address'] ?></h6>
                <p class="mb-0"><?= $tr['address_val'] ?></p>
              </div>
            </div>
            
            <div class="contact-info-item">
              <div class="contact-info-icon">
                <i class="fas fa-phone"></i>
              </div>
              <div>
                <h6 class="mb-1"><?= $tr['phone'] ?></h6>
                <p class="mb-0">
                  <a href="tel:+251910449546" href="tel:+251925252579" class="text-white">+251-910-449546 </br>+251-925-252579</a>
                </p>
              </div>
            </div>
            
            <div class="contact-info-item">
              <div class="contact-info-icon">
                <i class="fas fa-envelope"></i>
              </div>
              <div>
                <h6 class="mb-1"><?= $tr['email'] ?></h6>
                <p class="mb-0">
                  <a href="mailto:yonasb509@gmail.com" class="text-white">yonasb509@gmail.com</a>
                </p>
              </div>
            </div>
            
            <div class="contact-info-item">
              <div class="contact-info-icon">
                <i class="fas fa-clock"></i>
              </div>
              <div>
                <h6 class="mb-1"><?= $tr['business_hours'] ?></h6>
                <p class="mb-0"><?= $tr['business_hours_val'] ?></p>
              </div>
            </div>
            
            <h6 class="mb-3 mt-4"><?= $tr['follow_us'] ?></h6>
            <div class="social-links">
              <a href="https://tiktok.com/@yokcateringservice" target="_blank" class="social-link tiktok" title="TikTok">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path d="M12.5 2h3.1c.2 2.1 1.7 3.7 3.8 3.9v3.1c-.9 0-1.7-.1-2.5-.3v7.7c0 3.7-2.5 5.5-5.1 5.5-2.5 0-5-1.7-5-5.1 0-3.3 2.5-5 5-5 .2 0 .4 0 .6.1v3.2c-.2-.1-.4-.1-.6-.1-1.1 0-2.1.7-2.1 2 0 1.2 1 2 2.1 2 1.1 0 2.1-.8 2.1-2.1V2z" fill="#25F4EE"/><path d="M12.5 2h3.1c.2 2.1 1.7 3.7 3.8 3.9v3.1c-.9 0-1.7-.1-2.5-.3v7.7c0 3.7-2.5 5.5-5.1 5.5-2.5 0-5-1.7-5-5.1 0-3.3 2.5-5 5-5 .2 0 .4 0 .6.1v3.2c-.2-.1-.4-.1-.6-.1-1.1 0-2.1.7-2.1 2 0 1.2 1 2 2.1 2 1.1 0 2.1-.8 2.1-2.1V2z" fill="#FE2C55" fill-opacity=".7"/></g></svg>
              </a>
              <a href="https://t.me/yokCatering" target="_blank" class="social-link telegram" title="Telegram">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22 4.01L2.01 10.73c-.55.18-.54.52-.1.65l5.13 1.6 2.02 6.13c.24.67.38.93.77.93.31 0 .44-.14.6-.31l2.88-2.8 5.98 4.41c1.1.61 1.89.29 2.16-1.02l3.13-14.01c.23-1.01-.36-1.41-1.13-1.13z" fill="#229ED9"/></svg>
              </a>
              <a href="https://www.facebook.com/yonas.bekele.1650?mibextid=ZbWKwL" target="_blank" class="social-link facebook" title="Facebook">
                <svg viewBox="0 0 24 24" fill="#1877F3" xmlns="http://www.w3.org/2000/svg"><path d="M22.675 0h-21.35C.595 0 0 .592 0 1.326v21.348C0 23.408.595 24 1.325 24h11.495v-9.294H9.692v-3.622h3.128V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.797.143v3.24l-1.918.001c-1.504 0-1.797.715-1.797 1.763v2.313h3.587l-.467 3.622h-3.12V24h6.116C23.406 24 24 23.408 24 22.674V1.326C24 .592 23.406 0 22.675 0"/></svg>
              </a>
              <a href="mailto:yokcatering@gmail.com" target="_blank" class="social-link gmail" title="Gmail">
                <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><g><circle cx="24" cy="24" r="24" fill="#fff"/><path d="M43.6 20.5H42V20.4H24v7.2h11.2c-1.5 4-5.2 6.8-9.2 6.8-5.5 0-10-4.5-10-10s4.5-10 10-10c2.4 0 4.6.9 6.3 2.4l5.4-5.4C34.5 8.5 29.5 6 24 6 13.5 6 5 14.5 5 25s8.5 19 19 19 19-8.5 19-19c0-1.3-.1-2.1-.4-3.5z" fill="#4285F4"/><path d="M6.3 14.7l5.9 4.3C14.5 16.1 18.9 13 24 13c2.4 0 4.6.9 6.3 2.4l5.4-5.4C34.5 8.5 29.5 6 24 6c-7.1 0-13.2 4.1-16.3 8.7z" fill="#34A853"/><path d="M24 44c5.3 0 10.2-1.8 13.9-4.9l-6.4-5.2c-2 1.4-4.6 2.3-7.5 2.3-4-0.1-7.7-2.8-9.2-6.8l-6.3 4.9C10.7 40.2 16.9 44 24 44z" fill="#FBBC05"/><path d="M43.6 20.5H42V20.4H24v7.2h11.2c-0.6 1.7-1.7 3.2-3.1 4.3l6.4 5.2C41.7 39.2 44 32.2 44 25c0-1.3-.1-2.1-.4-3.5z" fill="#EA4335"/></g></svg>
              </a>
              <a href="https://wa.me/251925252579" target="_blank" class="social-link whatsapp" title="WhatsApp">
                <svg viewBox="0 0 24 24" fill="#25D366" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="12" fill="#25D366"/><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.472-.148-.67.15-.198.297-.767.967-.94 1.166-.173.198-.347.223-.644.075-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.372-.025-.52-.075-.149-.67-1.614-.917-2.212-.242-.58-.487-.5-.67-.51-.173-.008-.372-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.214 3.074.149.198 2.1 3.21 5.08 4.37.71.306 1.263.489 1.695.626.712.227 1.36.195 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.288.173-1.413-.074-.124-.272-.198-.57-.347z" fill="#fff"/></svg>
              </a>
              <a href="https://imo.im/1MBm?pid=QR_code&af_dp=imo%3A%2F%2Fprofile.user%2FAAAAAAAAAAAAAAAAAAAAAF7-ljBSFxt4HgC8HJsLJg3gvZCyYBoKLkQYiq67CRMw%2Fscene_qr_code%2Fqr_code" target="_blank" class="social-link imo" title="IMO">
                <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="24" cy="24" r="24" fill="#0099FF"/><rect x="12" y="12" width="24" height="24" rx="12" fill="#fff"/><path d="M24 16c-4.418 0-8 2.91-8 6.5 0 2.13 1.44 4.01 3.67 5.18-.13.47-.47 1.7-.54 1.97-.08.3.11.3.23.27.1-.03 1.6-1.06 2.25-1.5.45.07.92.11 1.39.11 4.418 0 8-2.91 8-6.5S28.418 16 24 16zm-2.5 6.5c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm5 0c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1z" fill="#0099FF"/></svg>
              </a>
              <a href="viber://chat?number=%2B251925252579" target="_blank" class="social-link viber" title="Viber">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="24" height="24" rx="6" fill="#665CAC"/><path d="M17.472 15.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.472-.148-.67.15-.198.297-.767.967-.94 1.166-.173.198-.347.223-.644.075-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.372-.025-.52-.075-.149-.67-1.614-.917-2.212-.242-.58-.487-.5-.67-.51-.173-.008-.372-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.214 3.074.149.198 2.1 3.21 5.08 4.37.71.306 1.263.489 1.695.626.712.227 1.36.195 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.288.173-1.413-.074-.124-.272-.198-.57-.347z" fill="#fff"/></svg>
              </a>
            </div>
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
