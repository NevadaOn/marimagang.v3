<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Kesalahan Server</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #fc4a1a 0%, #f7b733 100%);
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
            animation: errorShake 0.8s ease-out;
        }

        .error-code {
            font-size: 9rem;
            font-weight: bold;
            margin-bottom: 1rem;
            text-shadow: 0 0 25px rgba(255, 255, 255, 0.7);
            animation: glitch 2s infinite;
        }

        .error-title {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            animation: fadeInUp 1s ease-out 0.4s both;
        }

        .error-message {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            line-height: 1.6;
            animation: fadeInUp 1s ease-out 0.7s both;
        }

        .server-icon {
            width: 100px;
            height: 100px;
            margin: 0 auto 2rem;
            animation: serverError 2s infinite;
        }

        .btn-group {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 1s ease-out 1s both;
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
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .error-particles {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(255, 255, 255, 0.6);
            border-radius: 50%;
            animation: particleFloat 4s linear infinite;
        }

        .particle:nth-child(1) {
            left: 10%;
            animation-delay: 0s;
        }

        .particle:nth-child(2) {
            left: 30%;
            animation-delay: 0.5s;
        }

        .particle:nth-child(3) {
            left: 50%;
            animation-delay: 1s;
        }

        .particle:nth-child(4) {
            left: 70%;
            animation-delay: 1.5s;
        }

        .particle:nth-child(5) {
            left: 90%;
            animation-delay: 2s;
        }

        .loading-bar {
            width: 300px;
            height: 6px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
            margin: 2rem auto;
            overflow: hidden;
            animation: fadeInUp 1s ease-out 1.3s both;
        }

        .loading-progress {
            width: 0%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 3px;
            animation: loadingError 3s infinite;
        }

        @keyframes errorShake {
            0%, 100% {
                transform: translateX(0);
            }
            10%, 30%, 50%, 70%, 90% {
                transform: translateX(-5px);
            }
            20%, 40%, 60%, 80% {
                transform: translateX(5px);
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

        @keyframes glitch {
            0%, 100% {
                transform: scale(1) skew(0deg);
                filter: hue-rotate(0deg);
            }
            20% {
                transform: scale(1.02) skew(1deg);
                filter: hue-rotate(90deg);
            }
            40% {
                transform: scale(0.98) skew(-1deg);
                filter: hue-rotate(180deg);
            }
            60% {
                transform: scale(1.01) skew(0.5deg);
                filter: hue-rotate(270deg);
            }
            80% {
                transform: scale(0.99) skew(-0.5deg);
                filter: hue-rotate(360deg);
            }
        }

        @keyframes serverError {
            0%, 100% {
                transform: rotate(0deg) scale(1);
                filter: brightness(1);
            }
            25% {
                transform: rotate(-5deg) scale(1.1);
                filter: brightness(1.2);
            }
            50% {
                transform: rotate(0deg) scale(0.9);
                filter: brightness(0.8);
            }
            75% {
                transform: rotate(5deg) scale(1.1);
                filter: brightness(1.2);
            }
        }

        @keyframes particleFloat {
            0% {
                transform: translateY(100vh) scale(0);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) scale(1);
                opacity: 0;
            }
        }

        @keyframes loadingError {
            0% {
                width: 0%;
            }
            50% {
                width: 60%;
            }
            70% {
                width: 40%;
            }
            100% {
                width: 0%;
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
            .btn-group {
                flex-direction: column;
                align-items: center;
            }
            .loading-bar {
                width: 250px;
            }
        }
    </style>
</head>
<body>
    <div class="error-particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <div class="container">
        <div class="server-icon">
            <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M4,1C2.89,1 2,1.89 2,3V7C2,8.11 2.89,9 4,9H20C21.11,9 22,8.11 22,7V3C22,1.89 21.11,1 20,1H4M4,3H20V7H4V3M4,11C2.89,11 2,11.89 2,13V17C2,18.11 2.89,19 4,19H20C21.11,19 22,18.11 22,17V13C22,11.89 21.11,11 20,11H4M4,13H20V17H4V13M4,21C2.89,21 2,21.89 2,23V27C2,28.11 2.89,29 4,29H20C21.11,29 22,28.11 22,27V23C22,21.89 21.11,21 20,21H4M4,23H20V27H4V23Z"/>
                <circle cx="6" cy="5" r="1"/>
                <circle cx="6" cy="15" r="1"/>
                <circle cx="6" cy="25" r="1"/>
            </svg>
        </div>
        
        <div class="error-code">500</div>
        <h1 class="error-title">Kesalahan Server Internal</h1>
        <p class="error-message">
            Maaf, terjadi kesalahan pada server kami.<br>
            Tim teknis sedang bekerja untuk memperbaikinya.<br>
            Silakan coba lagi dalam beberapa saat.
        </p>
        
        <div class="loading-bar">
            <div class="loading-progress"></div>
        </div>
        
        <div class="btn-group">
            <a href="{{ url('/') }}" class="btn">🏠 Beranda</a>
            <a href="javascript:location.reload()" class="btn">🔄 Muat Ulang</a>
        </div>
    </div>
</body>
</html>