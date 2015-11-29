<?php namespace alanmanderson\tictactoe\Models;

class Board{
	private $curPlayer;
	public function __construct($state = null){
		if (!isset($state)){
			$state = [['_','_','_'],['_','_','_'],['_','_','_']];
		}
		$this->state = $state;
		$emptyCells = 0;
		foreach($this->state as $row){
			foreach($row as $cell){
				if ($cell == "_") $emptyCells++;
			}
		}
		if ($emptyCells % 2 == 0){
			$curPlayer = "O";
		} else {
			$curPlayer = "X";
		}
	}
	
	function canWin($player, $board){
		global $winScenarios;
		foreach($winScenarios as $scenario){
			$vals = [];
			foreach ($scenario as $spot){
				$vals[] = boardVal($board, $spot);
			}
			$spotCount = array_count_values($vals);
			if ($spotCount[$player] == 2 && $spotCount["_"] == 1){
				for($i = 0; $i < 3; $i++){
					if ($vals[$i] == "_") return $scenario[$i];
				}
			}
		}
	}
	
	function availableMoves(){
		$moves = [];
		for($y=0; $y<3; $y++){
			for($x=0; $x<3; $x++){
				if ($board[$y][$x] == "_") $moves[] = new Move($x, $y);
			}
		}
		return $moves;
	}
	
	function valueAt($x, $y){
		return $this->state[$y][$x];
	}
	
	public function whoseTurn(){
		return $this->curPlayer; 
	}
}