<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Terms of Service | YOK Catering</title>
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
    <h1>Terms of Service</h1>
    <p>Effective Date: January 1, 2024</p>
    <p>Welcome to YOK Catering. By accessing or using our website, you agree to be bound by these Terms of Service. Please read them carefully.</p>
    <h2>Use of Our Website</h2>
    <ul>
      <li>You must be at least 18 years old to use our services.</li>
      <li>You agree not to use our website for any unlawful purpose.</li>
      <li>We reserve the right to modify or discontinue our services at any time.</li>
    </ul>
    <h2>Intellectual Property</h2>
    <p>All content on this website is the property of YOK Catering and may not be used without permission.</p>
    <h2>Limitation of Liability</h2>
    <p>YOK Catering is not liable for any damages arising from the use of our website or services.</p>
    <h2>Changes to These Terms</h2>
    <p>We may update these Terms of Service from time to time. Changes will be posted on this page.</p>
    <h2>Contact Us</h2>
    <p>If you have any questions about these Terms, please contact us at <a href="mailto:info@yokcatering.com">info@yokcatering.com</a>.</p>
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