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

Harvest API Client can easily be installed using [Composer](https://getcomposer.org/).
You must have a [php-http/client-implementation](https://packagist.org/providers/php-http/client-implementation) compatible client (+ adapter) installed to be able to make requests.
You can run the following command, to install Guzzle6 and it's php-http adapter.

```bash
composer require 'freshheads/harvest-api-client ^1.0@dev' 'php-http/guzzle6-adapter'
```

You can replace `php-http/guzzle6-adapter` with any other compatible client implementation.

Usage
-----

Instantiate the client and replace the configuration with your personal credentials:

```php
// Use the composer autoloader to load dependencies
require_once 'vendor/autoload.php';

use FH\HarvestApiClient\Client\ClientFactory;

// API Client configuration
$clientConfiguration =
    'access_token' => 'YourAccessToken',
    // Your harvest client ID
    'client_id'    => 12345678,
    // Harvest asks you to customize the user agent header, so that they can contact you in case you're doing something wrong
    'user_agent'   => 'My Application (my@email.com)'
];

// In this example we made use of the Guzzle6 as HTTPClient in combination with an HTTPPlug compatible adapter.
$client = ClientFactory::create([], null, null, $clientConfiguration);

// Make some calls directly via the client
$response = $client->get('/clients', ['page' => 1]);

```

### Endpoints

To use the harvest entity specific [Endpoints](src/Endpoint), you need to install [jms/serializer](https://packagist.org/packages/jms/serializer):

```bash
composer require 'jms/serializer' 'symfony/yaml'
```

The serializer needs to know where to find the serialization configuration of the models.
 The configuration is located in [src/Model/configuration](src/Model/configuration). An example is given below:

```php
// Code is based on the example above.

// Creates the serializer and configures it with the serialization configuration
$serializer = SerializerBuilder::create()
      ->addMetadataDir(__DIR__ . '/vendor/freshhads/harvest-api-client/src/Model/configuration')
      ->build();

$harvestClientEndpoint = new ClientEndpoint($client, $serializer);

// List harvest clients (returns an array of Client objects).
$harvestClients = $harvestClientEndpoint->list();

```
