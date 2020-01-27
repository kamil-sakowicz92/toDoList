<?php

namespace App\Application\TodoItem;

use App\Repository\TodoItemRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class TodoItemEditHandler.
 */
class TodoItemEditHandler
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
     * TodoItemEditHandler constructor.
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
     * @param TodoItemEditCommand $command
     */
    public function handle(TodoItemEditCommand $command): void
    {
        $todoItem = $this->repository->find($command->getId());
        $todoItem->setComplete($command->getComplete());
        $this->manager->persist($todoItem);
        $this->manager->flush();
    }
}
