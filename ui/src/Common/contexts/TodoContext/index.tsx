import React from 'react';

// Context is the global state to manage the todo list.
// This will be rewritten by the App that will use `useTodos`
// hook to manage context. Current value will be initial.
const TodoContext: any = React.createContext([
  {
    id: '1',
    title: 'test list title',
    description: 'test list description',
    complete: false,
    createdAt: '2019-03-02',
    todoItems: [
      {
        id: '1',
        description: 'test item description',
        complete: true,
        createdAt: '2019-03-04'
      },
      {
        id: '2',
        description: 'test 2 item description',
        complete: false,
        createdAt: '2019-03-05'
      }
    ]
  },
  {
    id: '2',
    title: 'test list title2',
    description: 'test list descriptio2n',
    complete: false,
    createdAt: '2019-03-02',
    todoItems: [
      {
        id: '1',
        description: 'test item description',
        complete: true,
        createdAt: '2019-03-04'
      },
      {
        id: '2',
        description: 'test 2 item description',
        complete: false,
        createdAt: '2019-03-05'
      }
    ]
  },
  {
    id: '3',
    title: 'test list title3',
    description: 'test list description3',
    complete: false,
    createdAt: '2019-03-02',
    todoItems: [
      {
        id: '1',
        description: 'test item description',
        complete: true,
        createdAt: '2019-03-04'
      },
      {
        id: '2',
        description: 'test 2 item description',
        complete: false,
        createdAt: '2019-03-05'
      },
      {
        id: '3',
        description: 'test 3 item description',
        complete: true,
        createdAt: '2019-03-04'
      },
      {
        id: '4',
        description: 'test 4 item description',
        complete: false,
        createdAt: '2019-03-05'
      }
    ]
  },
  {
    id: '4',
    title: 'test list title4',
    description: 'test list description4',
    complete: false,
    createdAt: '2019-03-02',
    todoItems: [
      {
        id: '1',
        description: 'test item description',
        complete: true,
        createdAt: '2019-03-04'
      },
      {
        id: '2',
        description: 'test 2 item description',
        complete: false,
        createdAt: '2019-03-05'
      }
    ]
  }
]);

export default TodoContext;
