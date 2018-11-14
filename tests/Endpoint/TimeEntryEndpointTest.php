<?php

/*
 * This file is part of the Freshheads Harvest API Client library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace FH\HarvestApiClient\Endpoint;


use FH\HarvestApiClient\Model\TimeEntry\TimeEntry;

require_once 'TestClientFactory.php';
require_once 'TestSerializerFactory.php';
require_once 'EndpointTestBase.php';

/**
 * Class TimeEntryEndpointTest
 *
 * @package FH\HarvestApiClient\Endpoint
 */
class TimeEntryEndpointTest extends EndpointTestBase
{

    public function testFindReturnsATimeEntry(): void
    {
        $this->addJsonResponseFromFile('timeEntry/single.json');
        $timeEntries = $this->endpoint->find(636708723);

        $this->assertEquals(636708723, $timeEntries->getId());
    }

    public function testFindPagedReturnsAllTimeEntries(): void
    {
        $this->addJsonResponseFromFile('timeEntry/list.json');
        $timeEntries = $this->endpoint->findPaged();
        $this->assertEquals(4, count($timeEntries));
    }

    public function testCreateSerializesTheTimeEntryInTheRequest(): void
    {
        $this->addJsonResponseFromFile('timeEntry/single.json');
        $timeEntry = new TimeEntry();
        $timeEntry->setBillableRate(100.0);
        $timeEntry->setSpentDate('2017 - 03 - 01');

        $newtimeEntry = $this->endpoint->create($timeEntry);

        $request = $this->mockHttpClient->getLastRequest();
        fwrite(STDERR, print_r($request, true));
        $jsonBody = json_decode($request->getBody()->getContents());
        fwrite(STDERR, print_r($jsonBody, true));
        $this->assertEquals(
            $timeEntry->getBillableRate(), $jsonBody->billable_rate
        );
        $this->assertEquals($timeEntry->getSpentDate(), $jsonBody->spent_date);
    }
}