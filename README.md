# PHP - Laravel - Lelangin API
**EN**: API for Lelangin app.

**ID**: API untuk aplikasi Lelangin.

## Status
DEVELOPING

## Requirements
1. PHP
2. Composer
3. Laravel
4. MySQL
5. XAMPP
6. Postman

## How to Use
1. Clone this repository to your desired location.
2. Install dependencies `composer install`.
3. Copy `.env.example` file to `.env`.
4. Generate application key `php artisan key:generate`.
5. Generate storage symbolic link `php artisan storage:link`.
6. Create database `lelangin_sandbox` and configure it on `.env` file.
7. Run migration `php artisan migrate`.
8. Run seeder `php artisan db:seed`.
9. Run server `bash server.sh --start`.
10. Fire-up Postman.
11. Do-what-you-want-with-it!

## Endpoints
### GET
| URL                            | Description         |
|--------------------------------|---------------------|
| `api/v1/accounts`              | Show accounts       |
| `api/v1/addresses`             | Show addresses      |
| `api/v1/invoices`              | Show invoices       |
| `api/v1/invoices/{invoice}`    | Show invoice detail |
| `api/v1/products`              | Show products       |
| `api/v1/products/{product}`    | Show product detail |
| `api/v1/users/{user}`          | Show user detail    |
| `api/v1/users/{user}/products` | Show user products  |

### POST
| URL                | Description    |
|--------------------|----------------|
| `api/v1/accounts`  | Create account |
| `api/v1/addresses` | Create address |
| `api/v1/products`  | Create product |
| `api/v1/register`  | Register       |
| `api/v1/login`     | Login          |

### PUT
| URL                          | Description    |
|------------------------------|----------------|
| `api/v1/accounts/{account}`  | Update account |
| `api/v1/addresses/{address}` | Update address |
| `api/v1/products/{product}`  | Update product |

### DELETE
| URL                         | Description    |
|-----------------------------|----------------|
| `api/v1/products/{product}` | Delete product |

## TODOs
Total Tasks : `172`

Completed Tasks : `133`

Progress : `77.32%`

- [x] Configure app `.env`
- [x] Configure app filesystem driver
- [x] Change app timezone & locale to Indonesian
- [x] Install auth package (Sanctum)
- [x] Log SQL queries
- [x] Handle AuthenticationException class
- [x] Handle NotFoundHttpException class
- [x] Create base migrations
  - [x] users
  - [x] addresses
  - [x] banks
  - [x] accounts
  - [x] products
  - [x] images
  - [x] invoices
- [x] Create base models
  - [x] Account
  - [x] Address
  - [x] Bank
  - [x] Image
  - [x] Invoice
  - [x] Product
  - [x] User
- [x] Create base controllers
  - [x] AccountController
  - [x] AddressController
  - [x] AuthController
  - [x] InvoiceController
  - [x] ProductController
  - [x] UserController
  - [x] UserProductController
- [x] Create base middleware
  - [x] JSONHeader
  - [x] PreventProductModifiedWhenHasWinner
  - [x] Owner
- [x] Register middleware on kernel
- [x] Configure middleware priority on kernel
- [x] Create base requests
  - [x] LoginRequest
  - [x] RegisterRequest
  - [x] StoreAccountRequest
  - [x] StoreAddressRequest
  - [x] StoreProductRequest
  - [x] UpdateAccountRequest
  - [x] UpdateAddressRequest
  - [x] UpdateProductRequest
- [x] Create base observers
  - [x] ProductObserver
- [x] Register observers on event service provider
- [x] Create traits
  - [x] FailedValidation
  - [x] SerializeDate
  - [x] UploadImage
- [x] Create endpoints
  - [x] `GET` Show accounts
  - [x] `GET` Show addresses
  - [x] `GET` Show invoices
  - [x] `GET` Show invoice detail
  - [x] `GET` Show products
  - [x] `GET` Show product detail
  - [x] `GET` Show user detail
  - [x] `GET` Show user products
  - [x] `POST` Create account
  - [x] `POST` Create address
  - [x] `POST` Create product
  - [x] `POST` Register
  - [x] `POST` Login
  - [x] `PUT` Update account
  - [x] `PUT` Update address
  - [x] `PUT` Update product
  - [x] `DELETE` Delete product
- [x] Assign middleware on controllers
- [x] Fill base migrations
  - [x] users
  - [x] addresses
  - [x] banks
  - [x] accounts
  - [x] products
  - [x] images
  - [x] invoices
- [x] Fill base requests
  - [x] LoginRequest
  - [x] RegisterRequest
  - [x] StoreAccountRequest
  - [x] StoreAddressRequest
  - [x] StoreProductRequest
  - [x] UpdateAccountRequest
  - [x] UpdateAddressRequest
  - [x] UpdateProductRequest
- [x] Fill base middleware
  - [x] JSONHeader
  - [x] PreventProductModifiedWhenHasWinner
  - [x] Owner
- [ ] Fill base models
  - [ ] Account
    - [x] Traits
    - [x] `$fillable` attributes
    - [x] `$hidden` attributes
    - [ ] Relationships
    - [ ] Accessors
    - [ ] Mutator
  - [ ] Address
    - [x] Traits
    - [x] `$fillable` attributes
    - [x] `$hidden` attributes
    - [ ] Relationships
    - [ ] Accessors
    - [ ] Mutator
  - [ ] Bank
    - [x] Traits
    - [x] `$fillable` attributes
    - [x] `$hidden` attributes
    - [ ] Relationships
    - [ ] Accessors
    - [ ] Mutator
  - [ ] Image
    - [x] Traits
    - [x] `$fillable` attributes
    - [x] `$hidden` attributes
    - [ ] Relationships
    - [ ] Accessors
    - [ ] Mutator
  - [ ] Invoice
    - [x] Traits
    - [x] `$fillable` attributes
    - [x] `$hidden` attributes
    - [ ] Relationships
    - [ ] Accessors
    - [ ] Mutator
  - [ ] Product
    - [x] Traits
    - [x] `$fillable` attributes
    - [x] `$hidden` attributes
    - [ ] Relationships
    - [ ] Accessors
    - [ ] Mutator
  - [ ] User
    - [x] Traits
    - [x] `$fillable` attributes
    - [x] `$hidden` attributes
    - [ ] Relationships
    - [ ] Accessors
    - [ ] Mutator
- [ ] Fill base controllers
  - [x] AccountController
    - [x] `index()`
    - [x] `store()`
    - [x] `update()`
  - [x] AddressController
    - [x] `index()`
    - [x] `store()`
    - [x] `update()`
  - [x] AuthController
    - [x] `register()`
    - [x] `login()`
  - [ ] InvoiceController
    - [ ] `index()`
    - [ ] `show()`
  - [ ] ProductController
    - [ ] `index()`
    - [ ] `show()`
    - [x] `store()`
    - [x] `update()`
    - [x] `destroy()`
  - [x] UserController
    - [x] `show()`
  - [ ] UserProductController
    - [ ] `index()`
- [x] Fill base observers
  - [x] ProductObserver
    - [x] `deleted()`
- [ ] Translate English locale to Indonesian
