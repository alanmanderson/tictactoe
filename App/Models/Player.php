<?php namespace alanmanderson\tictactoe\Models;

class Player{
	private $marker;
    public function __construct($marker){
		$this->marker = $marker;
    }
	
	public function nextMove($board){
		
	}
	
	private function getOtherPlayer(){
		if ($this->marker == "X") return "O";
		return "X";
	}
	
	public function bestMove($board, $forEnemy = false){
		$bestMove = null;
		$bestScore = -10000;
		for($x = 0; $x < 3; $x++){
			for ($y = 0; $y < 3; $y++){
				$move = new Move($x, $y);
				if ($board->boardVal($move) != "_") continue;
				$curScore = $this->scoreMove($board, $move, $forEnemy);
				if ($curScore > $bestScore){
					$bestMove = $move;
					$bestScore = $curScore;
				}
			}
		}
		return $bestMove;
	}
	
	public function scoreMove($board, $move, $forEnemy = false){
		$friend = $forEnemy ? $this->getOtherPlayer() : $this->marker;
		$foe = $forEnemy ? $this->marker : $this->getOtherPlayer();
		$newBoard = clone $board;
		$newBoard->go($friend, $move->x, $move->y);
		if ($newBoard->checkWin()) return 10;
		$score = 0;
		$corners = [new Move(0,0), new Move(0,2), new Move(2,0), new Move(2,2)];
		foreach($newBoard->winScenarios as $moves){
			if (!$this->scenarioHasMove($moves, $move)) continue;
			foreach ($moves as $move){
				$vals[] = $newBoard->boardVal($move);
			}
			$spotCount = array_count_values($vals);
			if ($spotCount[$friend] == 2 && isset($spotCount["_"]) && $spotCount["_"] == 1) $score += .3;
			#else if ($spotCount[$friend] == 1 && $spotCount["_"] == 2) $score += .1;
			if (isset($spotCount[$foe])){
				if ($spotCount[$friend] == 1 && $spotCount[$foe] == 2) $score += 2;
				if ($spotCount[$friend] == 1 && $spotCount[$foe] == 1) $score += .2;
			}
			if (in_array($move, $corners)) $score += .1;
			if ($move == new Move(1,1)) $score += .05;
		}
		return $score;
	}
	
	private function scenarioHasMove($scenario, $move){
		foreach($scenario as $curMove){
			if ($move == $curMove){
				return true;
			}
		}
		return false;
	}
}