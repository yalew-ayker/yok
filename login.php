<?php
$login_error = '';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $input_user = $_POST['username'] ?? '';
  $input_pass = $_POST['password'] ?? '';
  $usersFile = __DIR__ . '/admin/users.json';
  $users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];
  $found = false;
  foreach ($users as $user) {
    if ((strcasecmp($user['name'], $input_user) === 0 || strcasecmp($user['email'], $input_user) === 0) && password_verify($input_pass, $user['password'])) {
      $_SESSION['user_id'] = $user['id'];
      $found = true;
      break;
    }
  }
  if ($found) {
    header('Location: admin/admin.php');
    exit();
  } else {
    $login_error = 'Invalid username/email or password.';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Google Fonts: Oswald for navbar brand display font -->
  <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,600,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - YOK Catering Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="frontend/style.css" rel="stylesheet">
</head>
<body>
    <div id="bg-slideshow"></div>
    <div id="bg-overlay"></div>
    <div id="green-overlay"></div>
    <div id="page-zip-overlay"></div>
    <?php include 'navbar.php'; ?>
    <div style=" z-index: 10; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
    <main class="flex min-h-[70vh] items-center justify-center py-8 px-2">
      <div class="w-full max-w-2xl mx-auto">
        <div class="relative bg-white/30 shadow-2xl rounded-3xl border-4 border-green-400/60 p-3 flex flex-col items-center animate-tw-pop backdrop-blur-xl glassmorphism-box overflow-hidden group min-h-[250px] justify-center">
          <!-- Animated border glow -->
          <div class="absolute -inset-1 rounded-3xl pointer-events-none z-0 border-4 border-transparent animate-border-glow group-hover:animate-border-glow-hover"></div>
          <div class="flex flex-col items-center mb-4 z-10 relative">
            <span class="text-green-700 text-base font-semibold">YOK Catering Service</span>
            <span class="text-gray-700 text-base mt-1 font-medium">Welcome! Please sign in to access the admin dashboard.</span>
          </div>
          <?php if ($login_error): ?>
            <div class="w-full bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-3 text-center animate-shake z-10 relative" role="alert"><?php echo $login_error; ?></div>
          <?php endif; ?>
          <form method="post" action="login.php" aria-label="Admin Login Form" autocomplete="off" class="w-full flex flex-col gap-3 z-10 relative">
            <div class="relative">
              <label for="admin-username" class="block text-sm font-semibold text-green-900 mb-1">Username</label>
              <span class="absolute left-3 top-9 text-green-400 text-lg pointer-events-none"><svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z' /></svg></span>
              <input type="text" class="block w-full rounded-lg border border-green-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 pl-12 pr-3 py-2 text-base bg-white/70 placeholder-gray-400 outline-none transition shadow-sm" id="admin-username" name="username" required autofocus aria-required="true" aria-label="Username">
            </div>
            <div class="relative">
              <label for="admin-password" class="block text-sm font-semibold text-green-900 mb-1">Password</label>
              <span class="absolute left-3 top-9 text-green-400 text-lg pointer-events-none"><svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 11c1.657 0 3 1.343 3 3v1a3 3 0 01-6 0v-1c0-1.657 1.343-3 3-3zm0 0V7a4 4 0 10-8 0v4m8-4a4 4 0 018 0v4' /></svg></span>
              <input type="password" class="block w-full rounded-lg border border-green-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 pl-12 pr-3 py-2 text-base bg-white/70 placeholder-gray-400 outline-none transition shadow-sm" id="admin-password" name="password" required aria-required="true" aria-label="Password">
            </div>
            <button type="submit" class="w-full py-3 mt-2 rounded-xl bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-extrabold text-xl shadow-xl transition focus:outline-none focus:ring-2 focus:ring-green-400 flex items-center justify-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" /></svg>
              Login
            </button>
          </form>
          <div class="mt-2 text-center text-gray-600 text-base z-10 relative">
            <span>Only authorized users can access the admin dashboard.</span>
          </div>
        </div>
      </div>
    </main>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      @keyframes tw-pop {
        0% { opacity: 0; transform: scale(0.92) translateY(40px); }
        100% { opacity: 1; transform: scale(1) translateY(0); }
      }
      .animate-tw-pop { animation: tw-pop 0.32s cubic-bezier(.4,0,.2,1); }
      @keyframes shake {
        0%, 100% { transform: translateX(0); }
        20%, 60% { transform: translateX(-8px); }
        40%, 80% { transform: translateX(8px); }
      }
      .animate-shake { animation: shake 0.4s; }
      /* Glassmorphism and border glow */
      .glassmorphism-box {
        background: rgba(255,255,255,0.18);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.18);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        border-radius: 1.5rem;
        border: 4px solid rgba(34,197,94,0.25);
      }
      @keyframes border-glow {
        0% { box-shadow: 0 0 0 0 rgba(34,197,94,0.4), 0 0 0 0 rgba(34,197,94,0.2); }
        50% { box-shadow: 0 0 24px 6px rgba(34,197,94,0.6), 0 0 48px 12px rgba(34,197,94,0.15); }
        100% { box-shadow: 0 0 0 0 rgba(34,197,94,0.4), 0 0 0 0 rgba(34,197,94,0.2); }
      }
      .animate-border-glow {
        animation: border-glow 2.5s infinite cubic-bezier(.4,0,.2,1);
      }
      .group:hover .animate-border-glow,
      .group:focus-within .animate-border-glow {
        animation: border-glow 1.2s infinite cubic-bezier(.4,0,.2,1);
      }
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
      // Green overlay styling (same as index.php & reservation.php)
      const greenOverlay = document.getElementById('green-overlay');
      if (greenOverlay) Object.assign(greenOverlay.style, {
        position: 'fixed',
        top: 0,
        left: 0,
        width: '100vw',
        height: '100vh',
        backgroundColor: 'rgba(0, 136, 14, 0.3)',
        zIndex: '1',
        pointerEvents: 'none',
      });
      // Animated background slideshow (same as index.php & reservation.php)
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
      if (bgSlideshow) {
        Object.assign(bgSlideshow.style, {
          position: 'fixed',
          top: 0,
          left: 0,
          width: '100vw',
          height: '100vh',
          zIndex: '-1',
          overflow: 'hidden',
        });
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
        setInterval(nextBg, 7000);
      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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
