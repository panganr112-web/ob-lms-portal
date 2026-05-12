<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OB-LMS | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            height: 100vh;
            display: flex;
            overflow: hidden;
        }

        /* ── LEFT PANEL ── */
        .left-panel {
            width: 52%;
            background: linear-gradient(145deg, #1e1060 0%, #2d1b8a 35%, #4a2faf 70%, #6b4ecf 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 60px 56px;
            position: relative;
            overflow: hidden;
        }

        /* Big watermark text */
        .left-panel .bg-watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-12deg);
            font-family: 'Playfair Display', serif;
            font-size: 130px;
            font-weight: 700;
            color: rgba(255,255,255,0.045);
            white-space: nowrap;
            pointer-events: none;
            letter-spacing: -3px;
            line-height: 1;
            user-select: none;
        }

        /* Decorative circles */
        .left-panel .circle-1 {
            position: absolute;
            width: 400px; height: 400px;
            border-radius: 50%;
            border: 1.5px solid rgba(255,255,255,0.07);
            top: -100px; right: -80px;
        }
        .left-panel .circle-2 {
            position: absolute;
            width: 260px; height: 260px;
            border-radius: 50%;
            border: 1.5px solid rgba(255,255,255,0.06);
            bottom: -60px; left: -60px;
        }
        .left-panel .circle-3 {
            position: absolute;
            width: 160px; height: 160px;
            border-radius: 50%;
            background: rgba(255,255,255,0.03);
            bottom: 140px; right: 50px;
        }

        .portal-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.18);
            border-radius: 50px;
            padding: 8px 20px;
            margin-bottom: 36px;
            width: fit-content;
            position: relative;
        }

        .badge-dot {
            width: 8px; height: 8px;
            border-radius: 50%;
            background: #c4b5fd;
            flex-shrink: 0;
        }

        .portal-badge span {
            color: #e9d5ff;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        .left-panel h1 {
            font-family: 'Playfair Display', serif;
            color: #ffffff;
            font-size: 50px;
            font-weight: 700;
            line-height: 1.18;
            margin-bottom: 18px;
            position: relative;
        }

        .left-panel h1 span { color: #c4b5fd; }

        .left-panel p.desc {
            color: rgba(255,255,255,0.62);
            font-size: 15.5px;
            line-height: 1.75;
            margin-bottom: 44px;
            max-width: 360px;
            position: relative;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 20px;
            position: relative;
        }

        .feature-icon {
            width: 44px; height: 44px;
            border-radius: 12px;
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.14);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        .feature-item span {
            color: rgba(255,255,255,0.78);
            font-size: 15px;
            font-weight: 500;
        }

        /* ── RIGHT PANEL ── */
        .right-panel {
            width: 48%;
            background: #f5f0ff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 64px;
            position: relative;
        }

        .right-panel::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse at 80% 15%, rgba(167,139,250,0.18) 0%, transparent 55%),
                radial-gradient(ellipse at 15% 85%, rgba(124,58,237,0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        .login-box {
            width: 100%;
            max-width: 420px;
            position: relative;
            z-index: 1;
        }

        .welcome-tag {
            display: inline-block;
            font-size: 11.5px;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #6d28d9;
            background: #ede9fe;
            padding: 5px 14px;
            border-radius: 50px;
            margin-bottom: 18px;
        }

        .login-box h2 {
            font-family: 'Playfair Display', serif;
            font-size: 38px;
            font-weight: 700;
            color: #1e1048;
            margin-bottom: 8px;
            line-height: 1.2;
        }

        .login-box .subtitle {
            font-size: 15px;
            color: #9084b8;
            margin-bottom: 38px;
        }

        .form-label {
            font-size: 12px;
            font-weight: 600;
            color: #4c3a8a;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 10px;
            display: block;
        }

        .input-wrapper {
            position: relative;
            margin-bottom: 24px;
        }

        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            width: 20px; height: 20px;
            color: #a78bfa;
            pointer-events: none;
        }

        .form-control {
            padding: 18px 18px 18px 52px;
            border: 1.5px solid #e5deff;
            border-radius: 14px;
            font-size: 16px;
            font-family: 'DM Sans', sans-serif;
            background: #ffffff;
            color: #1e1048;
            width: 100%;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-control::placeholder { color: #c4b5fd; }

        .form-control:focus {
            border-color: #7c3aed;
            box-shadow: 0 0 0 4px rgba(124,58,237,0.1);
            background: #fff;
            outline: none;
        }

        @keyframes errorShake {
            0%,100%{transform:translateX(0)}
            20%{transform:translateX(-8px)}
            40%{transform:translateX(8px)}
            60%{transform:translateX(-5px)}
            80%{transform:translateX(5px)}
        }
        @keyframes fadeSlideUp {
            from { opacity: 0; transform: translateY(28px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeSlideLeft {
            from { opacity: 0; transform: translateX(-30px); }
            to   { opacity: 1; transform: translateX(0); }
        }
        @keyframes floatCircle {
            0%,100% { transform: translateY(0px); }
            50%      { transform: translateY(-18px); }
        }
        @keyframes floatCircle2 {
            0%,100% { transform: translateY(0px); }
            50%      { transform: translateY(14px); }
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        @keyframes ripple {
            to { transform: scale(4); opacity: 0; }
        }
        @keyframes pulseDot {
            0%,100% { transform: scale(1); opacity: 1; }
            50%      { transform: scale(1.6); opacity: 0.5; }
        }

        /* Entrance animations */
        .portal-badge { animation: fadeSlideLeft 0.6s ease 0.1s both; }
        .left-panel h1 { animation: fadeSlideLeft 0.6s ease 0.2s both; }
        .left-panel p.desc { animation: fadeSlideLeft 0.6s ease 0.3s both; }
        .left-panel .feature-item:nth-of-type(1) { animation: fadeSlideLeft 0.6s ease 0.4s both; }
        .left-panel .feature-item:nth-of-type(2) { animation: fadeSlideLeft 0.6s ease 0.5s both; }
        .left-panel .feature-item:nth-of-type(3) { animation: fadeSlideLeft 0.6s ease 0.6s both; }
        .login-box h2      { animation: fadeSlideUp 0.6s ease 0.2s both; }
        .login-box .subtitle { animation: fadeSlideUp 0.6s ease 0.3s both; }
        .login-box form    { animation: fadeSlideUp 0.6s ease 0.4s both; }
        .divider           { animation: fadeSlideUp 0.6s ease 0.5s both; }
        .footer-text       { animation: fadeSlideUp 0.6s ease 0.6s both; }

        /* Floating circles */
        .left-panel .circle-1 { animation: floatCircle  7s ease-in-out infinite; }
        .left-panel .circle-2 { animation: floatCircle2 9s ease-in-out infinite; }
        .left-panel .circle-3 { animation: floatCircle  5s ease-in-out 1s infinite; }

        /* Badge dot pulse */
        .badge-dot { animation: pulseDot 2s ease-in-out infinite; }

        /* Input lift on focus */
        .input-wrapper { transition: transform 0.2s; }
        .input-wrapper:focus-within { transform: translateY(-2px); }

        .form-control.is-invalid {
            border-color: #e24b4a;
            animation: errorShake 0.45s ease;
        }

        .btn-login {
            width: 100%;
            padding: 20px;
            background: linear-gradient(135deg, #3b1d8a 0%, #6d28d9 55%, #9d5eeb 100%);
            color: #fff;
            border: none;
            border-radius: 14px;
            font-size: 16px;
            font-weight: 600;
            font-family: 'DM Sans', sans-serif;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            cursor: pointer;
            margin-top: 8px;
            position: relative;
            overflow: hidden;
            transition: transform 0.18s, box-shadow 0.18s;
            box-shadow: 0 8px 24px rgba(109,40,217,0.35);
        }
        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 36px rgba(109,40,217,0.5);
        }
        .btn-login:active {
            transform: translateY(1px);
            box-shadow: 0 4px 12px rgba(109,40,217,0.3);
        }
        /* Ripple */
        .btn-login .ripple-el {
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,0.35);
            width: 60px; height: 60px;
            margin-top: -30px; margin-left: -30px;
            animation: ripple 0.7s linear;
            pointer-events: none;
        }
        /* Loading spinner */
        .btn-login.loading { pointer-events: none; opacity: 0.85; }
        .btn-login .btn-text { display: inline-block; transition: opacity 0.2s; }
        .btn-login .btn-spinner {
            display: none;
            width: 20px; height: 20px;
            border: 2.5px solid rgba(255,255,255,0.4);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin 0.7s linear infinite;
            position: absolute;
            top: 50%; left: 50%;
            margin-top: -10px; margin-left: -10px;
        }
        .btn-login.loading .btn-text { opacity: 0; }
        .btn-login.loading .btn-spinner { display: block; }

        .divider {
            height: 1px;
            background: linear-gradient(to right, transparent, #ddd6fe, transparent);
            margin: 32px 0;
        }

        .footer-text {
            text-align: center;
            font-size: 12px;
            color: #b8a8d8;
            line-height: 1.8;
        }

        /* Error messages */
        .alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 10px;
            color: #b91c1c;
            font-size: 13.5px;
            padding: 12px 16px;
            margin-bottom: 20px;
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 900px) {
            .left-panel { display: none; }
            .right-panel {
                width: 100%;
                background: linear-gradient(145deg, #1e1060, #4a2faf);
            }
            .login-box h2 { color: #fff; }
            .login-box .subtitle { color: #c4b5fd; }
            .form-label { color: #e9d5ff; }
            .welcome-tag { background: rgba(255,255,255,0.15); color: #e9d5ff; }
            .form-control { background: rgba(255,255,255,0.95); }
            .footer-text { color: rgba(255,255,255,0.45); }
            .divider { background: linear-gradient(to right, transparent, rgba(255,255,255,0.2), transparent); }
        }
    </style>
</head>
<body>

{{-- LEFT PANEL --}}
<div class="left-panel">
    <div class="bg-watermark">OB LMS</div>
    <div class="circle-1"></div>
    <div class="circle-2"></div>
    <div class="circle-3"></div>

    <div class="portal-badge">
        <div class="badge-dot"></div>
        <span>OB-LMS Portal</span>
    </div>

    <h1>Outcome-Based<br><span>Learning System</span></h1>
    <p class="desc">A centralized academic platform for managing students, subjects, assessments, and program outcomes.</p>

    <div class="feature-item">
        <div class="feature-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#a78bfa" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            </svg>
        </div>
        <span>Manage students</span>
    </div>

    <div class="feature-item">
        <div class="feature-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#a78bfa" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 11l3 3L22 4"/>
                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>
            </svg>
        </div>
        <span>Track assessments & outcomes</span>
    </div>

    <div class="feature-item">
        <div class="feature-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#a78bfa" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="20" x2="18" y2="10"/>
                <line x1="12" y1="20" x2="12" y2="4"/>
                <line x1="6" y1="20" x2="6" y2="14"/>
            </svg>
        </div>
        <span>Generate academic reports</span>
    </div>
</div>

{{-- RIGHT PANEL --}}
<div class="right-panel">
    <div class="login-box">

        <h2>Welcome back</h2>
        <p class="subtitle">Sign in to your account to continue</p>

        @if ($errors->any())
            <div class="alert-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div>
                <label class="form-label">Username</label>
                <div class="input-wrapper">
                    <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    <input type="text" name="username"
                           class="form-control @error('username') is-invalid @enderror"
                           placeholder="Enter your username"
                           value="{{ old('username') }}"
                           required autocomplete="username">
                </div>
            </div>

            <div>
                <label class="form-label">Password</label>
                <div class="input-wrapper">
                    <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                    <input type="password" name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Enter your password"
                           required autocomplete="current-password">
                </div>
            </div>

            <button type="submit" class="btn-login" id="loginBtn">
                <span class="btn-text">Sign In</span>
                <div class="btn-spinner"></div>
            </button>
        </form>

        <div class="divider"></div>

        <div class="footer-text">
            &copy; 2026 Outcome-Based LMS<br>Admin Rose System
        </div>
    </div>
</div>

<script>
const btn = document.getElementById('loginBtn');
const form = btn.closest('form');

// Ripple on click
btn.addEventListener('click', function(e) {
    const rect = btn.getBoundingClientRect();
    const ripple = document.createElement('span');
    ripple.classList.add('ripple-el');
    ripple.style.left = (e.clientX - rect.left) + 'px';
    ripple.style.top  = (e.clientY - rect.top)  + 'px';
    btn.appendChild(ripple);
    setTimeout(() => ripple.remove(), 700);
});

// Loading state on submit
form.addEventListener('submit', function() {
    btn.classList.add('loading');
});
</script>
</body>
</html>