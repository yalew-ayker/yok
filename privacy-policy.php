<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Privacy Policy | YOK Catering</title>
  <style>
    body { font-family: Arial, sans-serif; background: #fafafa; color: #222; margin: 0; padding: 0; }
    .container { max-width: 800px; margin: 40px auto; background: #fff; border-radius: 8px; box-shadow: 0 2px 12px rgba(0,0,0,0.07); padding: 32px; }
    h1 { color: #006600; }
    h2 { color: #222; margin-top: 2em; }
    a { color: #006600; }
  </style>
</head>
<body>
  <div class="container">
    <h1>Privacy Policy</h1>
    <p>Effective Date: January 1, 2024</p>
    <p>YOK Catering ("we", "us", or "our") is committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website.</p>
    <h2>Information We Collect</h2>
    <ul>
      <li>Personal identification information (Name, email address, phone number, etc.)</li>
      <li>Usage data (pages visited, time spent, browser type, etc.)</li>
      <li>Cookies and tracking technologies</li>
    </ul>
    <h2>How We Use Your Information</h2>
    <ul>
      <li>To provide and maintain our services</li>
      <li>To improve our website and services</li>
      <li>To communicate with you</li>
      <li>To comply with legal obligations</li>
    </ul>
    <h2>Sharing Your Information</h2>
    <p>We do not sell or rent your personal information. We may share information with service providers or as required by law.</p>
    <h2>Cookies</h2>
    <p>We use cookies to enhance your experience. You can control cookies through your browser settings.</p>
    <h2>Your Rights</h2>
    <p>You have the right to access, update, or delete your personal information. Contact us at <a href="mailto:info@yokcatering.com">info@yokcatering.com</a> for requests.</p>
    <h2>Contact Us</h2>
    <p>If you have any questions about this Privacy Policy, please contact us at <a href="mailto:info@yokcatering.com">info@yokcatering.com</a>.</p>
    <p><a href="index.php">&larr; Back to Home</a></p>
  </div>
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