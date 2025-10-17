<!DOCTYPE html>
<html>
<head>
    <title>หน้าแรก  </title>
    <style>
        canvas {
            position: absolute;
            top: 0;
            left: 0;
        }
    </style>
</head>
<body>
    <canvas id="rainfall"></canvas>

    <script>
        const canvas = document.getElementById('rainfall');
        const ctx = canvas.getContext('2d');

        // Set canvas size to match window size
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        // Create an array to store the raindrops
        const raindrops = [];

        // Function to create a new raindrop
        function createRaindrop() {
            const x = Math.random() * canvas.width;
            const y = -5;
            const speed = Math.random() * 5 + 2;
            const length = Math.random() * 20 + 10;

            raindrops.push({ x, y, speed, length });
        }

        // Function to update the raindrops' positions
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

        // Function to draw the raindrops
        function drawRaindrops() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            ctx.strokeStyle = 'white';
            ctx.lineWidth = 2;

            for (let i = 0; i < raindrops.length; i++) {
                const raindrop = raindrops[i];

                ctx.beginPath();
                ctx.moveTo(raindrop.x, raindrop.y);
                ctx.lineTo(raindrop.x, raindrop.y + raindrop.length);
                ctx.stroke();
            }
        }

        // Function to animate the raindrops
        function animate() {
            createRaindrop();
            updateRaindrops();
            drawRaindrops();

            requestAnimationFrame(animate);
        }

        // Start the animation
        animate();
    </script>


   

        <link rel="stylesheet" href="Untitled-1.css">
        <div style="display:flex; align-items:center; justify-content:center; min-height:100vh;">
            <div class="login-page">
                <div class="form">
                    <?php
                    session_start();
                    $error = '';
                    if (!empty($_SESSION['login_error'])) {
                            $error = $_SESSION['login_error'];
                            unset($_SESSION['login_error']);
                    }
                    ?>
                    <?php if ($error): ?>
                        <div style="color:#ffdddd;background:rgba(255,0,0,0.12);padding:8px;border-radius:6px;margin-bottom:10px;text-align:center;">
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>

                    <form class="loginform" method="post" action="check_login.php">
                        <h2>Login</h2>
                        <input type="text" id="username" name="username" placeholder="username" required />
                        <input type="password" name="password" placeholder="password" required/>
                        <button class="btn" type="submit">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            Sign in
                        </button>
                        <p class="message">Not registered? <a href="register.php">Create an account</a></p>
                    </form>
                </div>
            </div>
        </div>


  </body>
</html>
            