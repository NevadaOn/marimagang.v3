<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="robots" content="noindex, nofollow">
  <title>500 - Kesalahan Server Internal</title>
  <style>
    :root {
      --bg-color: #0b1f3a;;
      --text-color: #e6edf3;
      --muted-text: #8b949e;
      --primary: #58a6ff;
      --danger: #f85149;
      --btn-bg: #21262d;
      --btn-hover: #30363d;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: var(--bg-color);
      color: var(--text-color);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem;
    }

    .error-container {
      max-width: 600px;
      text-align: center;
    }

    .error-icon {
      width: 100px;
      height: 100px;
      margin: 0 auto 1.5rem;
      color: var(--danger);
      animation: pulse 2s infinite;
    }

    .error-code {
      font-size: 6rem;
      font-weight: bold;
      color: var(--danger);
    }

    .error-title {
      font-size: 1.75rem;
      margin-bottom: 1rem;
    }

    .error-message {
      font-size: 1rem;
      line-height: 1.6;
      color: var(--muted-text);
      margin-bottom: 2rem;
    }

    .btn-group {
      display: flex;
      justify-content: center;
      gap: 1rem;
      flex-wrap: wrap;
    }

    .btn {
      display: inline-block;
      padding: 0.75rem 1.5rem;
      text-decoration: none;
      border-radius: 6px;
      font-weight: 600;
      background: var(--btn-bg);
      color: var(--text-color);
      border: 1px solid #30363d;
      transition: background 0.3s ease, transform 0.2s ease;
    }

    .btn:hover {
      background: var(--btn-hover);
      transform: translateY(-2px);
    }

    .btn-primary {
      background: var(--primary);
      color: #fff;
      border: none;
    }

    .btn-primary:hover {
      background: #1f6feb;
    }

    @keyframes pulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.1); }
    }

    @media (max-width: 480px) {
      .error-code {
        font-size: 4rem;
      }

      .error-title {
        font-size: 1.4rem;
      }
    }
  </style>
</head>
<body>
  <div class="error-container">
    <div class="error-icon">
      <svg viewBox="0 0 24 24" fill="currentColor">
        <path d="M12 0C5.37 0 0 5.37 0 12s5.37 12 12 12 
          12-5.37 12-12S18.63 0 12 0zm0 22C6.48 22 2 17.52 
          2 12S6.48 2 12 2s10 4.48 10 10-4.48 10-10 10z"/>
        <path d="M11 6h2v7h-2zm0 8h2v2h-2z"/>
      </svg>
    </div>
    <div class="error-code">500</div>
    <h1 class="error-title">Kesalahan Server Internal</h1>
    <p class="error-message">
      Maaf, terjadi masalah pada server kami.<br>
      Tim teknis sedang menangani masalah ini.<br>
      Silakan coba lagi nanti.
    </p>
    <div class="btn-group">
      <a href="{{ url('/') }}" class="btn btn-primary">🏠 Kembali ke Beranda</a>
      <a href="javascript:location.reload()" class="btn">🔄 Coba Lagi</a>
    </div>
  </div>
</body>
</html>
