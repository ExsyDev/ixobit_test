# This is test task for company Ixobit SRL
## Task source
https://docs.google.com/document/d/1jMZNZFrRXtkEGwJClPLLx9-Najz-BpV-/edit?usp=drive_link&ouid=110226141815530008294&rtpof=true&sd=true

# Installation

- Clone this project
- Create database `ixobit_test`
- Run `cp .env.example .env` and configure database and application url
- Run `composer install && php artisan migrate && php artisan key:generate`
- Application is ready for use

# API Routes Documentation

Below is a list of API routes for this application, you can use Postman for use it

## Brands

### Get All Brands

- **URL:** `/api/brands/`
- **Method:** GET
- **Description:** Retrieve a list of all brands.

### Get Brand by ID

- **URL:** `/api/brands/{brand}`
- **Method:** GET
- **Description:** Retrieve information about a specific brand by its ID.

### Create a New Brand

- **URL:** `/api/brands/create`
- **Method:** PUT
- **Description:** Create a new brand.

### Update Brand

- **URL:** `/api/brands/update/{brand}`
- **Method:** PATCH
- **Description:** Update information for a specific brand.

### Delete Brand

- **URL:** `/api/brands/delete/{brand}`
- **Method:** DELETE
- **Description:** Delete a specific brand.

## Products

### Get All Products

- **URL:** `/api/products/`
- **Method:** GET
- **Description:** Retrieve a list of all products.

### Get Product by ID

- **URL:** `/api/products/{product}`
- **Method:** GET
- **Description:** Retrieve information about a specific product by its ID.

### Create a New Product

- **URL:** `/api/products/create`
- **Method:** PUT
- **Description:** Create a new product.

### Update Product

- **URL:** `/api/products/update/{product}`
- **Method:** PATCH
- **Description:** Update information for a specific product.

### Delete Product

- **URL:** `/api/products/delete/{product}`
- **Method:** DELETE
- **Description:** Delete a specific product.

## Clients

### Get All Clients

- **URL:** `/api/clients/`
- **Method:** GET
- **Description:** Retrieve a list of all clients.

### Get Client by ID

- **URL:** `/api/clients/{client}`
- **Method:** GET
- **Description:** Retrieve information about a specific client by its ID.

### Create a New Client

- **URL:** `/api/clients/create`
- **Method:** PUT
- **Description:** Create a new client.

### Update Client

- **URL:** `/api/clients/update/{client}`
- **Method:** PATCH
- **Description:** Update information for a specific client.

### Delete Client

- **URL:** `/api/clients/delete/{client}`
- **Method:** DELETE
- **Description:** Delete a specific client.

## Sales

### Get All Sales

- **URL:** `/api/sales/`
- **Method:** GET
- **Description:** Retrieve a list of all sales.

### Get Sale by ID

- **URL:** `/api/sales/{sale}`
- **Method:** GET
- **Description:** Retrieve information about a specific sale by its ID.

### Create a New Sale

- **URL:** `/api/sales/create`
- **Method:** PUT
- **Description:** Create a new sale.

### Update Sale

- **URL:** `/api/sales/update/{sale}`
- **Method:** PATCH
- **Description:** Update information for a specific sale.

### Delete Sale

- **URL:** `/api/sales/delete/{sale}`
- **Method:** DELETE
- **Description:** Delete a specific sale.

