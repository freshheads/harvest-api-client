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

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

/**
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 */
final class TestSerializerFactory
{
    public static function create(): SerializerInterface
    {
        return SerializerBuilder::create()
            ->addMetadataDir(__DIR__ . '/../../src/Model/configuration')
            ->build();
    }
}
