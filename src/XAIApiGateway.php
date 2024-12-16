<?php

namespace Artcustomer\XAIClient;

use Artcustomer\ApiUnit\Gateway\AbstractApiGateway;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\XAIClient\Client\ApiClient;
use Artcustomer\XAIClient\Connector\ChatCompletionsConnector;
use Artcustomer\XAIClient\Connector\CompletionsConnector;
use Artcustomer\XAIClient\Connector\EmbeddingModelsConnector;
use Artcustomer\XAIClient\Connector\EmbeddingsConnector;
use Artcustomer\XAIClient\Connector\LanguageModelsConnector;
use Artcustomer\XAIClient\Connector\ModelConnector;
use Artcustomer\XAIClient\Utils\ApiInfos;

/**
 * @author David
 */
class XAIApiGateway extends AbstractApiGateway
{

    private ChatCompletionsConnector $chatCompletionsConnector;
    private CompletionsConnector $completionsConnector;
    private EmbeddingModelsConnector $embeddingModelsConnector;
    private EmbeddingsConnector $embeddingsConnector;
    private LanguageModelsConnector $languageModelsConnector;
    private ModelConnector $modelConnector;

    private string $apiKey;
    private bool $availability;

    /**
     * Constructor
     *
     * @param string $apiKey
     * @param bool $availability
     * @throws \ReflectionException
     */
    public function __construct(string $apiKey, bool $availability)
    {
        $this->apiKey = $apiKey;
        $this->availability = $availability;

        $this->defineParams();

        parent::__construct(ApiClient::class, [$this->params]);
    }

    /**
     * Initialize
     *
     * @return void
     */
    public function initialize(): void
    {
        $this->setupConnectors();

        $this->client->initialize();
    }

    /**
     * Test API
     *
     * @return IApiResponse
     */
    public function test(): IApiResponse
    {

    }

    /**
     * Get ChatCompletionsConnector instance
     *
     * @return ChatCompletionsConnector
     */
    public function getChatCompletionsConnector(): ChatCompletionsConnector
    {
        return $this->chatCompletionsConnector;
    }

    /**
     * Get CompletionsConnector instance
     *
     * @return CompletionsConnector
     */
    public function getCompletionsConnector(): CompletionsConnector
    {
        return $this->completionsConnector;
    }

    /**
     * Get EmbeddingModelsConnector instance
     *
     * @return EmbeddingModelsConnector
     */
    public function getEmbeddingModelsConnector(): EmbeddingModelsConnector
    {
        return $this->embeddingModelsConnector;
    }

    /**
     * Get EmbeddingsConnector instance
     *
     * @return EmbeddingsConnector
     */
    public function getEmbeddingsConnector(): EmbeddingsConnector
    {
        return $this->embeddingsConnector;
    }

    /**
     * Get LanguageModelsConnector instance
     *
     * @return LanguageModelsConnector
     */
    public function getLanguageModelsConnector(): LanguageModelsConnector
    {
        return $this->languageModelsConnector;
    }

    /**
     * Get ModelConnector instance
     *
     * @return ModelConnector
     */
    public function getModelConnector(): ModelConnector
    {
        return $this->modelConnector;
    }

    /**
     * Setup connectors
     *
     * @return void
     */
    private function setupConnectors(): void
    {
        $this->chatCompletionsConnector = new ChatCompletionsConnector($this->client);
        $this->completionsConnector = new CompletionsConnector($this->client);
        $this->embeddingModelsConnector = new EmbeddingModelsConnector($this->client);
        $this->embeddingsConnector = new EmbeddingsConnector($this->client);
        $this->languageModelsConnector = new LanguageModelsConnector($this->client);
        $this->modelConnector = new ModelConnector($this->client);
    }

    /**
     * Define parameters
     *
     * @return void
     */
    private function defineParams(): void
    {
        $this->params['api_name'] = ApiInfos::API_NAME;
        $this->params['api_version'] = ApiInfos::API_VERSION;
        $this->params['protocol'] = ApiInfos::PROTOCOL;
        $this->params['host'] = ApiInfos::HOST;
        $this->params['version'] = ApiInfos::VERSION;
        $this->params['api_key'] = $this->apiKey;
        $this->params['availability'] = $this->availability;
    }
}