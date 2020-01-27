import styled from 'styled-components';

interface StyledButton {
  action: string;
  size?: number;
}

export const StyledButton = styled.button`
  width: 65px;
  height: 20px;
  background-color: ${(p: StyledButton) =>
    p.action === 'add' ? 'green' : 'red'};
  width: ${(p: StyledButton) => (p.size !== null ? p.size : '65')}px;
`;
