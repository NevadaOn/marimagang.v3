<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>
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
            animation: bounceIn 1s ease-out;
        }

        .error-code {
            font-size: 10rem;
            font-weight: bold;
            margin-bottom: 1rem;
            text-shadow: 0 0 30px rgba(255, 255, 255, 0.5);
            animation: wobble 3s infinite;
        }

        .error-title {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            animation: fadeInUp 1s ease-out 0.5s both;
        }

        .error-message {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            animation: fadeInUp 1s ease-out 0.8s both;
        }

        .search-icon {
            width: 120px;
            height: 120px;
            margin: 0 auto 2rem;
            animation: searchAnimation 4s infinite;
        }

        .btn-group {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 1s ease-out 1.1s both;
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

        .floating-objects {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .object {
            position: absolute;
            color: rgba(255, 255, 255, 0.1);
            font-size: 2rem;
            animation: floatAround 8s linear infinite;
        }

        .object:nth-child(1) {
            left: 10%;
            animation-delay: 0s;
        }

        .object:nth-child(2) {
            left: 70%;
            animation-delay: 2s;
        }

        .object:nth-child(3) {
            left: 50%;
            animation-delay: 4s;
        }

        .object:nth-child(4) {
            left: 20%;
            animation-delay: 6s;
        }

        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: scale(0.3) translateY(-100px);
            }
            60% {
                opacity: 1;
                transform: scale(1.1) translateY(0);
            }
            100% {
                transform: scale(1) translateY(0);
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

        @keyframes wobble {
            0%, 100% {
                transform: rotate(0deg);
            }
            25% {
                transform: rotate(-3deg);
            }
            75% {
                transform: rotate(3deg);
            }
        }

        @keyframes searchAnimation {
            0%, 100% {
                transform: rotate(0deg) scale(1);
            }
            25% {
                transform: rotate(-10deg) scale(1.1);
            }
            50% {
                transform: rotate(0deg) scale(0.9);
            }
            75% {
                transform: rotate(10deg) scale(1.1);
            }
        }

        @keyframes floatAround {
            0% {
                transform: translateY(100vh) rotate(0deg);
            }
            100% {
                transform: translateY(-100px) rotate(360deg);
            }
        }

        @media (max-width: 768px) {
            .error-code {
                font-size: 7rem;
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
        }
    </style>
</head>
<body>
    <div class="floating-objects">
        <div class="object">🔍</div>
        <div class="object">📄</div>
        <div class="object">❓</div>
        <div class="object">🔍</div>
    </div>

    <div class="container">
        <div class="search-icon">
            <img src="{{ asset('img/logo-kominfo.png') }}" alt="kominfo" width="150px">
        </div>
        
        <div class="error-code">404</div>
        <h1 class="error-title">Halaman Tidak Ditemukan</h1>
        <p class="error-message">
            Ups! Halaman yang Anda cari sepertinya telah pindah atau tidak ada.<br>
            Mari kita bantu Anda menemukan jalan kembali.
        </p>
        
        <div class="btn-group">
            <a href="{{ url('/') }}" class="btn">Beranda</a>
            <a href="javascript:history.back()" class="btn">↩Kembali</a>
        </div>
    </div>
</body>
</html>