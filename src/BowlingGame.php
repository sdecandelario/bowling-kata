<?php

namespace SergioDeCandelario\BowlingKata;

/**
 * BowlingGame
 *
 * @author Sergio de Candelario <sergio.decandelario@gmail.com>
 */
class BowlingGame
{
    /**
     * @var int
     */
    private $score;

    /**
     * @var array
     */
    private $rolls;

    /**
     * @var array
     */
    private $extraScore;

    /**
     * @var
     */
    private $totalRolls;

    /**
     * BowlingGame constructor.
     *
     * @param array $rolls
     */
    public function __construct(array $rolls)
    {
        $this->rolls = $rolls;
        $this->totalRolls = 0;
        $this->score = 0;
        $this->extraScore = [];
    }

    /**
     * @return int
     */
    public function score()
    {
        return $this->score;
    }

    /**
     *
     */
    public function calculateScore()
    {
        $this->initializeExtraScore();

        $previousRoll = 0;
        $launch = 1;

        foreach ($this->rolls as $roll => $score) {

            if ($multiplier = $this->extraScore[$roll]) {
                $this->score += $score * $multiplier;
            }

            if (($previousRoll + $score == 10) && $launch == 2) {
                if (($roll + 2) < $this->totalRolls) {
                    $this->addExtraScore($roll + 1);
                }
            }

            if ($score == 10) {
                if (($roll + 3) < $this->totalRolls) {
                    $this->addExtraScore($roll + 1);
                    $this->addExtraScore($roll + 2);
                }
            }

            if ($score == 10 || $launch == 2) {
                $launch = 0;
            }

            $previousRoll = $score;
            $launch++;

            $this->score += $score;
        }
    }

    /**
     *
     */
    private function initializeExtraScore()
    {
        $this->totalRolls = count($this->rolls);

        $i = 0;

        do {
            $this->extraScore[] = 0;
            $i++;
        } while ($i < $this->totalRolls);
    }

    /**
     * @param $position
     */
    private function addExtraScore($position)
    {
        if (isset($this->extraScore[$position])) {
            $this->extraScore[$position] += 1;
        }
    }
}