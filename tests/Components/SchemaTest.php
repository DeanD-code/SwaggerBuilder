<?php

namespace Tests\Components;

use SwaggerBuilder\Components\Schema;
use SwaggerBuilder\Constants\Type;
use Tests\TestCase;

class SchemaTest extends TestCase
{
    public function testItCompilesDefaults()
    {
        $expected = [
            'type' => Type::OBJECT,
        ];

        $schema = new Schema($expected['type']);

        static::assertComponentStructure($expected, $schema);
    }

    public function testItCompilesSchemaSpecifics()
    {
        $expected = [
            'type' => Type::OBJECT,
            'example' => [
                'type' => 'User',
                'id' => 42,
                'properties' => [
                    'name' => 'Doe',
                ],
            ],
            'required' => [
                'id',
            ],
            'properties' => [
                'id' => new Schema(Type::NUMBER),
                'name' => new Schema(Type::STRING),
                'istrue' => new Schema(Type::BOOLEAN),
            ],
        ];

        $schema = (new Schema($expected['type']))
            ->setExample($expected['example'])
            ->setProperty('id', $expected['properties']['id'], true)
            ->setProperty('name', $expected['properties']['name'])
            ->setProperty('istrue', $expected['properties']['istrue']);

        static::assertComponentStructure($expected, $schema);
    }
}