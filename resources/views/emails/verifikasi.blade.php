<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email - Sistem Magang</title>
    <style>
        body, table, td, p, h1, h2, h3 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, Arial, sans-serif;
        }
        
        body {
            margin: 0;
            padding: 0;
            background-color: #f0f8ff;
            line-height: 1.6;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        
        .email-wrapper {
            width: 100%;
            background-color: #f0f8ff;
            padding: 20px 0;
        }
        
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            /* Simplified shadow */
            border: 1px solid #e0e0e0;
        }
        
        .header {
            background-color: #5bc2ff;
            background-image: linear-gradient(135deg, #5bc2ff 0%, #001246 100%);
            padding: 30px 20px 40px;
            text-align: center;
            color: white;
        }
        
        .logo-container {
            margin-bottom: 20px;
        }
        
        .logo {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.3);
            padding: 5px;
        }
        
        .header h1 {
            color: white;
            font-size: 24px;
            font-weight: bold;
            margin: 10px 0 5px 0;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }
        
        .header-link {
            color: #f9fafb;
            text-decoration: none;
            font-size: 14px;
        }
        
        .content {
            padding: 30px 20px;
        }
        
        .greeting {
            font-size: 22px;
            font-weight: bold;
            color: #1f2937;
            margin: 0 0 20px 0;
        }
        
        .message {
            font-size: 16px;
            color: #4b5563;
            margin: 0 0 20px 0;
            line-height: 1.6;
        }
        
        .verification-section {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 25px;
            text-align: center;
            margin: 25px 0;
        }
        
        .verify-button {
            display: inline-block;
            background-color: #2563eb;
            color: white !important;
            text-decoration: none;
            padding: 14px 28px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border: 2px solid #1d4ed8;
        }
        
        .verify-button:hover {
            background-color: #1d4ed8;
        }
        
        .security-note {
            background-color: #fef3c7;
            border: 1px solid #fbbf24;
            border-radius: 6px;
            padding: 15px;
            margin: 25px 0;
        }
        
        .security-note p {
            margin: 0;
            color: #92400e;
            font-size: 14px;
        }
        
        .warning-icon {
            color: #f59e0b;
            font-weight: bold;
            margin-right: 5px;
        }
        
        /* Alternative link */
        .alternative-link {
            background-color: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            padding: 15px;
            margin: 20px 0;
            font-size: 14px;
            color: #6b7280;
        }
        
        .alternative-link p {
            margin: 0 0 8px 0;
            color: #2d2d2d;
        }
        
        .url-code {
            background-color: #e5e7eb;
            padding: 8px;
            border-radius: 4px;
            font-family: 'Courier New', Consolas, monospace;
            font-size: 12px;
            word-break: break-all;
            display: block;
            margin-top: 5px;
        }
        
        .footer {
            background-color: #f8fafc;
            padding: 25px 20px;
            border-top: 1px solid #e5e7eb;
        }
        
        .footer-content {
            text-align: center;
        }
        
        .company-info {
            margin-bottom: 20px;
        }
        
        .company-name {
            font-size: 16px;
            font-weight: bold;
            color: #1f2937;
            margin: 0 0 5px 0;
        }
        
        .company-tagline {
            font-size: 14px;
            color: #6b7280;
            margin: 0;
        }
        
        .contact-info {
            font-size: 14px;
            color: #6b7280;
            margin: 15px 0;
        }
        
        .divider {
            height: 1px;
            background-color: #e5e7eb;
            margin: 20px 0;
        }
        
        .footer-links {
            font-size: 14px;
            color: #6b7280;
        }
        
        .footer-links a {
            color: #2563eb;
            text-decoration: none;
            margin: 0 5px;
        }
        
        @media only screen and (max-width: 600px) {
            .email-container {
                margin: 10px;
                border-radius: 8px;
            }
            
            .header,
            .content,
            .footer {
                padding: 20px 15px;
            }
            
            .header h1 {
                font-size: 20px;
            }
            
            .greeting {
                font-size: 18px;
            }
            
            .verification-section {
                padding: 20px 15px;
            }
            
            .verify-button {
                padding: 12px 24px;
                font-size: 14px;
            }
        }
        
        @media (prefers-color-scheme: dark) {
            .email-container {
                background-color: #ffffff;
            }
        }
    </style>
</head>
<body>
    <table role="presentation" class="email-wrapper" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td align="center">
                <table role="presentation" class="email-container" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td class="header">
                            <div class="logo-container">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Logo_Kabupaten_Malang_-_Seal_of_Malang_Regency.svg/500px-Logo_Kabupaten_Malang_-_Seal_of_Malang_Regency.svg.png" 
                                     alt="Logo Kominfo" 
                                     class="logo"
                                     style="display: block; margin: 0 auto;">
                            </div>
                            <h1>Diskominfo Kabupaten Malang</h1>
                            <a href="https://MariMagang.malangkab.go.id" class="header-link" style="color: #e5e7eb">MariMagang.malangkab.go.id</a>
                        </td>
                    </tr>
                    
                    <!-- Content -->
                    <tr>
                        <td class="content">
                            <h2 class="greeting">Selamat datang, {{ $nama }}!</h2>
                            
                            <p class="message">
                                Terima kasih telah bergabung dengan <strong>Program Magang Diskominfo Kab.Malang</strong>.
                            </p>
                            
                            <p class="message">
                                Untuk memastikan keamanan akun Anda dan mengaktifkan semua fitur platform, silakan verifikasi alamat email Anda dengan mengklik tombol di bawah ini:
                            </p>
                            
                            <div class="verification-section">
                                <a href="{{ $url }}" class="verify-button">
                                    Verifikasi Email Saya
                                </a>
                            </div>
                            
                            <div class="security-note">
                                <p><span class="warning-icon">⚠</span><strong>Penting:</strong> Link verifikasi ini akan kedaluwarsa dalam 24 jam untuk keamanan akun Anda.</p>
                            </div>
                            
                            <div class="alternative-link">
                                <p><strong>Tidak dapat mengklik tombol?</strong> Salin dan tempel tautan berikut ke browser Anda:</p>
                                <div class="url-code">{{ $url }}</div>
                            </div>
                            
                            <p class="message">
                                Jika Anda tidak merasa mendaftar untuk akun ini, silakan abaikan email ini. Akun tidak akan dibuat tanpa verifikasi email.
                            </p>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="footer">
                            <div class="footer-content">
                                <div class="company-info">
                                    <p class="company-name">Koordinator Magang - Diskominfo Kabupaten Malang</p>
                                    <p class="company-tagline">Membangun Masa Depan Karir Anda</p>
                                </div>
                                
                                <div class="contact-info">
                                    <p>Email: support@sistemmagang.com | Telepon: (021) 1234-5678</p>
                                </div>
                                
                                <div class="divider"></div>
                                
                                <div class="footer-links">
                                    <a href="#">Kebijakan Privasi</a> |
                                    <a href="#">Syarat & Ketentuan</a> |
                                    <a href="#">Bantuan</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>