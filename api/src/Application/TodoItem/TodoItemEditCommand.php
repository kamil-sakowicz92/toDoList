<?php

namespace App\Application\TodoItem;

/**
 * Class TodoItemEditCommand.
 */
class TodoItemEditCommand
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var bool
     */
    private $complete;

    /**
     * TodoItemEditCommand constructor.
     *
     * @param int $id
     * @param bool $complete
     */
    public function __construct(
        int $id,
        bool $complete
    )
    {
        $this->id = $id;
        $this->complete = $complete;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function getComplete(): bool
    {
        return $this->complete;
    }
}
