<?php

namespace Mokhosh\Muddle\Strategies\Concerns;

use Mokhosh\Muddle\Attributes\Unsafe;
use Mokhosh\Muddle\Contracts\LinkStrategy;
use Mokhosh\Muddle\Contracts\TextStrategy;
use Random\Randomizer;
use ReflectionClass;

trait PicksRandomSibling
{
    protected static function getAllSafeSiblings(): array
    {
        $reflection = new ReflectionClass(static::class);
        ['dirname' => $directory] = pathinfo($reflection->getFileName());
        $files = scandir($directory);
        $namespace = $reflection->getNamespaceName();
        $resolvedStates = [];

        foreach ($files as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            }

            ['filename' => $className] = pathinfo($file);
            $stateClass = $namespace.'\\'.$className;

            if (static::class === $stateClass) {
                continue;
            }

            $reflectionSibling = new ReflectionClass($stateClass);

            if ($reflectionSibling->getAttributes(Unsafe::class)) {
                continue;
            }

            $resolvedStates[] = $stateClass;
        }

        return $resolvedStates;
    }

    /**
     * @return string<class-string>|TextStrategy|LinkStrategy
     */
    protected static function getRandomSibling(): LinkStrategy|TextStrategy|string
    {
        $siblings = static::getAllSafeSiblings();
        $keys = (new Randomizer)->pickArrayKeys($siblings, 1);

        return $siblings[$keys[0]];
    }
}
