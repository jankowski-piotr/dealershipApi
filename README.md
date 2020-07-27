
# Dealship API - coding skill test
>Laravel API for simple dealership operation.


---

## Installation

- All the `code` required to get started

### Clone

- Clone this repo to your local machine using 

`https://github.com/jankowski-piotr/dealershipApi.git`

### Setup

- install enviroment with webserver and mysql/mariadb 

- update depandencies 

```
composer-update
```

- run migrations and seeders

```
php artisan migrate:fresh --seed
```

- use http request builder for testing

- obtain access token

```POST /api/login HTTP/1.1
Host: dealership.test
cache-control: no-cache
Content-Type: multipart/form-data;
Content-Disposition: form-data; name="email"
admin@dealership.test
Content-Disposition: form-data; name="password"
password
```

- consume api with access token




---

## Features
- Automatic migrate and seed database
- Create users and oauth clients/tokens
- Domain API

---

## License

[![License](http://img.shields.io/:license-mit-blue.svg?style=flat-square)](http://badges.mit-license.org)

- **[MIT license](http://opensource.org/licenses/mit-license.php)**a