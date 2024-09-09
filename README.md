# Air Pollution API Documentation

## Register User

- **Endpoint**: `GET http://127.0.0.1:8000/api/register`
- **Description**: Register a new user.
- **Request Body**:
  ```json
    {
        "name": "string",
        "email": "string",
        "password": "string (min 8 character)"
    }
  ```
- **Response**:
  ```json
    {
        "data": {
            "name": "linggar",
            "email": "linggarmc@gmail.com",
            "updated_at": "2024-09-09T01:19:18.000000Z",
            "created_at": "2024-09-09T01:19:18.000000Z",
            "id": 1
        },
        "access_token": "1|6DAmsXBA7uP08px0YCBM7JybMQH4yagPpmZDX57y",
        "token_type": "Bearer"
    }
  ```

## Login User

- **Endpoint**: `POST http://127.0.0.1:8000/api/login`
- **Description**: Log in a user.
- **Request Body**:
    ```json
    {
        "email": "string",
        "password": "string"
    }
    

## Logout User

*   **Endpoint**: `POST http://127.0.0.1:8000/api/logout`
*   **Description**: Log out the currently authenticated user.
*   **Authorization**: Bearer Token
*   **Request Header**:
    *   `Authorization`: `your-api-token`

## Get All Users

*   **Endpoint**: `GET http://127.0.0.1:8000/api/user`
*   **Description**: Retrieve a list of all users.
*   **Authorization**: Bearer Token
*   **Request Header**:
    *   `Authorization`: `your-api-token`

## Get All Pollution Data

*   **Endpoint**: `GET http://127.0.0.1:8000/api/v1/pollutions`
*   **Description**: Retrieve pollution data with pagination.
*   **Authorization**: Bearer Token
*   **Request Header**:
    *   `Authorization`: `your-api-token`
    *   `Accept`: `application/json`
*   **Params**:
    *   `per_page`: `number`
    *   `page`: `number`

## Get Pollution Data by ID

*   **Endpoint**: `GET http://localhost:8000/api/v1/pollutions/{id}`
*   **Description**: Retrieve pollution data by a specific ID.
*   **Authorization**: Bearer Token
*   **Request Header**:
    *   `Authorization`: `your-api-token`
    *   `Accept`: `application/json`

## Create Pollution Data


*   **Endpoint**: `POST http://localhost:8000/api/v1/pollutions`
*   **Description**: Create new pollution data entry.
*   **Authorization**: Bearer Token
*   **Request Header**:
    *   `Authorization`: `your-api-token`
    *   `Content-Type`: `application/json`
    *   `Accept`: `application/json`
*   **Request Body**:
    ```json
    {
        "NH3": "float",
        "NO2": "float",
        "CO": "float",
        "PM2_5": "float",
        "Temp": "float",
        "Pressure": "float",
        "Humidity": "float",
        "O3": "float",
        "Date": "date"
    }
    

## Update Pollution Data


*   **Endpoint**: `PUT http://localhost:8000/api/v1/pollutions/{id}`
*   **Description**: Update existing pollution data entry.
*   **Authorization**: Bearer Token
*   **Request Header**:
    *   `Authorization`: `your-api-token`
    *   `Content-Type`: `application/json`
    *   `Accept`: `application/json`
*   **Request Body**:
    ```json
    {
        "NH3": "float",
        "NO2": "float",
        "CO": "float",
        "PM2_5": "float",
        "Temp": "float",
        "Pressure": "float",
        "Humidity": "float",
        "O3": "float",
        "Date": "date"
    }
    

## Delete Pollution Data


*   **Endpoint**: `DELETE http://127.0.0.1:8000/api/v1/pollutions/{id}`
*   **Description**: Delete pollution data entry by ID.
*   **Authorization**: Bearer Token
*   **Request Header**:
    *   `Authorization`: `your-api-token`
    *   `Accept`: `application/json`


### Notes:
- **Authorization** headers are included where necessary for API endpoints that require authentication.
- **Get All Users** until **Delete Pollution Data** can only be used if the user is already **logged in**
- **Endpoints** use a combination of HTTP methods (GET, POST, PUT, DELETE) to interact with the API.
