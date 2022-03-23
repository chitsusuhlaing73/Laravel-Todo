<?php

namespace App\Dao\Todo;

use App\Contracts\Dao\Todo\TodoDaoInterface;
use Illuminate\Support\Facades\DB;

/**
 * DAO class for todo.
 */
class TodoDao implements TodoDaoInterface
{
    /**
     * Class Constructor
     * @return
     */
    public function __construct()
    {
    }

    /**
     * To save new todo
     * @param TodoRequest $request name, instruction
     * @return view welcome page
     * 
     */
    public function saveTodo($name, $instruction)
    {
        DB::transaction(function () use ($name, $instruction) {
            DB::insert(
                'insert into todos (name, instruction) values (?, ?)',
                [$name, $instruction]
            );
        });
        return ["msg" => "Saved successfully."];
    }

    /**
     * To show todo list
     * @param empty
     * @return view todo list page
     * 
     */
    public function showTodoList()
    {
        $result = DB::select('select * from todos');
        return $result;
    }

    /**
     * To update todo
     * @param $id
     * @return view update page
     * 
     */
    public function updateTodoView($id)
    {
        DB::transaction(function () use ($id) {
            $result = DB::select('select * from todos where id = :id', ['id' => $id]);
        });
        return $result;
    }

    /**
     * To put update todo
     * @param TodoRequest $request id, name, instruction
     * @return view todo list page
     * 
     */
    public function updateTodo($id, $name, $instruction)
    {
        DB::transaction(function () use ($id, $name, $instruction) {
            return DB::update(
                "update todos set name = '$name', instruction = '$instruction' where id = ?",
                [$id]
            );
        });
    }

    /**
     * To delete todo
     * @param $id
     * @return view todo list view
     * 
     */
    public function deleteTodo($id)
    {
        DB::transaction(function () use ($id, $name, $instruction) {
            return DB::delete('delete from todos where id = :id', ['id' => $id]);
        });
    }
}
