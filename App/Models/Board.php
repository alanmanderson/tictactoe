<?php namespace alanmanderson\tictactoe\Models;

class Board{
	private $curPlayer;
	public $winScenarios;
	public function __construct($state = null){
		if (!isset($state)){
			$state = [['_','_','_'],['_','_','_'],['_','_','_']];
		}
		$this->state = $state;
		$emptyCells = 0;
		foreach($this->state as $row){
			for($col = 0; $col < 3; $col++){
				if ($row[$col] == "_") $emptyCells++;
			}
		}
		if ($emptyCells % 2 == 0){
			$curPlayer = "O";
		} else {
			$curPlayer = "X";
		}
		$this->winScenarios = 
		[
			[new Move(0,0), new Move(0,1), new Move(0,2)],
			[new Move(1,0), new Move(1,1), new Move(1,2)],
			[new Move(2,0), new Move(2,1), new Move(2,2)],
			[new Move(0,0), new Move(1,0), new Move(2,0)],
			[new Move(0,1), new Move(1,1), new Move(2,1)],
			[new Move(0,2), new Move(1,2), new Move(2,2)],
			[new Move(0,0), new Move(1,1), new Move(2,2)],
			[new Move(0,2), new Move(1,1), new Move(2,0)]
		];
	}
	
	public function go($player, $x, $y){
		if ($this->state[$x][$y] != "_"){
			throw new \Exception("Invalid move: $x, $y");
		}
		$this->state[$x][$y] = $player;
	}
	
	function canWin($player, $board){
		global $winScenarios;
		foreach($this->winScenarios as $scenario){
			$vals = [];
			foreach ($scenario as $spot){
				$vals[] = $this->boardVal($spot);
			}
			$spotCount = array_count_values($vals);
			if ($spotCount[$player] == 2 && $spotCount["_"] == 1){
				for($i = 0; $i < 3; $i++){
					if ($vals[$i] == "_") return $scenario[$i];
				}
			}
		}
	}
	
	public function checkWin(){
		foreach($this->winScenarios as $scenario){
			$vals = [];
			foreach ($scenario as $spot){
				$vals[] = $this->boardVal($spot);
			}
			$spotCount = array_count_values($vals);
			if (isset($spotCount["X"]) && $spotCount["X"] == 3){
				return "X";
			} else if (isset($spotCount["O"]) && $spotCount["O"] == 3) {
				return "O";
			}
		}
		return false;
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
	
	public function boardVal($move){
		return $this->state[$move->x][$move->y];
	}
}