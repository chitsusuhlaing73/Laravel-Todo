<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('login-user') }}" method="post" >
        @csrf
        @if($errors->has('auth'))
        <span style="color:red;">{{$errors->first()}}</span>
        @endif
        <div>
            <input type="email" name="email" id="email" placeholder="Enter Your Email" value="{{ old('email') }}">
            @error('email')
            <span style="color: red;">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div><br>
        <div>
            <input type="password" name="password" id="password" placeholder="Enter Your Password" value="{{ old('password') }}">
            @error('password')
            <span style="color: red;">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div><br>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>
