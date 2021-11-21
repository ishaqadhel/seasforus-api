# Seas For Us API
<!-- ALL-CONTRIBUTORS-BADGE:START - Do not remove or modify this section -->
[![All Contributors](https://img.shields.io/badge/all_contributors-2-orange.svg?style=flat-square)](#contributors-)
<!-- ALL-CONTRIBUTORS-BADGE:END -->

An API using Laravel, MySQL, Nginx with Docker.

## 🛠️ Tools

### 👨‍💻 Programming languages

<p>
    <a href="https://github.com/search?q=user%3Aishaqadhel+language%3Acss"><img alt="CSS" src="https://img.shields.io/badge/CSS-1572B6.svg?logo=css3&logoColor=white"></a>
    <a href="https://github.com/search?q=user%3Aishaqadhel+language%3Ahtml"><img alt="HTML" src="https://img.shields.io/badge/HTML-E34F26.svg?logo=html5&logoColor=white"></a>
    <a href="https://github.com/search?q=user%3Aishaqadhel+language%3Ajavascript"><img alt="JavaScript" src="https://img.shields.io/badge/JavaScript-F7DF1E.svg?logo=javascript&logoColor=black"></a>
    <a href="https://github.com/search?q=user%3Aishaqadhel+language%3Aphp"><img alt="PHP" src="https://img.shields.io/badge/PHP-777BB4.svg?logo=php&logoColor=white"></a>
</p>

### 🧰 Frameworks and libraries

<p>
    <a href="#"><img alt="Bootstrap" src="https://img.shields.io/badge/Bootstrap-7952B3.svg?logo=bootstrap&logoColor=white"></a>
    <a href="#"><img alt="PHPUnit" src="https://img.shields.io/badge/PHPUnit-366488.svg?logo=jekyll&logoColor=white"></a>
    <a href="#"><img alt="Symfony" src="https://img.shields.io/badge/Symfony-111111.svg?logo=symfony&logoColor=white"></a>
</p>

### 🗄️ Databases

<p>
    <a href="#"><img alt="MySQL" src="https://img.shields.io/badge/MySQL-00f.svg?logo=mysql&logoColor=white"></a>
</p>

### 💻 Software and tools

<p>
    <a href="#"><img alt="Git" src="https://img.shields.io/badge/Git-F05033.svg?logo=git&logoColor=white"></a>
    <a href="#"><img alt="Postman" src="https://img.shields.io/badge/Postman-FF6C37?logo=postman&logoColor=white"></a>
    <a href="#"><img alt="Visual Studio Code" src="https://img.shields.io/badge/Visual%20Studio%20Code-0078d7.svg?logo=visual-studio-code&logoColor=white"></a>
</p>

## 👁️ Preview

![preview-docker-laravel](https://user-images.githubusercontent.com/49280352/131224609-401fcd2b-a815-49f2-8164-b6d9b77df87c.gif)

## 📚 Extra Library
- AWS S3 for server and file storage
- Auth0 for Authentication

## 📚 Steps to prepare development environment

- Create .env file for laravel environment from .env.example on src folder
- Run command ```docker-compose build``` on your terminal
- Run command ```docker-compose up -d``` on your terminal
- Run command ```docker exec -it php /bin/sh``` on your terminal
- - Run command ```composer install``` on your terminal after went into php container on docker
- Run command ```chmod -R 777 storage``` on your terminal after went into php container on docker
- If app:key still empty on .env run ```php artisan key:generate``` on your terminal after went into php container on docker
- To run artisan command like migrate, etc. go to php container using ```docker exec -it php /bin/sh```
- Go to http://localhost:8001 or any port you set to open laravel

## Contributors ✨

Thanks goes to these wonderful people ([emoji key](https://allcontributors.org/docs/en/emoji-key)):

<!-- ALL-CONTRIBUTORS-LIST:START - Do not remove or modify this section -->
<!-- prettier-ignore-start -->
<!-- markdownlint-disable -->
<table>
  <tr>
    <td align="center"><a href="https://ishaqadhel.com"><img src="https://avatars.githubusercontent.com/u/49280352?v=4?s=100" width="100px;" alt=""/><br /><sub><b>ishaqadhel</b></sub></a><br /><a href="https://github.com/ishaqadhel/seasforus-api/commits?author=ishaqadhel" title="Code">💻</a> <a href="#infra-ishaqadhel" title="Infrastructure (Hosting, Build-Tools, etc)">🚇</a></td>
    <td align="center"><a href="https://github.com/franszhafran"><img src="https://avatars.githubusercontent.com/u/49693862?v=4?s=100" width="100px;" alt=""/><br /><sub><b>Muhammad Zhafran</b></sub></a><br /><a href="https://github.com/ishaqadhel/seasforus-api/commits?author=franszhafran" title="Code">💻</a> <a href="#infra-franszhafran" title="Infrastructure (Hosting, Build-Tools, etc)">🚇</a></td>
  </tr>
</table>

<!-- markdownlint-restore -->
<!-- prettier-ignore-end -->

<!-- ALL-CONTRIBUTORS-LIST:END -->

This project follows the [all-contributors](https://github.com/all-contributors/all-contributors) specification. Contributions of any kind welcome!