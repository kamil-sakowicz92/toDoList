import React from 'react';
import { StyledButton } from './styled';

type Props = {
  title: string;
  action: string;
  onClick: (e: any) => void;
  size?: number;
};

export const Button: React.FC<Props> = ({
  title,
  action,
  onClick,
  size
}: Props) => {
  return (
    <StyledButton action={action} size={size} onClick={onClick}>
      {title}
    </StyledButton>
  );
};

export default Button;
