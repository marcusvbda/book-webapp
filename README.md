[![Docker](https://img.shields.io/badge/Docker-27.3-2496ED?logo=docker&logoColor=white)](https://www.docker.com/)
[![PHP](https://img.shields.io/badge/PHP-8.3-777BB4?logo=php&logoColor=white)](https://www.php.net/releases/8.3/en.php)
[![Nginx](https://img.shields.io/badge/Nginx-1.27-269539?logo=nginx&logoColor=white)](https://www.nginx.com/)
[![Laravel](https://img.shields.io/badge/Laravel-11-FF2D20?logo=laravel&logoColor=white)](https://laravel.com/docs/11.x)
[![Tailwindcss](https://img.shields.io/badge/Tailwindcss-14.2-06B6D4?logo=tailwindcss&logoColor=white)](http://supervisord.org/)

# BooksWebapp

---

### Before install
Make sure you have installed Docker Desktop. If you don't, follow the <a href="https://www.docker.com/get-started" target="_blank">Get Started with Docker</a>.


### Installation guide

#### Clone the project
    git clone git@github.com:marcusvbda/book-webapp.git

#### Enter project folder
    cd book-webapp

#### Build the containers
    make build

**All done!** Everything should work with a single command. \
The application will be available at:

http://localhost:8000


### Usefull commands
#### Build Containers
<sup>You only need to build containers once. After that you can just start them.</sup>

    make build

For command details, refer to the `makefile` in the application root.
