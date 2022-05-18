<?php

namespace Corviz\Crow\Methods\Php;

use Corviz\Crow\Method;

class PhpMethod extends Method
{
    /**
     * @inheritDoc
     */
    public function getSignature(): string
    {
        return 'php';
    }

    /**
     * @inheritDoc
     */
    public function toPhpCode(?string $parameters = null): string
    {
        return "<?php ";
    }
}