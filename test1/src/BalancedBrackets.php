<?php

declare(strict_types=1);

namespace Test1;

class BalancedBrackets
{
    private const BRACKETS = ['(' => ')', '{' => '}', '[' => ']'];

    /**
     * @param string $text
     * @return bool
     */
    public function validate(string $text): bool
    {
        $bracketsOpen = array_flip(self::BRACKETS);
        $bracketsClose = self::BRACKETS;

        $arrText = str_split($text);
        foreach ($arrText as $bracket) {
            $isOpen = in_array($bracket, $bracketsOpen);

            // search close bracket
            if ($isOpen && !in_array($bracketsClose[$bracket], $arrText)) {
                return false;
            }

            // search open bracket
            if (!$isOpen && !in_array($bracketsOpen[$bracket], $arrText)) {
                return false;
            }
        }

        return true;
    }
}