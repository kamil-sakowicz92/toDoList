<?php

namespace App\Application\TodoItem;

/**
 * Class TodoItemDeleteCommand.
 */
class TodoItemDeleteCommand
{
    /**
     * @var int
     */
    private $id;

    /**
     * TodoItemCreateCommand constructor.
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
