# Air Pollution API Documentation

## Register User

- **Endpoint**: `GET http://127.0.0.1:8000/api/register`
- **Description**: Register a new user.
- **Request Body**:
  ```json
    {
        "name": "linggar",
        "email": "linggarmc@gmail.com",
        "password": "linggar123"
    }
  ```

## Login User

- **Endpoint**: `POST http://127.0.0.1:8000/api/login`
- **Description**: Log in a user.
- **Request Body**:
    ```json
    {
        "email": "linggarmc@gmail.com",
        "password": "linggar123"
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


*   **Endpoint**: `GET http://127.0.0.1:8000/api/v1/pollutions?per_page=5&page=2`
*   **Description**: Retrieve pollution data with pagination.
*   **Authorization**: Bearer Token
*   **Request Header**:
    *   `Authorization`: `your-api-token`
    *   `Accept`: `application/json`

## Get Pollution Data by ID

*   **Endpoint**: `GET http://localhost:8000/api/v1/pollutions/1`
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
        "NH3": 1.23,
        "NO2": 0.45,
        "CO": 0.67,
        "PM2_5": 10.5,
        "Temp": 22.5,
        "Pressure": 1013.25,
        "Humidity": 60.4,
        "O3": 0.98,
        "Date": "2024-09-06 14:30:00"
    }
    

## Update Pollution Data


*   **Endpoint**: `PUT http://localhost:8000/api/v1/pollutions/1`
*   **Description**: Update existing pollution data entry.
*   **Authorization**: Bearer Token
*   **Request Header**:
    *   `Authorization`: `your-api-token`
    *   `Content-Type`: `application/json`
    *   `Accept`: `application/json`
*   **Request Body**:
    ``````json
    {
        "NH3": 1.23,
        "NO2": 0.45,
        "CO": 0.67,
        "PM2_5": 10.5,
        "Temp": 22.5,
        "Pressure": 1013.25,
        "Humidity": 60.4,
        "O3": 0.98,
        "Date": "2024-09-06 14:30:00"
    }
    

## Delete Pollution Data


*   **Endpoint**: `DELETE http://127.0.0.1:8000/api/v1/pollutions/1002`
*   **Description**: Delete pollution data entry by ID.
*   **Authorization**: Bearer Token
*   **Request Header**:
    *   `Authorization`: `your-api-token`
    *   `Accept`: `application/json`


### Notes:
- **Authorization** headers are included where necessary for API endpoints that require authentication.
- **Get All Users** until **Delete Pollution Data** only able to be used if user already **login**
- **Endpoints** use a combination of HTTP methods (GET, POST, PUT, DELETE) to interact with the API.
