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

        $bowlingGame = new BowlingGame([]);

        $this->assertEquals(0, $bowlingGame->score());
    }

    /**
     * @test
     */
    public function scoreAllThree()
    {
        $sequence = [
            3,
            3,
            3,
            3,
            3,
            3,
            3,
            3,
            3,
            3,
            3,
            3,
            3,
            3,
            3,
            3,
            3,
            3,
            3,
            3,
        ];

        $bowlingGame = new BowlingGame($sequence);

        $bowlingGame->calculateScore();

        $this->assertEquals(60, $bowlingGame->score());
    }

    /**
     * @test
     */
    public function scoreAllStrikes()
    {
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

        $bowlingGame = new BowlingGame($sequence);

        $bowlingGame->calculateScore();

        $this->assertEquals(300, $bowlingGame->score());
    }

    /**
     * @test
     */
    public function scoreHalfNineHalfMiss()
    {
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

        $bowlingGame = new BowlingGame($sequence);

        $bowlingGame->calculateScore();

        $this->assertEquals(90, $bowlingGame->score());
    }

    /**
     * @test
     */
    public function scoreHalfFiveHalfSpare()
    {

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
            5
        ];

        $bowlingGame = new BowlingGame($sequence);

        $bowlingGame->calculateScore();

        $this->assertEquals(150, $bowlingGame->score());
    }

    /**
     * @test
     */
    public function scoreHalfSevenHalfSpare()
    {

        $sequence = [
            7,
            BowlingGameScore::SPARE,
            7,
            BowlingGameScore::SPARE,
            7,
            BowlingGameScore::SPARE,
            7,
            BowlingGameScore::SPARE,
            7,
            BowlingGameScore::SPARE,
            7,
            BowlingGameScore::SPARE,
            7,
            BowlingGameScore::SPARE,
            7,
            BowlingGameScore::SPARE,
            7,
            BowlingGameScore::SPARE,
            7,
            BowlingGameScore::SPARE,
            7
        ];

        $bowlingGame = new BowlingGame($sequence);

        $bowlingGame->calculateScore();

        $this->assertEquals(170, $bowlingGame->score());
    }

    /**
     * @test
     */
    public function scoreAllMiss()
    {

        $sequence = [
            BowlingGameScore::MISS,
            BowlingGameScore::MISS,
            BowlingGameScore::MISS,
            BowlingGameScore::MISS,
            BowlingGameScore::MISS,
            BowlingGameScore::MISS,
            BowlingGameScore::MISS,
            BowlingGameScore::MISS,
            BowlingGameScore::MISS,
            BowlingGameScore::MISS,
            BowlingGameScore::MISS,
            BowlingGameScore::MISS,
            BowlingGameScore::MISS,
            BowlingGameScore::MISS,
            BowlingGameScore::MISS,
            BowlingGameScore::MISS,
            BowlingGameScore::MISS,
            BowlingGameScore::MISS,
            BowlingGameScore::MISS,
            BowlingGameScore::MISS,
        ];

        $bowlingGame = new BowlingGame($sequence);

        $bowlingGame->calculateScore();

        $this->assertEquals(0, $bowlingGame->score());
    }

    /**
     * @test
     */
    public function scoreAllStrikesFiveAndSpare()
    {

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
            5,
            BowlingGameScore::SPARE,
        ];

        $bowlingGame = new BowlingGame($sequence);

        $bowlingGame->calculateScore();

        $this->assertEquals(285, $bowlingGame->score());
    }

    /**
     * @test
     */
    public function scoreTwoAndOneStrikeSpareOneAndTwoUntilEnd()
    {

        $sequence = [
            2,
            1,
            BowlingGameScore::STRIKE,
            7,
            BowlingGameScore::SPARE,
            1,
            2,
            1,
            2,
            1,
            2,
            1,
            2,
            1,
            2,
            1,
            2,
            1,
            2,
        ];

        $bowlingGame = new BowlingGame($sequence);

        $bowlingGame->calculateScore();

        $this->assertEquals(55, $bowlingGame->score());
    }
}