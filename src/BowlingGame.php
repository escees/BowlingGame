<?php

class BowlingGame {

    public $rolls = [];
    private $currentRoll = 0;

    public function roll($numPins) {
        $this->rolls[$this->currentRoll] = $numPins;
        $this->currentRoll++;
    }

    public function score() {
        $score = 0;
        $frameIndex = 0;
        for ($frame = 0; $frame < 10; $frame++) {
            $frameScore = 0;
            if ($this->IsStrike($frameIndex)) {
                $frameScore = 10 + $this->StrikeBonus($frameIndex);
                $frameIndex++;
            } else {

                $frameScore = $this->SumOfFrame($frameIndex);
                if ($this->IsSpare($frame)) {
                    $frameScore += $this->SpareBonus($frameIndex);
                }

                $frameIndex += 2;
            }

            $score += $frameScore;
        }

        return $score;
    }

    private function sumOfFrame($frameIndex) {
        return $this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1];
    }

    private function spareBonus($frameIndex) {
        $spareBonus = $this->rolls[$frameIndex + 2];
        return $spareBonus;
    }

    private function strikeBonus($frameIndex) {
        $strikeBonus = $this->rolls[$frameIndex + 1] + $this->rolls[$frameIndex + 2];
        return $strikeBonus;
    }

    private function isStrike($frameIndex) {
        return $this->rolls[$frameIndex] == 10;
    }

    private function isSpare($frame) {
        return $this->rolls[$frame] + $this->rolls[$frame + 1] == 10;
    }

}
