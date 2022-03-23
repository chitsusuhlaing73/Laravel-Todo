<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
</head>
<body>
    <ul>
    @foreach($users as $user)
        <li>
            @foreach($user['phones'] as $index=>$phone)
                <span>{{$phone['phone']}}</span> @if($index != count($user['phones']) - 1) , @endif
            @endforeach
        </li>
    @endforeach
    </ul>
    <a href="{{ route('logout-user') }}">
        <button>Logout</button>
    </a><br><br>
    <a href="{{ route('register-view') }}">
        <input type="button" name="register" value="Register">
    </a>
</body>
</html>
