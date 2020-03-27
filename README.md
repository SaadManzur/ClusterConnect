# ClusterConnect

## Installation
* Install composer and all the dependencies listed in Laravel's website
* Navigate to project directory,
* ``` composer require install ```
* ``` cp .env.example .env ```
* ``` php artisan generate:key ```
* Set the database name and credentials in the environment file
* ``` php artisan migrate ```
* ``` php artisan passport:install ```
* ``` php artisan serve ```

## APIs
Check status codes for errors. Corresponding error message will be provided in the responses message field.

### Login

#### Request
``` http://localhost:XXXX/api/login ```

#### Header
No authorization header required. Set type to json.

#### Body
```
{
	"phone": [11 digit phone number],
	"password": 
}
```
#### Resoponse
```
{
    "data": {
        "token": [provided token]
    },
    "message": [message, if needed]
}
```

### Register

#### Request
``` http://localhost:XXXX/api/register ```

#### Header
No authorization header required. Set type to json.

#### Body
```
{
	"name": ,
	"phone": [11 digit phone number],
	"email": [not mandatory],
	"password": ,
	"home_longitude": [required numeric value],
	"home_latitude": [required numeric value]
}
```
#### Resoponse
```
{
    "data": [],
    "message": [message, if needed]
}
```

### Update Location

#### Request
``` http://localhost:XXXX/api/update_location ```

#### Header
Pass the bearer token as header.

#### Body
```
{
	"longitude": [numeric required],
	"latitude": [numeric required]
}
```
#### Resoponse
```
{
    "data": [],
    "message": [message, if needed]
}
```