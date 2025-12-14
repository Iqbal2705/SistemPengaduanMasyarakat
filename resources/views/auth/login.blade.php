<!DOCTYPE html>
<html>

<head>
    <title>Login Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>

<body class="login-page">

    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">

                <h3>Login</h3>

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form method="POST" action="/login">
                    @csrf
                    <input type="email" name="email" class="form-control mb-2" placeholder="Email">
                    <input type="password" name="password" class="form-control mb-2" placeholder="Password">
                    <button class="btn btn-primary btn-block">Login</button>
                </form>

            </div>
        </div>
    </div>

</body>

</html>