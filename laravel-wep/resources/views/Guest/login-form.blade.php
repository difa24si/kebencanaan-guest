<!DOCTYPE html>
<html>
<head>
    <title>Login Guest</title>
</head>
<body>
    <h2>Form Login</h2>

    <form method="POST" action="/guest/login">
        @csrf
        <label>Username:</label><br>
        <input type="text" name="username"><br><br>

        <label>Password:</label><br>
        <input type="password" name="password"><br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
