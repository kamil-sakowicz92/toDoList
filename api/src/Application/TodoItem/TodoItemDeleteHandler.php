<?php

namespace App\Application\TodoItem;

use App\Repository\TodoItemRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class TodoItemDeleteHandler.
 */
class TodoItemDeleteHandler
{
    /**
     * @var EntityManagerInterface
     */
    private $manager;

    /**
     * @var TodoItemRepository
     */
    private $repository;

    /**
     * TodoItemDeleteHandler constructor.
     *
     * @param EntityManagerInterface $manager
     * @param TodoItemRepository $todoItemRepository
     */
    public function __construct(
        EntityManagerInterface $manager,
        TodoItemRepository $todoItemRepository
    ) {
        $this->manager = $manager;
        $this->repository = $todoItemRepository;
    }

    /**
     * @param TodoItemDeleteCommand $command
     */
    public function handle(TodoItemDeleteCommand $command): void
    {
        $todoItem = $this->repository->find($command->getId());
        $this->manager->remove($todoItem);
        $this->manager->flush();
    }
}
