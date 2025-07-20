<?php
$lang = isset($_GET['lang']) && $_GET['lang'] === 'am' ? 'am' : 'en';
$tr = [
  'en' => [
    'services' => 'Services',
    'company' => 'Company',
    'contact_info' => 'Contact Info',
    'home' => 'Home',
    'blog' => 'Blog',
    'services_nav' => 'Services',
    'packages' => 'Packages',
    'gallery' => 'Gallery',
    'our_team' => 'Our Team',
    'about_us' => 'About Us',
    'contact' => 'Contact',
    'login' => 'Login',
    'reservation' => 'Reservation',
    'follow_us' => 'Follow Us',
    'footer_brand' => 'YOK Catering',
    'footer_slogan' => 'Creating culinary excellence, one event at a time',
    'address' => 'Lafto, Addis Ababa, Ethiopia',
    'phone' => '+251 925 25 25 79 <br>    +251 910 44 95 46',
    'email' => 'yonasb509@gmail.com',
    'hours' => 'Mon-Sun: 8:00 AM - 10:00 PM',
    'rights' => 'All rights reserved. | Designed with ❤️ for exceptional experiences',
  ],
  'am' => [
    'services' => 'አገልግሎቶች',
    'company' => 'ኩባንያ',
    'contact_info' => 'የእኛን መረጃ',
    'home' => 'መነሻ',
    'blog' => 'ብሎግ',
    'services_nav' => 'አገልግሎቶች',
    'packages' => 'ፓኬጆች',
    'gallery' => 'ጋለሪ',
    'our_team' => 'ቡድናችን',
    'about_us' => 'ስለ እኛ',
    'contact' => 'አግኙን',
    'login' => 'ግባ',
    'reservation' => 'ቦታ ያስይዙ',
    'follow_us' => 'ተከታተሉን',
    'footer_brand' => 'ዮክ የምግብ ዝግጅት',
    'footer_slogan' => 'አንድ ዝግጅት በአንድ ጊዜ የምግብ ብልጥነትን እናቀርባለን',
    'address' => 'ላፍቶ፣ አዲስ አበባ፣ ኢትዮጵያ',
    'phone' => '+251 925 25 25 79 <br>    +251 910 44 95 46',
    'email' => 'yonasb509@gmail.com',
    'hours' => 'ሰኞ-እሁድ፡ 2:00 - 4:00 ሰዓት',
    'rights' => 'ሁሉም መብቶች የተጠበቁ ናቸው። | ለልዩ ተሞክሮ በፍቅር ተዘጋጀ',
  ]
];
$tr = $tr[$lang];
function navUrl($file) {
  global $lang;
  return $file . '?lang=' . $lang;
}
?>
<style>
.custom-footer {
  background: linear-gradient(135deg, #006600 0%, #003300 60%);
  
  background-image: url('frontend/img/home1.jpg') no-repeat center center/cover opacity(0.3);
  color: white;
  padding: 60px 0 30px;
  overflow: auto;
  scrollbar-width: none;
  -ms-overflow-style: none;
}
.custom-footer::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: url('frontend/img/home1.jpg') center/cover;
  opacity: 0.05;
  z-index: 1;
}
.footer-content {
  position: relative;
  z-index: 2;
}
.footer-brand {
  text-align: center;
  margin-bottom: 3rem;
}
.footer-brand h3 {
  font-family: 'Playfair Display', serif;
  font-size: 2.5rem;
  margin-bottom: 1rem;
}
.footer-brand p {
  font-family: 'Dancing Script', cursive;
  font-size: 1.3rem;
  opacity: 0.9;
}
.footer-navbar {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 1.5rem;
  margin: 1.2rem 0 0.5rem 0;
}
.footer-navbar a {
  color: #fff;
  font-size: 1.08rem;
  text-decoration: none;
  font-weight: 500;
  letter-spacing: 0.01em;
  transition: color 0.2s, border-bottom 0.2s;
  padding-bottom: 2px;
  border-bottom: 2px solid transparent;
}
.footer-navbar a:hover {
  color: #fff;
  border-bottom: 2px solid #fff;
}
.footer-links {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 2rem;
  margin-bottom: 3rem;
}
.footer-section h4 {
  font-size: 1.2rem;
  margin-bottom: 1rem;
  color: #e74c3c;
}
.footer-section ul {
  list-style: none;
  padding: 0;
}
.footer-section ul li {
  margin-bottom: 0.5rem;
}
.footer-section ul li a {
  color: rgba(255, 255, 255, 0.8);
  text-decoration: none;
  transition: all 0.3s ease;
}
.footer-section ul li a:hover {
  color: #e74c3c;
  padding-left: 5px;
}
.footer-social {
  text-align: center;
  margin-bottom: 2rem;
}
.social-links {
  display: flex;
  justify-content: center;
  gap: 1rem;
  margin-top: 1rem;
}
.social-link {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #222;
  text-decoration: none;
  box-shadow: 0 2px 8px rgba(0,0,0,0.08);
  border: 1.5px solid #e0e0e0;
  transition: all 0.3s cubic-bezier(.4,0,.2,1);
  backdrop-filter: blur(10px);
}
.social-link:hover {
  background: #fff;
  box-shadow: 0 6px 18px rgba(0,0,0,0.16);
  transform: scale(1.12) translateY(-3px);
  border-color: #006600;
}
.social-link svg {
  width: 28px;
  height: 28px;
  display: block;
}
.footer-bottom {
  text-align: center;
  padding-top: 2rem;
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  color: rgba(255, 255, 255, 0.7);
}
@media (max-width: 768px) {
  .footer-links {
    grid-template-columns: 1fr;
    text-align: center;
  }
}
@media (max-width: 600px) {
  .footer-navbar {
    gap: 0.7rem;
    font-size: 0.97rem;
  }
}
</style>

<footer class="custom-footer">
  <div class="container">
    <div class="footer-content">
      <div class="footer-brand">
        <h3><?= $tr['footer_brand'] ?></h3>
        <p><?= $tr['footer_slogan'] ?></p>
        <nav class="footer-navbar">
          <a href="<?= navUrl('index.php') ?>"><?= $tr['home'] ?></a>
          <a href="<?= navUrl('blog.php') ?>"><?= $tr['blog'] ?></a>
          <a href="<?= navUrl('services.php') ?>"><?= $tr['services_nav'] ?></a>
          <a href="<?= navUrl('packages.php') ?>"><?= $tr['packages'] ?></a>
          <a href="<?= navUrl('gallery.php') ?>"><?= $tr['gallery'] ?></a>
          <a href="<?= navUrl('ourteam.php') ?>"><?= $tr['our_team'] ?></a>
          <a href="<?= navUrl('about.php') ?>"><?= $tr['about_us'] ?></a>
          <a href="<?= navUrl('contact.php') ?>"><?= $tr['contact'] ?></a>
          <a href="<?= navUrl('login.php') ?>"><?= $tr['login'] ?></a>
          <a href="<?= navUrl('reservation.php') ?>"><?= $tr['reservation'] ?></a>
        </nav>
      </div>
      <div class="footer-links">
        <div class="footer-section">
          <h4><?= $tr['services'] ?></h4>
          <ul>
            <li><a href="<?= navUrl('index.php') ?>"><?= $tr['home'] ?></a></li>
            <li><a href="<?= navUrl('blog.php') ?>"><?= $tr['blog'] ?></a></li>
            <li><a href="<?= navUrl('services.php') ?>"><?= $tr['services_nav'] ?></a></li>
            <li><a href="<?= navUrl('packages.php') ?>"><?= $tr['packages'] ?></a></li>
            <li><a href="<?= navUrl('gallery.php') ?>"><?= $tr['gallery'] ?></a></li>
            <li><a href="<?= navUrl('ourteam.php') ?>"><?= $tr['our_team'] ?></a></li>
            <li><a href="<?= navUrl('about.php') ?>"><?= $tr['about_us'] ?></a></li>
            <li><a href="<?= navUrl('contact.php') ?>"><?= $tr['contact'] ?></a></li>
          </ul>
        </div>
        <div class="footer-section">
          <h4><?= $tr['company'] ?></h4>
          <ul>
          </ul>
        </div>
        <div class="footer-section">
          <h4><?= $tr['contact_info'] ?></h4>
          <ul>
            <li><i class="fas fa-map-marker-alt"></i> <?= $tr['address'] ?></li>
            <li><i class="fas fa-phone"></i> <?= $tr['phone'] ?></li>
            <li><i class="fas fa-envelope"></i> <?= $tr['email'] ?></li>
            <li><i class="fas fa-clock"></i> <?= $tr['hours'] ?></li>
          </ul>
        </div>
      </div>
      <div class="footer-social">
        <h4><?= $tr['follow_us'] ?></h4>
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
            <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><g><circle cx="24" cy="24" r="24" fill="#fff"/><path d="M43.6 20.5H42V20.4H24v7.2h11.2c-1.5 4-5.2 6.8-9.2 6.8-5.5 0-10-4.5-10-10s4.5-10 10-10c2.4 0 4.6.9 6.3 2.4l5.4-5.4C34.5 8.5 29.5 6 24 6c-7.1 0-13.2 4.1-16.3 8.7z" fill="#34A853"/><path d="M24 44c5.3 0 10.2-1.8 13.9-4.9l-6.4-5.2c-2 1.4-4.6 2.3-7.5 2.3-4-0.1-7.7-2.8-9.2-6.8l-6.3 4.9C10.7 40.2 16.9 44 24 44z" fill="#FBBC05"/><path d="M43.6 20.5H42V20.4H24v7.2h11.2c-0.6 1.7-1.7 3.2-3.1 4.3l6.4 5.2C41.7 39.2 44 32.2 44 25c0-1.3-.1-2.1-.4-3.5z" fill="#EA4335"/></g></svg>
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
          <a href="#" class="social-link call" title="Call" id="call-icon">
            <svg viewBox="0 0 24 24" fill="#25D366" xmlns="http://www.w3.org/2000/svg"><path d="M17 2H7a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm0 18H7V4h10v16zm-5-2a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg>
          </a>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2025 YOK Catering. <?= $tr['rights'] ?></p>
      </div>
    </div>
  </div>
</footer>
<script>
  // Multi-number call icon click handler for footer
  document.addEventListener('DOMContentLoaded', function() {
    var callIcon = document.getElementById('call-icon');
    if (callIcon) {
      callIcon.addEventListener('click', function(e) {
        e.preventDefault();
        const numbers = ['+251925252579', '+251910449546'];
        window.location.href = 'tel:' + numbers[0];
        setTimeout(function() {
          if (confirm('Call +251925252579 or +251910449546? Click OK for first, Cancel for second.')) {
            window.location.href = 'tel:' + numbers[0];
          } else {
            window.location.href = 'tel:' + numbers[1];
          }
        }, 300);
      });
    }
  });
</script>

