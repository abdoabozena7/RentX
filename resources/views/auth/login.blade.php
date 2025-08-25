@extends('layouts.front')

@section('title', 'تسجيل الدخول / إنشاء حساب')

@section('content')
<style>
    :root{
      --orange:#ff7a18;
      --orange-2:#ff9a4a;
      --bg:#f7f7f8;
      --card:#ffffff;
      --muted:#7a7a7a;
      --radius:14px;
      font-family: 'Cairo', sans-serif;
    }
    *{box-sizing:border-box}
    body{margin:0;background:linear-gradient(180deg,var(--bg),#ffffff);color:#222}

    .auth-container{
      min-height:100vh;
      display:flex;
      align-items:center;
      justify-content:center;
      padding:32px;
    }

    .card{
      width:100%;
      max-width:1000px;
      background:var(--card);
      border-radius:var(--radius);
      box-shadow:0 8px 30px rgba(20,20,30,0.08);
      overflow:hidden;
      display:grid;
      grid-template-columns:1fr 1fr;
    }

    /* left - illustration / branding */
    .brand{
      padding:36px 28px;
      background:linear-gradient(135deg,var(--orange),var(--orange-2));
      color:white;
      display:flex;
      flex-direction:column;
      gap:16px;
      align-items:flex-start;
      justify-content:center;
    }
    .brand h1{margin:0;font-size:20px}
    .brand p{margin:0;opacity:0.95}

    /* right - forms */
    .forms{padding:26px 28px;display:flex;flex-direction:column;gap:18px}

    .top-text{display:flex;align-items:center;justify-content:space-between;gap:12px}
    .top-text h2{margin:0;font-size:18px}
    .top-text small{color:var(--muted)}

    .tabs{display:flex;gap:8px;background:transparent}
    .tab{padding:8px 14px;border-radius:999px;cursor:pointer;border:1px solid transparent}
    .tab.active{background:linear-gradient(90deg,rgba(255,255,255,0.12),rgba(255,255,255,0.06));border-color:rgba(0,0,0,0.06)}

    form{display:flex;flex-direction:column;gap:12px}
    label{font-size:13px;color:var(--muted)}
    input[type=text],input[type=email],input[type=tel],input[type=password]{
      width:100%;padding:12px 14px;border-radius:8px;border:1px solid #ececec;background:#fbfbfb;font-size:15px
    }

    .row{display:grid;grid-template-columns:1fr 1fr;gap:12px}

    .actions{display:flex;flex-direction:column;gap:10px;margin-top:6px}
    .btn{
      display:inline-flex;align-items:center;justify-content:center;gap:8px;padding:12px;border-radius:10px;border:none;cursor:pointer;font-weight:600
    }
    .btn-primary{background:linear-gradient(90deg,var(--orange),var(--orange-2));color:white}
    .btn-ghost{background:transparent;border:1px solid #eee;color:var(--muted)}

    .socials{display:flex;gap:10px}
    .social-btn{flex:1;display:inline-flex;align-items:center;justify-content:center;gap:10px;padding:10px;border-radius:10px;border:1px solid #eee;background:#fff;cursor:pointer}
    .social-btn i{font-size:18px}

    .or{display:flex;align-items:center;gap:12px;color:var(--muted);font-size:13px}
    .or:before,.or:after{content:"";flex:1;height:1px;background:#eee;border-radius:2px}

    .muted{font-size:13px;color:var(--muted);text-align:center}

    /* responsive */
    @media (max-width:900px){
      .card{grid-template-columns:1fr;max-width:760px}
      .brand{order:2;padding:22px}
    }
    @media (max-width:420px){
      .row{grid-template-columns:1fr}
      .brand{padding:18px}
      .forms{padding:18px}
    }
    .help-link{font-size:13px;color:#666;text-decoration:none}
    .eye{cursor:pointer}
</style>

<!-- Font Awesome for icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

@if ($errors->any())
    <div class="container mt-3">
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<div class="auth-container">
  <div class="card" role="main">
    <div class="brand">
      <h1>مرحبا بكم في مؤسسة عساف</h1>
      <p>حلول الشحن والتجارة — تسجيل سهل وآمن. اختر تسجيل الدخول أو إنشاء حساب جديد بسرعة.</p>
    </div>
    <div class="forms">
      <div class="top-text">
        <h2 id="panelTitle">تسجيل الدخول</h2>
        <div class="tabs" role="tablist">
          <div class="tab active" id="loginTab">دخول</div>
          <div class="tab" id="signupTab">إنشاء حساب</div>
        </div>
      </div>
      <!-- Social buttons (not functional) -->
      <div>
        <div class="socials">
          <!-- Display the Google login button first to make registration easier -->
          <a href="{{ route('login.google') }}" class="social-btn" aria-label="تسجيل الدخول بواسطة جوجل">
            <i class="fab fa-google"></i>دخول عبر جوجل
          </a>
          <!-- Other social login providers such as Facebook can be added later if needed -->
        </div>
      </div>
      <div class="or">أو</div>
      <!-- Login Form -->
      <form id="loginForm" method="POST" action="{{ route('login.submit') }}">
        @csrf
        <label>البريد الإلكترونى أو الهاتف</label>
        <input type="text" name="email" id="loginUser" placeholder="البريد أو الهاتف" required value="{{ old('email') }}">
        <label>كلمة المرور</label>
        <div style="position:relative;display:flex;gap:8px;align-items:center">
          <input type="password" name="password" id="loginPass" placeholder="كلمة المرور" style="flex:1" required>
          <i class="fa-regular fa-eye eye" id="loginEye" title="إظهار/إخفاء"></i>
        </div>
        <div style="display:flex;align-items:center;justify-content:space-between;margin-top:4px">
          <label style="display:flex;align-items:center;gap:8px;font-size:13px"><input type="checkbox" name="remember" id="remember"> تذكرني</label>
          <a class="help-link" href="#">نسيت كلمة المرور؟</a>
        </div>
        <div class="actions">
          <button type="submit" class="btn btn-primary">دخول</button>
          <button type="button" class="btn btn-ghost" id="toSignup">ليس لديك حساب؟ أنشئ الآن</button>
        </div>
      </form>
      <!-- Signup Form -->
      <form id="signupForm" method="POST" action="{{ route('register.submit') }}" style="display:none">
        @csrf
        <div class="row">
          <div>
            <label>الاسم الكامل</label>
            <input type="text" name="name" id="name" placeholder="الاسم الكامل" required>
          </div>
          <div>
            <label>الهاتف</label>
            <input type="tel" name="phone" id="phone" placeholder="مثال: 00963xxxxxxxx" required>
          </div>
        </div>
        <label>البريد الإلكترونى</label>
        <input type="email" name="email" id="email" placeholder="البريد الإلكترونى" required>
        <label>كلمة المرور</label>
        <div style="position:relative;display:flex;gap:8px;align-items:center">
          <input type="password" name="password" id="pass" placeholder="كلمة المرور" style="flex:1" required>
          <i class="fa-regular fa-eye eye" id="signupEye" title="إظهار/إخفاء"></i>
        </div>
        <label>تأكيد كلمة المرور</label>
        <input type="password" name="password_confirmation" id="pass2" placeholder="أعد كتابة كلمة المرور" required>
        <div class="actions">
          <button type="submit" class="btn btn-primary">إنشاء الحساب</button>
          <button type="button" class="btn btn-ghost" id="toLogin">لديك حساب؟ تسجيل دخول</button>
        </div>
      </form>
      <div class="muted">بالضغط على "إنشاء الحساب" أو "دخول" فإنك توافق على <a href="#">شروط الاستخدام</a> و <a href="#">سياسة الخصوصية</a>.</div>
    </div>
  </div>
</div>

<script>
  // Toggle between login and signup panels
  const loginTab = document.getElementById('loginTab');
  const signupTab = document.getElementById('signupTab');
  const loginForm = document.getElementById('loginForm');
  const signupForm = document.getElementById('signupForm');
  const panelTitle = document.getElementById('panelTitle');
  const toSignupBtn = document.getElementById('toSignup');
  const toLoginBtn = document.getElementById('toLogin');

  function showLogin() {
    loginTab.classList.add('active');
    signupTab.classList.remove('active');
    loginForm.style.display = 'flex';
    signupForm.style.display = 'none';
    panelTitle.textContent = 'تسجيل الدخول';
  }

  function showSignup() {
    signupTab.classList.add('active');
    loginTab.classList.remove('active');
    signupForm.style.display = 'flex';
    loginForm.style.display = 'none';
    panelTitle.textContent = 'إنشاء حساب';
  }

  loginTab.addEventListener('click', showLogin);
  signupTab.addEventListener('click', showSignup);
  toSignupBtn.addEventListener('click', showSignup);
  toLoginBtn.addEventListener('click', showLogin);

  // Toggle password visibility
  function togglePassword(inputId, eyeId) {
    const input = document.getElementById(inputId);
    const eye = document.getElementById(eyeId);
    eye.addEventListener('click', () => {
      const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
      input.setAttribute('type', type);
      eye.classList.toggle('fa-eye');
      eye.classList.toggle('fa-eye-slash');
    });
  }
  togglePassword('loginPass', 'loginEye');
  togglePassword('pass', 'signupEye');
  @if (Route::is('register'))
    // إذا كان المسار هو /register فعرض نموذج إنشاء الحساب فوراً
    showSignup();
  @endif
</script>
@endsection