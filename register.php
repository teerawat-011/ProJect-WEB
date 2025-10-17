<?php
// Simple registration page - uses same font/style as login
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Create account</title>
    <link rel="stylesheet" href="Untitled-1.css">
    <style>
      /* Pin the form to the center of the viewport so it doesn't shift left/right */
      .login-page { width: 100%; max-width: 420px; }
      .login-page .form {
        position: fixed !important;
        top: 50% !important;
        left: 50% !important;
        transform: translate(-50%, -50%) !important;
        margin: 0 !important;
        box-shadow: 0 15px 25px rgba(0,0,0,.6);
        width: 420px;
        max-width: calc(100% - 32px);
      }
      /* On small screens, allow the form to sit closer to top to avoid being cut off */
      @media (max-width:480px){
        .login-page .form{ position: fixed !important; top: 12% !important; left: 50% !important; transform: translateX(-50%) !important; width: calc(100% - 32px); }
      }
    </style>
</head>
<body style="display:flex; align-items:center; justify-content:center; min-height:100vh;">
  <!-- animated background canvas -->
  <canvas id="rainfall"></canvas>
  <div class="bg-overlay" aria-hidden="true"></div>

  <div class="login-page">
    <div class="form" style="position:relative; z-index:2;">
      <h2>Create an account</h2>
      <form method="post" action="register_process.php">
        
        <input type="text" name="fname" placeholder="First name *" required />
        <input type="text" name="lname" placeholder="Last name *" required />
        <input type="text" name="username" placeholder="Username *" required />
        <input type="password" name="password" placeholder="Password *" required />
        <button class="btn" type="submit">Create account</button>
      </form>
      <p class="message">Already registered? <a href="login.php">Sign In</a></p>
    </div>
  </div>
</body>
</html>

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