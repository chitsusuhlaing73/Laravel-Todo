<?php

namespace App\Service\Todo;

use App\Contracts\Dao\Todo\TodoDaoInterface;
use App\Contracts\Service\Todo\TodoServiceInterface;

/**
 * Service class for todo.
 */
class TodoService implements TodoServiceInterface
{
    private $todoDao;

    /**
     * Class Constructor
     * @return
     */
    public function __construct(TodoDaoInterface $todoDaoInterface)
    {
        $this->todoDao = $todoDaoInterface;
    }

    /**
     * To save new todo
     * @param TodoRequest $request name, instruction
     * @return view welcome page
     * 
     */
    public function saveTodo($name, $instruction)
    {
        // other bs logic
        return  $this->todoDao->saveTodo($name, $instruction);
    }

    /**
     * To show todo list
     * @param empty
     * @return view todo list page
     * 
     */
    public function showTodoList()
    {
        return $this->todoDao->showTodoList();
    }

    /**
     * To update todo
     * @param $id
     * @return view update page
     * 
     */
    public function updateTodoView($id)
    {
        return $this->todoDao->updateTodoView($id);
    }

    /**
     * To put update todo
     * @param TodoRequest $request id, name, instruction
     * @return view todo list page
     * 
     */
    public function updateTodo($id, $name, $instruction)
    {
        return $this->todoDao->updateTodo($id, $name, $instruction);
    }

    /**
     * To delete todo
     * @param $id
     * @return view todo list view
     * 
     */
    public function deleteTodo($id)
    {
        return $this->todoDao->deleteTodo($id);
    }
}
