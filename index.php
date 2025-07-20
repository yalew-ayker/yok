<?php
$lang = isset($_GET['lang']) && $_GET['lang'] === 'am' ? 'am' : 'en';
$tr = [
  'en' => [
    'welcome' => 'Welcome to YOK',
    'subtitle' => 'We care about your worries!',
    'desc' => "Let's make your event deliciously memorable together.",
    'slider_caption' => 'Companies Working With Us!'
  ],
  'am' => [
    'welcome' => 'እንኳን ወደ ዮክ የምግብ ዝግጅትና አቅርቦትአቅርቦት በደህና መጡ',
    'subtitle' => 'ጭንቀትዎን እንጨነቃለንእንጨነቃለን!',
    'desc' => 'የእርስዎን ዝግጅት በጣም የሚታወወስ እና ጣፋጭ እንዲሆን እንረዳለን።',
    'slider_caption' => 'ከእኛ ጋር የሚሰሩ ድርጅቶች!'
  ]
];
$tr = $tr[$lang];
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YOK Catering Service</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Oswald:wght@400;600;700&family=Lexend:wght@700&display=swap" rel="stylesheet">
    <link href="frontend/style.css" rel="stylesheet">
    <!-- Handwritten font for subtitle -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <!-- Poiret One font for Welcome to YOK -->
    <link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet">
</head>
<body class="home-page" style="margin:0; padding:0; overflow:hidden;">
    <header>
<?php include 'navbar.php'; ?>
    </header>
    <div id="bg-slideshow"></div>
    <div id="bg-overlay"></div>
    <div class="welcome-yok-text">
      <?= htmlspecialchars($tr['welcome']) ?>
      <div class="welcome-yok-sub"><?= htmlspecialchars($tr['subtitle']) ?></div>
      <div class="welcome-yok-desc"><?= htmlspecialchars($tr['desc']) ?></div>
    </div>
    <div class="comp-slider-box">
      <div class="comp-slider" id="compSlider">
        <img id="comp-prev2" class="comp-slide comp-slide-prev2" src="frontend/img/comp/mekedonia.jpg" alt="Previous Company 2">
        <img id="comp-prev" class="comp-slide comp-slide-prev" src="frontend/img/comp/south.png" alt="Previous Company">
        <img id="comp-current" class="comp-slide comp-slide-current active" src="frontend/img/comp/defence.jpg" alt="Current Company">
        <img id="comp-next" class="comp-slide comp-slide-next" src="frontend/img/comp/eotc.jpg" alt="Next Company">
        <img id="comp-next2" class="comp-slide comp-slide-next2" src="frontend/img/comp/hora.png" alt="Next Company 2">
      </div>
      <div class="comp-slider-caption"><?= htmlspecialchars($tr['slider_caption']) ?></div>
    </div>
    <style>
      .comp-slider-box {
        position: fixed;
        top: 15%;
        right: 10vw;
        z-index: 12;
        width: 380px;
        background: rgba(0,0,0,0.18);
        border-radius: 28px;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 0.5rem 0.5rem;
      /* ...existing code... */
        align-items: center;
        gap: 1.5rem;
      }
      .comp-slider {
        width: 320px;
        height: 320px;
        position: relative;
        overflow: hidden;
        border-radius: 28px;
        background: #fff;
        box-shadow: 0 4px 16px #00360e22;
      }
      .comp-slide {
        position: absolute;
        top: 0;
        width: 100%;
        height: 100%;
        object-fit: contain;
        pointer-events: none;
        transition: left 1.1s cubic-bezier(.4,0,.2,1), opacity 1.1s cubic-bezier(.4,0,.2,1), filter 1.1s cubic-bezier(.4,0,.2,1);
        opacity: 0;
        visibility: hidden;
      }
      .comp-slide-current {
        left: 0%;
        z-index: 3;
        opacity: 1;
        pointer-events: auto;
        filter: none;
        visibility: visible;
      }
      .comp-slide-prev {
        left: -100%;
        z-index: 2;
        opacity: 0.35;
        filter: blur(3px) grayscale(30%);
        visibility: visible;
      }
      .comp-slide-next {
        left: 100%;
        z-index: 2;
        opacity: 0.35;
        filter: blur(3px) grayscale(30%);
        visibility: visible;
      }
      .comp-slide-prev2 {
        left: -200%;
        z-index: 1;
        opacity: 0.15;
        filter: blur(6px) grayscale(60%);
        visibility: visible;
      }
      .comp-slide-next2 {
        left: 200%;
        z-index: 1;
        opacity: 0.15;
        filter: blur(6px) grayscale(60%);
        visibility: visible;
      }
      .comp-slider-caption {
        color: #fff;
        font-family: 'Poppins', Arial, Helvetica, sans-serif;
        font-size: 1.08rem;
        font-weight: 600;
        text-align: center;
        margin-top: 0.7rem;
        letter-spacing: 0.5px;
        text-shadow: 0 2px 8px #00330099;
      }
      @media (max-width: 900px) {
        .comp-slider-box {
          top: 2.5rem;
          right: 2vw;
          width: 140px;
          padding: 0.7rem 0.7rem 1rem 0.7rem;
        }
        .comp-slider {
          width: 90px;
          height: 50px;
        }
        .comp-slider-caption {
          font-size: 0.95rem;
        }
      }
      .welcome-yok-text {
        position: fixed;
        top: 30%;
        left: 7%;
        transform: translateY(-50%);
        z-index: 10;
        font-family: 'Poiret One', cursive !important;
        font-weight: 900 !important;
        font-size: 3.5rem;
        letter-spacing: 0.5px;
        color: #ff0000;
        padding: 2.2rem 1.2rem 2.2rem 1.5rem;
        pointer-events: none;
        user-select: none;
        line-height: 1.1;
      }
      .welcome-yok-sub {
        position: fixed;
        top: 40%;
        left: 5%;
        font-family: 'Cookie', cursive !important;
        color: #fff;
        font-size: 5.5rem;
        font-weight: 400;
        margin-top: 5rem;
        letter-spacing: 0.5px;
        text-shadow: 0 2px 8px #00330099;
        line-height: 1.1;
      }
      .welcome-yok-desc {
        position: fixed;
        top: 250%;
        left: 7%;
        font-family: 'Poppins', Arial, Helvetica, sans-serif !important;
        color: #fff;
        font-size: 1.5rem;
        font-weight: 400;
        margin-top: 2.5rem;
        letter-spacing: 0.5px;
        text-shadow: 0 2px 8px #00330099;
        line-height: 1.2;
        max-width: 500px;
      }
      @media (max-width: 900px) {
        .welcome-yok-desc {
          font-size: 1.1rem;
          max-width: 90vw;
          left: 5%;
        }
      }
      @media (max-width: 600px) {
        .welcome-yok-sub {
          font-size: 2rem;
        }
      }
      @media (max-width: 600px) {
        .welcome-yok-text {
          font-size: 1.1rem;
          padding: 1.1rem 0.5rem 1.1rem 0.7rem;
        }
      }
    </style>
    <style>
      #bg-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        z-index: 0;
        background: radial-gradient(circle, #003300 100%, #006600 00%);
        opacity: 0.7;
        pointer-events: none;
      }
    </style>
    <script>
      // Company slider logic with 5-image effect
      const compImages = [
        'frontend/img/comp/mekedonia.jpg',      // matches comp-prev2
        'frontend/img/comp/south.png',    // matches comp-prev
        'frontend/img/comp/defence.jpg',       // matches comp-current
        'frontend/img/comp/eotc.jpg',       // matches comp-next
        'frontend/img/comp/hora.png'   // matches comp-next2
      ];
      let compIdx = 2; // Start at the current image (eotc.jpg)
      const compPrev2 = document.getElementById('comp-prev2');
      const compPrev = document.getElementById('comp-prev');
      const compCurrent = document.getElementById('comp-current');
      const compNext = document.getElementById('comp-next');
      const compNext2 = document.getElementById('comp-next2');
      // Slide transition logic
      function updateCompSlider(slide = true) {
        const prev2Idx = (compIdx - 2 + compImages.length) % compImages.length;
        const prevIdx = (compIdx - 1 + compImages.length) % compImages.length;
        const nextIdx = (compIdx + 1) % compImages.length;
        const next2Idx = (compIdx + 2) % compImages.length;
        // Set images
        compPrev2.src = compImages[prev2Idx];
        compPrev.src = compImages[prevIdx];
        compCurrent.src = compImages[compIdx];
        compNext.src = compImages[nextIdx];
        compNext2.src = compImages[next2Idx];
        // Assign correct classes for visibility
        compPrev2.className = 'comp-slide comp-slide-prev2';
        compPrev.className = 'comp-slide comp-slide-prev';
        compCurrent.className = 'comp-slide comp-slide-current active';
        compNext.className = 'comp-slide comp-slide-next';
        compNext2.className = 'comp-slide comp-slide-next2';
        // Reset positions for instant jump (no animation) if not sliding
        if (!slide) {
          compPrev2.style.transition = 'none';
          compPrev.style.transition = 'none';
          compCurrent.style.transition = 'none';
          compNext.style.transition = 'none';
          compNext2.style.transition = 'none';
          // Force reflow to apply transition reset
          void compPrev2.offsetWidth;
          void compPrev.offsetWidth;
          void compCurrent.offsetWidth;
          void compNext.offsetWidth;
          void compNext2.offsetWidth;
          compPrev2.style.transition = '';
          compPrev.style.transition = '';
          compCurrent.style.transition = '';
          compNext.style.transition = '';
          compNext2.style.transition = '';
        }
      }
      updateCompSlider(false);
      setInterval(() => {
        // Animate: move all slides left
        compPrev2.className = 'comp-slide comp-slide-prev2';
        compPrev.className = 'comp-slide comp-slide-prev';
        compCurrent.className = 'comp-slide comp-slide-current active';
        compNext.className = 'comp-slide comp-slide-next';
        compNext2.className = 'comp-slide comp-slide-next2';
        // Trigger animation
        setTimeout(() => {
          compPrev2.className = 'comp-slide comp-slide-prev2';
          compPrev.className = 'comp-slide comp-slide-prev';
          compCurrent.className = 'comp-slide comp-slide-prev'; // current slides left
          compNext.className = 'comp-slide comp-slide-current active'; // next slides in
          compNext2.className = 'comp-slide comp-slide-next2';
        }, 20);
        // After animation, update images and reset classes
        setTimeout(() => {
          compIdx = (compIdx + 1) % compImages.length;
          updateCompSlider(false);
        }, 1120); // match transition duration
      }, 3200);
      // Image paths
      const images = [
        'frontend/img/home1.jpg',
        'frontend/img/home2.jpg',
        'frontend/img/home3.jpg',
        'frontend/img/home4.jpg',
        'frontend/img/home5.jpg',
        'frontend/img/home6.jpg',
        'frontend/img/home7.jpg'
      ];
      let current = 0;
      const bgSlideshow = document.getElementById('bg-slideshow');
      // Style the container
      Object.assign(bgSlideshow.style, {
        position: 'fixed',
        top: 0,
        left: 0,
        width: '100vw',
        height: '100vh',
        zIndex: '-1',
        overflow: 'hidden',
      });

      // Create two layers for crossfade
      const layerA = document.createElement('div');
      const layerB = document.createElement('div');
      [layerA, layerB].forEach(layer => {
        Object.assign(layer.style, {
          position: 'absolute',
          top: 0,
          left: 0,
          width: '100vw',
          height: '100vh',
          backgroundSize: 'cover',
          backgroundPosition: 'center',
          backgroundRepeat: 'no-repeat',
          opacity: 0,
          transition: 'opacity 3s cubic-bezier(.4,0,.2,1)',
        });
        bgSlideshow.appendChild(layer);
      });
      layerA.style.opacity = 1;
      layerA.style.backgroundImage = `url('${images[0]}')`;
      let showingA = true;

      function nextBg() {
        const next = (current + 1) % images.length;
        if (showingA) {
          layerB.style.backgroundImage = `url('${images[next]}')`;
          layerB.style.opacity = 1;
          layerA.style.opacity = 0;
        } else {
          layerA.style.backgroundImage = `url('${images[next]}')`;
          layerA.style.opacity = 1;
          layerB.style.opacity = 0;
        }
        showingA = !showingA;
        current = next;
      }

      setInterval(nextBg, 7000); // 7 seconds per image
</script>

    <!-- Social Media Links Bar -->
    <div class="social-bar">
      <a href="https://tiktok.com/@yokcateringservice" target="_blank" class="social-icon tiktok" title="TikTok">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path d="M12.5 2h3.1c.2 2.1 1.7 3.7 3.8 3.9v3.1c-.9 0-1.7-.1-2.5-.3v7.7c0 3.7-2.5 5.5-5.1 5.5-2.5 0-5-1.7-5-5.1 0-3.3 2.5-5 5-5 .2 0 .4 0 .6.1v3.2c-.2-.1-.4-.1-.6-.1-1.1 0-2.1.7-2.1 2 0 1.2 1 2 2.1 2 1.1 0 2.1-.8 2.1-2.1V2z" fill="#25F4EE"/><path d="M12.5 2h3.1c.2 2.1 1.7 3.7 3.8 3.9v3.1c-.9 0-1.7-.1-2.5-.3v7.7c0 3.7-2.5 5.5-5.1 5.5-2.5 0-5-1.7-5-5.1 0-3.3 2.5-5 5-5 .2 0 .4 0 .6.1v3.2c-.2-.1-.4-.1-.6-.1-1.1 0-2.1.7-2.1 2 0 1.2 1 2 2.1 2 1.1 0 2.1-.8 2.1-2.1V2z" fill="#FE2C55" fill-opacity=".7"/></g></svg>
      </a>
      <a href="https://t.me/yokCatering" target="_blank" class="social-icon telegram" title="Telegram">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22 4.01L2.01 10.73c-.55.18-.54.52-.1.65l5.13 1.6 2.02 6.13c.24.67.38.93.77.93.31 0 .44-.14.6-.31l2.88-2.8 5.98 4.41c1.1.61 1.89.29 2.16-1.02l3.13-14.01c.23-1.01-.36-1.41-1.13-1.13z" fill="#229ED9"/></svg>
      </a>
      <a href="https://www.facebook.com/yonas.bekele.1650?mibextid=ZbWKwL" target="_blank" class="social-icon facebook" title="Facebook">
        <svg viewBox="0 0 24 24" fill="#1877F3" xmlns="http://www.w3.org/2000/svg"><path d="M22.675 0h-21.35C.595 0 0 .592 0 1.326v21.348C0 23.408.595 24 1.325 24h11.495v-9.294H9.692v-3.622h3.128V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.797.143v3.24l-1.918.001c-1.504 0-1.797.715-1.797 1.763v2.313h3.587l-.467 3.622h-3.12V24h6.116C23.406 24 24 23.408 24 22.674V1.326C24 .592 23.406 0 22.675 0"/></svg>
      </a>
      <a href="mailto:yonasb509@gmail.com" target="_blank" class="social-icon gmail" title="Gmail">
        <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><g><circle cx="24" cy="24" r="24" fill="#fff"/><path d="M43.6 20.5H42V20.4H24v7.2h11.2c-1.5 4-5.2 6.8-9.2 6.8-5.5 0-10-4.5-10-10s4.5-10 10-10c2.4 0 4.6.9 6.3 2.4l5.4-5.4C34.5 8.5 29.5 6 24 6 13.5 6 5 14.5 5 25s8.5 19 19 19 19-8.5 19-19c0-1.3-.1-2.1-.4-3.5z" fill="#4285F4"/><path d="M6.3 14.7l5.9 4.3C14.5 16.1 18.9 13 24 13c2.4 0 4.6.9 6.3 2.4l5.4-5.4C34.5 8.5 29.5 6 24 6c-7.1 0-13.2 4.1-16.3 8.7z" fill="#34A853"/><path d="M24 44c5.3 0 10.2-1.8 13.9-4.9l-6.4-5.2c-2 1.4-4.6 2.3-7.5 2.3-4-0.1-7.7-2.8-9.2-6.8l-6.3 4.9C10.7 40.2 16.9 44 24 44z" fill="#FBBC05"/><path d="M43.6 20.5H42V20.4H24v7.2h11.2c-0.6 1.7-1.7 3.2-3.1 4.3l6.4 5.2C41.7 39.2 44 32.2 44 25c0-1.3-.1-2.1-.4-3.5z" fill="#EA4335"/></g></svg>
      </a>
      <a href="https://wa.me/251925252579" target="_blank" class="social-icon whatsapp" title="WhatsApp">
        <svg viewBox="0 0 24 24" fill="#25D366" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="12" fill="#25D366"/><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.472-.148-.67.15-.198.297-.767.967-.94 1.166-.173.198-.347.223-.644.075-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.372-.025-.52-.075-.149-.67-1.614-.917-2.212-.242-.58-.487-.5-.67-.51-.173-.008-.372-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.214 3.074.149.198 2.1 3.21 5.08 4.37.71.306 1.263.489 1.695.626.712.227 1.36.195 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.288.173-1.413-.074-.124-.272-.198-.57-.347z" fill="#fff"/></svg>
      </a>
      <a href="https://imo.im/1MBm?pid=QR_code&af_dp=imo%3A%2F%2Fprofile.user%2FAAAAAAAAAAAAAAAAAAAAAF7-ljBSFxt4HgC8HJsLJg3gvZCyYBoKLkQYiq67CRMw%2Fscene_qr_code%2Fqr_code" target="_blank" class="social-icon imo" title="IMO">
        <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="24" cy="24" r="24" fill="#0099FF"/><rect x="12" y="12" width="24" height="24" rx="12" fill="#fff"/><path d="M24 16c-4.418 0-8 2.91-8 6.5 0 2.13 1.44 4.01 3.67 5.18-.13.47-.47 1.7-.54 1.97-.08.3.11.3.23.27.1-.03 1.6-1.06 2.25-1.5.45.07.92.11 1.39.11 4.418 0 8-2.91 8-6.5S28.418 16 24 16zm-2.5 6.5c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm5 0c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1z" fill="#0099FF"/></svg>
      </a>
      <a href="viber://chat?number=%2B251925252579" target="_blank" class="social-icon viber" title="Viber">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="24" height="24" rx="6" fill="#665CAC"/><path d="M17.472 15.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.472-.148-.67.15-.198.297-.767.967-.94 1.166-.173.198-.347.223-.644.075-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.372-.025-.52-.075-.149-.67-1.614-.917-2.212-.242-.58-.487-.5-.67-.51-.173-.008-.372-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.214 3.074.149.198 2.1 3.21 5.08 4.37.71.306 1.263.489 1.695.626.712.227 1.36.195 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.288.173-1.413-.074-.124-.272-.198-.57-.347z" fill="#fff"/></svg>
      </a>
      <a href="#" class="social-icon call" title="Call" id="call-icon">
        <svg viewBox="0 0 24 24" fill="#25D366" xmlns="http://www.w3.org/2000/svg"><path d="M17 2H7a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm0 18H7V4h10v16zm-5-2a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg>
      </a>
    <script>
      // Multi-number call icon click handler
      document.getElementById('call-icon').addEventListener('click', function(e) {
        e.preventDefault();
        // Try to open the first number, then show a dialog for both
        const numbers = ['+251925252579', '+251910449546'];
        // Try to open the first number
        window.location.href = 'tel:' + numbers[0];
        // Also show a dialog for user to pick (for desktop)
        setTimeout(function() {
          if (confirm('Call +251925252579 or +251910449546? Click OK for first, Cancel for second.')) {
            window.location.href = 'tel:' + numbers[0];
          } else {
            window.location.href = 'tel:' + numbers[1];
          }
        }, 300);
      });
    </script>
    </div>
    <style>
      .social-bar {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100vw;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 2.2rem;
        padding: 1.1rem 0 1.1rem 0;
        z-index: 100;
        backdrop-filter: blur(2px);
      }
      .social-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: #fff;
        box-shadow: 0 2px 8px #00330022;
        transition: transform 0.2s, box-shadow 0.2s;
        margin: 0 2px;
      }
      .social-icon:hover {
        transform: scale(1.13) rotate(-6deg);
        box-shadow: 0 4px 16px #00330044;
        background: #e6ffe6;
      }
      .social-icon img, .social-icon svg {
        width: 26px;
        height: 26px;
        object-fit: contain;
        display: block;
      }
      @media (max-width: 600px) {
        .social-bar {
          gap: 1.1rem;
          padding: 0.6rem 0 0.6rem 0;
        }
        .social-icon {
          width: 32px;
          height: 32px;
        }
        .social-icon img {
          width: 18px;
          height: 18px;
        }
      }
    </style>
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
