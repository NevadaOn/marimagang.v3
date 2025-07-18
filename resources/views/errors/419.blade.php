<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>419 - Halaman Kedaluwarsa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #5fc4ff 0%, #4080bb 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }
        .container {
            text-align: center;
            color: white;
            z-index: 10;
            animation: slideInDown 0.8s ease-out;
        }

        .error-code {
            font-size: 8rem;
            font-weight: bold;
            margin-bottom: 1rem;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
            animation: tickTock 2s infinite;
        }

        .error-title {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            animation: fadeInUp 1s ease-out 0.3s both;
        }

        .error-message {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            line-height: 1.6;
            animation: fadeInUp 1s ease-out 0.6s both;
        }

        .clock-icon {
            width: 100px;
            height: 100px;
            margin: 0 auto 2rem;
            animation: clockSpin 4s linear infinite;
        }

        .countdown {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            padding: 15px 25px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50px;
            backdrop-filter: blur(10px);
            display: inline-block;
            animation: fadeInUp 1s ease-out 0.9s both;
        }

        .btn-group {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 1s ease-out 1.2s both;
        }

        .btn {
            display: inline-block;
            padding: 15px 25px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            font-weight: 600;
        }

        .btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .time-particles {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .time-particle {
            position: absolute;
            color: rgba(255, 255, 255, 0.3);
            font-size: 1.5rem;
            animation: timeFloat 6s linear infinite;
        }

        .time-particle:nth-child(1) {
            left: 15%;
            animation-delay: 0s;
        }

        .time-particle:nth-child(2) {
            left: 35%;
            animation-delay: 1s;
        }

        .time-particle:nth-child(3) {
            left: 55%;
            animation-delay: 2s;
        }

        
        .time-particle:nth-child(4) {
            left: 75%;
            animation-delay: 3s;
        }

        .time-particle:nth-child(5) {
            left: 85%;
            animation-delay: 4s;
        }

        .progress-ring {
            width: 150px;
            height: 150px;
            margin: 0 auto 2rem;
            position: relative;
            animation: fadeInUp 1s ease-out 1.5s both;
        }

        .progress-ring svg {
            width: 100%;
            height: 100%;
            transform: rotate(-90deg);
        }

        .progress-ring circle {
            fill: none;
            stroke: rgba(255, 255, 255, 0.3);
            stroke-width: 4;
        }

        .progress-ring .progress {
            stroke: rgba(255, 255, 255, 0.8);
            stroke-dasharray: 377;
            stroke-dashoffset: 377;
            animation: progressCount 5s linear infinite;
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes tickTock {
            0%, 100% {
                transform: rotate(0deg);
            }
            25% {
                transform: rotate(-2deg);
            }
            75% {
                transform: rotate(2deg);
            }
        }

        @keyframes clockSpin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes timeFloat {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }

        @keyframes progressCount {
            0% {
                stroke-dashoffset: 377;
            }
            100% {
                stroke-dashoffset: 0;
            }
        }

        @media (max-width: 768px) {
            .error-code {
                font-size: 6rem;
            }
            .error-title {
                font-size: 2rem;
            }
            .error-message {
                font-size: 1rem;
                padding: 0 1rem;
            }
            .countdown {
                font-size: 1.2rem;
            }
            .btn-group {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <div class="time-particles">
        <div class="time-particle">⏰</div>
        <div class="time-particle">🕐</div>
        <div class="time-particle">⏳</div>
        <div class="time-particle">🕒</div>
        <div class="time-particle">⌛</div>
    </div>

    <div class="container">
        <div class="clock-icon">
            <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M16.2,16.2L11,13V7H12.5V12.2L17,14.9L16.2,16.2Z"/>
            </svg>
        </div>
        
        <div class="error-code">419</div>
        <h1 class="error-title">Sesi Telah Berakhir</h1>
        <p class="error-message">
            Maaf, sesi Anda telah kedaluwarsa karena alasan keamanan.<br>
            Hal ini terjadi ketika halaman tidak digunakan dalam waktu lama<br>
            atau token keamanan telah habis masa berlakunya.
        </p>
        
        <div class="progress-ring">
            <svg>
                <circle cx="75" cy="75" r="60"></circle>
                <circle cx="75" cy="75" r="60" class="progress"></circle>
            </svg>
        </div>
        
        <div class="countdown">
            <span id="countdown-text">Memuat ulang otomatis dalam 10 detik...</span>
        </div>
        
        <div class="btn-group">
            <a href="{{ url('/') }}" class="btn">Beranda</a>
            <a href="javascript:location.reload()" class="btn">Muat Ulang</a>
        </div>
    </div>

    <script>
        let countdown = 10;
        const countdownElement = document.getElementById('countdown-text');
        
        const timer = setInterval(() => {
            countdown--;
            countdownElement.textContent = `Memuat ulang otomatis dalam ${countdown} detik...`;
            
            if (countdown <= 0) {
                clearInterval(timer);
                location.reload();
            }
        }, 1000);
    </script>
</body>
</html>