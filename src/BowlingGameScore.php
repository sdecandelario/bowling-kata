<?php

namespace SergioDeCandelario\BowlingKata;

/**
 * BowlingGameScore
 *
 * @author Sergio de Candelario <sergio.decandelario@gmail.com>
 */
class BowlingGameScore
{
    const STRIKE = 'X';
    const SPARE = '/';
    const MISS = '-';

    public static function scoreValue(string $score): int{
        $scoreValues = [
            self::STRIKE => 10,
            self::SPARE => 5,
            self::MISS => 0,
        ];

        return $scoreValues[$score];
    }

    public static function scoreMultiplier(string $score)
    {
        $scoreValues = [
            self::STRIKE => 3,
            self::SPARE => 2,
            self::MISS => 0,
        ];

        return $scoreValues[$score];
    }

}