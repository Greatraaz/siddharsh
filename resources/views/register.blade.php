<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $globalSetting = \App\Models\Setting::first();
    @endphp
    <title>Create Admin Account | {{ $globalSetting->site_title ?? 'Admin Panel' }}</title>
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
    *{ margin:0; padding:0; box-sizing:border-box; font-family:'Inter',sans-serif; }
    body{ min-height:100vh; background:#0b1120; display:flex; align-items:center; justify-content:center; padding:25px; position:relative; overflow-x:hidden; }
    .bg-gradient{ position:absolute; inset:0; overflow:hidden; z-index:0; }
    .bg-gradient span{ position:absolute; border-radius:50%; filter:blur(130px); opacity:.30; }
    .bg-gradient span:nth-child(1){ width:400px; height:400px; background:#7c3aed; top:-100px; left:-100px; }
    .bg-gradient span:nth-child(2){ width:350px; height:350px; background:#2563eb; bottom:-100px; right:-100px; }

    .register-container{ width:100%; max-width:500px; background:rgba(255,255,255,0.05); backdrop-filter:blur(20px); border:1px solid rgba(255,255,255,0.1); border-radius:30px; padding:40px; position:relative; z-index:10; box-shadow:0 25px 50px rgba(0,0,0,0.3); }
    .logo-img{ background: rgba(255,255,255,0.9); width: fit-content; margin: 0 auto 25px; padding: 15px 25px; border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
    .title{ color:#fff; font-size:28px; font-weight:700; text-align:center; margin-bottom:10px; }
    .subtitle{ color:rgba(255,255,255,0.6); text-align:center; margin-bottom:35px; font-size:14px; }
    .form-label{ color:#dbe4ff; font-size:13px; font-weight:500; margin-bottom:8px; }
    .form-control{ height:52px; background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.1); border-radius:16px; color:#fff; padding:0 20px; transition:0.3s; }
    .form-control:focus{ background:rgba(255,255,255,0.1); border-color:#8b5cf6; box-shadow:0 0 0 4px rgba(139,92,246,0.15); color:#fff; }
    .register-btn{ width:100%; height:55px; border:none; border-radius:16px; background:linear-gradient(135deg,#7c3aed,#2563eb); color:#fff; font-size:16px; font-weight:600; margin-top:20px; transition:0.3s; box-shadow:0 15px 30px rgba(124,58,237,0.3); }
    .register-btn:hover{ transform:translateY(-2px); box-shadow:0 20px 40px rgba(124,58,237,0.4); }
    .footer-text{ text-align:center; margin-top:25px; color:rgba(255,255,255,0.6); font-size:14px; }
    .footer-text a{ color:#8b5cf6; text-decoration:none; font-weight:600; }
    .invalid-feedback{ color:#ff4d4d; font-size:12px; margin-top:5px; display:block; }
    </style>
</head>
<body>
    <div class="bg-gradient"><span></span><span></span></div>

    <div class="register-container">
        <div class="logo-img">
            @if($globalSetting && $globalSetting->logo)
                <img src="{{ asset('uploads/settings/' . $globalSetting->logo) }}" alt="Logo" style="max-height: 50px;">
            @else
                <div class="text-primary fw-bold fs-4">ADMIN</div>
            @endif
        </div>

        <h2 class="title">Create Account</h2>
        <p class="subtitle">Join our administrative team</p>

        <form action="{{ route('register.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="John Doe" required>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="john@example.com" required>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="••••••••" required>
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="••••••••" required>
            </div>

            <button type="submit" class="register-btn">Initialize Account</button>

            <p class="footer-text">
                Already have an account? <a href="{{ route('login') }}">Login here</a>
            </p>
        </form>
    </div>
</body>
</html>
