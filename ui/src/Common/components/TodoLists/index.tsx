import React, { useContext } from 'react';
import TodoContext from '../../contexts/TodoContext';
import TodoList from '../TodoList';
import {
  TodoListsContainer,
  Header,
  HeaderText,
  MainContainer,
  FormContainer
} from './styled';
import TodoListForm from '../TodoListForm';

export default function TodoLists() {
  const { todoLists } = useContext(TodoContext);

  return (
    <MainContainer>
      <Header>
        <HeaderText>TODO LIST</HeaderText>
      </Header>
      <FormContainer>
        <TodoListForm />
      </FormContainer>
      <TodoListsContainer>
        {todoLists.map(todoList => (
          <TodoList key={todoList.id} todoList={todoList} />
        ))}
      </TodoListsContainer>
    </MainContainer>
  );
}
