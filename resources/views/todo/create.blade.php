<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Todo</h1>
    <form action="{{ route('todo-create') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}">
            @error('name')
            <span style="color: red;">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div><br>
        <div>
            <label for="instruction">Instruction</label>
            <input id="instruction" type="text" name="instruction" value="{{ old('instruction') }}">
            @error('instruction')
            <span style="color: red;">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div><br>
        <div>
            <button type="submit">
                Create
            </button>
        </div>
    </form>
</body>

</html>