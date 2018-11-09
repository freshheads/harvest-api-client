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

use Http\Client\Common\Plugin;
use Http\Client\Common\PluginClient;
use Http\Client\HttpClient;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\MessageFactoryDiscovery;
use Http\Message\MessageFactory;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 */
final class ClientFactory
{
    const DEFAULT_BASE_URL = 'https://api.harvestapp.com/api/v2';

    /**
     * @param Plugin[] $plugins List of additional plugins to use
     * @param HttpClient $client Base HTTP client
     * @param MessageFactory $messageFactory
     * @param array $options
     * @return Client
     */
    public static function create(
        array $plugins = [],
        HttpClient $client = null,
        MessageFactory $messageFactory = null,
        array $options = []
    ): Client {
        if (!$client instanceof HttpClient) {
            $client = HttpClientDiscovery::find();
        }

        if (!$messageFactory instanceof MessageFactory) {
            $messageFactory = MessageFactoryDiscovery::find();
        }

        $plugins[] = new Plugin\ErrorPlugin();

        $httpClient = new PluginClient($client, $plugins);

        $options = self::resolveOptions($options);

        return new Client($httpClient, $messageFactory, $options);
    }

    /**
     * @param array $options
     * @return array
     */
    private static function resolveOptions(array $options = []): array
    {
        $optionsResolver = new OptionsResolver();
        $optionsResolver->setDefaults([
            'base_url' => self::DEFAULT_BASE_URL
        ]);

        $optionsResolver->setRequired(['access_token', 'account_id']);
        $optionsResolver->setDefined(['user_agent']);
        $optionsResolver->addAllowedTypes('access_token', 'string');
        $optionsResolver->addAllowedTypes('user_agent', 'string');
        $optionsResolver->addAllowedTypes('account_id', ['string', 'int']);

        return $optionsResolver->resolve($options);
    }
}
