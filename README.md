
![Logo](https://www.leaseweb.com/sites/all/themes/leaseweb/new-logo.svg)


# Leaseweb :: PHP Technical Assignment - Customer Portal

Hello dear developers, this is the backend code of the assignment for the Full Stack PHP position. In order to demonstrate my skills in using the language, I decided not to use any framework for this (I hope you like this idea).

Of course, I didn't make a framework from scratch, implementing routes and a dependency injector. Instead, I used some packages that implement the PSRs(https://www.php-fig.org/psr/) (some of which are used by Symfony and/or Laravel): PSR-7, PSR-11, PSR-15, PSR-17.

Main packages used:
- league/route
- league/container
- php-di/php-di
- nikic/fast-route
Among others.
## Installation

Install with composer

```bash
  composer install
```
    
## Running Tests

To run tests, run the following command

```bash
  composer run test
```


## Run Locally

Clone the project

```bash
  git clone git@github.com:marcostimm/leaseweb-frontend.git
```

Go to the project directory

```bash
  cd leaseweb-backend
```

Install dependencies

```bash
  composer install
```

Run using Docker
```bash
  docker-compose up
```

or use your local php (requires PHP 8+)

```bash
  composer run start
```

## Usage


http://localhost:8080



## API Reference

#### Get all servers

```http
  GET /servers
```
Filter parameters:

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `hdd` | `string` | SAS, SATA, SSD |
| `ram` | `string` | 2, 4, 8, ... |


Those are the two filters implemented as example


## Author

- [@marcostimm](https://www.github.com/marcostimm)

