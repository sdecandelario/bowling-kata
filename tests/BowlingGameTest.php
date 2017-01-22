<?php

namespace SergioDeCandelario\BowlingKata\Test;

use PHPUnit\Framework\TestCase;
use SergioDeCandelario\BowlingKata\BowlingGame;

/**
 * BowlingGameTest
 *
 * @author Sergio de Candelario <sergio.decandelario@gmail.com>
 */
class BowlingGameTest extends TestCase
{

    public function testCheckInitialState()
    {

        $bowlingGame = new BowlingGame([]);

        $this->assertEquals(0, $bowlingGame->score());
    }

    public function testAGutterGame()
    {
        $rolls = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        $bowlingGame = new BowlingGame($rolls);

        $bowlingGame->calculateScore();

        $this->assertEquals(0, $bowlingGame->score());
    }

    public function testANoSpareNoStrikesGame()
    {
        $rolls = [1, 6, 4, 5, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        $bowlingGame = new BowlingGame($rolls);

        $bowlingGame->calculateScore();

        $this->assertEquals(20, $bowlingGame->score());
    }

    public function testGameWithSpares()
    {
        $rolls = [4, 6, 4, 5, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        $bowlingGame = new BowlingGame($rolls);

        $bowlingGame->calculateScore();

        $this->assertEquals(27, $bowlingGame->score());
    }

    public function testGameWithStrikes()
    {
        $rolls = [10, 4, 5, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        $bowlingGame = new BowlingGame($rolls);

        $bowlingGame->calculateScore();

        $this->assertEquals(32, $bowlingGame->score());
    }

    public function testGameWithSpareIn10thFrame()
    {
        $rolls = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 1, 4, 2, 4, 6, 2];

        $bowlingGame = new BowlingGame($rolls);

        $bowlingGame->calculateScore();

        $this->assertEquals(22, $bowlingGame->score());
    }

    public function testGameWithStrikeIn10thFrame()
    {

        $rolls = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 1, 4, 2, 10, 2, 3];

        $bowlingGame = new BowlingGame($rolls);

        $bowlingGame->calculateScore();

        $this->assertEquals(25, $bowlingGame->score());
    }

    public function testAPrefectGame()
    {
        $rolls = [10, 10, 10, 10, 10, 10, 10, 10, 10, 10];

        $bowlingGame = new BowlingGame($rolls);

        $bowlingGame->calculateScore();

        $this->assertEquals(300, $bowlingGame->score());
    }
}