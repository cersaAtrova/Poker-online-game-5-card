<?php


class Card
{
    private $face;
    private $suit;

    function __construct($face, $suit)
    {
        $this->setCard($face, $suit);
    }

    function setCard($face, $suit)
    {
        $this->face = $face;
        $this->suit = $suit;
    }
    function getFace()
    {
        return $this->face;
    }
    function getSuit()
    {
        return $this->suit;
    }
}

class Card_deck
{
    var  $deck = array();
    const NUMBER_OF_CARD = 52;
    const FACE = array(0 => 'A', 1 => 2, 2 => 3, 3 => 4, 4 => 5, 5 => 6, 6 => 7, 7 => 8, 8 => 9, 9 => 10, 10 => 'J', 11 => 'Q', 12 => 'K');
    const SUIT = array(0 => 'heart', 1 => 'spade', 2 => 'club', 3 => 'diamond');


    function start_the_game()
    {

        for ($i = 0; $i < self::NUMBER_OF_CARD; $i++) {
           $this->deck[$i] = new Card(self::FACE[$i % 13], self::SUIT[$i / 13]);
        }
        
    }
  
    function new_game(&$first,&$second,&$third,&$fourth,&$fifth){
        shuffle($this->deck);
        
        $first='faces/'.$this->deck[0]->getSuit().'_'. $this->deck[0]->getFace();
        $second='faces/'.$this->deck[1]->getSuit().'_'. $this->deck[1]->getFace();
        $third='faces/'.$this->deck[2]->getSuit().'_'. $this->deck[2]->getFace();
        $fourth='faces/'.$this->deck[3]->getSuit().'_'. $this->deck[3]->getFace();
        $fifth='faces/'.$this->deck[4]->getSuit().'_'. $this->deck[4]->getFace();
        
      
    }
}
