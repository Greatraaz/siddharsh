<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $globalSetting = \App\Models\Setting::first();
    @endphp
    <title>{{ $globalSetting->site_title ?? 'Admin Login' }}</title>
    @if($globalSetting && $globalSetting->favicon)
        <link rel="icon" href="{{ asset('uploads/settings/' . $globalSetting->favicon) }}">
    @else
        <link rel="icon" href="{{ asset('uploads/fav.png') }}">
    @endif
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:'Inter',sans-serif;
    }

    body{
        min-height:100vh;
        background:#0b1120;
        overflow:hidden;
        position:relative;
        display:flex;
        align-items:center;
        justify-content:center;
        padding:25px;
    }

    /* Background */

    .bg-gradient{
        position:absolute;
        inset:0;
        overflow:hidden;
        z-index:0;
    }

    .bg-gradient span{
        position:absolute;
        border-radius:50%;
        filter:blur(130px);
        opacity:.40;
    }

    .bg-gradient span:nth-child(1){
        width:320px;
        height:320px;
        background:#7c3aed;
        top:-80px;
        left:-80px;
    }

    .bg-gradient span:nth-child(2){
        width:280px;
        height:280px;
        background:#2563eb;
        bottom:-80px;
        right:-80px;
    }

    .bg-gradient span:nth-child(3){
        width:180px;
        height:180px;
        background:#06b6d4;
        top:50%;
        left:50%;
        transform:translate(-50%,-50%);
    }

    /* Login Section */

    .login-section{
        width:100%;
        display:flex;
        align-items:center;
        justify-content:center;
        position:relative;
        z-index:10;
    }

    /* Main Login Card */

    .login-container{
        width:100%;
        max-width:780px;
        min-height:470px;
        display:grid;
        grid-template-columns:1fr 360px;
        background:rgba(255,255,255,0.05);
        backdrop-filter:blur(18px);
        border:1px solid rgba(255,255,255,0.08);
        border-radius:28px;
        overflow:hidden;
        box-shadow:0 20px 50px rgba(0,0,0,.40);
    }

    /* Left Side */

    .login-left{
        padding:40px;
        display:flex;
        flex-direction:column;
        justify-content:center;
    }

    .logo-box{
        width:65px;
        height:65px;
        border-radius:18px;
        background:linear-gradient(135deg,#7c3aed,#2563eb);
        display:flex;
        align-items:center;
        justify-content:center;
        margin-bottom:25px;
    }

    .logo-box i{
        color:#fff;
        font-size:28px;
    }

    .login-left h1{
        color:#fff;
        font-size:34px;
        font-weight:700;
        line-height:1.3;
        margin-bottom:15px;
    }

    .login-left p{
        color:rgba(255,255,255,.7);
        font-size:14px;
        line-height:1.8;
    }

    .feature-list{
        margin-top:30px;
    }

    .feature-item{
        display:flex;
        align-items:center;
        gap:12px;
        color:#fff;
        margin-bottom:14px;
        font-size:14px;
    }

    .feature-icon{
        width:38px;
        height:38px;
        border-radius:12px;
        background:rgba(255,255,255,.08);
        display:flex;
        align-items:center;
        justify-content:center;
        color:#8b5cf6;
        font-size:16px;
    }

    /* Right Side */

    .login-right{
        background:rgba(255,255,255,.04);
        border-left:1px solid rgba(255,255,255,.06);
        padding:35px 28px;
        display:flex;
        align-items:center;
    }

    .login-card{
        width:100%;
    }

    .login-title{
        color:#fff;
        font-size:28px;
        font-weight:700;
        margin-bottom:6px;
    }

    .login-subtitle{
        color:rgba(255,255,255,.6);
        margin-bottom:28px;
        font-size:14px;
    }

    .form-label{
        color:#dbe4ff;
        font-size:13px;
        margin-bottom:8px;
        font-weight:500;
    }

    .form-control{
        height:52px;
        background:rgba(255,255,255,.06);
        border:1px solid rgba(255,255,255,.08);
        border-radius:16px;
        color:#fff;
        padding-left:16px;
    }

    .form-control:focus{
        background:rgba(255,255,255,.09);
        border-color:#8b5cf6;
        box-shadow:0 0 0 4px rgba(139,92,246,.15);
        color:#fff;
    }

    .form-control::placeholder{
        color:rgba(255,255,255,.4);
    }

    .password-wrapper{
        position:relative;
    }

    .toggle-password{
        position:absolute;
        top:50%;
        right:16px;
        transform:translateY(-50%);
        color:#cbd5e1;
        cursor:pointer;
        font-size:16px;
    }

    .extra{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-top:16px;
        margin-bottom:25px;
    }

    .form-check-label{
        color:#dbe4ff;
        font-size:13px;
    }

    .forgot-link{
        color:#8b5cf6;
        text-decoration:none;
        font-size:13px;
        font-weight:500;
    }

    .login-btn{
        width:100%;
        height:52px;
        border:none;
        border-radius:16px;
        background:linear-gradient(135deg,#7c3aed,#2563eb);
        color:#fff;
        font-size:15px;
        font-weight:600;
        transition:.3s;
        box-shadow:0 15px 30px rgba(124,58,237,.35);
    }

    .login-btn:hover{
        transform:translateY(-2px);
    }

    .bottom-text{
        text-align:center;
        margin-top:22px;
        color:rgba(255,255,255,.6);
        font-size:13px;
    }

    .bottom-text a{
        color:#8b5cf6;
        text-decoration:none;
        font-weight:600;
    }

    .invalid-feedback{
        display:block;
    }

    /* Responsive */

    @media(max-width:991px){

        .login-container{
            max-width:390px;
            grid-template-columns:1fr;
        }

        .login-left{
            display:none;
        }

        .login-right{
            border-left:none;
        }
    }

    @media(max-width:576px){

        body{
            padding:15px;
        }

        .login-right{
            padding:30px 20px;
        }

        .login-title{
            font-size:24px;
        }
    }
.logo-img{
    background: cornsilk;
    width: 188px;
    margin: auto;
    border-radius: 12px;
}
</style>
</head>
<body>

    <div class="bg-gradient">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <section class="login-section">

        <div class="login-container">

            <!-- Left Side -->

            <div class="login-left">

                <div class="logo-img text-center p-3">
                    @if($globalSetting && $globalSetting->logo)
                        <img src="{{ asset('uploads/settings/' . $globalSetting->logo) }}" alt="Logo" style="max-height: 80px; max-width: 100%;">
                    @else
                        <img src="{{ asset('uploads/logo.png') }}" alt="Logo" class="rounded-circle me-2" width="200">
                    @endif
                </div>

                <h1 class="text-center">
                    Dashboard Panel
                </h1>

                <p>
                    Manage brands, categories, subcategories and showcase products
                    with a premium modern ecommerce admin experience.
                </p>

                <div class="feature-list">

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        Secure Authentication System
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="bi bi-speedometer2"></i>
                        </div>
                        Powerful Dashboard Analytics
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="bi bi-images"></i>
                        </div>
                        Product Showcase Management
                    </div>

                </div>

            </div>

            <!-- Right Side -->

            <div class="login-right">

                <div class="login-card">

                    <h2 class="login-title">
                        Welcome Back 👋
                    </h2>

                    <p class="login-subtitle">
                        Login to continue to your dashboard
                    </p>

                    <form method="POST" action="{{ route('login.submit') }}">

                        @csrf

                        <!-- Email -->

                        <div class="mb-4">

                            <label class="form-label">
                                Email Address
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Enter your email"
                                value="{{ old('email') }}"
                            >

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <!-- Password -->

                        <div class="mb-3">

                            <label class="form-label">
                                Password
                            </label>

                            <div class="password-wrapper">

                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Enter your password"
                                >

                                <span class="toggle-password" onclick="togglePassword()">
                                    <i class="bi bi-eye"></i>
                                </span>

                            </div>

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <!-- Remember -->

                        <div class="extra">

                            <div class="form-check">

                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="remember"
                                >

                                <label class="form-check-label">
                                    Remember Me
                                </label>

                            </div>

                            <a href="#" class="forgot-link">
                                Forgot Password?
                            </a>

                        </div>

                        <!-- Button -->

                        <button type="submit" class="login-btn">
                            Login to Dashboard
                        </button>

                        <div class="bottom-text">
                            Don't have an account?
                            <a href="#">Register</a>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>

    <script>

        function togglePassword(){

            const password = document.getElementById('password');

            if(password.type === 'password'){

                password.type = 'text';

            }else{

                password.type = 'password';
            }
        }

    </script>

</body>
</html>