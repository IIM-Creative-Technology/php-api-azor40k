[![LinkedIn][linkedin-shield]][linkedin-url]

<br />
<p align="center">
  <h3 align="center">AC Symfony PULV API v1</h3>
  <p align="center">
    Léonard de Vinci Institute user management API by Axel Carandang<br />
  </p>
</p>



<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary><h2 style="display: inline-block">Table of Contents</h2></summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#docs">Documentation</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgements">Acknowledgements</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

Symfony API project with API Platform:<br>
**Leonard de Vinci Institute user management:**
`Student`, `Professor`, `Grade`, `Lesson`, `Mark`, `User_Admin`


### Built With

* [Symfony](https://symfony.com/)
* [API Platform](https://api-platform.com/)



<!-- GETTING STARTED -->
## Getting Started

To get a local copy up and running follow these simple steps.

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/IIM-Creative-Technology/php-api-azor40k
   ```
2. Install Composer packages
   ```sh
   composer install 
   ```
3. Generate JWT key
   ```sh
   openssl genrsa -out config/jwt/private.pem -aes256 4096
   ```
   ```sh
   openssl rsa -pubout -in config/jwt/private.pem -out  config/jwt/public.pem
   ```
   Change your JWT_PASSPHRASE on your <strong>.env</strong> file


<!-- Documentation -->
## Documentation

### API URL
```sh
   /api/v1/{ target }
   ```
#### Available { target } : <br>
`grades`, `lessons`, `marks`, `professors`, `students`, `users`, `docs`
#### Available REQUEST : <br>
`GET`, `POST`, `PUT`, `DELETE`, `PATCH` and other customs requests.

#### API Login : <br>
Before to be able to make any request you have to obtain a token through a `POST` request with [body parameters] on the API login URL : <br>
Request : `POST`
```sh
   /api/login
   ```
`Body` :
```sh
   {
     "email" : {user.email},
     "password" : {user.password}
   }
   ```
<br>

#### REQUEST examples : <br>
Request : `GET` | return all students
```sh
   /api/v1/students
   ```
Request : `GET`| return a specific student
```sh
   /api/v1/students/{student.id}
   ```

#### CUSTOM REQUEST available : <br>
Request : `GET` |  return all students from a specific grade
```sh
   /api/v1/grades/{grade.id}/students
   ```
Request : `GET` | return all marks from a specific student
```sh
   /api/v1/students/{student.id}/marks
   ```
<br><br>


<!-- CONTACT -->
## Contact
Axel Carandang - carandang.axel@gmail.com

Github: [https://github.com/azor40k](https://github.com/azor40k)
Project Link: [https://github.com/IIM-Creative-Technology/php-api-azor40k](https://github.com/IIM-Creative-Technology/php-api-azor40k)

<!-- ACKNOWLEDGEMENTS -->
## Acknowledgements
* [IIM](https://www.iim.fr/)
* [Pierre Grimaud](https://github.com/pgrimaud)

<!-- MARKDOWN LINKS & IMAGES -->
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://www.linkedin.com/in/axelcarandang/
