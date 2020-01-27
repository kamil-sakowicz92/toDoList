import styled from 'styled-components';
import { MdDelete } from 'react-icons/md';

export const Container = styled.div`
  align-content: center;
  justify-self: center;
  flex-direction: row;
  min-height: 200px;
  margin-bottom: 12;
  margin-left: 20px;
  border-radius: 6;
  width: 700px;
  margin-top: 50px;
  border: 1px solid black;
`;
export const Header = styled.div`
  display: flex;
  align-content: center;
  align-self: center;
  justify-content: center;
  height: 50px;
  width: 100%;
  border-bottom: 1px solid black;
`;
export const HeaderText = styled.text`
  font-size: 20px;
  display: flex;
  align-self: center;
  justify-self: center;
`;
export const TodoItemsContainer = styled.div`
  align-content: flex-start;
  justify-content: space-evenly;
  flex-wrap: wrap;
  display: flex;
  flex-direction: row;
  margin-bottom: 50px;
  width: 100%;
  height: 100%;
`;

export const DeleteTodoListIcon = styled(MdDelete)`
  display: flex;
  align-self: center;
`;
