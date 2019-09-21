# Laravel/VueJs application by El Mehdi Abdi

## Getting Started

This application is built using Laravel and Vuejs. A user create account and list items, this items he list containing picture, title and description. all users items for public access. the application provide users to update their password. so let's describe and anatomy the applicaiton. so let's describe and explain how it's work.

### Prerequisites 
This is some screenshots:
![application by El Mehdi Abdi](https://i.imgur.com/Ceo0pf8.png)
![application by El Mehdi Abdi](https://i.imgur.com/XN9XvhD.png)

### Installation
1. Setup Laravel Framework 6.0 environment [Laravel Server Requirements](https://laravel.com/docs/5.8/installation#server-requirements)

2. Clone the repo
```sh
git clone https://github.com/El-Mehdi-Abdi/tech-challenge.git
```

3. Access to tech-challenge edit .env file with your server details
4. Then run the folowing commands

```sh
$ composer install
```

```sh
$ php artisan migrate
```

```sh
$ ln -sr storage/app/public public/storage 
```

## Usage

The application has Tow models Single-Page-Application and Multiple-Page-Application if your browser javascript is disabled you will be redirected to the Multiple-Page-Application, and the application separated to tow shapes GEUST and USER it will be described later.

##### Single-Page-Application

Its use VuJs framework to interacte with the back-end.

you can access to it by url: [http://localhost/dynamic](http://localhost/dynamic)

##### Multiple-Page-Application

Its use Laravel views to interacte with the back-end .

you can access it by url: [http://localhost/](http://localhost/)

#### Single-Page-Application File Structure 
![application by El Mehdi Abdi](https://i.imgur.com/bCF9vwV.png) 
#### Multiple-Page-Application File Structure
![application by El Mehdi Abdi](https://i.imgur.com/LjG7dVM.png)

# Back-end - Api
Both models they share the same back-end api.

![application by El Mehdi Abdi](https://i.imgur.com/V4KasYX.png)

# Assets - css
Both models they share the same assets css it's uses [Less Framework](http://lesscss.org/)

![application by El Mehdi Abdi](https://i.imgur.com/TUn3NUV.png)

# interactions

#### Browser
##### Guest

This model pages accessed by worldwide you don't need authentication.

1. Register.
2. Login.
3. Preview all users items .

###### Note
Each new user will recieve email verification, in local the email will sent to log file (storage/laravel-2019-09-21.log), for production set driver to smtp end enter your credentials in .env file
    
#### Use

This model pages needs authentication.

1. Preview all users items.
2. Preview created items.
3. Create new item.
4. Remove item.
4. Update password.

#### Command line

##### New user

```sh
$ php artisan new:user
```

##### Update user password

```sh
$ php artisan update:user:password
```

##### Seed Database (100 items for each user)

```sh
$ php artisan migrate:refresh --seed
```

### Questions?

If you have any questions, email me : elmehdiabdi@icloud.com
