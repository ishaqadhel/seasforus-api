# api.seasfor.us
<!-- ALL-CONTRIBUTORS-BADGE:START - Do not remove or modify this section -->
[![All Contributors](https://img.shields.io/badge/all_contributors-4-orange.svg?style=flat-square)](#contributors-)
<!-- ALL-CONTRIBUTORS-BADGE:END -->

![seasforus-poster](https://user-images.githubusercontent.com/55318172/142764894-9d46ecac-f674-4e5d-bae8-fc9a82ecb953.jpg)

Demo video: https://youtu.be/stY-fpvqkh8

🖼️ [Frontend Repository](https://github.com/theodorusclarence/seasfor.us)

🧠 [Backend Repository](https://github.com/ishaqadhel/seasforus-api)

## 💡 Background

There are **5.25 trillion pieces of plastic waste** estimated to be in our oceans. 269,000 tons float, 4 billion microfibers per km² dwell below the surface. This alarming number of pieces of plastic damages the marine life in our ocean.

This platform will help the #TeamSeas initiative started by Mr. Beast and Mark Rober, to be the most-impactful cleanup project of all time. #TeamSeas will work with Ocean Conservancy and its partners to remove millions of pounds of plastic and trash from beaches all around the world. They’ll also send professional crews to clean up some of the most iconic, vulnerable ocean spaces.

With this already awesome initiative, we create the #SeasForUs platform that will **speed up** the process of finding clean-up events in your local area. We want it to be as easy as possible for people to contribute and help #TeamSeas clean up coastal areas. 

You can start by looking at cleanup events in your local area, and join them. You will directly help at your local beaches to clean up all the trash that we can pick during the time of the event. Then, you can post your activity to the post-board so you can share your moments of contribution to the community.

To help you spark up the motivation to come and clean up the events, we also provide a Leaderboard that will rank how many events you've been attending.

## 🧑‍🎓 What we learned

For some of us, this is the first hackathon we went to, and we are really pumped up that all of it must be done only in 36 hours. Having a limited time makes us work faster with a more efficient strategy.

We are utilizing GitHub Issues as our project management platform. We started by listing all of the features that we want to build and develop gradually as we work parallel with front-end and back-end applications.

## 🧐 How we built our project

#SeasForUs is a web app using Laravel as the back-end framework. Data from users is sent to the server and stored in a MySQL database. The frontend was created using Next.js and TypeScript to provide a good developer experience as well as other advantages like server-side rendering and image optimization 

## 🤯 Challenges we faced

This is the first time we are using Auth0 as the authentication provider. Although Auth0 recommends using the same framework with the frontend, which is using Node.js, we tried to use Laravel as our back-end framework. We have some hiccup along the way but it is solved and works really great. Auth0 is fairly simple to use with awesome integration with Google OAuth. It is painless and really robust.

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
- Run command ```composer install``` on your terminal after went into php container on docker
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
    <td align="center"><a href="https://theodorusclarence.com"><img src="https://avatars.githubusercontent.com/u/55318172?v=4?s=100" width="100px;" alt=""/><br /><sub><b>Theodorus Clarence</b></sub></a><br /><a href="https://github.com/ishaqadhel/seasforus-api/commits?author=theodorusclarence" title="Code">💻</a> <a href="#design-theodorusclarence" title="Design">🎨</a></td>
    <td align="center"><a href="https://github.com/rizqitsani"><img src="https://avatars.githubusercontent.com/u/68275535?v=4?s=100" width="100px;" alt=""/><br /><sub><b>Muhammad Rizqi Tsani</b></sub></a><br /><a href="https://github.com/ishaqadhel/seasforus-api/commits?author=rizqitsani" title="Code">💻</a> <a href="#design-rizqitsani" title="Design">🎨</a></td>
  </tr>
</table>

<!-- markdownlint-restore -->
<!-- prettier-ignore-end -->

<!-- ALL-CONTRIBUTORS-LIST:END -->

This project follows the [all-contributors](https://github.com/all-contributors/all-contributors) specification. Contributions of any kind welcome!
