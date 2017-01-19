<?php

namespace SergioDeCandelario\BowlingKata\Test;

use PHPUnit\Framework\TestCase;
use SergioDeCandelario\BowlingKata\BowlingGame;
use SergioDeCandelario\BowlingKata\BowlingGameScore;

/**
 * BowlingGameTest
 *
 * @author Sergio de Candelario <sergio.decandelario@gmail.com>
 */
class BowlingGameTest extends TestCase
{

    /**
     * @test
     */
    public function checkInitialStateTest()
    {

        $bowlingGame = new BowlingGame();

        $this->assertEquals(0, $bowlingGame->score());
    }

    /**
     * @test
     */
    public function scoreWithTwelveRollsTwelveStrikes()
    {

        $bowlingGame = new BowlingGame();

        $sequence = [
            BowlingGameScore::STRIKE,
            BowlingGameScore::STRIKE,
            BowlingGameScore::STRIKE,
            BowlingGameScore::STRIKE,
            BowlingGameScore::STRIKE,
            BowlingGameScore::STRIKE,
            BowlingGameScore::STRIKE,
            BowlingGameScore::STRIKE,
            BowlingGameScore::STRIKE,
            BowlingGameScore::STRIKE,
            BowlingGameScore::STRIKE,
            BowlingGameScore::STRIKE,
        ];

        $bowlingGame->sumScoreFromSequence($sequence);

        $this->assertEquals(300, $bowlingGame->score());
    }

    /**
     * @test
     */
    public function scoreWithTwentyRollsTenPairsOfNineAndMiss()
    {

        $bowlingGame = new BowlingGame();

        $sequence = [
            9,
            BowlingGameScore::MISS,
            9,
            BowlingGameScore::MISS,
            9,
            BowlingGameScore::MISS,
            9,
            BowlingGameScore::MISS,
            9,
            BowlingGameScore::MISS,
            9,
            BowlingGameScore::MISS,
            9,
            BowlingGameScore::MISS,
            9,
            BowlingGameScore::MISS,
            9,
            BowlingGameScore::MISS,
            9,
            BowlingGameScore::MISS,
        ];

        $bowlingGame->sumScoreFromSequence($sequence);

        $this->assertEquals(90, $bowlingGame->score());
    }

    /**
     * @test
     */
    public function scoreWithTwentyOneRollsTenPairsOfFiveAndSpareWithFinalFive()
    {

        $bowlingGame = new BowlingGame();

        $sequence = [
            5,
            BowlingGameScore::SPARE,
            5,
            BowlingGameScore::SPARE,
            5,
            BowlingGameScore::SPARE,
            5,
            BowlingGameScore::SPARE,
            5,
            BowlingGameScore::SPARE,
            5,
            BowlingGameScore::SPARE,
            5,
            BowlingGameScore::SPARE,
            5,
            BowlingGameScore::SPARE,
            5,
            BowlingGameScore::SPARE,
            5,
            BowlingGameScore::SPARE,
            5,
        ];

        $bowlingGame->sumScoreFromSequence($sequence);

        $this->assertEquals(150, $bowlingGame->score());
    }
}