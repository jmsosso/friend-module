# Setup instructions

## Introduction

This projects is just an example of how to create a content type form a custom
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

## Add some dummy friends content

TODO

## Test the module

To run a Drupal 7 instance with this module installed you need Docker and Docker Compose
installed in your system.

`docker-compose up -d drupal`

And lets Docker do the magic...
