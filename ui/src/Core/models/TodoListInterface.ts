import { TodoItemInterface } from './TodoItemInterface'

export interface TodoListInterface {
  id: string;
  title: string;
  description: string;
  createdAt: string;
  todoItems: TodoItemInterface[];
}
