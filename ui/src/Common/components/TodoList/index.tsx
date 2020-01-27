import React, { useContext } from 'react';
import TodoItem from '../TodoItem';
import {
  Container,
  DeleteTodoListIcon,
  Header,
  HeaderText,
  TodoItemsContainer
} from './styled';
import TodoContext from '../../contexts/TodoContext';
import TodoListItemForm from '../TodoListItemForm';
import {TodoListInterface} from '../../../Core/models/TodoListInterface';

type Props = {
  todoList: TodoListInterface;
};

export const TodoList: React.FC<Props> = ({
  todoList: { id, title, description, createdAt, todoItems }
}: Props) => {
  const { deleteTodoList } = useContext(TodoContext);
  return (
    <Container>
      <Header>
        <HeaderText>{title}</HeaderText>
        <DeleteTodoListIcon onClick={() => deleteTodoList(id)} />
      </Header>
      <TodoListItemForm />
      <TodoItemsContainer>
        {todoItems.map(todoItem => (
          <TodoItem key={todoItem.id} todoItem={todoItem} />
        ))}
      </TodoItemsContainer>
    </Container>
  );
};

export default TodoList;
