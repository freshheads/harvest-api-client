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

namespace FH\HarvestApiClient\Client;

use PHPUnit\Framework\TestCase;
use Http\Mock\Client as HttpMockClient;
use Symfony\Component\OptionsResolver\Exception\MissingOptionsException;

/**
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 */
class ClientFactoryTest extends TestCase
{
    /**
     * @var HttpMockClient
     */
    private $mockHttpClient;

    protected function setUp(): void
    {
        $this->mockHttpClient = new HttpMockClient();
    }

    public function testAnExceptionIsThrownWhenAnAccessTokenIsMissing(): void
    {
        $this->expectException(MissingOptionsException::class);
        $this->expectExceptionMessageRegExp('/"access_token" is missing/');

        ClientFactory::create([], $this->mockHttpClient, null, [
            'account_id' => 1234435
        ]);
    }

    public function testAnExceptionIsThrownWhenAnAccountIdIsMissing(): void
    {
        $this->expectException(MissingOptionsException::class);
        $this->expectExceptionMessageRegExp('/"account_id" is missing/');

        ClientFactory::create([], $this->mockHttpClient, null, [
            'access_token' => 'xxxxxx'
        ]);
    }

    public function testAClientInstanceIsCreatedWithTheGivenOptions(): void
    {
        $client = ClientFactory::create([], $this->mockHttpClient, null, [
            'account_id' => 12345,
            'access_token' => 'AccessToken',
            'user_agent' => 'Freshheads Harvest API ClientFactory Unit Test',
            'base_url' => 'https://harvest.api.test/v2'
        ]);

        $client->get('/test');

        $request = $this->mockHttpClient->getLastRequest();

        $this->assertEquals([12345], $request->getHeader('Harvest-Account-ID'));
        $this->assertEquals(['Bearer AccessToken'], $request->getHeader('Authorization'));
        $this->assertEquals(['Freshheads Harvest API ClientFactory Unit Test'], $request->getHeader('User-Agent'));
        $this->assertEquals('https://harvest.api.test/v2/test', (string) $request->getUri());
    }
}
