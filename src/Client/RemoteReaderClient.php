<?php

namespace Sehonl\DirectusSymfonyBundle\Client;

use Symfony\Component\HttpFoundation\JsonResponse;

class RemoteReaderClient extends AbstractClient {
    /**
     * @var string[]
     */
    protected $allowedHttpMethods = ['GET'];

    public function getOneItem(string $collection, int $id): array
    {
        $responseArray = $this->doEndpointRequest(AbstractClient::ITEMS_MANY_ENDPOINT, [
            'collection' => $collection,
            'id' => $id
        ]);

        return $responseArray[0] ?? [];
    }

    public function getManyItems(string $collection): array
    {
        return $this->doEndpointRequest(AbstractClient::ITEMS_MANY_ENDPOINT, ['collection' => $collection]) ?: [];
    }
}
