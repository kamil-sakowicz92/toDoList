import React from 'react';
import { FormInputContainer } from './styled';

type Props = {
  value: string;
  name: string;
  onChange: (e: any) => void;
  title?: boolean;
};

export const FormInput: React.FC<Props> = ({
  value,
  name,
  onChange,
  title
}: Props) => {
  return (
    <FormInputContainer>
      {title && name}
      <input value={value} name={name} onChange={onChange} />
    </FormInputContainer>
  );
};

export default FormInput;
