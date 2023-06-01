# API сервис курьерской доставки
Это репозиторий содержит прототип API сервиса курьерской доставки на PHP с использованием фреймворка Laravel.

# Описание
API сервис предоставляет набор методов для управления заказами и расчета стоимости доставки внутригородских заказов. Присутвуют тесты

### Требования
Для запуска и развертывания сервиса необходимо следующее:

- PHP 7.4 или выше
- Laravel фреймворк
- MySQL сервер
- Composer

# API
- Create an Order
```bash
api/orders
```
Method: POST

Parameters:

- user_id (required): The ID of the user.
- sender_address (required): The sender's address.
- receiver_address (required): The receiver's address.

Example Request:
```bash
POST /api/orders?user_id=1&sender_address=sender_address&receiver_address=receiver_address
```
Example Response:

```bash
Status: 201 Created
Content-Type: application/json

{
    "data": {
        "id": 2,
        "user_id": "1",
        "sender_address": "sender_address",
        "receiver_address": "receiver_address",
        "created_at": "2023-06-01T16:57:27.000000Z"
    }
}
```

- Calculate Order Price
```bash
api/calculate
```
Method: GET

Parameters:

- order_id (required): The ID of the order.
- sender_address (required): The sender's address.
- receiver_address (required): The receiver's address.

Example Request:
```bash
GET /calculate?order_id=1&sender_address=sender_address&receiver_address=receiver_address
```
Example Response:

```bash
Status: 200 OK
Content-Type: application/json

{
    "data": {
        "price": 7318,
        "sender_address": "sender_address",
        "receiver_address": "receiver_address",
        "order_id": "1"
    }
}
```

- Get a List of Orders
```bash
api/orders
```
Method: GET

Example Request:
```bash
GET /orders
```
Example Response:

```bash
Status: 200 OK
Content-Type: application/json

{
    "data": [
        {
            "id": 2,
            "user_id": 1,
            "sender_address": "sender_address",
            "receiver_address": "receiver_address",
            "created_at": "2023-06-01T16:57:27.000000Z"
        },
        ...
    ]
}
```

- Get an Order by ID
```bash
URL: /orders/{id}
```
Method: GET

Example Request:
```bash
GET /orders/2
```
Example Response:

```bash
Status: 200 OK
Content-Type: application/json

{
    "data": {
        "id": 2,
        "user_id": 1,
        "sender_address": "sender_address",
        "receiver_address": "receiver_address",
        "created_at": "2023-06-01T16:57:27.000000Z"
    }
}
```
