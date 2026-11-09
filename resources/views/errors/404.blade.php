<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oops! Page Not Found</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary: #6c5ce7;
            --secondary: #a29bfe;
            --accent: #fd79a8;
            --text: #2d3436;
            --light: #f9f9f9;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            line-height: 1.6;
        }
        
        .container {
            max-width: 800px;
            width: 100%;
            background: white;
            border-radius: 20px;
            box-shadow: var(--shadow);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px;
            text-align: center;
            position: relative;
            transform: translateY(0);
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }
        
        .envelope-icon {
            width: 90px;
            height: 90px;
            margin: 0 auto 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.75rem;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(108,92,231,0.12), rgba(253,121,168,0.12));
            animation: iconBounce 2.4s ease-in-out infinite;
        }
        @keyframes iconBounce {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-8px) rotate(-4deg); }
        }
        
        h1 {
            font-size: 1.8rem;
            margin-bottom: 15px;
            color: var(--primary);
            font-weight: 700;
            position: relative;
            display: inline-block;
        }
        
        h1:after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: var(--accent);
            border-radius: 3px;
        }
        
        .message {
            margin-bottom: 20px;
            font-size: 0.8rem;
        }
        
        .message p {
            margin-bottom: 15px;
        }
        
        .whatsapp-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .whatsapp-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.4);
        }
        
        .whatsapp-btn i {
            margin-right: 10px;
            font-size: 0.8rem;
        }
        
        .whatsapp-btn:after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.3) 100%);
            transform: translateX(-100%);
            transition: transform 0.5s ease;
        }
        
        .whatsapp-btn:hover:after {
            transform: translateX(100%);
        }
        
        .decoration {
            position: absolute;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: rgba(108, 92, 231, 0.1);
            z-index: -1;
        }
        
        .decoration-1 {
            top: -30px;
            left: -30px;
            animation: pulse 4s ease infinite;
        }
        
        .decoration-2 {
            bottom: -20px;
            right: -20px;
            animation: pulse 5s ease infinite 1s;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.1; }
            50% { transform: scale(1.3); opacity: 0.2; }
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 30px 20px;
            }
            
            h1 {
                font-size: 1.8rem;
            }
            
            .message {
                font-size: 0.7rem;
            }
        }
    </style>
</head>
<body>
    <div class="decoration decoration-1"></div>
    <div class="decoration decoration-2"></div>
    
    <div class="container">
        <div class="envelope-icon">💌</div>
        
        <h1>Halaman Tidak Ditemukan</h1>
        
        <div class="message">
            <p><strong>Terima kasih telah berkunjung</strong></p>
            <p>Kami mohon maaf yang sebesar-besarnya jika nama Anda belum tercantum dalam daftar undangan Kami.</p>
            <p>Dengan segala kerendahan hati, kehadiran Bapak/Ibu/Saudara/i tetap kami nantikan dengan sukacita.</p>
            <p>Mungkin Anda dapat mengingatkan Kami</p>
        </div>
        
        <a href="https://wa.me/628993704720" class="whatsapp-btn">
            <i class="fab fa-whatsapp"></i> Whatsapp 
        </a>

        <p style="margin-top: 20px; font-size: 0.5rem; color: #666;">
            Atas perhatian dan pengertiannya, kami mengucapkan terima kasih yang sebesar-besarnya.
        </p>
        
     
    </div>
</body>
</html>