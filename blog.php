<?php
// Load blog posts from JSON
$blogsFile = __DIR__ . '/frontend/db/blogs.json';
$blogs = file_exists($blogsFile) ? json_decode(file_get_contents($blogsFile), true) : [];
if (!is_array($blogs)) $blogs = [];
// Sort by date descending
usort($blogs, function($a, $b) { return strtotime($b['date']) - strtotime($a['date']); });

$lang = isset($_GET['lang']) && $_GET['lang'] === 'am' ? 'am' : 'en';
$tr = [
  'en' => [
    'title' => 'Blog',
    'hero_desc' => 'Read our latest news, tips, and stories.',
    'no_posts' => 'No blog posts yet.',
    'like' => 'Like/Unlike',
    'comment' => 'Comment',
    'share' => 'Share',
    'read_more' => 'Read More',
    'modal_post' => 'Blog Post',
    'modal_comments' => 'Comments',
    'no_comments' => 'No comments yet.',
    'add_comment' => 'Add Comment',
    'your_name' => 'Your name',
    'your_comment' => 'Your comment',
    'add_comment_btn' => 'Add Comment',
    'find_us' => 'Find Us',
  ],
  'am' => [
    'title' => 'ብሎግ',
    'hero_desc' => 'የእኛን የቅርብ ጊዜ ዜናዎች፣ ምክሮች እና ታሪኮች ያንብቡ።',
    'no_posts' => 'ምንም የብሎግ ልጥፎች አልተጨመሩም።',
    'like' => 'ውደድ/አውድ',
    'comment' => 'አስተያየት',
    'share' => 'አጋራ',
    'read_more' => 'ተጨማሪ ያንብቡ',
    'modal_post' => 'የብሎግ ልጥፍ',
    'modal_comments' => 'አስተያየቶች',
    'no_comments' => 'ምንም አስተያየት የለም።',
    'add_comment' => 'አስተያየት ያክሉ',
    'your_name' => 'ስምዎ',
    'your_comment' => 'አስተያየትዎ',
    'add_comment_btn' => 'አስተያየት ያክሉ',
    'find_us' => 'አካባቢያችንን ያግኙ',
  ]
];
$tr = $tr[$lang];
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $tr['title'] ?> - YOK Catering</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="frontend/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    .blog-hero {
      background: linear-gradient(135deg, rgba(0, 102, 0, 0.9) 0%, rgba(255, 0, 0, 0.8) 100%);
      padding: 120px 0 80px;
      position: relative;
      overflow: hidden;
    }
    .blog-hero::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: url('frontend/img/home1.jpg') center/cover;
      opacity: 0.1;
      z-index: 1;
    }
    .blog-hero-content {
      position: relative;
      z-index: 2;
      text-align: center;
      color: white;
    }
    .blog-hero h1 {
      font-size: 3.5rem;
      font-weight: 700;
      margin-bottom: 1rem;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }
    .blog-hero p {
      font-size: 1.25rem;
      opacity: 0.95;
      max-width: 600px;
      margin: 0 auto;
    }
    .blog-section {
      padding: 80px 0;
      background: white;
    }
    .modern-blog-row {
      display: flex;
      flex-direction: row;
      gap: 0;
      background: #fff;
      border-radius: 1.2rem;
      box-shadow: 0 4px 24px rgba(0,102,0,0.10);
      border: 2px solid #006600;
      margin-bottom: 2.5rem;
      overflow: hidden;
      min-height: 240px;
      position: relative;
    }
    .modern-blog-media {
      flex: 0 0 320px;
      max-width: 320px;
      min-width: 220px;
      background: #f8f8f8;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }
    .modern-blog-media img, .modern-blog-media video {
      width: 100%;
      height: 240px;
      object-fit: cover;
      border-radius: 0;
      display: block;
    }
    .modern-blog-media .media-nav {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      width: 100%;
      display: flex;
      justify-content: space-between;
      pointer-events: none;
    }
    .modern-blog-media .media-nav button {
      background: rgba(255,255,255,0.8);
      border: none;
      border-radius: 50%;
      width: 36px;
      height: 36px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.3rem;
      color: #006600;
      pointer-events: auto;
      transition: background 0.18s;
    }
    .modern-blog-media .media-nav button:hover {
      background: #ff0000;
      color: #fff;
    }
    .modern-blog-content {
      flex: 1 1 0%;
      padding: 2rem 2.2rem 1.2rem 2.2rem;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .modern-blog-title {
      font-family: 'Lexend', 'Oswald', Arial, sans-serif;
      font-weight: 700;
      color: #006600;
      font-size: 1.35rem;
      margin-bottom: 0.4rem;
      margin-top: 0.2rem;
    }
    .modern-blog-date {
      color: #888;
      font-size: 0.98rem;
      margin-bottom: 0.3rem;
    }
    .modern-blog-desc {
      color: #333;
      font-size: 1.08rem;
      min-height: 38px;
      margin-bottom: 0.7rem;
    }
    .blog-action-bar {
      display: flex;
      align-items: center;
      gap: 1.2rem;
      margin-top: 1.2rem;
    }
    .blog-action-bar button {
      background: none;
      border: none;
      outline: none;
      box-shadow: none;
      font-size: 1.3rem;
      margin-right: 0.2rem;
      transition: color 0.18s;
    }
    .blog-action-bar .like-btn:hover { color: #e74c3c !important; }
    .blog-action-bar .comment-btn:hover { color: #007bff !important; }
    .blog-action-bar .share-btn:hover { color: #27ae60 !important; }
    .blog-action-bar .readmore-btn:hover { color: #ff9900 !important; }
    .like-count, .comment-count {
      text-decoration: none !important;
      font-weight: 600;
      font-size: 1.08em;
      transition: transform 0.18s;
      display: inline-block;
    }
    .like-count.animated {
      animation: popCount 0.4s;
    }
    @keyframes popCount {
      0% { transform: scale(1); }
      40% { transform: scale(1.4); }
      60% { transform: scale(0.85); }
      100% { transform: scale(1); }
    }
    .like-btn .fa-heart.pulse {
      animation: heartPulse 0.5s;
    }
    @keyframes heartPulse {
      0% { transform: scale(1); color: #e74c3c; }
      30% { transform: scale(1.3); color: #ff0000; }
      60% { transform: scale(0.9); color: #e74c3c; }
      100% { transform: scale(1); color: #e74c3c; }
    }
    .like-btn .fa-heart.burst {
      animation: heartBurst 0.7s;
    }
    @keyframes heartBurst {
      0% { filter: drop-shadow(0 0 0 #ff0000); }
      50% { filter: drop-shadow(0 0 12px #ff0000); }
      100% { filter: drop-shadow(0 0 0 #ff0000); }
    }
    .comment-btn .fa-comment.bounce {
      animation: commentBounce 0.5s;
    }
    @keyframes commentBounce {
      0% { transform: scale(1); }
      30% { transform: scale(1.2) rotate(-10deg); }
      60% { transform: scale(0.9) rotate(10deg); }
      100% { transform: scale(1) rotate(0deg); }
    }
    .confetti {
      position: absolute;
      pointer-events: none;
      z-index: 99;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      font-size: 2.2rem;
      opacity: 0.85;
      animation: confetti-fall 0.9s forwards;
    }
    @keyframes confetti-fall {
      0% { opacity: 1; transform: translate(-50%, -50%) scale(1); }
      80% { opacity: 1; }
      100% { opacity: 0; transform: translate(-50%, -120%) scale(1.7); }
    }
    @media (max-width: 900px) {
      .modern-blog-row { flex-direction: column; }
      .modern-blog-media, .modern-blog-media img, .modern-blog-media video { max-width: 100%; width: 100%; height: 220px; }
      .modern-blog-content { padding: 1.2rem 1.2rem 1rem 1.2rem; }
    }
    @media (max-width: 600px) {
      .modern-blog-content { padding: 0.8rem 0.5rem 0.7rem 0.5rem; }
      .modern-blog-title { font-size: 1.1rem; }
    }
  </style>
</head>
<body class="blog-page">
  <?php include 'navbar.php'; ?>
  <!-- Blog Hero Section -->
  <section class="blog-hero">
    <div class="container">
      <div class="blog-hero-content">
        <h1><?= $tr['title'] ?></h1>
        <p><?= $tr['hero_desc'] ?></p>
      </div>
    </div>
  </section>
  <section class="blog-section">
    <div class="container">
      <?php
      if (empty($blogs)) {
        echo '<div class="alert alert-info my-4">' . $tr['no_posts'] . '</div>';
      } else {
        foreach ($blogs as $i => $blog) {
          // Support multiple images/videos as arrays, fallback to single
          $media = [];
          if (!empty($blog['images']) && is_array($blog['images'])) {
            $media = $blog['images'];
          } elseif (!empty($blog['image'])) {
            $media[] = $blog['image'];
          }
          if (!empty($blog['videos']) && is_array($blog['videos'])) {
            $media = array_merge($media, $blog['videos']);
          } elseif (!empty($blog['video'])) {
            $media[] = $blog['video'];
          }
          if (empty($media)) {
            $media[] = 'frontend/img/home1.jpg';
          }
          $excerpt = mb_substr(strip_tags($blog['content']), 0, 180);
          if (mb_strlen(strip_tags($blog['content'])) > 180) $excerpt .= '...';
          $likeCount = isset($blog['likes']) ? (int)$blog['likes'] : 0;
          $commentCount = isset($blog['comments']) && is_array($blog['comments']) ? count($blog['comments']) : 0;
          echo '<div class="modern-blog-row mb-4">';
          // Media area
          echo '<div class="modern-blog-media position-relative">';
          echo '<div class="media-carousel" data-media-index="0" data-blog-index="' . $i . '">';
          $firstMedia = $media[0];
          $isVideo = preg_match('/\.(mp4|webm|ogg|mov)$/i', $firstMedia);
          if ($isVideo) {
            echo '<video controls><source src="' . htmlspecialchars($firstMedia) . '"></video>';
          } else {
            echo '<img src="' . htmlspecialchars($firstMedia) . '" alt="Blog Media" />';
          }
          echo '</div>';
          if (count($media) > 1) {
            echo '<div class="media-nav">';
            echo '<button class="media-prev" data-blog-index="' . $i . '" title="Previous"><i class="fa fa-chevron-left"></i></button>';
            echo '<button class="media-next" data-blog-index="' . $i . '" title="Next"><i class="fa fa-chevron-right"></i></button>';
            echo '</div>';
          }
          echo '</div>';
          // Content area
          echo '<div class="modern-blog-content">';
          echo '<div>';
          echo '<div class="modern-blog-title">' . htmlspecialchars($blog['title']) . '</div>';
          echo '<div class="modern-blog-date">' . htmlspecialchars($blog['date']) . '</div>';
          echo '<div class="modern-blog-desc">' . nl2br(htmlspecialchars($excerpt)) . '</div>';
          echo '</div>';
          // Action bar
          echo '<div class="blog-action-bar mt-3">';
          echo '<button class="btn btn-link p-0 text-danger like-btn" data-blog-id="' . htmlspecialchars($blog['id']) . '" title="' . $tr['like'] . '"><i class="fa fa-heart fa-lg"></i> <span class="like-count" style="text-decoration:none;">' . $likeCount . '</span></button>';
          echo '<button class="btn btn-link p-0 text-primary comment-btn" data-blog-id="' . htmlspecialchars($blog['id']) . '" title="' . $tr['comment'] . '"><i class="fa fa-comment fa-lg"></i> <span class="comment-count" style="text-decoration:none;">' . $commentCount . '</span></button>';
          echo '<button class="btn btn-link p-0 text-success share-btn" title="' . $tr['share'] . '"><i class="fa fa-share fa-lg"></i></button>';
          echo '<button class="btn btn-link p-0 text-warning readmore-btn" data-bs-toggle="modal" data-bs-target="#blogModal" data-blog-index="' . $i . '" title="' . $tr['read_more'] . '"><i class="fa fa-book-open fa-lg"></i></button>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
      }
      ?>
    </div>
  </section>
  <!-- Blog Post Modal -->
  <div class="modal fade" id="blogModal" tabindex="-1" aria-labelledby="blogModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="blogModalLabel"><?= $tr['modal_post'] ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="blogModalBody">
          <!-- Content will be loaded by JS -->
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="commentModalLabel"><?= $tr['modal_comments'] ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="commentModalBody">
          <!-- Comments will be loaded by JS -->
        </div>
      </div>
    </div>
  </div>
  <?php include 'footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
  const blogs = <?php echo json_encode($blogs); ?>;
  // Like button logic with persistent like/unlike and confetti
  document.addEventListener('click', function(e) {
    if (e.target.closest('.like-btn')) {
      const btn = e.target.closest('.like-btn');
      const blogId = btn.getAttribute('data-blog-id');
      const icon = btn.querySelector('i');
      const countSpan = btn.querySelector('.like-count');
      const liked = localStorage.getItem('liked_' + blogId) === '1';
      icon.classList.remove('pulse', 'burst');
      countSpan.classList.remove('animated');
      if (!liked) {
        icon.classList.add('pulse');
        icon.classList.add('fas');
        icon.classList.remove('far');
        localStorage.setItem('liked_' + blogId, '1');
      } else {
        icon.classList.add('pulse');
        icon.classList.remove('fas');
        icon.classList.add('far');
        localStorage.setItem('liked_' + blogId, '0');
      }
      fetch('admin/blog_like.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'id=' + encodeURIComponent(blogId) + '&unlike=' + (liked ? '1' : '0')
      })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          countSpan.textContent = data.likes;
          countSpan.classList.add('animated');
          if (!liked) {
            icon.classList.add('burst');
            showConfetti(btn);
          }
        }
        setTimeout(() => {
          icon.classList.remove('pulse', 'burst');
          countSpan.classList.remove('animated');
        }, 700);
      });
    }
    // Comment button logic (unchanged)
    if (e.target.closest('.comment-btn')) {
      const btn = e.target.closest('.comment-btn');
      const blogId = btn.getAttribute('data-blog-id');
      const icon = btn.querySelector('i');
      icon.classList.add('bounce');
      showCommentModal(blogId);
      setTimeout(() => icon.classList.remove('bounce'), 600);
    }
  });
  // On page load, set heart icon style based on localStorage
  document.querySelectorAll('.like-btn').forEach(btn => {
    const blogId = btn.getAttribute('data-blog-id');
    const liked = localStorage.getItem('liked_' + blogId) === '1';
    const icon = btn.querySelector('i');
    if (liked) {
      icon.classList.remove('far');
      icon.classList.add('fas');
    } else {
      icon.classList.remove('fas');
      icon.classList.add('far');
    }
  });
  // Confetti/burst effect
  function showConfetti(btn) {
    for (let i = 0; i < 12; i++) {
      const conf = document.createElement('span');
      conf.className = 'confetti';
      conf.textContent = ['💖','💚','💛','💙','💜','🧡','✨','⭐','🎉','🎊'][i%10];
      conf.style.left = (50 + Math.random()*20-10) + '%';
      conf.style.top = (50 + Math.random()*20-10) + '%';
      conf.style.fontSize = (1.5 + Math.random()) + 'rem';
      btn.appendChild(conf);
      setTimeout(() => conf.remove(), 900);
    }
  }
  // Show comment modal and load comments
  function showCommentModal(blogId) {
    const blog = blogs.find(b => b.id === blogId);
    let html = '';
    html += `<div class='mb-3'><strong>${blog.title}</strong></div>`;
    html += '<div class="mb-3" id="comment-list">';
    if (blog.comments && blog.comments.length) {
      blog.comments.forEach(c => {
        html += `<div class='border rounded p-2 mb-2'><b>${c.name}</b> <span class='text-muted' style='font-size:0.9em;'>${c.date}</span><br>${c.text}</div>`;
      });
    } else {
      html += '<div class="text-muted"><?= $tr['no_comments'] ?></div>';
    }
    html += '</div>';
    html += `<form id='add-comment-form' class='mt-3'>
      <input type='hidden' name='id' value='${blogId}'>
      <div class='mb-2'><input type='text' name='name' class='form-control' placeholder='<?= $tr['your_name'] ?>' maxlength='32'></div>
      <div class='mb-2'><textarea name='text' class='form-control' placeholder='<?= $tr['your_comment'] ?>' required maxlength='300'></textarea></div>
      <button type='submit' class='btn btn-primary'><?= $tr['add_comment_btn'] ?></button>
    </form>`;
    document.getElementById('commentModalBody').innerHTML = html;
    new bootstrap.Modal(document.getElementById('commentModal')).show();
    // Add comment form handler
    document.getElementById('add-comment-form').onsubmit = function(ev) {
      ev.preventDefault();
      const form = ev.target;
      fetch('admin/blog_comment.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: new URLSearchParams(new FormData(form)).toString()
      })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          // Update comment list and counter
          const commentList = document.getElementById('comment-list');
          commentList.innerHTML = '';
          data.comments.forEach(c => {
            commentList.innerHTML += `<div class='border rounded p-2 mb-2'><b>${c.name}</b> <span class='text-muted' style='font-size:0.9em;'>${c.date}</span><br>${c.text}</div>`;
          });
          // Update counter in main card
          document.querySelectorAll('.comment-btn[data-blog-id="' + blogId + '"] .comment-count').forEach(span => span.textContent = data.comments.length);
          form.reset();
        }
      });
    };
  }
  // Media carousel logic
  document.querySelectorAll('.media-nav').forEach(function(nav) {
    const blogIdx = nav.querySelector('.media-prev').getAttribute('data-blog-index');
    const mediaCarousel = document.querySelector('.media-carousel[data-blog-index="' + blogIdx + '"]');
    let media = [];
    if (blogs[blogIdx].images && Array.isArray(blogs[blogIdx].images)) media = blogs[blogIdx].images;
    else if (blogs[blogIdx].image) media.push(blogs[blogIdx].image);
    if (blogs[blogIdx].videos && Array.isArray(blogs[blogIdx].videos)) media = media.concat(blogs[blogIdx].videos);
    else if (blogs[blogIdx].video) media.push(blogs[blogIdx].video);
    if (media.length < 2) return;
    let idx = 0;
    nav.querySelector('.media-prev').onclick = function(e) {
      e.preventDefault();
      idx = (idx - 1 + media.length) % media.length;
      updateMedia();
    };
    nav.querySelector('.media-next').onclick = function(e) {
      e.preventDefault();
      idx = (idx + 1) % media.length;
      updateMedia();
    };
    function updateMedia() {
      const m = media[idx];
      const isVideo = /\.(mp4|webm|ogg|mov)$/i.test(m);
      mediaCarousel.innerHTML = isVideo ?
        `<video controls><source src="${m}"></video>` :
        `<img src="${m}" alt="Blog Media" />`;
    }
  });
  // Modal logic (same as before)
  const modalBody = document.getElementById('blogModalBody');
  const modalLabel = document.getElementById('blogModalLabel');
  document.addEventListener('click', function(e) {
    if (e.target && e.target.matches('[data-bs-target="#blogModal"]')) {
      const idx = e.target.getAttribute('data-blog-index');
      const blog = blogs[idx];
      let html = '';
      // Show all media in modal
      let media = [];
      if (blog.images && Array.isArray(blog.images)) media = blog.images;
      else if (blog.image) media.push(blog.image);
      if (blog.videos && Array.isArray(blog.videos)) media = media.concat(blog.videos);
      else if (blog.video) media.push(blog.video);
      if (media.length === 0) media.push('frontend/img/home1.jpg');
      media.forEach(function(m) {
        const isVideo = /\.(mp4|webm|ogg|mov)$/i.test(m);
        if (isVideo) {
          html += `<video controls style="width:100%;max-height:340px;" class="mb-3"><source src="${m}"></video>`;
        } else {
          html += `<img src="${m}" alt="Blog Image" class="img-fluid rounded mb-3" style="max-height:340px;object-fit:cover;width:100%;">`;
        }
      });
      html += `<h3 class="mb-2">${blog.title}</h3>`;
      html += `<div class="text-muted mb-2">${blog.date}</div>`;
      html += `<div class="mb-2">${blog.content.replace(/\n/g, '<br>')}</div>`;
      modalBody.innerHTML = html;
      modalLabel.textContent = blog.title;
    }
  });
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
</body>
</html> 