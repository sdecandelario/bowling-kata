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

    public static function scoreAdditionalPoint(string $score)
    {
        $scoreValues = [
            self::STRIKE => 30,
            self::SPARE => 10,
            self::MISS => 0,
        ];

        return $scoreValues[$score];
    }

}