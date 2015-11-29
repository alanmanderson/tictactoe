<?php namespace alanmanderson\tictactoe\Models;

class Game{
	private $board;
	private $players;
	private $curPlayer;
    public function __construct($board, $players){
		$this->board = $board;
		$this->players = $players;
		if ($this->board->whoseTurn() == "X") $this->curPlayer = "O";
		else $this->curPlayer = "X";
    }
	
	public function nextMove(){
		
	}
	
	
}