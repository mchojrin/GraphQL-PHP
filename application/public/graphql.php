<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use GraphQL\Server\StandardServer;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;

$countries = [
    [
        'id' => '1ae29d',
        'name' => 'Spain',
    ],
    [
        'id' => '34ffa0',
        'name' => 'USA',
    ],
    [
        'id' => '11b3e4',
        'name' => 'Australia',
    ],
];

$users = [
    [
        'id' => 'aa32fd',
        'name' => 'Mauro',
        'email' => 'mauro.chojrin@leewayweb.com',
        'birthday' => '1977-12-22',
        'countryId' => '1ae29d',
        'gender' => 'M',
    ],
    [
        'id' => 'de14e5',
        'name' => 'Tamara',
        'email' => 'tlopez@gmail.com',
        'birthday' => '1982-08-19',
        'countryId' => '1ae29d',
        'gender' => 'F',
    ],
    [
        'id' => 'bad31',
        'name' => 'Peter',
        'email' => 'peter.loffatti@hotmail.com',
        'birthday' => '1968-11-02',
        'countryId' => '34ffa0',
        'gender' => 'M',
    ],
];

$countryType = new ObjectType(
    [
        'name' => 'Country',
        'fields' => [
            'id' => [
                'type' => Type::id(),
            ],
            'name' => [
                'type' => Type::string(),
            ],
        ]
    ]
);

$userType = new ObjectType(
    [
        'name' => 'User',
        'fields' => [
            'id' => [
                'type' => Type::id(),
            ],
            'name' => [
                'type' => Type::string(),
            ],
            'email' => [
                'type' => Type::string(),
            ],
            'country' => [
                'type' => $countryType
            ],
            'gender' => [
                'type' => Type::string(),
            ],
        ],
    ]
);

$queryType = new ObjectType([
        'name' => 'Query',
        'fields' => [
            'User' => [
                'type' => $userType,
                'args' => [
                    'id' => [
                        'type' => Type::id(),
                    ]
                ],
                'resolve' => function ($rootValue, array $args) use ($users, $countries): array {
                    $theUser = current(array_filter($users, function($user) use ($args) {

                        return $args['id'] == $user['id'];
                    }));

                    $theCountry = current(array_filter($countries, function($country) use ($theUser) {

                        return $country['id'] == $theUser['countryId'];
                    }));

                    $theUser['country'] = $theCountry;

                    return $theUser;
                },
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