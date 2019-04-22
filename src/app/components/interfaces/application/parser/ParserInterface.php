<?php

namespace SmartHawk\components\interfaces\application\parser;

/**
 * Interface ParserInterface
 * @package SmartHawk\components\interfaces\application\parser
 */
interface ParserInterface
{
    /**
     * @return array
     */
    public function getCategories(): array;

    /**
     * @param string|null $category
     * @return null|string
     */
    public function getJoke(?string $category = null): ?string;
}
