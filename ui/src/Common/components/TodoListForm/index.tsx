import React, { useContext, useState } from 'react';
import TodoContext from '../../contexts/TodoContext';
import FormInput from '../FormInput';
import { FormContainer } from './styled';
import Button from '../Button';

export default function TodoListForm() {
  const { addTodoList } = useContext(TodoContext);
  const [todo, setTodo] = useState({
    title: '',
  });

  function handleTodoChange(e) {
    setTodo({ ...todo, [e.target.name]: e.target.value });
  }

  function handleTodoAdd() {
    addTodoList(todo);
    setTodo({
      title: ''
    });
  }

  return (
    <FormContainer>
      <FormInput
        value={todo.title}
        name={'title'}
        onChange={handleTodoChange}
        title
      />
      <Button
        title="Add new list"
        action={'add'}
        onClick={handleTodoAdd}
        size={100}
      />
    </FormContainer>
  );
}
