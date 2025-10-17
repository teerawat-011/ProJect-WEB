<?php
// Simple contact page — uses styles011.css from the site
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Contact Us</title>
  <link rel="stylesheet" href="Untitled-1.css">
  <link rel="stylesheet" href="styles011.css">
  <style>
    /* small page-scoped tweaks (kept here for simplicity) */
    /* page background & stacking
       - canvas (rain) is fixed at z-index:0
       - overlay dims it at z-index:1
       - content sits above at z-index:2+
    */
    body{ position: relative; min-height:100vh; }
    canvas#rainfall{ position:fixed; top:0; left:0; width:100%; height:100%; z-index:0; }
  /* overlay: no backdrop blur on contact page; use dark semi-opaque overlay so content remains clear */
  .bg-overlay{ position:fixed; inset:0; z-index:1; background: rgba(0,0,0,0.45); }

  /* contact cards: remove backdrop blur and use a solid/semi-transparent background for contrast */
  .contact-card{ background: rgba(0,0,0,0.62); border: 1px solid rgba(255,255,255,0.06); padding: 20px; border-radius: 12px; color: #fff; }

  .profile-card .preview{ width:100%; height:180px; border-radius:10px; overflow:hidden; background:rgba(0,0,0,0.35); display:flex; align-items:center; justify-content:center }
  .profile-card .preview img{ width:100%; height:100%; object-fit:cover }

    .contact-hero{
      padding: 80px 0 40px;
      text-align: center;
      color: #fff;
    }
    /* ensure content appears above the animated background */
    .contact-wrap{ max-width:1100px; margin: 0 auto; padding: 30px; display: grid; grid-template-columns: 1fr 360px; gap: 30px; position:relative; z-index:2; }
    .contact-form label{ display:block; margin:8px 0 4px; font-weight:600; }
    .contact-form input,.contact-form textarea{ width:100%; padding:10px; border-radius:8px; border:1px solid #333; background:#0b0b0b; color:#fff; }
    .contact-form textarea{ min-height:140px; resize:vertical }
    .btn-primary{ background: #3af1d6; color:#000; border:none; padding:12px 18px; border-radius:8px; font-weight:700; cursor:pointer; }
    .info-list{ display:flex; flex-direction:column; gap:12px }
    .info-item{ display:flex; gap:12px; align-items:flex-start }
    .info-item .icon{ width:44px; height:44px; border-radius:8px; background:#222; display:flex; align-items:center; justify-content:center; font-weight:700 }
    @media (max-width:900px){ .contact-wrap{ grid-template-columns: 1fr; } }
  </style>
</head>
<body>
  <!-- animated background canvas from login page + dim overlay -->
  <canvas id="rainfall"></canvas>
  <div class="bg-overlay" aria-hidden="true"></div>

  <header>
    <nav>
      <a href="homepage.php">Home</a>
      <a href="contact.php">Contacts</a>
      <a href="login.php">Login</a>
    </nav>
  </header>

  <section class="contact-hero">
    <h1 style="font-size:40px; margin:0 0 8px;">Get in touch</h1>
    <p style="opacity:0.9; max-width:760px; margin:0 auto">Have questions about our movies or need support? Send us a message and we'll respond as soon as possible.</p>
  </section>

  <main class="contact-wrap">
    <div class="contact-card contact-form">
      <form action="#" method="post">
        <label for="name">Your name</label>
        <input id="name" name="name" placeholder="Full name">

        <label for="email">Email</label>
        <input id="email" name="email" placeholder="name@example.com">

        <label for="message">Message</label>
        <textarea id="message" name="message" placeholder="Tell us how we can help..."></textarea>

        <div style="margin-top:12px;text-align:right">
          <button class="btn-pri mary" type="submit">Send message</button>
        </div>
      </form>
    </div>

    <aside>
      <div class="contact-card">
        <h3 style="margin-top:0">Contact information</h3>
        <div class="info-list">
          <div class="info-item"><div class="icon">A</div><div><strong>Address</strong><div style="opacity:0.9">nakhon si thammarat</div></div></div>
          <div class="info-item"><div class="icon">P</div><div><strong>Phone</strong><div style="opacity:0.9">0836053015</div></div></div>
          <div class="info-item"><div class="icon">E</div><div><strong>Email</strong><div style="opacity:0.9">6611256011@nstru.ac.th</div></div></div>
        </div>
      </div>

      <div style="margin-top:18px" class="contact-card">
        <h4 style="margin-top:0">Find us</h4>
        <!-- Lightweight placeholder map; replace src with your Google Maps embed if available -->
        <iframe width="100%" height="220" frameborder="0" style="border:0" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d829.6317799270846!2d99.86278073752945!3d8.458857684054482!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sth!2sth!4v1760657265393!5m2!1sth!2sth" allowfullscreen></iframe>
      </div>
    </aside>
  </main>

  <footer style="padding:24px;text-align:center;color:#999">© 2025 MovieSite — All rights reserved</footer>

  <script>
  // Rainfall animation (copied from login.php)
  const canvas = document.getElementById('rainfall');
  const ctx = canvas.getContext('2d');

  function resizeCanvas(){
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
  }
  resizeCanvas();
  window.addEventListener('resize', resizeCanvas);

  const raindrops = [];

  function createRaindrop() {
    const x = Math.random() * canvas.width;
    const y = -5;
    const speed = Math.random() * 5 + 2;
    const length = Math.random() * 20 + 10;

    raindrops.push({ x, y, speed, length });
  }

  function updateRaindrops() {
    for (let i = 0; i < raindrops.length; i++) {
      const raindrop = raindrops[i];

      raindrop.y += raindrop.speed;

      if (raindrop.y > canvas.height) {
        raindrops.splice(i, 1);
        i--;
      }
    }
  }

  function drawRaindrops() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    ctx.strokeStyle = 'rgba(255,255,255,0.9)';
    ctx.lineWidth = 2;

    for (let i = 0; i < raindrops.length; i++) {
      const raindrop = raindrops[i];

      ctx.beginPath();
      ctx.moveTo(raindrop.x, raindrop.y);
      ctx.lineTo(raindrop.x, raindrop.y + raindrop.length);
      ctx.stroke();
    }
  }

  function animate() {
    createRaindrop();
    updateRaindrops();
    drawRaindrops();

    requestAnimationFrame(animate);
  }

  animate();
  </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>