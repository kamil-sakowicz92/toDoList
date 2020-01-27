import React, { useContext } from 'react';
import { Row, TodoItemContainer } from './styled';
import Check from '../Check';
import TodoContext from '../../contexts/TodoContext';
import Button from '../Button';
import {TodoItemInterface} from "../../../Core/models/TodoItemInterface";

type Props = {
  todoItem: TodoItemInterface;
};

export const TodoItem: React.FC<Props> = ({
  todoItem: { id, description, complete }
}: Props) => {
  const { completeTodoListItem, deleteTodoListItem } = useContext(
    TodoContext
  );

  return (
    <TodoItemContainer>
      <Row>
        <Check isCheck={complete} />
        {description}
        <Button
          title="Done"
          action="add"
          onClick={() => {
            completeTodoListItem(id);
          }}
        />
        <Button
          title="Remove"
          action="remove"
          onClick={() => deleteTodoListItem(id)}
        />
      </Row>
    </TodoItemContainer>
  );
};

export default TodoItem;
