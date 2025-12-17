<?php

namespace SwaggerBuilder\Components\Params;

use SwaggerBuilder\Components\Schema;

class BodyParameter extends BaseParameter
{
    /**
     * @param string $name
     * @param bool   $required
     * @param Schema|null $schema
     */
    public function __construct($name = 'id', bool $required = false, ?Schema $schema = null)
    {
        parent::__construct($name, static::BODY, static::BODY, $required);
        unset($this->structure['type']);

        if ($schema !== null) {
            $this->setSchema($schema);
        }
    }

    private function setSchema(?Schema $schema): BodyParameter
    {
        return $this->set('schema', $schema);
    }
}
