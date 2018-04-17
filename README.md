# Setup instructions

## Introduction

This projects is just an example of how to create a content type from a custom
Drupal 7 module with some additional features:

The content type will have this fields:

- Name
- First name
- Avatar
- E-mail
- Birthday

Every friend should receive an email when his birthday arrives.

The page that displays the friends information is themed.

On the page search-friends you have an autocomplete field were you can search through
all the friends, when you select a friend from the autocomplete you will see his information.

## Test the module

To run a Drupal 7 site to test this module you need to have Docker and Docker Compose installed in your system.
Then clone this repo and run the following command inside the project directory:

`docker-compose up -d`

And lets Docker do the magic...

Then enable the module with:

```
$ ./exec drush en -y friend
```

This will also download the dependencies.

Then you can use the following addresses to visit the site:

- Drupal: http://localhost:8080/ (user and password: **admin**)
- phpMyAdmin: http://localhost:8081/
- Mail Catcher: http://localhost:8082/

### Add some dummy friends content

To add some dummy content we need to activate the Devel Generate module:

```
$ ./exec drush dl devel
$ ./exec drush en -y devel_generate
$ ./exec drush generate-content 20 --types=friend
```
