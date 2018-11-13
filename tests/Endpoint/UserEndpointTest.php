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

use FH\HarvestApiClient\Model\User\User;
use FH\HarvestApiClient\Model\User\UserCollection;
use Http\Client\Common\Exception\ClientErrorException;
use Http\Message\MessageFactory;
use Http\Mock\Client as HttpMockClient;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

require_once 'TestClientFactory.php';
require_once 'TestSerializerFactory.php';

/**
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 */
class UserEndpointTest extends TestCase
{
    /**
     * @var HttpMockClient
     */
    private $mockHttpClient;

    /**
     * @var UserEndpoint
     */
    private $endpoint;

    /**
     * @var MessageFactory
     */
    private $messageFactory;

    protected function setUp()
    {
        $this->mockHttpClient = new HttpMockClient();
        $this->endpoint = new UserEndpoint(
            TestClientFactory::create($this->mockHttpClient),
            TestSerializerFactory::create()
        );
        $this->messageFactory = new MessageFactory\GuzzleMessageFactory();
    }

    public function testListCallsListUrl(): void
    {
        $this->addJsonResponseFromFile('user/list.json');
        $this->endpoint->list();

        $request = $this->mockHttpClient->getLastRequest();
        $this->assertStringEndsWith('/users', (string) $request->getUri());
    }

    public function testListContainsAnArrayOfUsers(): void
    {
        $this->addJsonResponseFromFile('user/list.json');
        $users = $this->endpoint->list();

        $this->assertContainsOnlyInstancesOf(User::class, iterator_to_array($users));
    }

    public function testListReturnsUserCollection(): void
    {
        $this->addJsonResponseFromFile('user/list.json');
        $collection = $this->endpoint->list();

        $this->assertInstanceOf(UserCollection::class, $collection);
        $this->assertEquals(1, $collection->getPage());
        $this->assertEquals(1, $collection->getTotalPages());
        $this->assertEquals(3, $collection->getTotalEntries());
    }

    public function testRetrieveReturnsAUser(): void
    {
        $this->addJsonResponseFromFile('user/666.json');
        $user = $this->endpoint->retrieve(666);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals(666, $user->getId());
    }

    public function testMeReturnsAUser(): void
    {
        $this->addJsonResponseFromFile('user/me.json');
        $user = $this->endpoint->me();

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals(1782884, $user->getId());
        $this->assertEquals('Bob', $user->getFirstName());
    }

    public function testUnknownUserThrowsAnException(): void
    {
        $this->expectException(ClientErrorException::class);
        $this->expectExceptionCode(404);

        $this->addJsonResponse('', 404);

        $this->endpoint->retrieve(12345999);
    }

    public function testCreateSerializesTheUsertInTheRequest(): void
    {
        $this->addJsonResponseFromFile('user/666.json');
        $user = new User();
        $user
            ->setFirstName('Allen')
            ->setLastName('Allen');

        $newUser = $this->endpoint->create($user);

        $request = $this->mockHttpClient->getLastRequest();

        $jsonBody = json_decode($request->getBody()->getContents());

        $this->assertEquals($user->getFirstName(), $jsonBody->first_name);
        $this->assertEquals($user->getLastName(), $jsonBody->last_name);
    }

    public function testUpdateSerializesTheUserInTheRequest(): void
    {
        $this->addJsonResponseFromFile('user/666.json');
        $user = new User();
        $user
            ->setId(666)
            ->setFirstName('Jan')
            ->setLastName('Jansen');

        $updatedUser = $this->endpoint->update($user);

        $request = $this->mockHttpClient->getLastRequest();

        $jsonBody = json_decode($request->getBody()->getContents());

        $this->assertEquals($user->getId(), $jsonBody->id);
        $this->assertEquals($user->getFirstName(), $jsonBody->first_name);
        $this->assertEquals($user->getLastName(), $jsonBody->last_name);
    }

    public function testDeleteExecutesADeleteRequestWithTheGivenId(): void
    {
        $updatedClient = $this->endpoint->delete(666);

        $request = $this->mockHttpClient->getLastRequest();

        $this->assertEquals('DELETE', $request->getMethod());
        $this->assertStringEndsWith('/users/666', (string) $request->getUri());
    }

    private function addJsonResponseFromFile(string $filename, int $statusCode = 200): void
    {
        $body = file_get_contents(__DIR__ . '/' . $filename);

        $this->addJsonResponse($body, $statusCode);
    }

    private function addJsonResponse(string $body, int $statusCode = 200): void
    {
        $response = $this->messageFactory->createResponse(
            $statusCode,
            null,
            [
                'Content-Type' => 'application/json'
            ],
            $body
        );

        $this->mockHttpClient->addResponse($response);
    }
}
