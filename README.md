Harvest API Client
==================

[![Build Status](https://travis-ci.org/freshheads/harvest-api-client.png?branch=develop)](https://travis-ci.org/freshheads/harvest-api-client)

This library provides an API client for the [Harvest](https://www.getharvest.com/) [V2 API](https://help.getharvest.com/api-v2/).
Plain PHP classes are used to map the data from the API. [JMS Serializer](https://jmsyst.com/libs/serializer) is used for the serialization/deserializtion of this model classes.

It is also perfectly possible to use this Client without using the ednpoints and models.

Requirements
------------

Harvest API Client works with PHP 7.1.0 or up. This library depends on the [HTTPPlug](http://httplug.io/), see http://docs.php-http.org/en/latest/httplug/introduction.html.

Installation
------------

Harvest API Client can easily be installed using [Composer](https://getcomposer.org/):

```bash
composer require 'freshheads/harvest-api-client ^1.0@dev'
```

Usage
-----

You should have a php-http plug compatible client (+ adapter) installed to be able to run this example. You can run the following command, to install Guzzle6 and it's php-http adapter.

```bash
composer require php-http/guzzle6-adapter
```

Instantiate the client and replace the configuration with your personal credentials:

```php
// Use the composer autoloader to load dependencies
require_once 'vendor/autoload.php';

use FH\HarvestApiClient\Client\ClientFactory;

// API Client configuration
$clientConfiguration =
    'access_token' => 'YourAccessToken',
    'client_id'    => 12345678 // Your harvest client ID
];

// In this example we made use of the Guzzle6 as HTTPClient in combination with an HTTPPlug compatible adapter.
$client = ClientFactory::create([], null, null, $clientConfiguration);

// Make some calls directly via the client
$response = $client->get('/clients', ['page' => 1]);

// @todo: Add examples with Serializer and available endpoints
```
