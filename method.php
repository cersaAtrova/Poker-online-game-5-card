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
        //fill the array with all the cards
        for ($i = 0; $i < self::NUMBER_OF_CARD; $i++) {
            $this->deck[$i] = new Card(self::FACE[$i % 13], self::SUIT[$i / 13]);
        }
    }
    function shuffle_the_deck()
    {
        //shuffle the cards
        shuffle($this->deck);
    }

    function new_game()
    {
       

        //get the five first card and save it in the session. When is call print the card on the screen
        $_SESSION['card_hand']['first_card'] = 'faces/' . $this->deck[0]->getSuit() . '_' . $this->deck[0]->getFace();
        $_SESSION['card_hand']['second_card'] = 'faces/' . $this->deck[1]->getSuit() . '_' . $this->deck[1]->getFace();
        $_SESSION['card_hand']['third_card'] = 'faces/' . $this->deck[2]->getSuit() . '_' . $this->deck[2]->getFace();
        $_SESSION['card_hand']['fourth_card'] = 'faces/' . $this->deck[3]->getSuit() . '_' . $this->deck[3]->getFace();
        $_SESSION['card_hand']['fifth_card'] = 'faces/' . $this->deck[4]->getSuit() . '_' . $this->deck[4]->getFace();
        //use this if the player draw a card
        $_SESSION['card_hand']['sixth_card'] = 'faces/' . $this->deck[5]->getSuit() . '_' . $this->deck[5]->getFace();
    }

    function check_for_win()
    {
        //create an array to store the key value
        $arr = array();
        $pos_win_rf_sf_f = false;
        $same = $_SESSION['card_hand']['first_card']->getSuit();
        //go through the array and check if is all the same and store all thevalue inside the array
        foreach ($_SESSION['card_hand'] as $e) {
            $arr[] = array_keys(self::FACE, $e); //store all key value
            if ($e->getSuit() != $same) {
                $pos_win_rf_sf_f = false;
            }
        }
        //find how many value are the same
        $same_value_in_arr = array_count_values($arr);
        //sort the array from lower to hiegher
        asort($arr);

        //if the suit is the same the possible winning is RF,SF,FL
        if ($pos_win_rf_sf_f == true) {
            //check if is contain ACE in the card hand
            if ($arr[0] === 0) {
                //Add 13 points to ACE and if the total amount of keys is 55 then is Royal flush
                if (array_sum($arr) + 13 == 55) {
                    return 'Royal Flush';
                    //if the last value divided by the first value and the result is 4 the is straight flush
                } else if ($arr[4] - $arr[0] == 4) {

                    return 'Straight Flush';
                    //any different result is flush
                } else {
                    return 'Flush';
                }
            } else if ($arr[4] - $arr[0] == 4) {

                return 'Straight Flush';
            } else {
                return 'Flush';
            }
        } else {
            if ($arr[4] - $arr[0] == 4) {
                return 'Straght';
            }
            //check if is 4 of king or Full house
            if (count($same_value_in_arr) == 2) {
                if ($same_value_in_arr[0] == 4 || $same_value_in_arr[1] == 4) {
                    return '4 of a King';
                } else {
                    return 'Full House';
                }
            }
            //check if is a 3 of king or 2 pairs
            if (count($same_value_in_arr) == 3) {
                if ($same_value_in_arr[0] == 3 || $same_value_in_arr[1] == 3 || $same_value_in_arr[2] == 3) {
                    return '3 of a King';
                } else {
                    return '2 Pairs';
                }
            }
            if (count($same_value_in_arr) == 4) {
                return '1 Pairs';
            }
        }
    }
}
