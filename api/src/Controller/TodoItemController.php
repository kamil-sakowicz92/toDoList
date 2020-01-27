<?php

namespace App\Controller;

use App\Application\TodoItem\TodoItemCreateCommand;
use App\Application\TodoItem\TodoItemDeleteCommand;
use App\Form\TodoItemType;
use App\Repository\TodoItemRepository;
use App\Repository\TodoListRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use League\Tactician\CommandBus;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TodoItemController
 * @Route("/api/todoitem", name="todo_item.")
 */
class TodoItemController extends AbstractFOSRestController
{

    /**
     * @var TodoItemRepository
     */
    protected $todoItemRepository;

    /**
     * @var TodoListRepository
     */
    protected $todoListRepository;

    /**
     * @var CommandBus
     */
    protected $commandBus;

    /**
     * PaymentController constructor.
     *
     * @param CommandBus $commandBus
     * @param TodoItemRepository $todoItemRepository
     * @param TodoListRepository $todoListRepository
     */
    public function __construct(
        CommandBus $commandBus,
        TodoItemRepository $todoItemRepository,
        TodoListRepository $todoListRepository
    )
    {
        $this->commandBus = $commandBus;
        $this->todoItemRepository = $todoItemRepository;
        $this->todoListRepository = $todoListRepository;
    }

    /**
     * @Rest\Post("", name="add")
     * @Rest\View(populateDefaultVars=false, serializerGroups={"Default"})
     * @param Request $request
     * @param int $listId
     *
     * @return Response
     */
    public function addTodoItem(Request $request, int $listId): Response
    {
        $list = $this->todoListRepository->find($listId);
        if(empty($list)) {
            return new JsonResponse(null,Response::HTTP_BAD_REQUEST);
        }
        try {
            $command = new TodoItemCreateCommand();
            $command->setList($list);
            $form = $this->createForm(TodoItemType::class, $command);
            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) {
                $this->commandBus->handle($command);
            }

        } catch (\Exception $e) {
            return new JsonResponse(null,Response::HTTP_BAD_REQUEST);
        }
        return new JsonResponse('success',Response::HTTP_OK);
    }

    /**
     * @Route(requirements={"listId" = "\d+"}, name="delete")
     *
     * @param Response $response
     * @param int $listId
     *
     * @return JsonResponse
     */
    public function deleteTodoItem(Response $response, int $listId): JsonResponse
    {
        try {
            $command = new TodoItemDeleteCommand($listId);
            $this->commandBus->handle($command);
        } catch (\Exception $e) {
            return new JsonResponse(null,Response::HTTP_BAD_REQUEST);
        }

        return new JsonResponse('success',Response::HTTP_OK);
    }
}
