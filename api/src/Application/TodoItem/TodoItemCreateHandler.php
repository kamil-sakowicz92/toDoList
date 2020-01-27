<?php

namespace App\Application\TodoItem;

use App\Entity\TodoItem;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class TodoItemCreateHandler.
 */
class TodoItemCreateHandler
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
     * @param TodoItemCreateCommand $command
     */
    public function handle(TodoItemCreateCommand $command): void
    {
        $todoItem = new TodoItem(
            $command->getDescription(),
            $command->isComplete()
        );
        $todoItem->setList($command->getList());
        $this->manager->persist($todoItem);
        $this->manager->flush();
    }
}
