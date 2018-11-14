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
use FH\HarvestApiClient\Model\TimeEntry\TimeEntryCollection;
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
     * @return TimeEntry
     *
     * @link https://help.getharvest.com/api-v2/timesheets-api/timesheets/time-entries/#retrieve-a-time-entry
     */
    public function retrieve(int $id): TimeEntry
    {
        $response = $this->client->get('/time_entries/' . $id);

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, TimeEntry::class, 'json');
    }

    /**
     * @param array $parameters
     * @return TimeEntryCollection
     *
     * @link https://help.getharvest.com/api-v2/timesheets-api/timesheets/time-entries/#list-all-time-entries
     */
    public function list(array $parameters = []): TimeEntryCollection
    {
        $response = $this
            ->client
            ->get('/time_entries', $parameters);

        $data = $response->getBody()->getContents();

        $collection = $this
            ->serializer
            ->deserialize($data, TimeEntryCollection::class, 'json');

        return $collection;
    }

    /**
     * @param TimeEntry $timeEntry
     * @return TimeEntry
     *
     * @link https://help.getharvest.com/api-v2/timesheets-api/timesheets/time-entries/#create-a-time-entry-via-duration
     * @link https://help.getharvest.com/api-v2/timesheets-api/timesheets/time-entries/#create-a-time-entry-via-start-and-end-time
     */
    public function create(TimeEntry $timeEntry): TimeEntry
    {
        $response = $this->client->postJson('/time_entries', $this->serializer->serialize($timeEntry, 'json'));

        $data = $response->getBody()->getContents();
        return $this
            ->serializer
            ->deserialize($data, TimeEntry::class, 'json');
    }

    /**
     * @param TimeEntry $timeEntry
     * @return TimeEntry
     *
     * @link https://help.getharvest.com/api-v2/timesheets-api/timesheets/time-entries/#update-a-time-entry
     */
    public function update(TimeEntry $timeEntry): TimeEntry
    {
        $response = $this->client->patchJson(
            sprintf('/time_entries', $timeEntry->getId()),
            $this->serializer->serialize($timeEntry, 'json')
        );

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, TimeEntry::class, 'json');
    }

    /**
     * @param int $id
     * @return void
     *
     * @link https://help.getharvest.com/api-v2/timesheets-api/timesheets/time-entries/#delete-a-time-entry
     */
    public function delete($id): void
    {
        $this->client->delete(sprintf('/time_entries/%s', $id));
    }

    /**
     * @param int $id
     * @return void
     *
     * @link https://help.getharvest.com/api-v2/timesheets-api/timesheets/time-entries/#delete-a-time-entrys-external-reference
     */
    public function deleteExternalReference(int $id): void
    {
        $this->client->delete(
            sprintf('/time_entries/%s', $id . '/external_reference')
        );
    }

    /**
     * @param int $id
     * @return void
     *
     * @link https://help.getharvest.com/api-v2/timesheets-api/timesheets/time-entries/#restart-a-stopped-time-entry
     */
    public function restart(int $id): void
    {
        $this->client->patch(sprintf('/time_entries/%s', $id . '/restart'));
    }

    /**
     * @param int $id
     * @return void
     *
     * @link https://help.getharvest.com/api-v2/timesheets-api/timesheets/time-entries/#stop-a-running-time-entry
     */
    public function stop(int $id): void
    {
        $this->client->patch(sprintf('/time_entries/%s', $id . '/stop'));
    }
}
