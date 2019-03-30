# The API for the Green Label Project

Green Label allows businesses to simplify and gamify the process of creating image classification datasets by allowing many people to work on the task simultaneously and competing with each other by getting points for each manually classified image and by gaining achievements for meeting certain milestones.

This documentation covers the public API.

## Competitions

### Getting a list of competitions:

**URL:** `{base_url}/api/competition/read.php`

**Requires authentication:** NO

**Request type:**: GET

**Request example:**   

```
n/a
```

**Response example:**

```
[
    {
        "name":"Trade Me Logo Detection",
        "description":"Help us getting rid of the company logos in images by separating the car photos into two buckets."
    }
]
```

## Authentication


### Registration

**URL:** `{base_url}/api/users/create.php`

**Requires authentication:** N/A

**Request type:**: POST

**Request example:**

```
{
  "email": "vlad@spreys.com",
  "password": "MyPassword",
  "name": "Vlad Spreys"
}
```

**Response example:**

```
{
    "message": "User was created."
}
```


### Login

**URL:** `{base_url}/api/users/login.php`

**Requires authentication:** N/A

**Request type:**: POST

**Request example:**

**Request example:**   

```
{
  "email": "vlad@spreys.com",
  "password": "MyPassword",
}
```

**Response example:**

```
{
    "message":"Successful login.",
    "jwt":"JWT token"
}
```
