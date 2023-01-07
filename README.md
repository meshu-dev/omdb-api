# OMDB API

An API used to provide the movie / TV show data for the backlog website.

A Symfony app that uses the OMDB API.

Built with PHP 8.1.14.

# Setup

This app requires you get OMDB API credentials from http://www.omdbapi.com.

- Install packages
```
composer install
```
-  Copy env file
```
cp .env.example .env
```
-  Open .env file and fill in required values
```
OMDB_API_URL
OMDB_API_KEY
```
-  Run on local environment
```
php bin/console server:start
```
