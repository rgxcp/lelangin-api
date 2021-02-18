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
2. Copy `.env.example` file to `.env`.
3. Generate application key `php artisan key:generate`.
4. Generate storage symbolic link `php artisan storage:link`.
5. Create database `lelangin_sandbox` and configure it on `.env` file.
6. Run migration `php artisan migrate`.
7. Run seeder `php artisan db:seed`.
8. Run server `bash server.sh --start`.
9. Fire-up Postman.
10. Do-what-you-want-with-it!

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
Total Tasks : `170`

Completed Tasks : `81`

Progress : `47.64%`

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
  - [x] Owner
- [x] Create base requests
  - [x] LoginRequest
  - [x] RegisterRequest
  - [x] StoreAccountRequest
  - [x] StoreAddressRequest
  - [x] StoreProductRequest
  - [x] UpdateAccountRequest
  - [x] UpdateAddressRequest
  - [x] UpdateProductRequest
- [x] Register middleware on kernel
- [x] Configure middleware priority on kernel
- [x] Create traits
  - [x] FailedFormValidation
  - [x] SerializeDate
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
- [ ] Fill base requests
  - [x] LoginRequest
  - [x] RegisterRequest
  - [x] StoreAccountRequest
  - [x] StoreAddressRequest
  - [x] StoreProductRequest
  - [ ] UpdateAccountRequest
  - [ ] UpdateAddressRequest
  - [ ] UpdateProductRequest
- [ ] Fill base middleware
  - [x] JSONHeader
  - [ ] Owner
- [ ] Fill base models
  - [ ] Account
    - [ ] SoftDeletes trait
    - [ ] `$fillable` attributes
    - [ ] `$hidden` attributes
    - [ ] Events
    - [ ] Relationships
    - [ ] Accessors
    - [ ] Mutator
  - [ ] Address
    - [ ] SoftDeletes trait
    - [ ] `$fillable` attributes
    - [ ] `$hidden` attributes
    - [ ] Events
    - [ ] Relationships
    - [ ] Accessors
    - [ ] Mutator
  - [ ] Bank
    - [ ] SoftDeletes trait
    - [ ] `$fillable` attributes
    - [ ] `$hidden` attributes
    - [ ] Events
    - [ ] Relationships
    - [ ] Accessors
    - [ ] Mutator
  - [ ] Image
    - [ ] SoftDeletes trait
    - [ ] `$fillable` attributes
    - [ ] `$hidden` attributes
    - [ ] Events
    - [ ] Relationships
    - [ ] Accessors
    - [ ] Mutator
  - [ ] Invoice
    - [ ] SoftDeletes trait
    - [ ] `$fillable` attributes
    - [ ] `$hidden` attributes
    - [ ] Events
    - [ ] Relationships
    - [ ] Accessors
    - [ ] Mutator
  - [ ] Product
    - [ ] SoftDeletes trait
    - [ ] `$fillable` attributes
    - [ ] `$hidden` attributes
    - [ ] Events
    - [ ] Relationships
    - [ ] Accessors
    - [ ] Mutator
  - [ ] User
    - [ ] SoftDeletes trait
    - [ ] `$fillable` attributes
    - [ ] `$hidden` attributes
    - [ ] Events
    - [ ] Relationships
    - [ ] Accessors
    - [ ] Mutator
- [ ] Fill base controllers
  - [ ] AccountController
    - [ ] `index()`
    - [ ] `store()`
    - [ ] `update()`
  - [ ] AddressController
    - [ ] `index()`
    - [ ] `store()`
    - [ ] `update()`
  - [ ] AuthController
    - [ ] `register()`
    - [ ] `login()`
  - [ ] InvoiceController
    - [ ] `index()`
    - [ ] `show()`
  - [ ] ProductController
    - [ ] `index()`
    - [ ] `show()`
    - [ ] `store()`
    - [ ] `update()`
    - [ ] `destroy()`
  - [ ] UserController
    - [ ] `show()`
  - [ ] UserProductController
    - [ ] `index()`
- [ ] Translate English locale to Indonesian
