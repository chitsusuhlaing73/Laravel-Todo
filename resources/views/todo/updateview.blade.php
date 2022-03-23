<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Update Todo</h1>
    @foreach($todos as $todo)
        <form action="/todo/update" method="POST">
            @csrf
            <div>
                <label for="name">Name</label>
                <input id="name" type="text" name="name" value="{{$todo->name}}">
                @error('name')
                <span style="color: red;">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div><br>
            <div>
                <label for="instruction">Instruction</label>
                <input id="instruction" type="text" name="instruction" value="{{$todo->instruction}}">
                @error('instruction')
                <span style="color: red;">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div><br>
            <div>
                <input id="id" type="hidden" name="id" value="{{$todo->id}}">
                <button type="submit">
                    Update
                </button>
                <button><a href="{{ route('todo-list-view') }}">Back</a></button>
            </div>
        </form>
    @endforeach
</body>

</html>