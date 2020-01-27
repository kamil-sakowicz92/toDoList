import React, { useContext, useState } from 'react';
import TodoContext from '../../contexts/TodoContext';
import FormInput from '../FormInput';
import { FormContainer } from './styled';
import Button from '../Button';

export default function TodoListItemForm() {
  const { addTodoList } = useContext(TodoContext);
  const [todo, setTodo] = useState({
    description: ''
  });

  function handleTodoChange(e) {
    setTodo({ ...todo, [e.target.name]: e.target.value });
  }

  function handleTodoAdd() {
    addTodoList(todo);
    setTodo({
      description: ''
    });
  }

  return (
    <FormContainer>
      <FormInput
        value={todo.description}
        name={'description'}
        onChange={handleTodoChange}
      />
      <Button
        title="Add item"
        action="add"
        onClick={handleTodoAdd}
        size={100}
      />
    </FormContainer>
  );
}
