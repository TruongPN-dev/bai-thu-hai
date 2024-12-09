<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4ggtYFKmJujfqX50s7Ss+KCvpg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">
        <h1>Movie Management - User: {{ Auth::user()->name }} - <a href="{{ route('logout') }}">Logout</a></h1>

        <form method="POST" action="">
            @csrf
            <div class="form-group">
                <label>Email:</label>
                <input type="text" class="form-control" name="email" required />
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control" name="password" required />
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>