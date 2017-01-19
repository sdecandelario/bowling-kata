<?php

namespace SergioDeCandelario\BowlingKata;

/**
 * BowlingGame
 *
 * @author Sergio de Candelario <sergio.decandelario@gmail.com>
 */
class BowlingGame
{
    private $bowls;

    private $multiplier;

    private $score;

    /**
     * BowlingGame constructor.
     */
    public function __construct()
    {
        $this->bowls = 10;
        $this->multiplier = 0;
        $this->score = 0;
    }

    public function score()
    {
        return $this->score;
    }

    public function sumScoreFromSequence(array $sequence)
    {
        foreach ($sequence as $roll) {
            if (is_int($roll)) {
                $this->score += $roll;
                continue;
            }

            if (is_string($roll)) {
                $value = BowlingGameScore::scoreValue($roll);
                $multiplier = BowlingGameScore::scoreMultiplier($roll);
                $this->score += $value * $multiplier;
            }
        }
    }
}