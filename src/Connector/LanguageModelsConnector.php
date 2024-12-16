<?php

namespace Artcustomer\XAIClient\Connector;

use Artcustomer\ApiUnit\Client\AbstractApiClient;
use Artcustomer\ApiUnit\Connector\AbstractConnector;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\ApiUnit\Utils\ApiMethodTypes;
use Artcustomer\XAIClient\Http\LanguageModelsRequest;

/**
 * @author David
 */
class LanguageModelsConnector extends AbstractConnector
{

    /**
     * Constructor
     *
     * @param AbstractApiClient $client
     */
    public function __construct(AbstractApiClient $client)
    {
        parent::__construct($client, false);
    }

    /**
     * @return IApiResponse
     */
    public function list(): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET
        ];
        $request = $this->client->getRequestFactory()->instantiate(LanguageModelsRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * @param string $modelId
     * @return IApiResponse
     */
    public function get(string $modelId): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET,
            'endpoint' => $modelId
        ];
        $request = $this->client->getRequestFactory()->instantiate(LanguageModelsRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }
}
