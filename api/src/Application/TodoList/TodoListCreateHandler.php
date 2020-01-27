<?php

namespace App\Application\TodoList;

use App\Entity\TodoList;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class TodoListCreateHandler.
 */
class TodoListCreateHandler
{
    /**
     * @var EntityManagerInterface
     */
    private $manager;

    /**
     * TodoListCreateHandler constructor.
     *
     * @param EntityManagerInterface $manager
     */
    public function __construct(
        EntityManagerInterface $manager
    ) {
        $this->manager = $manager;
    }

    /**
     * @param TodoListCreateCommand $command
     */
    public function handle(TodoListCreateCommand $command): void
    {
        $todoList = new TodoList(
            $command->getTitle()
        );
        $this->manager->persist($todoList);
        $this->manager->flush();
    }
}
