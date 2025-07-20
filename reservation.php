<?php
// reservation.php: Accepts customer orders and sends them to admin (formerly customorder.php)
session_start();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = trim($_POST['first_name'] ?? '');
    $last_name = trim($_POST['last_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $event_date = trim($_POST['event_date'] ?? '');
    $location = trim($_POST['location'] ?? '');
    $attendees = trim($_POST['attendees'] ?? '');
    $event_type = trim($_POST['event_type'] ?? '');
    $menu_package = trim($_POST['menu_package'] ?? '');
    $health_issue = trim($_POST['health_issue'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $success = false;
    $error = '';

    if ($first_name && $last_name && $email && $phone && $event_date && $location && $attendees && $event_type && $menu_package) {
        // Save order to a file (orders.txt)
        $order = date('Y-m-d H:i:s') . " | First Name: $first_name | Last Name: $last_name | Email: $email | Phone: $phone | Event Date: $event_date | Location: $location | Attendees: $attendees | Event Type: $event_type | Menu Package: $menu_package | Health Issue: $health_issue | Message: $message\n";
        file_put_contents(__DIR__ . '/frontend/db/orders.txt', $order, FILE_APPEND);
        $success = true;

        // Send email notification to admin
        $to = 'admin@yokcatering.com'; // Change to your admin email
        $subject = 'New Catering Order Received';
        $body = "A new order has been submitted:\n\n"
              . "First Name: $first_name\n"
              . "Last Name: $last_name\n"
              . "Email: $email\n"
              . "Phone: $phone\n"
              . "Event Date: $event_date\n"
              . "Location: $location\n"
              . "Number of Attendees: $attendees\n"
              . "Event Type: $event_type\n"
              . "Menu Package: $menu_package\n"
              . "Health Issue: $health_issue\n"
              . "Message: $message\n"
              . "Submitted at: " . date('Y-m-d H:i:s');
        $headers = "From: noreply@yokcatering.com\r\n";
        // Use @ to suppress errors if mail() is not configured
        @mail($to, $subject, $body, $headers);
    } else {
        $error = 'Please fill in all required fields.';
    }
}
?>
<?php
$lang = (isset($_GET['lang']) && $_GET['lang'] === 'am') ? 'am' : 'en';
$translations = [
  'en' => [
    'title' => 'Reservation',
    'first_name' => 'First Name *',
    'last_name' => 'Last Name *',
    'email' => 'Email Address *',
    'phone' => 'Phone Number *',
    'event_type' => 'Event Type *',
    'select_event_type' => 'Select event type',
    'wedding' => 'Wedding',
    'corporate' => 'Corporate',
    'birthday' => 'Birthday',
    'private' => 'Private',
    'other' => 'Other',
    'menu_package' => 'Menu Package *',
    'select_menu_package' => 'Select menu package',
    'premium_buffet' => 'Premium Buffet',
    'standard_buffet' => 'Standard Buffet',
    'custom_menu' => 'Custom Menu',
    'event_date' => 'Event Date *',
    'event_day' => 'Event Day *',
    'location' => 'Location *',
    'attendees' => 'Number of Attendees *',
    'health_issue' => 'Health Issue (Allergies, etc.)',
    'message' => 'Message',
    'submit_order' => 'Submit Order',
    'confirm_order' => 'Confirm Your Order',
    'send' => 'Send',
    'cancel' => 'Cancel',
    'order_submitted' => 'Order Submitted!',
    'thank_you' => 'Thank you',
    'success_msg' => 'Your order has been successfully submitted.',
    'back_home' => 'Back to Home',
    'required' => 'Required',
    'please_fill' => 'Please fill in all required fields above.',
    'unsuccessful' => 'Unsuccessful Submission',
    'missing_fields' => 'Missing fields:',
    'ok' => 'OK',
  ],
  'am' => [
    'title' => 'ቦታ ያስይዙ',
    'first_name' => 'ስም *',
    'last_name' => 'የአባት ስም *',
    'email' => 'ኢሜይል *',
    'phone' => 'ስልክ *',
    'event_type' => 'የዝግጅት አይነት *',
    'select_event_type' => 'የዝግጅት አይነት ይምረጡ',
    'wedding' => 'ሰርግ',
    'corporate' => 'ድርጅት',
    'birthday' => 'የቀን ልደት',
    'private' => 'የግል',
    'other' => 'ሌላ',
    'menu_package' => 'የምግብ ፓኬጅ *',
    'select_menu_package' => 'የምግብ ፓኬጅ ይምረጡ',
    'premium_buffet' => 'ፕሪሚየም ቡፌ',
    'standard_buffet' => 'መደበኛ ቡፌ',
    'custom_menu' => 'በተስተካከለ ምናሌ',
    'event_date' => 'የዝግጅት ቀን *',
    'event_day' => 'የዝግጅት ቀን (ቀን ስም) *',
    'location' => 'ቦታ *',
    'attendees' => 'ተሳታፊዎች ብዛት *',
    'health_issue' => 'የጤና ችግር (አለርጂ, ወዘተ)',
    'message' => 'መልእክት',
    'submit_order' => 'ትዕዛዝ ያስገቡ',
    'confirm_order' => 'ትዕዛዝዎን ያረጋግጡ',
    'send' => 'ላክ',
    'cancel' => 'ሰርዝ',
    'order_submitted' => 'ትዕዛዝ ተሳክቷል!',
    'thank_you' => 'አመሰግናለሁ',
    'success_msg' => 'ትዕዛዝዎ በተሳካ ሁኔታ ተሰጥቷል።',
    'back_home' => 'ወደ መነሻ ተመለስ',
    'required' => 'አስፈላጊ',
    'please_fill' => 'እባክዎን ሁሉንም አስፈላጊ መስኮቶች ይሙሉ።',
    'unsuccessful' => 'ስራው አልተሳካም',
    'missing_fields' => 'የጎደሉ መስኮቶች:',
    'ok' => 'እሺ',
  ]
];
$tr = isset($translations[$lang]) ? $translations[$lang] : $translations['en'];
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
</head>
<body class="home-page">
<?php include 'navbar.php'; ?>
    <div id="bg-slideshow"></div>
    <div id="bg-overlay"></div>
    <!-- Green overlay for animated background, matching index.php -->
    <div id="green-overlay"></div>
    <div class="container-main" style="z-index: 2;" >
      <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
      <?php endif; ?>
      <?php if (!empty($success)): ?>
        <script>window.location.href = 'admin/order.php?order_submitted=1';</script>
      <?php endif; ?>
      <form id="reservationForm" method="post" action="" autocomplete="off">
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="first_name" class="form-label"><?= $tr['first_name'] ?></label>
            <input type="text" class="form-control" id="first_name" name="first_name" required pattern="^[A-Za-z]+$" title="First name should contain only letters.">
            <div id="firstNameError" class="text-danger mt-1" style="display:none;font-size:0.95em;"></div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="last_name" class="form-label"><?= $tr['last_name'] ?></label>
            <input type="text" class="form-control" id="last_name" name="last_name" required pattern="^[A-Za-z]+$" title="Last name should contain only letters.">
            <div id="lastNameError" class="text-danger mt-1" style="display:none;font-size:0.95em;"></div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="email" class="form-label"><?= $tr['email'] ?></label>
            <input type="email" class="form-control" id="email" name="email" required pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$" title="Please enter a valid email address containing '@' and '.'">
            <div id="emailError" class="text-danger mt-1" style="display:none;font-size:0.95em;"></div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="phone" class="form-label"><?= $tr['phone'] ?></label>
            <input type="text" class="form-control" id="phone" name="phone" required pattern="^[0-9]+$" title="Phone number should contain only numbers.">
            <div id="phoneError" class="text-danger mt-1" style="display:none;font-size:0.95em;"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2 col-6 mb-3">
            <label for="event_type" class="form-label"><?= $tr['event_type'] ?></label>
            <select class="form-select" id="event_type" name="event_type" required>
              <option value=""><?= $tr['select_event_type'] ?></option>
              <option value="Wedding"><?= $tr['wedding'] ?></option>
              <option value="Corporate"><?= $tr['corporate'] ?></option>
              <option value="Birthday"><?= $tr['birthday'] ?></option>
              <option value="Private"><?= $tr['private'] ?></option>
              <option value="Other"><?= $tr['other'] ?></option>
            </select>
          </div>
          <div class="col-md-2 col-6 mb-3">
            <label for="menu_package" class="form-label"><?= $tr['menu_package'] ?></label>
            <select class="form-select" id="menu_package" name="menu_package" required>
              <option value=""><?= $tr['select_menu_package'] ?></option>
              <option value="Premium Buffet"><?= $tr['premium_buffet'] ?></option>
              <option value="Standard Buffet"><?= $tr['standard_buffet'] ?></option>
              <option value="Custom Menu"><?= $tr['custom_menu'] ?></option>
            </select>
          </div>
          <div class="col-md-2 col-6 mb-3">
            <label for="event_date" class="form-label"><?= $tr['event_date'] ?></label>
            <input type="date" class="form-control" id="event_date" name="event_date" required>
          </div>
          <div class="col-md-2 col-6 mb-3">
            <label for="event_day" class="form-label"><?= $tr['event_day'] ?></label>
            <input type="text" class="form-control" id="event_day" name="event_day" placeholder="e.g. Monday" required pattern="^[A-Za-z]+$" title="Event day should contain only letters.">
            <div id="eventDayError" class="text-danger mt-1" style="display:none;font-size:0.95em;"></div>
          </div>
          <div class="col-md-4 col-12 mb-3">
            <label for="location" class="form-label"><?= $tr['location'] ?></label>
            <input type="text" class="form-control" id="location" name="location" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-3">
            <label for="attendees" class="form-label"><?= $tr['attendees'] ?></label>
            <input type="number" class="form-control" id="attendees" name="attendees" min="1" required>
          </div>
          <div class="col-md-4 mb-3">
            <label for="health_issue" class="form-label"><?= $tr['health_issue'] ?></label>
            <input type="text" class="form-control" id="health_issue" name="health_issue" placeholder="e.g. Nut allergy, gluten-free, etc.">
          </div>
          <div class="col-md-4 mb-3">
            <label for="message" class="form-label"><?= $tr['message'] ?></label>
            <textarea class="form-control" id="message" name="message" rows="1" placeholder="Additional details or requests"></textarea>
          </div>
        </div>
        <button type="button" class="btn btn-primary w-100" id="showConfirmModal"><?= $tr['submit_order'] ?></button>
      </form>
      <!-- Tailwind CSS Confirmation Popup -->
      <div id="twConfirmModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden" tabindex="-1" aria-modal="true" role="dialog" aria-live="polite">
        <div id="twModalPanel" class="bg-white border-2 border-green-600 rounded-2xl shadow-2xl max-w-lg w-full mx-4 animate-tw-pop relative focus:outline-none" tabindex="0">
          <div class="px-6 py-4 border-b border-green-100 flex items-center justify-between rounded-t-2xl bg-green-600">
            <div class="flex items-center gap-2">
              <svg id="twCheckIcon" width="28" height="28" fill="none" viewBox="0 0 24 24" class="transition-transform"><circle cx="12" cy="12" r="12" fill="#fff"/><path d="M7 13.5l3 3 7-7" stroke="#22c55e" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <h3 class="text-lg font-bold text-white" id="twModalTitle"><?= $tr['confirm_order'] ?></h3>
            </div>
            <button id="twCloseModal" class="text-white hover:text-gray-200 text-2xl font-bold leading-none" aria-label="Close">&times;</button>
          </div>
          <div class="px-6 pt-4 pb-2 text-sm text-gray-700 font-semibold" id="twOrderSummaryHeader"></div>
          <div class="px-6 py-4" id="twOrderSummary"></div>
          <div class="px-6 py-4 flex flex-col sm:flex-row justify-end gap-3 border-t border-green-100 rounded-b-2xl">
            <button id="twSendOrderBtn" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2 rounded-lg shadow transition focus:ring-2 focus:ring-green-400 flex items-center justify-center gap-2 disabled:opacity-60 disabled:cursor-not-allowed"><?= $tr['send'] ?><span id="twSendSpinner" class="hidden ml-2 w-5 h-5 border-2 border-white border-t-green-500 rounded-full animate-spin"></span></button>
            <button id="twCancelModal" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-5 py-2 rounded-lg transition focus:ring-2 focus:ring-gray-400"><?= $tr['cancel'] ?></button>
          </div>
        </div>
      </div>
      <script src="https://cdn.tailwindcss.com"></script>
      <script>
        // Live validation for email, first name, last name, phone, event day
        document.addEventListener('DOMContentLoaded', function() {
          // Email
          var emailInput = document.getElementById('email');
          var emailError = document.getElementById('emailError');
          var emailPattern = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;
          emailInput.addEventListener('input', function() {
            if (emailInput.value.length === 0) {
              emailError.style.display = 'none';
              emailInput.classList.remove('is-invalid');
            } else if (!emailPattern.test(emailInput.value)) {
              emailError.textContent = "Please enter a valid email address containing '@' and '.'";
              emailError.style.display = 'block';
              emailInput.classList.add('is-invalid');
            } else {
              emailError.style.display = 'none';
              emailInput.classList.remove('is-invalid');
            }
          });

          // First Name
          var firstNameInput = document.getElementById('first_name');
          var firstNameError = document.getElementById('firstNameError');
          var namePattern = /^[A-Za-z]+$/;
          firstNameInput.addEventListener('input', function() {
            if (firstNameInput.value.length === 0) {
              firstNameError.style.display = 'none';
              firstNameInput.classList.remove('is-invalid');
            } else if (!namePattern.test(firstNameInput.value)) {
              firstNameError.textContent = "First name should contain only letters.";
              firstNameError.style.display = 'block';
              firstNameInput.classList.add('is-invalid');
            } else {
              firstNameError.style.display = 'none';
              firstNameInput.classList.remove('is-invalid');
            }
          });

          // Last Name
          var lastNameInput = document.getElementById('last_name');
          var lastNameError = document.getElementById('lastNameError');
          lastNameInput.addEventListener('input', function() {
            if (lastNameInput.value.length === 0) {
              lastNameError.style.display = 'none';
              lastNameInput.classList.remove('is-invalid');
            } else if (!namePattern.test(lastNameInput.value)) {
              lastNameError.textContent = "Last name should contain only letters.";
              lastNameError.style.display = 'block';
              lastNameInput.classList.add('is-invalid');
            } else {
              lastNameError.style.display = 'none';
              lastNameInput.classList.remove('is-invalid');
            }
          });

          // Phone
          var phoneInput = document.getElementById('phone');
          var phoneError = document.getElementById('phoneError');
          var phonePattern = /^[0-9]+$/;
          phoneInput.addEventListener('input', function() {
            if (phoneInput.value.length === 0) {
              phoneError.style.display = 'none';
              phoneInput.classList.remove('is-invalid');
            } else if (!phonePattern.test(phoneInput.value)) {
              phoneError.textContent = "Phone number should contain only numbers.";
              phoneError.style.display = 'block';
              phoneInput.classList.add('is-invalid');
            } else {
              phoneError.style.display = 'none';
              phoneInput.classList.remove('is-invalid');
            }
          });

          // Event Day
          var eventDayInput = document.getElementById('event_day');
          var eventDayError = document.getElementById('eventDayError');
          eventDayInput.addEventListener('input', function() {
            if (eventDayInput.value.length === 0) {
              eventDayError.style.display = 'none';
              eventDayInput.classList.remove('is-invalid');
            } else if (!namePattern.test(eventDayInput.value)) {
              eventDayError.textContent = "Event day should contain only letters.";
              eventDayError.style.display = 'block';
              eventDayInput.classList.add('is-invalid');
            } else {
              eventDayError.style.display = 'none';
              eventDayInput.classList.remove('is-invalid');
            }
          });
        });
      </script>
      <style>
        @keyframes tw-pop {
          0% { opacity: 0; transform: scale(0.92) translateY(40px); }
          100% { opacity: 1; transform: scale(1) translateY(0); }
        }
        .animate-tw-pop { animation: tw-pop 0.32s cubic-bezier(.4,0,.2,1); }
        .tw-field-missing { background: #fef2f2; border: 1.5px solid #ef4444; border-radius: 0.375rem; padding: 0.25rem 0.5rem; color: #b91c1c; }
        .tw-success-anim { animation: tw-success-bounce 0.7s cubic-bezier(.4,0,.2,1); }
        @keyframes tw-success-bounce {
          0% { transform: scale(0.7); opacity: 0; }
          60% { transform: scale(1.15); opacity: 1; }
          80% { transform: scale(0.95); }
          100% { transform: scale(1); }
        }
      </style>
      <script>
        // Advanced Tailwind confirmation modal logic with animation, loading, thank you, accessibility, and keyboard support
        (function() {
          var form = document.getElementById('reservationForm');
          var showBtn = document.getElementById('showConfirmModal');
          var modal = document.getElementById('twConfirmModal');
          var panel = document.getElementById('twModalPanel');
          var closeBtn = document.getElementById('twCloseModal');
          var cancelBtn = document.getElementById('twCancelModal');
          var sendBtn = document.getElementById('twSendOrderBtn');
          var sendSpinner = document.getElementById('twSendSpinner');
          var summaryDiv = document.getElementById('twOrderSummary');
          var summaryHeader = document.getElementById('twOrderSummaryHeader');
          var checkIcon = document.getElementById('twCheckIcon');
          var modalTitle = document.getElementById('twModalTitle');
          var lastFocused = null;
          var thankYouTimeout = null;

          // Helper: focus trap
          function trapFocus(e) {
            if (!modal.classList.contains('hidden')) {
              if (e.key === 'Tab') {
                var focusable = modal.querySelectorAll('button, [tabindex]:not([tabindex="-1"])');
                focusable = Array.prototype.slice.call(focusable);
                var idx = focusable.indexOf(document.activeElement);
                if (e.shiftKey) {
                  if (idx <= 0) { e.preventDefault(); focusable[focusable.length-1].focus(); }
                } else {
                  if (idx === focusable.length-1) { e.preventDefault(); focusable[0].focus(); }
                }
              } else if (e.key === 'Escape') {
                hideModal();
              } else if (e.key === 'Enter' && !sendBtn.disabled) {
                sendBtn.click();
              }
            }
          }

          function showModal() {
            lastFocused = document.activeElement;
            modal.classList.remove('hidden');
            setTimeout(function() { panel.focus(); }, 100);
            document.body.style.overflow = 'hidden';
            document.addEventListener('keydown', trapFocus);
          }
          function hideModal() {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
            document.removeEventListener('keydown', trapFocus);
            if (lastFocused) lastFocused.focus();
            if (thankYouTimeout) { clearTimeout(thankYouTimeout); thankYouTimeout = null; }
            // Reset modal to default state
            sendBtn.disabled = false;
            sendBtn.classList.remove('opacity-60','cursor-not-allowed');
            sendSpinner.classList.add('hidden');
            sendBtn.innerHTML = '<?= $tr['send'] ?><span id="twSendSpinner" class="hidden ml-2 w-5 h-5 border-2 border-white border-t-green-500 rounded-full animate-spin"></span>';
            checkIcon.classList.remove('tw-success-anim');
            modalTitle.textContent = '<?= $tr['confirm_order'] ?>';
            summaryHeader.innerHTML = '';
          }

          // Click on dark background closes modal
          modal.addEventListener('mousedown', function(e) {
            if (e.target === modal) hideModal();
          });

          showBtn.addEventListener('click', function() {
            // Validate required fields
            var missing = [];
            ['first_name','last_name','email','phone','event_type','menu_package','event_date','location','attendees'].forEach(function(field) {
              var el = form[field];
              if (!el.value.trim()) missing.push(field);
            });
            // Header summary (event date and name)
            var eventDate = form.event_date.value;
            var name = form.first_name.value + (form.last_name.value ? ' ' + form.last_name.value : '');
            summaryHeader.innerHTML = (eventDate ? '<span class="inline-block mr-2"><span class="text-green-700">Event Date:</span> <span class="font-bold">' + eventDate + '</span></span>' : '') + (name.trim() ? '<span class="inline-block"><span class="text-green-700">Name:</span> <span class="font-bold">' + name + '</span></span>' : '');
            var summary = '';
            function fieldHtml(label, value, isMissing) {
              return '<div class="mb-2"><span class="font-semibold">' + label + ':</span> ' + (isMissing ? '<span class="tw-field-missing"><?= $tr['required'] ?></span>' : value) + '</div>';
            }
            summary += fieldHtml('<?= $tr['first_name'] ?>', form.first_name.value, missing.includes('first_name'));
            summary += fieldHtml('<?= $tr['last_name'] ?>', form.last_name.value, missing.includes('last_name'));
            summary += fieldHtml('<?= $tr['email'] ?>', form.email.value, missing.includes('email'));
            summary += fieldHtml('<?= $tr['phone'] ?>', form.phone.value, missing.includes('phone'));
            summary += fieldHtml('<?= $tr['event_type'] ?>', form.event_type.value, missing.includes('event_type'));
            summary += fieldHtml('<?= $tr['menu_package'] ?>', form.menu_package.value, missing.includes('menu_package'));
            summary += fieldHtml('<?= $tr['event_date'] ?>', form.event_date.value, missing.includes('event_date'));
            summary += fieldHtml('<?= $tr['location'] ?>', form.location.value, missing.includes('location'));
            summary += fieldHtml('<?= $tr['attendees'] ?>', form.attendees.value, missing.includes('attendees'));
            summary += fieldHtml('<?= $tr['health_issue'] ?>', form.health_issue.value, false);
            summary += fieldHtml('<?= $tr['message'] ?>', form.message.value, false);
            if (missing.length > 0) {
              summary += '<div class="text-red-600 font-semibold mt-2"><?= $tr['please_fill'] ?></div>';
              sendBtn.disabled = true;
              sendBtn.classList.add('opacity-60','cursor-not-allowed');
            } else {
              sendBtn.disabled = false;
              sendBtn.classList.remove('opacity-60','cursor-not-allowed');
            }
            summaryDiv.innerHTML = summary;
            showModal();
          });
          closeBtn.addEventListener('click', hideModal);
          cancelBtn.addEventListener('click', hideModal);
          sendBtn.addEventListener('click', function() {
            // Validate required fields again (in case user bypassed modal)
            var missing = [];
            ['first_name','last_name','email','phone','event_type','menu_package','event_date','location','attendees'].forEach(function(field) {
              var el = form[field];
              if (!el.value.trim()) missing.push(field);
            });
            if (missing.length > 0) {
              // Show error popout/modal for unsuccessful submission
              summaryDiv.innerHTML = '<div class="flex flex-col items-center justify-center py-4 font-[Lexend,sans-serif]">'
                + '<div class="w-20 h-20 mb-2 rounded-full flex items-center justify-center bg-gradient-to-br from-red-400 to-red-600 shadow-lg border-4 border-red-200 animate-tw-pop">'
                + '<svg width="56" height="56" fill="none" viewBox="0 0 56 56"><circle cx="28" cy="28" r="28" fill="#fff"/><path d="M16 28l8 8 16-16" stroke="#ef4444" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg>'
                + '</div>'
                + '<div class="text-red-700 font-bold text-xl mb-1"><?= $tr['unsuccessful'] ?></div>'
                + '<div class="text-gray-700 text-base mb-1"><?= $tr['please_fill'] ?></div>'
                + '<div class="text-red-900 font-semibold mb-2"><?= $tr['missing_fields'] ?>:</div>'
                + '<ul class="mb-2">' + missing.map(function(f){
                  var label = {
                    'first_name':'<?= $tr['first_name'] ?>','last_name':'<?= $tr['last_name'] ?>','email':'<?= $tr['email'] ?>','phone':'<?= $tr['phone'] ?>','event_type':'<?= $tr['event_type'] ?>','menu_package':'<?= $tr['menu_package'] ?>','event_date':'<?= $tr['event_date'] ?>','location':'<?= $tr['location'] ?>','attendees':'<?= $tr['attendees'] ?>'
                  }[f] || f;
                  return '<li class="text-red-600">'+label+'</li>';
                }).join('') + '</ul>'
                + '<button type="button" id="twErrorOkBtn" class="mt-4 px-8 py-2 bg-red-600 hover:bg-red-700 text-white font-bold rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-red-400 transition"><?= $tr['ok'] ?></button>'
                + '</div>';
              setTimeout(function(){
                var okBtn = document.getElementById('twErrorOkBtn');
                if (okBtn) okBtn.onclick = function(){ hideModal(); };
              }, 100);
              return;
            }
            // Prevent double submit
            sendBtn.disabled = true;
            sendBtn.classList.add('opacity-60','cursor-not-allowed');
            sendSpinner = document.getElementById('twSendSpinner');
            sendSpinner.classList.remove('hidden');
            sendBtn.childNodes[0].textContent = '<?= $tr['send'] ?>';
            // Animate check icon
            setTimeout(function() {
              sendSpinner.classList.add('hidden');
              checkIcon.classList.add('tw-success-anim');
              var firstName = form.first_name.value || '';
              modalTitle.textContent = '<?= $tr['order_submitted'] ?>';
              summaryHeader.innerHTML = '';
              summaryDiv.innerHTML = '<div class="flex flex-col items-center justify-center py-4 font-[Lexend,sans-serif]">'
                + '<div class="w-20 h-20 mb-2 rounded-full flex items-center justify-center bg-gradient-to-br from-green-400 to-green-600 shadow-lg border-4 border-green-200 animate-tw-pop">'
                + '<svg width="56" height="56" fill="none" viewBox="0 0 56 56"><circle cx="28" cy="28" r="28" fill="#fff"/><path d="M16 30l8 8 16-16" stroke="#22c55e" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg>'
                + '</div>'
                + '<div class="text-green-700 font-bold text-xl mb-1"><?= $tr['thank_you'] ?><?= $tr['thank_you'] ?><span class="font-bold">' + firstName + '</span></div>'
                + '<div class="text-gray-700 text-base mb-1"><?= $tr['success_msg'] ?></div>'
                + '<div class="text-green-900 font-semibold mb-2"><?= $tr['we_will_contact_you_soon'] ?><br><?= $tr['enjoy_your_event'] ?>!</div>'
                + '<a href="index.php" class="mt-2 inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg shadow transition focus:ring-2 focus:ring-green-400"><?= $tr['back_home'] ?></a>'
                + '<button type="button" id="twSuccessClose" class="absolute top-2 right-2 text-green-700 hover:text-green-900 text-2xl font-bold leading-none bg-white bg-opacity-80 rounded-full px-2 py-0.5 shadow focus:outline-none" aria-label="Close">&times;</button>'
                + '<button type="button" id="twSuccessOkBtn" class="mt-4 px-8 py-2 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-green-400 transition"><?= $tr['ok'] ?></button>'
                + '</div>';
              // Allow immediate close and OK button
              setTimeout(function(){
                var closeBtn = document.getElementById('twSuccessClose');
                if (closeBtn) closeBtn.onclick = function(){ hideModal(); };
                var okBtn = document.getElementById('twSuccessOkBtn');
                if (okBtn) okBtn.onclick = function(){ hideModal(); };
              }, 100);
              // Actually submit the form after thank you animation so order is saved
              setTimeout(function(){
                form.submit();
              }, 1500);
              // No auto-close, user must click OK or close
            }, 1200);
          });
        })();
      </script>
      </form>
    </div>
    <script>
      // Green overlay styling (same as index.php)
      const greenOverlay = document.getElementById('green-overlay');
      Object.assign(greenOverlay.style, {
        position: 'fixed',
        top: 0,
        left: 0,
        width: '100vw',
        height: '100vh',
        backgroundColor: 'rgba(0, 136, 14, 0.3)',
        zIndex: '1',
        pointerEvents: 'none',
      });
      // Animated background slideshow (copied from index.php)
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
    </script>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
