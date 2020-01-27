import {
  addTodoList,
  completeTodo,
  completeTodoListItem,
  deleteTodoListItem,
  deleteTodoList
} from '../TodosActions';

export function useTodos([todoLists, setTodosLists]) {
  return {
    todoLists,
    addTodoList: todo => setTodosLists(addTodoList(todoLists, todo)),
    deleteTodoList: todo => setTodosLists(deleteTodoList(todoLists, todo)),
    completeTodo: todo => setTodosLists(completeTodo(todoLists, todo)),
    completeTodoListItem: todo => setTodosLists(completeTodoListItem(todoLists, todo)),
    deleteTodoListItem: todo => setTodosLists(deleteTodoListItem(todoLists, todo)),
  };
}
