# API DOCUMENTACION

## User Operations:

### Request : `POST api/register`
### Body Form Data : Example 

```json
    {
        name: 'NameTextExample',
        email: 'thisemail@some.com',
        password: 'password',
        password_confirmation: 'password',
    }
```
### Response
### Status : `201` :ok_hand:


:information_source: In this example response an Single JSON.



```json
    {
        "name": "NameTextExample",
        "email": "thisemail@some.com",
        "updated_at": "2022-03-20T18:45:59.000000Z",
        "created_at": "2022-03-20T18:45:59.000000Z",
        "id": 25
    }
```

## Listado de 'To Dos'   /todo-list
---

# Lista de rutas 





### Request : `GET api/todo-list`
### Header : Authorization Bearer '$TOKEN'
### Response
### Status : `200` :ok_hand:


:information_source: In this example response an Array Collection with two JSONs that belongs to the user_id 3.


```json
[
    {
    "id": 1,
    "name": "Corrupti eaque odio sunt veritatis nihil.",
    "user_id": 3,
    "created_at": "2022-03-17T21:55:05.000000Z",
    "updated_at": "2022-03-17T21:55:05.000000Z"
    },
    {
    "id": 2,
    "name": "Consequuntur non quia officia fugiat voluptatem vel in.",
    "user_id": 3,
    "created_at": "2022-03-17T21:55:05.000000Z",
    "updated_at": "2022-03-17T21:55:05.000000Z"
    }
]
```
---

### Request : `GET api/todo-list/{todo_list}`
### Parameters : 
* `{todo_list}` It should be a number. Example: 3
### Response
### Status : `200` :ok_hand:


:information_source: In this example response an Single JSON.



```json
{
    "id": 3,
    "name": "Sint exercitationem accusantium inventore deserunt.",
    "user_id": 3,
    "created_at": "2022-03-20T18:12:40.000000Z",
    "updated_at": "2022-03-20T18:12:40.000000Z"
}
```