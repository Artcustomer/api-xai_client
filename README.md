# XAI API PHP Client

## Install with composer
### Get composer
https://getcomposer.org/

```bash
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/Artcustomer/apiunit"
    },
    {
        "type": "vcs",
        "url": "https://github.com/Artcustomer/api-xai_client"
    }
],
"require": {
  "artcustomer/xai-api-client": "^1.0.0",
}
```

## How to use

Grab your `API key` from XAI.

```bash
// Create and initialize the API gateway
$apiGateway = new XAIApiGateway('apiKey', true);
$apiGateway->initialize();

// Perform a request
$params = [
    'model' => 'grok-beta',
    'messages' => [
        [
            'role' => 'user',
            'content' => 'Testing. Just say hi and nothing else.'
        ]
    ],
];
$response = $apiGateway->getChatCompletionsConnector()->create($params);

// Interpret the response
if ($response->getStatusCode() === 200) {
  $content = $response->getContent();
  
  // Do something with the content
} else {
  // Status code is not 200, maybe an error occurred
}
```
