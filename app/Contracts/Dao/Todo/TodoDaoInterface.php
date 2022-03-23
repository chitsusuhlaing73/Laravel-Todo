<?php

namespace App\Contracts\Dao\Todo;

/**
 * Interface for todo DAO
 */
interface TodoDaoInterface
{
    /**
     * To save new todo
     * @param TodoRequest $request name, instruction
     * @return view welcome page
     * 
     */
    public function saveTodo($name, $instruction);

    /**
     * To show todo list
     * @param empty
     * @return view todo list page
     * 
     */
    public function showTodoList();

    /**
     * To update todo
     * @param $id
     * @return view update page
     * 
     */
    public function updateTodoView($id);

    /**
     * To put update todo
     * @param TodoRequest $request id, name, instruction
     * @return view todo list page
     * 
     */
    public function updateTodo($id, $name, $instruction);

    /**
     * To delete todo
     * @param $id
     * @return view todo list view
     * 
     */
    public function deleteTodo($id);
}
