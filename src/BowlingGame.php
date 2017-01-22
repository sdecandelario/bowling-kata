<?php

namespace SergioDeCandelario\BowlingKata;

/**
 * BowlingGame
 *
 * @author Sergio de Candelario <sergio.decandelario@gmail.com>
 */
class BowlingGame
{
    private $score;

    private $rolls;

    /**
     * BowlingGame constructor.
     *
     * @param array $rolls
     */
    public function __construct(array $rolls)
    {
        $this->rolls = $rolls;
        $this->score = 0;
    }

    public function score()
    {
        return $this->score;
    }

    public function calculateScore()
    {
        $previousRoll = 0;
        $additionalTurns = 0;
        $launch = 1;
        $totalRolls = count($this->rolls);

        foreach ($this->rolls as $turn => $roll) {
            if ($additionalTurns && $turn < ($totalRolls - $additionalTurns)) {
                $this->score += $roll;
                $additionalTurns--;
            }

            if (($previousRoll + $roll == 10) && $launch == 2) {
                $additionalTurns = 1;
            }

            if ($roll == 10) {
                $additionalTurns = 2;
            }

            if (($roll == 10) || $launch == 2) {
                $launch = 0;
            }

            $previousRoll = $roll;
            $launch++;

            $this->score += $roll;
        }
    }
}