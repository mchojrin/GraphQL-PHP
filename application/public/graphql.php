<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use GraphQL\Server\StandardServer;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;
use Model\User;

$queryType = new ObjectType([
        'name' => 'Query',
        'fields' => [
            'name' => [
                'type' => Type::string(),
                'args' => [
                    'id' => [
                        'type' => Type::string(),
                    ]
                ],
                'resolve' => fn($rootValue, array $args): User => User::findById($args['id'])
            ]
        ]
    ]
);

$schema = new Schema(
    [
        'query' => $queryType,
    ]
);

$server = new StandardServer([
    'schema' => $schema,
]);

$server->handleRequest();