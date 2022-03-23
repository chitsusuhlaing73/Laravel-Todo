<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Todo List</h1>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Instruction</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        @foreach($todos as $todo)
        <tr>
            <td>{{$todo->name}}</td>
            <td>{{$todo->instruction}}</td>
            <td><a href="update/{{$todo->id}}">Update</a></td>
            <td><a href="delete/{{$todo->id}}">Delete</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>