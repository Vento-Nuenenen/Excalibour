#### Laravel-Auth is a Complete Build of Laravel 5.5 with Email Registration Verification, Social Authentication, User Roles and Permissions, User Profiles, and Admin restricted user management system.
[![Build Status](https://travis-ci.org/Chronyms/Excalibour.svg?branch=master)](https://travis-ci.org/Chronyms/Excalibour)
[![StyleCI](https://styleci.io/repos/116980577/shield?branch=master)](https://styleci.io/repos/116980577)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Chronyms/Excalibour/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Chronyms/Excalibour/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/Chronyms/Excalibour/badges/build.png?b=master)](https://scrutinizer-ci.com/g/Chronyms/Excalibour/build-status/master)

### Installation Instructions
1. Run `sudo git clone https://github.com/jeremykenedy/laravel-auth.git laravel-auth`
2. Create a MySQL database for the project
    * ```mysql -u root -p```, if using Vagrant: ```mysql -u homestead -psecret```
    * ```create database laravelAuth;```
    * ```\q```
3. From the projects root run `cp .env.example .env`
4. Configure your `.env` file // NOTE: Google API Key will prevent maps error
5. Run `sudo composer update` from the projects root folder
6. Run `php artisan vendor:publish --provider="jeremykenedy\LaravelRoles\RolesServiceProvider" --tag=config`
7. Run `php artisan vendor:publish --provider="jeremykenedy\LaravelRoles\RolesServiceProvider" --tag=migrations`
8. Run `php artisan vendor:publish --provider="jeremykenedy\LaravelRoles\RolesServiceProvider" --tag=seeds`
9. From the projects root folder run `sudo chmod -R 755 ../laravel-auth`
10. From the projects root folder run `php artisan key:generate`
11. From the projects root folder run `php artisan migrate`
12. From the projects root folder run `composer dump-autoload`
13. From the projects root folder run `php artisan db:seed`

** Note ** In order for [Dropzone.js](http://www.dropzonejs.com/#configuration) to work you will need to run
```
npm install
```

#### Rebuild Front End Assets with Mix

###### Rebuilding the front end of that project is OPTIONAL and can be done using Laravel [Mix](https://laravel.com/docs/5.5/mix) which is Elixers replacement.

1. From the projects root folder run `npm install`
2. From the projects root folder run `npm run dev` or `npm run production`
  * You can watch assets with `npm run watch`


### Seeds
1. Seeded Roles
  * Unverified - Level 0
  * User  - Level 1
  * Administrator - Level 5

2. Seeded Permissions
  * view.users
  * create.users
  * edit.users
  * delete.users

3. Seeded Users

|Email|Password|Access|
|:------------|:------------|:------------|
|user@user.com|password|User Access|
|admin@admin.com|password|Admin Access|


###### **Steps**:
  2. From the projects root folder in terminal run composer command to get the needed package.
     * Example:

      ```
         composer require socialiteproviders/twitch
      ```

  3. From the projects root folder run ```composer update```
  4. Add the service provider to ```/app/services.php```
     * Example:

     ```
        'twitch' => [
            'client_id'   => env('TWITCH_KEY'),
            'client_secret' => env('TWITCH_SECRET'),
            'redirect'    => env('TWITCH_REDIRECT_URI'),
        ],
     ```

  5. Add the API credentials to ``` /.env  ```
     * Example:

      ```
         TWITCH_KEY=YOURKEYHERE
         TWITCH_SECRET=YOURSECRETHERE
         TWITCH_REDIRECT_URI=http://YOURWEBSITEURL.COM/social/handle/twitch
      ```

  6. Add the social media login link:
      * Example:
      In file ```/resources/views/auth/login.blade.php``` add ONE of the following:
         * Conventional HTML:

      ```
         <a href="{{ route('social.redirect', ['provider' => 'twitch']) }}" class="btn btn-lg btn-primary btn-block twitch">Twitch</a>
      ```

         * Use Laravel HTML Facade with [Laravel Collective](https://laravelcollective.com/) (recommended)

      ```
         {!! HTML::link(route('social.redirect', ['provider' => 'twitch']), 'Twitch', array('class' => 'btn btn-lg btn-primary btn-block twitch')) !!}
      ```

### Other API keys
* [Google Maps API v3 Key](https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key)



### Laravel Auth License
Laravel-auth is licensed under the MIT license. Enjoy!
