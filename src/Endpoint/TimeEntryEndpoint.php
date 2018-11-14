<?php

/*
 * This file is part of the Freshheads Harvest API Client library.
 *
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace FH\HarvestApiClient\Endpoint;

use FH\HarvestApiClient\Model\TimeEntry\TimeEntry;
use FH\HarvestApiClient\Model\TimeEntry\TimeEntryContainer;
use JMS\Serializer\Serializer;
use FH\HarvestApiClient\Client\Client as HarvestClient;

class TimeEntryEndpoint
{

    /**
     * @var HarvestClient
     */
    private $client;

    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * ClientEndpoint constructor.
     *
     * @param HarvestClient $client
     * @param Serializer    $serializer
     */
    public function __construct(
        HarvestClient $client,
        Serializer $serializer
    )
    {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    /**
     * @param int $id
     *
     * @return TimeEntry
     */
    public function find(int $id): TimeEntry
    {
        $response = $this->client->get(
            '/time_entries/' . urlencode((string)$id)
        );

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, TimeEntry::class, 'json');
    }

    /**
     * @param array $filterParameters
     *
     * @return array
     */
    private function findAll($filterParameters = []): array
    {
        $response = $this
            ->client
            ->get('/time_entries', $filterParameters);

        $data = $response->getBody()->getContents();

        $TimeEntryContainer = $this
            ->serializer
            ->deserialize($data, TimeEntryContainer::class, 'json');

        return $TimeEntryContainer->getTimeEntries();
    }

    /**
     * @param int $page
     * @param \DateTimeInterface|null $updatedSince
     *
     * @return array
     * @throws \Exception
     */
    public function findPaged($page = 1, \DateTimeInterface $updatedSince = null
    ): array
    {
        if (!$updatedSince instanceof \DateTimeInterface) {
            $updatedSince = new \DateTimeImmutable('now');
        }

        $queryParameters = [
            'page' => $page,
            'updated_since' => $updatedSince->format(\DateTime::ISO8601),
        ];

        return $this->findAll($queryParameters);
    }

    /**
     * @param TimeEntry $timeEntry
     *
     * @return TimeEntry
     */
    public function create(TimeEntry $timeEntry): TimeEntry
    {
        $timeEntry = $this->serializer->toArray($timeEntry);

        $response = $this->client->post('/time_entries', $timeEntry);

        $data = $response->getBody()->getContents();
        return $this
            ->serializer
            ->deserialize($data, TimeEntry::class, 'json');
    }

    /**
     * @param TimeEntry $timeEntry
     *
     * @return string
     */
    public function update(TimeEntry $timeEntry)
    {
        $timeEntry = $this->serializer->toArray($timeEntry);

        $response = $this->client->patch(
            sprintf('/time_entries', $timeEntry['id']), $timeEntry
        );

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, TimeEntry::class, 'json');
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->client->delete(sprintf('/time_entries/%s', $id));
    }

    /**
     * @param $id
     */
    public function deleteExternalReference($id)
    {
        $this->client->delete(
            sprintf('/time_entries/%s', $id . '/external_reference')
        );
    }

    /**
     * @param $id
     */
    public function restart($id)
    {
        $this->client->patch(sprintf('/time_entries/%s', $id . '/restart'));
    }

    /**
     * @param $id
     */
    public function stop($id)
    {
        $this->client->patch(sprintf('/time_entries/%s', $id . '/stop'));
    }
}
