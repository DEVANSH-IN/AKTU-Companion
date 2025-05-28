<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKTU Companion - Your Academic Journey Partner</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 25%, #f1f5f9 50%, #e2e8f0 75%, #cbd5e1 100%);
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
            animation: backgroundShift 20s ease-in-out infinite;
        }

        @keyframes backgroundShift {
            0%, 100% { background: linear-gradient(135deg, #ffffff 0%, #f8fafc 25%, #f1f5f9 50%, #e2e8f0 75%, #cbd5e1 100%); }
            50% { background: linear-gradient(135deg, #fef7f7 0%, #fef2f2 25%, #fee2e2 50%, #fecaca 75%, #f87171 100%); }
        }

        /* Animated geometric background */
        .geometric-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .geometric-shape {
            position: absolute;
            opacity: 0.1;
            animation: geometricFloat 15s infinite ease-in-out;
        }

        .diamond {
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, #dc2626, #ef4444);
            transform: rotate(45deg);
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .circle {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #f87171, #dc2626);
            border-radius: 50%;
            top: 60%;
            right: 15%;
            animation-delay: -5s;
        }

        .triangle {
            width: 0;
            height: 0;
            border-left: 40px solid transparent;
            border-right: 40px solid transparent;
            border-bottom: 70px solid #ef4444;
            top: 80%;
            left: 70%;
            animation-delay: -10s;
        }

        .hexagon {
            width: 100px;
            height: 100px;
            background: linear-gradient(30deg, #dc2626, #f87171);
            clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
            top: 30%;
            right: 30%;
            animation-delay: -7s;
        }

        .wave {
            width: 200px;
            height: 60px;
            background: linear-gradient(90deg, transparent, #ef4444, transparent);
            border-radius: 50px;
            top: 70%;
            left: 20%;
            animation-delay: -3s;
        }

        @keyframes geometricFloat {
            0%, 100% {
                transform: translateY(0px) rotate(0deg) scale(1);
                opacity: 0.1;
            }
            25% {
                transform: translateY(-30px) rotate(90deg) scale(1.1);
                opacity: 0.2;
            }
            50% {
                transform: translateY(-60px) rotate(180deg) scale(0.9);
                opacity: 0.15;
            }
            75% {
                transform: translateY(-30px) rotate(270deg) scale(1.05);
                opacity: 0.25;
            }
        }

        /* Flowing particles */
        .particles-container {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 2;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: radial-gradient(circle, #dc2626, transparent);
            border-radius: 50%;
            animation: particleFlow 12s infinite linear;
        }

        .particle:nth-child(1) { left: 10%; animation-delay: 0s; animation-duration: 15s; }
        .particle:nth-child(2) { left: 20%; animation-delay: -2s; animation-duration: 18s; }
        .particle:nth-child(3) { left: 30%; animation-delay: -4s; animation-duration: 12s; }
        .particle:nth-child(4) { left: 40%; animation-delay: -1s; animation-duration: 20s; }
        .particle:nth-child(5) { left: 50%; animation-delay: -3s; animation-duration: 16s; }
        .particle:nth-child(6) { left: 60%; animation-delay: -5s; animation-duration: 14s; }
        .particle:nth-child(7) { left: 70%; animation-delay: -2.5s; animation-duration: 19s; }
        .particle:nth-child(8) { left: 80%; animation-delay: -4.5s; animation-duration: 13s; }
        .particle:nth-child(9) { left: 90%; animation-delay: -1.5s; animation-duration: 17s; }

        @keyframes particleFlow {
            0% {
                transform: translateY(100vh) scale(0);
                opacity: 0;
            }
            10% {
                opacity: 1;
                transform: translateY(90vh) scale(1);
            }
            90% {
                opacity: 1;
                transform: translateY(-10vh) scale(1);
            }
            100% {
                transform: translateY(-20vh) scale(0);
                opacity: 0;
            }
        }

        /* Glass morphism with enhanced effects */
        .glass {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(25px);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 30px;
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.6);
        }

        /* Main Container */
        .container {
            position: relative;
            z-index: 10;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        /* Main Card with multiple animation layers */
        .main-card {
            max-width: 520px;
            width: 100%;
            padding: 4rem 3rem;
            text-align: center;
            position: relative;
            overflow: hidden;
            animation: cardEntrance 1.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        @keyframes cardEntrance {
            0% {
                opacity: 0;
                transform: translateY(50px) scale(0.9);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Multiple border animations */
        .main-card::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #dc2626, #ef4444, #f87171, #fca5a5, #dc2626);
            background-size: 300% 300%;
            border-radius: 32px;
            z-index: -1;
            animation: borderGlow 4s ease-in-out infinite;
        }

        @keyframes borderGlow {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .main-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, #dc2626, transparent);
            animation: topShimmer 3s infinite ease-in-out;
        }

        @keyframes topShimmer {
            0% { transform: translateX(-100%); opacity: 0; }
            50% { opacity: 1; }
            100% { transform: translateX(100%); opacity: 0; }
        }

        /* Logo with spectacular effects */
        .logo-section {
            margin-bottom: 3rem;
            animation: logoEntrance 2s cubic-bezier(0.68, -0.55, 0.265, 1.55) 0.5s both;
        }

        @keyframes logoEntrance {
            0% {
                opacity: 0;
                transform: translateY(-30px) rotate(-180deg) scale(0);
            }
            100% {
                opacity: 1;
                transform: translateY(0) rotate(0deg) scale(1);
            }
        }

        .logo {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, #dc2626, #ef4444, #f87171);
            border-radius: 25px;
            margin: 0 auto 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 
                0 20px 40px rgba(220, 38, 38, 0.3),
                0 0 0 1px rgba(255, 255, 255, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
            position: relative;
            overflow: hidden;
            animation: logoFloat 6s ease-in-out infinite;
        }

        @keyframes logoFloat {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            25% { transform: translateY(-10px) rotate(5deg); }
            50% { transform: translateY(-5px) rotate(0deg); }
            75% { transform: translateY(-15px) rotate(-5deg); }
        }

        .logo::before {
            content: '';
            position: absolute;
            top: -100%;
            left: -100%;
            width: 300%;
            height: 300%;
            background: conic-gradient(from 0deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: logoSpiral 8s linear infinite;
        }

        @keyframes logoSpiral {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .logo-text {
            font-size: 2.5rem;
            font-weight: 900;
            color: white;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            z-index: 1;
            position: relative;
            animation: textPulse 4s ease-in-out infinite;
        }

        @keyframes textPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .title {
            font-size: 3rem;
            font-weight: 900;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #1f2937, #374151, #dc2626, #ef4444);
            background-size: 300% 300%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: titleGradient 5s ease-in-out infinite, titleEntrance 1.5s cubic-bezier(0.68, -0.55, 0.265, 1.55) 1s both;
        }

        @keyframes titleGradient {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        @keyframes titleEntrance {
            0% {
                opacity: 0;
                transform: translateX(-50px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .subtitle {
            font-size: 1.1rem;
            color: #64748b;
            font-weight: 500;
            line-height: 1.7;
            margin-bottom: 3rem;
            animation: subtitleEntrance 1.5s cubic-bezier(0.68, -0.55, 0.265, 1.55) 1.5s both;
        }

        @keyframes subtitleEntrance {
            0% {
                opacity: 0;
                transform: translateX(50px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Buttons with incredible animations */
        .buttons-container {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            animation: buttonsEntrance 1.5s cubic-bezier(0.68, -0.55, 0.265, 1.55) 2s both;
        }

        @keyframes buttonsEntrance {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-btn {
            position: relative;
            padding: 1.25rem 2.5rem;
            border: none;
            border-radius: 20px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            font-family: 'Poppins', sans-serif;
        }

        /* Spectacular hover effects */
        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .login-btn:hover::before {
            left: 100%;
        }

        /* Ripple effect */
        .login-btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .login-btn:active::after {
            width: 300px;
            height: 300px;
        }

        .admin-btn {
            background: linear-gradient(135deg, #dc2626, #ef4444, #f87171);
            color: white;
            box-shadow: 
                0 10px 30px rgba(220, 38, 38, 0.4),
                0 0 0 1px rgba(255, 255, 255, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
            animation: adminPulse 3s ease-in-out infinite;
        }

        @keyframes adminPulse {
            0%, 100% { box-shadow: 0 10px 30px rgba(220, 38, 38, 0.4), 0 0 0 1px rgba(255, 255, 255, 0.1), inset 0 1px 0 rgba(255, 255, 255, 0.2); }
            50% { box-shadow: 0 15px 40px rgba(220, 38, 38, 0.6), 0 0 0 1px rgba(255, 255, 255, 0.2), inset 0 1px 0 rgba(255, 255, 255, 0.3); }
        }

        .admin-btn:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 
                0 20px 50px rgba(220, 38, 38, 0.6),
                0 0 0 1px rgba(255, 255, 255, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        .student-btn {
            background: rgba(255, 255, 255, 0.9);
            color: #1f2937;
            border: 2px solid rgba(220, 38, 38, 0.2);
            backdrop-filter: blur(10px);
            box-shadow: 
                0 10px 30px rgba(0, 0, 0, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
            animation: studentGlow 4s ease-in-out infinite;
        }

        @keyframes studentGlow {
            0%, 100% { border-color: rgba(220, 38, 38, 0.2); }
            50% { border-color: rgba(220, 38, 38, 0.4); }
        }

        .student-btn:hover {
            background: rgba(255, 255, 255, 0.95);
            border-color: rgba(220, 38, 38, 0.5);
            transform: translateY(-5px) scale(1.02);
            box-shadow: 
                0 20px 50px rgba(0, 0, 0, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
        }

        /* Enhanced icons */
        .icon {
            width: 22px;
            height: 22px;
            fill: currentColor;
            animation: iconRotate 8s linear infinite;
        }

        @keyframes iconRotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .admin-btn:hover .icon {
            animation-duration: 2s;
        }

        .student-btn:hover .icon {
            animation-duration: 3s;
        }

        /* Floating elements */
        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .floating-dot {
            position: absolute;
            width: 8px;
            height: 8px;
            background: radial-gradient(circle, #dc2626, transparent);
            border-radius: 50%;
            animation: floatDot 10s infinite ease-in-out;
        }

        .dot-1 { top: 20%; left: 20%; animation-delay: 0s; }
        .dot-2 { top: 30%; right: 25%; animation-delay: -2s; }
        .dot-3 { bottom: 40%; left: 30%; animation-delay: -4s; }
        .dot-4 { bottom: 30%; right: 20%; animation-delay: -6s; }

        @keyframes floatDot {
            0%, 100% { transform: translateY(0px) scale(1); opacity: 0.6; }
            50% { transform: translateY(-20px) scale(1.2); opacity: 1; }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-card {
                padding: 3rem 2rem;
            }

            .title {
                font-size: 2.5rem;
            }

            .subtitle {
                font-size: 1rem;
            }

            .logo {
                width: 80px;
                height: 80px;
            }

            .logo-text {
                font-size: 2rem;
            }

            .login-btn {
                padding: 1rem 2rem;
                font-size: 1rem;
            }
        }

        /* Performance optimization */
        .login-btn, .logo, .main-card {
            will-change: transform;
        }
    </style>
</head>
<body>
    <!-- Geometric Background -->
    <div class="geometric-bg">
        <div class="geometric-shape diamond"></div>
        <div class="geometric-shape circle"></div>
        <div class="geometric-shape triangle"></div>
        <div class="geometric-shape hexagon"></div>
        <div class="geometric-shape wave"></div>
    </div>

    <!-- Flowing Particles -->
    <div class="particles-container">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <!-- Main Container -->
    <div class="container">
        <div class="main-card glass">
            <!-- Floating Elements -->
            <div class="floating-elements">
                <div class="floating-dot dot-1"></div>
                <div class="floating-dot dot-2"></div>
                <div class="floating-dot dot-3"></div>
                <div class="floating-dot dot-4"></div>
            </div>

            <!-- Logo Section -->
            <div class="logo-section">
                <div class="logo">
                    <span class="logo-text">A</span>
                </div>
                <h1 class="title">AKTU Companion</h1>
                <p class="subtitle" style="color:white;">Elevate your academic journey with seamless university experience and unparalleled excellence</p>
            </div>

            <!-- Login Buttons -->
            <div class="buttons-container">
                <a href="{{ route('show.login') }}" class="login-btn admin-btn">
                    <svg class="icon" viewBox="0 0 24 24">
                        <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 4V6C15 7.1 14.1 8 13 8H11C9.9 8 9 7.1 9 6V4L3 7V9H21ZM21 10H3V22H21V10Z"/>
                    </svg>
                    Administrator Portal
                </a>

                <a href="{{ route('show.login') }}" class="login-btn student-btn">
                    <svg class="icon" viewBox="0 0 24 24">
                        <path d="M12 3L1 9L12 15L21 10.09V17H23V9M5 13.18V17.18L12 21L19 17.18V13.18L12 17L5 13.18Z"/>
                    </svg>
                    Student Dashboard
                </a>
            </div>
        </div>
    </div>
</body>
</html>