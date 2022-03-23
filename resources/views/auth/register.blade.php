<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>User Register</h1>
    <form action="{{ route('user-register') }}" method="post">
        @csrf
        <div>
            <label for="name">User Name: </label>
            <input type="name" name="name" id="name" value="{{ old('name') }}">
            @error('name')
            <span style="color: red;">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div><br>
        <div>
            <label for="email">User Email: </label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
            @error('email')
            <span style="color: red;">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div><br>
        <div>
            <label for="phone">User Phone: </label>
            <input type="phone" name="phone" id="phone" value="{{ old('phone') }}">
            @error('phone')
            <span style="color: red;">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div><br>
        <div>
            <label for="password">Password: </label>
            <input type="password" name="password" id="password" value="{{ old('password') }}">
            @error('password')
            <span style="color: red;">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div><br>
        <input type="submit" name="register" value="Register">
        <a href="{{ route('user-list') }}">
            <input type="button" name="cancel" value="Cancel">
        </a>
    </form>
</body>
</html>
