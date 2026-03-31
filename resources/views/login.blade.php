<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OB-LMS | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            /* Solid Purple Gradient Background */
            background: linear-gradient(135deg, #6e8efb 0%, #a777e3 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
        }

        .login-card {
            background: #ffffff;
            width: 100%;
            max-width: 380px;
            padding: 50px 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .login-header h2 {
            font-weight: 800;
            color: #764ba2; /* Main Purple Color */
            margin-bottom: 5px;
            letter-spacing: 1px;
        }

        .login-header p {
            color: #888;
            font-size: 0.9rem;
            margin-bottom: 35px;
        }

        .form-group {
            text-align: left;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 700;
            color: #555;
            font-size: 0.8rem;
            text-transform: uppercase;
            margin-left: 2px;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #ddd;
            background-color: #fcfcfc;
            font-size: 0.95rem;
        }

        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(118, 75, 162, 0.1);
            border-color: #a777e3;
            outline: none;
        }

        .btn-login {
            background-color: #764ba2;
            border: none;
            border-radius: 8px;
            padding: 14px;
            font-weight: 700;
            width: 100%;
            color: white;
            margin-top: 15px;
            transition: 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-login:hover {
            background-color: #5e3a8a;
            box-shadow: 0 4px 12px rgba(118, 75, 162, 0.3);
        }

        .footer-text {
            margin-top: 30px;
            font-size: 0.75rem;
            color: #bbb;
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="login-header">
        <h2>OB-LMS</h2>
        <p>Login to your account</p>
    </div>

    <form action="{{ route('login') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Enter your username" required>
        </div>

        <div class="form-group">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
        </div>

        <button type="submit" class="btn btn-login">
            Sign In
        </button>
    </form>

    <div class="footer-text">
        &copy; 2026 Outcome-Based LMS<br>
        Admin Rose System
    </div>
</div>

</body>
</html>