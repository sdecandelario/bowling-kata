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

    private $sequence;

    /**
     * BowlingGame constructor.
     *
     * @param array $sequence
     */
    public function __construct(array $sequence)
    {
        $this->sequence = $sequence;
        $this->score = 0;
    }

    public function score()
    {
        return $this->score;
    }

    public function calculateScore()
    {
        $lastScore = 0;

        echo(PHP_EOL);

        foreach ($this->sequence as $turn => $roll) {
            echo("SCORE: " . $this->score . PHP_EOL);
            echo("L-SCORE: " . $lastScore . PHP_EOL);
            echo("=====" . PHP_EOL);

            if (is_int($roll)) {
                $this->score += $roll;
                $lastScore = $roll;
            }

            if ($roll == BowlingGameScore::STRIKE) {
                $this->score += 10;
                $lastScore = 10;

                if ($turn > 2) {
                    $this->score += (10 * 2);
                }
            }

            if ($roll == BowlingGameScore::SPARE) {
                $this->score += 10 - $lastScore;

                if ($turn > 1) {
                    $this->score += $lastScore;
                }

                $lastScore = 10;
            }

            if ($roll == BowlingGameScore::MISS) {
                $this->score += 0;
            }
        }
    }
}