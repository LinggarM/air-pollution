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
            "name": "string",
            "email": "string",
            "updated_at": "date",
            "created_at": "date",
            "id": "integer"
        },
        "access_token": "string",
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
- **Response**:
  ```json
    {
        "message": "string",
        "access_token": "string",
        "token_type": "Bearer"
    }
  ```
    

## Logout User

*   **Endpoint**: `POST http://127.0.0.1:8000/api/logout`
*   **Description**: Log out the currently authenticated user.
*   **Authorization**: Bearer Token
*   **Request Header**:
    *   `Authorization`: `your-api-token`
- **Response**:
  ```json
    {
        "message": "string"
    }
  ```

## Get All Users

*   **Endpoint**: `GET http://127.0.0.1:8000/api/user`
*   **Description**: Retrieve a list of all users.
*   **Authorization**: Bearer Token
*   **Request Header**:
    *   `Authorization`: `your-api-token`
- **Response**:
  ```json
    {
        "id": integer,
        "name": "string",
        "email": "string",
        "email_verified_at": "date",
        "created_at": "date",
        "updated_at": "date"
    }
  ```

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
*   **Response**:
    ```json
    {
        "status": "string",
        "message": "string",
        "data": {
            "current_page": "integer",
            "data": [
                {
                    "id": "integer",
                    "NH3": "float",
                    "NO2": "float",
                    "CO": "float",
                    "PM2_5": "float",
                    "Temp": "float",
                    "Pressure": "float",
                    "Humidity": "float",
                    "O3": "float",
                    "Date": "date",
                    "created_at": "date",
                    "updated_at": "date"
                },
                ...
            ],
            "first_page_url": "string",
            "from": "integer",
            "last_page": "integer",
            "last_page_url": "string",
            "links": [
                {
                    "url": "string",
                    "label": "string",
                    "active": "boolean"
                },
                ...
            ],
            "next_page_url": "string",
            "path": "string",
            "per_page": "integer",
            "prev_page_url": "string",
            "to": "integer",
            "total": "integer"
        }
    }
    ```

## Get Pollution Data by ID

*   **Endpoint**: `GET http://localhost:8000/api/v1/pollutions/{id}`
*   **Description**: Retrieve pollution data by a specific ID.
*   **Authorization**: Bearer Token
*   **Request Header**:
    *   `Authorization`: `your-api-token`
    *   `Accept`: `application/json`
- **Response**:
  ```json
    {
        "status": "string",
        "message": "string",
        "data": {
            "id": "integer",
            "NH3": "float",
            "NO2": "float",
            "CO": "float",
            "PM2_5": "float",
            "Temp": "float",
            "Pressure": "float",
            "Humidity": "float",
            "O3": "float",
            "Date": "date",
            "created_at": "date",
            "updated_at": "date"
        }
    }
  ```

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
- **Response**:
  ```json
    {
        "status": "string",
        "message": "string",
        "data": {
            "NH3": "float",
            "NO2": "float",
            "CO": "float",
            "PM2_5": "float",
            "Temp": "float",
            "Pressure": "float",
            "Humidity": "float",
            "O3": "float",
            "Date": "date",
            "created_at": "date",
            "updated_at": "date"
            "id": "integer",
        }
    }
  ```
    

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
- **Response**:
  ```json
    {
        "status": "string",
        "message": "string",
        "data": {
            "id": "integer",
            "NH3": "float",
            "NO2": "float",
            "CO": "float",
            "PM2_5": "float",
            "Temp": "float",
            "Pressure": "float",
            "Humidity": "float",
            "O3": "float",
            "Date": "date",
            "created_at": "date",
            "updated_at": "date"
        }
    }
  ```


## Delete Pollution Data


*   **Endpoint**: `DELETE http://127.0.0.1:8000/api/v1/pollutions/{id}`
*   **Description**: Delete pollution data entry by ID.
*   **Authorization**: Bearer Token
*   **Request Header**:
    *   `Authorization`: `your-api-token`
    *   `Accept`: `application/json`
- **Response**:
  ```json
    {
        "status": "string",
        "message": "string"
    }
  ```


### Notes:
- **Authorization** headers are included where necessary for API endpoints that require authentication.
- **Get All Users** until **Delete Pollution Data** can only be used if the user is already **logged in**
- **Endpoints** use a combination of HTTP methods (GET, POST, PUT, DELETE) to interact with the API.
