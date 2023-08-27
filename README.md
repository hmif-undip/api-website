## HMIF Super Admin Documentation

<p>This is a repository of the HMIF Undip Super Admin project.</p>
We have developed HMIF Super Admin using Laravel 10 and the admin template from <a href="https://github.com/zuramai/laravel-mazer">Mazer</a>. This application is a combination of APIs and admins from various applications that have been developed by HMIF Undip, such as DMW++, Bukulink, DBO, and the main website. This application serves as the backend containing APIs and serves as a space for administrators to configure or make data changes on both the front-end and backend applications.

### How to develop this application

- ### Prerequisites

  - #### Chrome/Edge/Arc/Mozilla/Brave/or any browser you want.
  - #### Laragon
    - You can download Laragon [here](https://laragon.org/download/)
  - #### PHP Version 8.1+ (*If on the version PHP of laragon not 8.1+)
    - You can download PHP [here](https://windows.php.net/download#php-8.1)
  - #### My SQL version 8+ (*If on the version My SQL of laragon not 8+)
    - You can download My SQL [here](https://www.mysql.com/downloads/)
  - #### Composer
    - You can download Composer [here](https://getcomposer.org/download/)
  - #### Node.js
    - You can download Node.js [here](https://nodejs.org/en/download/)
    - Or you can install Node.js using [nvm](https://github.com/nvm-sh/nvm)

- ### Installation
  - You can clone this repository using `git clone https://github.com/hmif-undip/api-website.git`
  - Then change directory to the repository folder using `cd api-website`
  - Install all dependencies using `composer install`
  - Create database in laragon
  - Clone the .env.example file and rename it to .env, then fill in the required environment variables
  - Generate the key `php artisan key:generate`
  - Run migration `php artisan migrate --seed`
  - Run Seeder `php artisan db:seed`
  - Then install all dependencies using `npm install`
  - Build modules in 1 using `npm run build`
  - Open app in virtual host laragon

### How to contribute to this application

- Fork this repository
- Clone your forked repository
- Create a new branch
- Make some changes
- Commit your changes
- Push your changes
- Create a pull request
- Wait for the review
- And your changes will be merged

### Feature ( To Do )

- [ ] **DMW++**, DMW++ is the agenda of the Diklat division that contains all about assignments and exams.
- [ ] **Bukulink**, Bukulink is a platform for obtaining alumni information and etc.
- [ ] **DBO**, DBO is a platform to view information about HMIF's family.
- [ ] **Main Website**, Main Website is the main page used as a company profile of HMIF Undip.

### Library

- [barryvdh/laravel-ide-helper](https://ui.shadcn.com/)
- [laravel/breeze](https://next-auth.js.org/)
- [laravel/sail](https://github.com/emilkowalski/vaul)
- [laravel/sanctum](https://axios-http.com/)
- [spatie/laravel-ignition](https://www.react-hook-form.com/)
- **...others**
