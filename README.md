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
Total Tasks : `167`

Completed Tasks : `7`

Progress : `4.19%`

- [x] Configure app `.env`
- [x] Configure app filesystem driver
- [x] Change app timezone & locale to Indonesian
- [x] Install auth package (Sanctum)
- [x] Log SQL queries
- [x] Handle AuthenticationException class
- [x] Handle NotFoundHttpException class
- [ ] Create base migrations
  - [ ] users
  - [ ] addresses
  - [ ] banks
  - [ ] accounts
  - [ ] products
  - [ ] images
  - [ ] invoices
- [ ] Create base models
  - [ ] Account
  - [ ] Address
  - [ ] Bank
  - [ ] Image
  - [ ] Invoice
  - [ ] Product
  - [ ] User
- [ ] Create base controllers
  - [ ] AccountController
  - [ ] AddressController
  - [ ] AuthController
  - [ ] InvoiceController
  - [ ] ProductController
  - [ ] UserController
- [ ] Create endpoints
  - [ ] `GET` Show accounts
  - [ ] `GET` Show addresses
  - [ ] `GET` Show invoices
  - [ ] `GET` Show invoice detail
  - [ ] `GET` Show products
  - [ ] `GET` Show product detail
  - [ ] `GET` Show user detail
  - [ ] `GET` Show user products
  - [ ] `POST` Create account
  - [ ] `POST` Create address
  - [ ] `POST` Create product
  - [ ] `POST` Register
  - [ ] `POST` Login
  - [ ] `PUT` Update account
  - [ ] `PUT` Update address
  - [ ] `PUT` Update product
  - [ ] `DELETE` Delete product
- [ ] Create base middleware
  - [ ] JSONHeader
  - [ ] Owner
- [ ] Register middleware on kernel
- [ ] Assign middleware on route
- [ ] Create base requests
  - [ ] LoginRequest
  - [ ] RegisterRequest
  - [ ] StoreAccountRequest
  - [ ] StoreAddressRequest
  - [ ] StoreProductRequest
  - [ ] UpdateAccountRequest
  - [ ] UpdateAddressRequest
  - [ ] UpdateProductRequest
- [ ] Create traits
  - [ ] FailedFormValidation
  - [ ] SerializeDate
- [ ] Fill base migrations
  - [ ] users
  - [ ] addresses
  - [ ] banks
  - [ ] accounts
  - [ ] products
  - [ ] images
  - [ ] invoices
- [ ] Fill base middleware
  - [ ] JSONHeader
  - [ ] Owner
- [ ] Fill base requests
  - [ ] LoginRequest
  - [ ] RegisterRequest
  - [ ] StoreAccountRequest
  - [ ] StoreAddressRequest
  - [ ] StoreProductRequest
  - [ ] UpdateAccountRequest
  - [ ] UpdateAddressRequest
  - [ ] UpdateProductRequest
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
    - [ ] `products()`
- [ ] Translate English locale to Indonesian
