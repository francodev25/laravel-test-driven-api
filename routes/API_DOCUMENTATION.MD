# API DOCUMENTACION

## Listado de 'To Dos'   /todo-list
---

# Lista de rutas 


### Request : `GET api/todo-list`
### Response
### Status : `200` :ok_hand:


:information_source: In this example response an Array Collection with ten JSONs.


```json
[
    {
    "id": 1,
    "name": "Corrupti eaque odio sunt veritatis nihil.",
    "created_at": "2022-03-17T21:55:05.000000Z",
    "updated_at": "2022-03-17T21:55:05.000000Z"
    },
    {
    "id": 2,
    "name": "Consequuntur non quia officia fugiat voluptatem vel in.",
    "created_at": "2022-03-17T21:55:05.000000Z",
    "updated_at": "2022-03-17T21:55:05.000000Z"
    },
    {
    "id": 3,
    "name": "Nulla consequatur fugiat et vero quia saepe vel officia.",
    "created_at": "2022-03-17T21:55:05.000000Z",
    "updated_at": "2022-03-17T21:55:05.000000Z"
    },
    {
    "id": 4,
    "name": "Quia et maiores tenetur qui ex dolorem sed.",
    "created_at": "2022-03-17T21:55:05.000000Z",
    "updated_at": "2022-03-17T21:55:05.000000Z"
    },
    {
    "id": 5,
    "name": "Aut sit aliquam quaerat alias impedit similique placeat.",
    "created_at": "2022-03-17T21:55:05.000000Z",
    "updated_at": "2022-03-17T21:55:05.000000Z"
    },
    {
    "id": 6,
    "name": "Praesentium quam blanditiis distinctio enim dicta.",
    "created_at": "2022-03-17T21:55:05.000000Z",
    "updated_at": "2022-03-17T21:55:05.000000Z"
    },
    {
    "id": 7,
    "name": "Dolore ipsam labore mollitia alias.",
    "created_at": "2022-03-17T21:55:05.000000Z",
    "updated_at": "2022-03-17T21:55:05.000000Z"
    },
    {
    "id": 8,
    "name": "Rerum corrupti ex excepturi quia laudantium nihil.",
    "created_at": "2022-03-17T21:55:05.000000Z",
    "updated_at": "2022-03-17T21:55:05.000000Z"
    },
    {
    "id": 9,
    "name": "Fugit est doloremque consectetur quo animi.",
    "created_at": "2022-03-17T21:55:05.000000Z",
    "updated_at": "2022-03-17T21:55:05.000000Z"
    },
    {
    "id": 10,
    "name": "Dicta non repellat nihil ab dolores voluptate alias.",
    "created_at": "2022-03-17T21:55:05.000000Z",
    "updated_at": "2022-03-17T21:55:05.000000Z"
    }
]
```
---

### Request : `GET api/todo-list/{todo_list}`
### Parameters : 
* `{todo_list}` It should be a number. Example: 1
### Response
### Status : `200` :ok_hand:


:information_source: In this example response an Single JSON.



```json
    {
    "id": 1,
    "name": "Corrupti eaque odio sunt veritatis nihil.",
    "created_at": "2022-03-17T21:55:05.000000Z",
    "updated_at": "2022-03-17T21:55:05.000000Z"
    }
```