<?php

/*
 * This file is part of the Freshheads Harvest API Client library.
 *
 * (c) Freshheads B.V. <info@freshheads.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace FH\HarvestApiClient\Endpoint;

use FH\HarvestApiClient\Client\Client;
use FH\HarvestApiClient\Client\ClientFactory;
use Http\Client\HttpClient;

/**
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 */
final class TestClientFactory
{
    public static function create(HttpClient $httpClient, $accountId = 12345, $accessToken = 'Xxx'): Client
    {
        return ClientFactory::create([], $httpClient, null, [
            'account_id' => $accountId,
            'access_token' => 'Xxx'
        ]);
    }
}
