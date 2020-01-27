<?php

namespace App\Application\TodoList;

use App\Entity\TodoItem;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class TodoListCreateCommand.
 */
class TodoListCreateCommand
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var TodoItem
     */
    private $todoItems;

    /**
     * TodoListCreateCommand constructor.
     *
     * @param string $title
     */
    public function __construct(
        ?string $title = ''
    )
    {
        $this->title = $title;
        $this->todoItems = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param TodoItem $todoItems
     *
     * @return TodoListCreateCommand
     */
    public function setTodoItems(TodoItem $todoItems): self
    {
        $this->todoItems = $todoItems;

        return $this;
    }

    /**
     * @return TodoItem
     */
    public function getTodoItems(): ?TodoItem
    {
        return $this->todoItems;
    }
}
