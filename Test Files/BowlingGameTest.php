<?php

include "../src/BowlingGame.php";

class BowlingGameTest extends PHPUnit_Framework_TestCase {

    public function testAllThrowsZero() {
        $bg = new BowlingGame ();
        for ($i = 0; $i < 20; $i++) {
            $bg->roll(0);
        }
        $this->assertSame(0, $bg->score());
    }

    public function testAllRollsEquals1() {
        $bg = new BowlingGame ();
        for ($i = 0; $i < 20; $i++) {
            $bg->roll(1);
        }
        $this->assertEquals(20, $bg->score());
    }

    public function testFirstStrikeAndThree() {
        $bg = new BowlingGame();
        $bg->roll(10);
        $bg->roll(3);
        for ($i = 0; $i < 18; $i++) {
            $bg->roll(0);
        }
        $this->assertSame(16, $bg->score());
    }

    public function testFirstStrikeThreeNextFour() {
        $bg = new BowlingGame();
        $bg->roll(10);
        $bg->roll(3);
        $bg->roll(4);
        for ($i = 0; $i < 17; $i++) {
            $bg->roll(0);
        }
        $this->assertSame(24, $bg->score());
    }

    public function testFirstSpare() {
        $bg = new BowlingGame();
        $bg->roll(2);
        $bg->roll(8);
        $bg->roll(4);
        $bg->roll(3);
        for ($i = 0; $i < 16; $i++) {
            $bg->roll(0);
        }
        $this->assertSame(21, $bg->score());
    }

    public function testPerfect() {
        $bg = new BowlingGame();

        for ($i = 0; $i < 12; $i++) {
            $bg->roll(10);
        }
        
        $this->assertSame(300, $bg->score());
    }

    

}
