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
            <h1>{{$user['name']}}</h1>
            @foreach($user['roles'] as $index=>$role)
                <span>{{$role['name']}}</span> @if($index != count($user['roles']) - 1) , @endif
            @endforeach
        </li>
    @endforeach
    </ul>
</body>
</html>
