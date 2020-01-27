<?php

namespace App\Application\TodoItem;

use App\Entity\TodoList;

/**
 * Class TodoItemCreateCommand.
 */
class TodoItemCreateCommand
{
    /**
     * @var string
     */
    private $description;

    /**
     * @var bool
     */
    private $complete;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TodoList", inversedBy="items")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $list;

    /**
     * TodoItemCreateCommand constructor.
     *
     * @param string $description
     * @param bool $complete
     */
    public function __construct(
        ?string $description = '',
        ?bool $complete = false
    )
    {
        $this->description = $description;
        $this->complete = $complete;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return bool
     */
    public function isComplete(): bool
    {
        return $this->complete;
    }

    /**
     * @param bool $complete
     */
    public function setComplete(bool $complete): void
    {
        $this->complete = $complete;
    }

    /**
     * @param TodoList|null $list
     *
     * @return TodoItemCreateCommand
     */
    public function setList(?TodoList $list): self
    {
        $this->list = $list;

        return $this;
    }

    /**
     * @return TodoList|null
     */
    public function getList(): ?TodoList
    {
        return $this->list;
    }
}
