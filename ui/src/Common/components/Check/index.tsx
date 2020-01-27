import React from 'react';
import { FaCheck, FaTimes } from 'react-icons/fa';

type Props = {
  isCheck: boolean;
};

export const Check: React.FC<Props> = ({ isCheck }: Props) => {
  return isCheck ? <FaCheck /> : <FaTimes />;
};

export default Check;
