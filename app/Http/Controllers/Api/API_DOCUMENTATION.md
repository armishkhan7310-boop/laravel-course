# Student Management REST API

## Base URL

http://127.0.0.1:8000/api

---

## Authentication

Bearer Token Required

---

## Register User

POST /register

Body

{
"name":"Armish Khan",
"email":"armish@gmail.com",
"password":"123456",
"password_confirmation":"123456"
}

Response

201 Created

---

## Login User

POST /login

Body

{
"email":"armish@gmail.com",
"password":"123456"
}

Response

200 OK

Returns API Token

---

## Get All Students

GET /students

Authorization

Bearer Token

Response

200 OK

---

## Get Single Student

GET /students/{id}

Authorization

Bearer Token

Response

200 OK

404 Not Found

---

## Create Student

POST /students

Authorization

Bearer Token

Body

{
"name":"Ali",
"email":"ali@gmail.com",
"course_id":1
}

Response

201 Created

---

## Update Student

PUT /students/{id}

Authorization

Bearer Token

Body

{
"name":"Ali Updated",
"email":"ali@gmail.com",
"course_id":2
}

Response

200 OK

---

## Delete Student

DELETE /students/{id}

Authorization

Bearer Token

Response

200 OK