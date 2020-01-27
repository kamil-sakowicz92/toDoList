<?php

namespace App\Controller;

use App\Application\TodoList\TodoListCreateCommand;
use App\Application\TodoList\TodoListDeleteCommand;
use App\Form\TodoListType;
use App\Repository\TodoListRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TodoListController
 * @Route("/api/todolist", name="todo_list.")
 */
class TodoListController extends AbstractFOSRestController
{

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
     * @param TodoListRepository $todoListRepository
     */
    public function __construct(
        CommandBus $commandBus,
        TodoListRepository $todoListRepository
    )
    {
        $this->commandBus = $commandBus;
        $this->todoListRepository = $todoListRepository;
    }

    /**
     * @Rest\Get(requirements={"listId" = "\d+"})
     *
     * @return Response
     */

    public function viewAll(): Response
    {
        $todoLists = $this->todoListRepository->findAll();

        if(empty($todoLists)) {
            return new JsonResponse(null,Response::HTTP_BAD_REQUEST);
        }

        return new JsonResponse($todoLists,Response::HTTP_OK);
    }

    /**
     * @Rest\Post("", name="add")
     * @Rest\View(populateDefaultVars=false, serializerGroups={"Default"})
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function addTodoList(Request $request): JsonResponse
    {
        try {
            $command = new TodoListCreateCommand();
            $form = $this->createForm(TodoListType::class, $command);
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
     * @param int $listId
     *
     * @return JsonResponse
     */
    public function deleteTodoList(int $listId): JsonResponse
    {
        try {
            $command = new TodoListDeleteCommand($listId);
            $this->commandBus->handle($command);
        } catch (\Exception $e) {
            return new JsonResponse(null,Response::HTTP_BAD_REQUEST);
        }

        return new JsonResponse('success',Response::HTTP_OK);
    }
}
