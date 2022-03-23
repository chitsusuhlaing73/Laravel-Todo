<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\DB;
use App\Contracts\Service\Todo\TodoServiceInterface;

/**
 * This is Post controller.
 * This handles Post CRUD processing.
 */
class TodoController extends Controller
{
    private $todoService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TodoServiceInterface $todoServiceInterface)
    {
        $this->todoService = $todoServiceInterface;
    }

    /**
     * To show create todo view
     * 
     * @return View create post
     */
    public function showCreateView()
    {
        return view('todo.create');
    }

    /**
     * To save new todo
     * @param TodoRequest $request name, instruction
     * @return view welcome page
     * 
     */
    public function createTodo(TodoRequest $request)
    {
        $result = $this->todoService->saveTodo($request->name, $request->instruction);
        return $result['msg'];
        // $name = $request->name;
        // $instruction = $request->instruction;
        // DB::transaction(function () use ($name, $instruction) {
        //     DB::insert(
        //         'insert into todos (name, instruction) values (?, ?)',
        //         [$name, $instruction]
        //     );
        // });
        // return redirect()->route('welcome-view');
        // return redirect()->route('todo-list-view');
    }

    /**
     * To show todo list
     * @param empty
     * @return view todo list page
     * 
     */
    public function showTodoList()
    {
        $result = $this->todoService->showTodoList();
        // $todos = DB::select('select * from todos');
        return view('todo.list')->with('todos', $result);
    }

    /**
     * To update todo
     * @param $id
     * @return view update page
     * 
     */
    public function updateTodoView($id)
    {
        $result = $this->todoService->updateTodoView($id);
        // $todos = DB::select('select * from todos where id = :id', ['id' => $id]);
        return view('todo.updateview')->with('todos', $result);
    }

    /**
     * To put update todo
     * @param TodoRequest $request id, name, instruction
     * @return view todo list page
     * 
     */
    public function updateTodo(TodoRequest $request)
    {
        $id = $request->id;
        $name = $request->name;
        $instruction = $request->instruction;
        $this->todoService->updateTodo($id, $name, $instruction);
        // DB::update(
        //     "update todos set name = '$name', instruction = '$instruction' where id = ?",
        //     [$request->id]
        // );
        return redirect()->route('todo-list-view');
    }

    /**
     * To delete todo
     * @param $id
     * @return view todo list view
     * 
     */
    public function deleteTodo($id)
    {
        $this->todoService->deleteTodo($id);
        // DB::delete('delete from todos where id = :id', ['id' => $id]);
        return redirect()->route('todo-list-view');
    }
}
