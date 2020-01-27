<?php

namespace App\Application\TodoList;

use App\Repository\TodoListRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class TodoListDeleteHandler.
 */
class TodoListDeleteHandler
{
    /**
     * @var TodoListRepository
     */
    private $repository;

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
     * @param TodoListDeleteCommand $command
     */
    public function handle(TodoListDeleteCommand $command): void
    {
        $todoList = $this->repository->find($command->getId());
        $this->manager->remove($todoList);
        $this->manager->flush();
    }
}
