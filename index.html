<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Key Hôm Nay </title>
  <link rel="icon" href="https://i.imgur.com/WVEdeiz.jpeg">
  <style>
    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      overflow: hidden;
      font-family: "Segoe UI", sans-serif;
      background: linear-gradient(-45deg, #ff9a9e, #fad0c4, #fbc2eb, #a6c1ee);
      background-size: 400% 400%;
      animation: gradient 15s ease infinite;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #333;
    }
    @keyframes gradient {
      0% {background-position: 0% 50%;}
      50% {background-position: 100% 50%;}
      100% {background-position: 0% 50%;}
    }
    .card {
      background: rgba(255, 255, 255, 0.95);
      padding: 30px 40px;
      border-radius: 14px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.15);
      width: 90%;
      max-width: 400px;
      text-align: center;
      z-index: 2;
      position: relative;
    }
    .title {
      font-size: 26px;
      margin-bottom: 20px;
      color: #e91e63;
      font-weight: bold;
    }
    .key-box {
      font-size: 20px;
      background: #fff0f6;
      border-radius: 8px;
      padding: 12px 20px;
      display: inline-block;
      word-break: break-word;
    }
    .note {
      color: gray;
      margin-top: 10px;
      font-size: 14px;
    }
    .icon-face {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      margin-bottom: 15px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }
    .btn {
      margin-top: 15px;
      padding: 10px 16px;
      font-size: 14px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      background: #ff80ab;
      color: white;
      transition: 0.3s;
    }
    .btn:hover {
      background: #ec407a;
    }
    /* Sakura */
    .sakura {
      position: fixed;
      top: -50px;
      width: 25px;
      height: 25px;
      background-image: url('https://emojigraph.org/media/apple/cherry-blossom_1f338.png');
      background-size: cover;
      background-repeat: no-repeat;
      pointer-events: none;
      z-index: 0;
      animation: fall linear infinite;
    }
    @keyframes fall {
      0% { transform: translateY(0) rotate(0deg); opacity: 1; }
      100% { transform: translateY(110vh) rotate(360deg); opacity: 0; }
    }
    .countdown {
      font-size: 16px;
      color: #e91e63;
      margin-top: 10px;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <!-- Sakura rơi -->
  <div class="sakura" style="left: 18vw; animation-duration: 16s; animation-delay: 6s;"></div>
  <div class="sakura" style="left: 66vw; animation-duration: 14s; animation-delay: 10s;"></div>
  <div class="sakura" style="left: 21vw; animation-duration: 14s; animation-delay: 6s;"></div>
  <div class="sakura" style="left: 63vw; animation-duration: 12s; animation-delay: 2s;"></div>
  <div class="sakura" style="left: 11vw; animation-duration: 11s; animation-delay: 5s;"></div>
  <div class="sakura" style="left: 94vw; animation-duration: 19s; animation-delay: 7s;"></div>
  <div class="sakura" style="left: 31vw; animation-duration: 16s; animation-delay: 2s;"></div>
  <div class="sakura" style="left: 28vw; animation-duration: 10s; animation-delay: 6s;"></div>
  <div class="sakura" style="left: 41vw; animation-duration: 20s; animation-delay: 0s;"></div>
  <div class="sakura" style="left: 54vw; animation-duration: 11s; animation-delay: 5s;"></div>

  <div class="card">
    <img src="https://i.imgur.com/WVEdeiz.jpeg" class="icon-face" alt="face">
    <div class="title">🔑 Key của bạn</div>
    <div id="keyContent"></div>
  </div>

  <!-- Nhạc nền -->
  <audio id="bgm" autoplay loop>
    <source src="https://soicodoctool.x10.mx/444.mp3" type="audio/mpeg">
  </audio>

  <script>
    function copyKey() {
      const key = document.getElementById("keyBox").innerText;
      navigator.clipboard.writeText(key).then(() => {
        alert("Đã copy key!");
      });
    }
    const urlParams = new URLSearchParams(window.location.search);
    const key = urlParams.get('key');
    const keyContent = document.getElementById('keyContent');

    if (key) {
        const createdAt = new Date();
        const expireAt = new Date(createdAt.getTime() + 60 * 60 * 1000); // +1h

        keyContent.innerHTML = `
            <div class="key-box" id="keyBox">${key}</div>
            <button class="btn" onclick="copyKey()">📋 Copy Key</button>
            <div id="countdown" class="countdown"></div>
            <p class="note">Tạo lúc: ${createdAt.toLocaleString()}</p>
            <p class="note">Hết hạn: ${expireAt.toLocaleString()}</p>
        `;

        // Countdown
        const countdownEl = document.getElementById('countdown');
        setInterval(() => {
            const now = new Date().getTime();
            const distance = expireAt - now;
            if (distance <= 0) {
                countdownEl.innerText = "⛔ Đã hết hạn!";
                return;
            }
            const h = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const m = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const s = Math.floor((distance % (1000 * 60)) / 1000);
            countdownEl.innerText = `⌛ Còn lại: ${h}h ${m}m ${s}s`;
        }, 1000);
    } else {
        keyContent.innerHTML = `<div class="note">❌ Không có key được truyền!<br>Thêm <code>?key=...</code> vào URL</div>`;
    }
  </script>
</body>
</html>
