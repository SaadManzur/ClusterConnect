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
**POST** ``` http://localhost:XXXX/api/login ```

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
**POST** ``` http://localhost:XXXX/api/register ```

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
**POST** ``` http://localhost:XXXX/api/user/update_location ```

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

### Update Address

#### Request
**POST** ``` http://localhost:XXXX/api/user/update_address ```

#### Header
Pass the bearer token as header.

#### Body
```
{
	"street_address1": [max: 255 chars, required],
	"street_address2": [max: 255 chars],
	"region": [division, required],
	"zipcode": [integer, required],
	"longitude": [float, required], 
	"latitude": [float, required]
}
```
#### Resoponse
```
{
    "data": [],
    "message": [message, if needed]
}
```

### User Profile

#### Request
**GET** ``` http://localhost:XXXX/api/user/profile ```

#### Header
Pass the bearer token as header.

#### Body
Not required

#### Resoponse
```
{
    "data": {
        "id": [int],
        "name": "",
        "phone": "",
        "home_longitude": [float],
        "home_latitude": [float],
        "longitude": [float],
        "latitude": [float],
        "email": [email],
        "created_at": "2020-04-04 19:55:00",
        "updated_at": "2020-04-04 20:15:28",
        "address": {
            "id": 1,
            "street_address1": "",
            "street_address2": "",
            "region": "",
            "zipcode": [int],
            "longitude": [float],
            "latitude": [float],
            "created_at": "2020-04-04 19:55:00",
            "updated_at": "2020-04-04 19:57:46"
        }
    },
    "message": [message, if needed]
}
```