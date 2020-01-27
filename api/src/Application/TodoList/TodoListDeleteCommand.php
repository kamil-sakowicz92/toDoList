<?php

namespace App\Application\TodoList;


/**
 * Class TodoListDeleteCommand.
 */
class TodoListDeleteCommand
{
    /**
     * @var int
     */
    private $id;

    /**
     * TodoListDeleteCommand constructor.
     *
     * @param int $id
     */
    public function __construct(
        int $id
    )
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
