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

use FH\HarvestApiClient\Model\Client\Client;
use Http\Client\Common\Exception\ClientErrorException;
use Http\Message\MessageFactory;
use Http\Mock\Client as HttpMockClient;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

require_once 'TestClientFactory.php';
require_once 'TestSerializerFactory.php';

abstract class EndpointTestBase extends TestCase
{

    /**
     * @var HttpMockClient
     */
    protected $mockHttpClient;

    /**
     * @var ClientEndpoint
     */
    protected $endpoint;

    /**
     * @var MessageFactory
     */
    protected $messageFactory;

    public function setUp()
    {
        $this->mockHttpClient = new HttpMockClient();
        $this->endpoint = new TimeEntryEndpoint(
            TestClientFactory::create($this->mockHttpClient),
            TestSerializerFactory::create()
        );
        $this->messageFactory = new MessageFactory\GuzzleMessageFactory();
    }

    protected function addJsonResponseFromFile(
        string $filename, int $statusCode = 200
    ): void
    {
        $body = file_get_contents(__DIR__ . '/' . $filename);

        $this->addJsonResponse($body, $statusCode);
    }

    protected function addJsonResponse(string $body, int $statusCode = 200
    ): void
    {
        $response = $this->messageFactory->createResponse(
            $statusCode,
            null,
            [
                'Content-Type' => 'application/json',
            ],
            $body
        );

        $this->mockHttpClient->addResponse($response);
    }
}