import {TodoListInterface} from "../../../Core/models/TodoListInterface";
import {deleteRequest, postRequest} from "../../../Core/api/requests";

export function addTodoList(todoLists: [], todoList: TodoListInterface) {
  // TODO api addTodoList
  postRequest('todolist',todoList).then(res => console.log(res))
  return [...todoLists];
}

export function deleteTodoList(todoLists: [], todoListId: string) {
  // TODO api addTodoList
  const test = deleteRequest('todolist').then(res => console.log(res))
  return [...todoLists];
}

export function completeTodo(todoLists: [], todoItemId: string) {
  // TODO api completeTodo
  return [...todoLists];
}

export function deleteTodoListItem(todoLists: [], todoItemId: string) {
  // TODO api deleteTodoListItem
  return [...todoLists];
}
export function completeTodoListItem(todoLists: [], todoItemId: string) {
  // TODO api completeTodoListItem
  return [...todoLists];
}
