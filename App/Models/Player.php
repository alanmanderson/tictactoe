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
}