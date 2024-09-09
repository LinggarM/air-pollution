# Air Pollution API
Air Pollution is a Laravel project that provides an API for managing air pollution data, along with a dashboard that implement this API.

# Data Air Pollution
Proyek ini menggunakan data yang diambil dari [Dataset of Indoor Air Pollutants using Low-Cost Sensors](https://data.mendeley.com/datasets/2r232jpfb2/1), yang merupakan data konsentrasi polutan udara dalam ruangan yang dikumpulkan dari semua musim di kota Pune, India, menggunakan sistem berbasis Internet of Things.

Data ini terdiri dari 173.468 catatan yang dikumpulkan dari November 2020 hingga Juli 2022, yang mencakup:

- **PM2.5 (Particulate Matter)** diukur menggunakan sensor Debu dan Asap GP2Y1010AU0F.
- **NO2 (Dioxida Nitrogen)**, **NH3 (Amonia)**, dan **CO (Karbon Monoksida)** diukur menggunakan sensor MICS-6814.
- **Ozon (O3)** diukur menggunakan sensor Semikonduktor MQ131.
- **Suhu** dan **Kelembapan** diukur menggunakan sensor BME 280.

Unit pengukuran untuk parameter-parameter ini adalah sebagai berikut:

- **NH3**: PPM
- **NO2**: PPM
- **CO**: PPM
- **PM2.5**: µg/m³
- **Suhu**: Celsius
- **Tekanan**: hPa
- **Kelembapan**: RH
- **Ozon**: PPB

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

# Installation

To set up and install the Air Pollution Laravel project with PostgreSQL, follow these steps:

1. **Clone the Repository**
    ```
    git clone https://github.com/LinggarM/air-pollution
2. **Navigate to the Project Directory**
    ```
    cd air-pollution
3. **Install Dependencies**
    ```
    composer install
4. **Set Up Environment File**
    ```
    cp .env.example .env
5. **Generate Application Key**
    ```
    php artisan key:generate
6. **Configure PostgreSQL Database**
    - Update your .env file with PostgreSQL database credentials:
        ```
        DB_CONNECTION=pgsql
        DB_HOST=127.0.0.1
        DB_PORT=5432
        DB_DATABASE=<database-name>
        DB_USERNAME=<database-username>
        DB_PASSWORD=<database-password>
7. **Run Migrations**
    ```
    php artisan migrate
8. **Start the Development Server**
    ```
    php artisan serve
    ```
8. **Open Generated Link**
   
    [http://127.0.0.1:8000/](http://127.0.0.1:8000/)


# Demo Link

[http://air-pollution.free.nf/](http://air-pollution.free.nf/) (Coming Soon)
