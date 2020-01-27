import React, { useState, useContext } from 'react';
import './App.css';
import TodoLists from './Common/components/TodoLists';
import TodoContext from './Common/contexts/TodoContext';
import { useTodos } from './Common/contexts/TodosHooks';

const App: React.FC = () => {
  const todo = useTodos(useState(useContext(TodoContext)));
  return (
    <TodoContext.Provider value={todo}>
      <TodoLists />
    </TodoContext.Provider>
  );
};

export default App;
