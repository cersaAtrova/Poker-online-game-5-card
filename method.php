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
    //return the winning profit
    static function win_chips($win)
    {
        switch ($win) {
            case 'Royal Flush';
                $chips = 250;
                break;
            case 'Straight Flush';
                $chips = 100;
                break;
            case '4 of a King';
                $chips = 50;
                break;
            case 'Full House';
                $chips = 25;
                break;
            case 'Flush';
                $chips = 15;
                break;
            case 'Straight';
                $chips = 9;
                break;
            case '3 of a King';
                $chips = 5;
                break;
            case '2 Pairs';
                $chips = 2;
                break;
            case '1 Pair';
                $chips = 1;
                break;
            default:
                $chips = 0;
                break;
        }

        return $chips;
    } //end check result function

    function new_game()
    {
        //get the five first card and save it in the session. When is call print the card on the screen
        $_SESSION['card_hand']['first_card'] =  $this->deck[0]->getSuit() . '_' . $this->deck[0]->getFace();
        $_SESSION['card_hand']['second_card'] = $this->deck[1]->getSuit() . '_' . $this->deck[1]->getFace();
        $_SESSION['card_hand']['third_card'] =  $this->deck[2]->getSuit() . '_' . $this->deck[2]->getFace();
        $_SESSION['card_hand']['fourth_card'] =  $this->deck[3]->getSuit() . '_' . $this->deck[3]->getFace();
        $_SESSION['card_hand']['fifth_card'] =  $this->deck[4]->getSuit() . '_' . $this->deck[4]->getFace();
        //use this if the player draw a card
        $_SESSION['card_hand']['0_card'] =  $this->deck[5]->getSuit() . '_' . $this->deck[5]->getFace();
        $_SESSION['card_hand']['1_card'] =  $this->deck[6]->getSuit() . '_' . $this->deck[6]->getFace();
        $_SESSION['card_hand']['2_card'] =  $this->deck[7]->getSuit() . '_' . $this->deck[7]->getFace();
        $_SESSION['card_hand']['3_card'] =  $this->deck[8]->getSuit() . '_' . $this->deck[8]->getFace();
        $_SESSION['card_hand']['4_card'] =  $this->deck[9]->getSuit() . '_' . $this->deck[9]->getFace();

        $str = '';
        foreach ($_SESSION['card_hand'] as $e) {
            $str .= $e . ' ';
        }
        $_SESSION['poker']['history'] = $str;
    }

    static function check_for_win($card1, $card2, $card3, $card4, $card5)
    {
        $cards = array($card1, $card2, $card3, $card4, $card5);
        //create an array to store the key value
        $arr = array();
        $pos_win_rf_sf_f = true;
        $same = explode('_', $cards[0]);
        //go through the array and check if is all the same and store all thevalue inside the array
        foreach ($cards as  $e) {
            $face_suit = explode('_', $e);
            $arr[] = array_search($face_suit[1], self::FACE);
            if ($face_suit[0] != $same[0]) {
                $pos_win_rf_sf_f = false;
            }
        }
        unset($arr[5]);
        //find how many value are the same
        $same_unorder_value = array_count_values($arr);
        foreach ($same_unorder_value as $c) {
            $same_value_in_arr[] = $c;
        }

        //The  $_SESSION['poker']['win'] and $_SESSION['poker']['not_win'] is to store how many times are the player win or not
        //sort the array from lower to hiegher
        sort($arr);
        if (!isset($_SESSION['poker']['win'])) {
            $_SESSION['poker']['win'] = 0;
        }
        //     if the suit is the same the possible winning is RF,SF,FL
        if ($pos_win_rf_sf_f == true) {
            //check if is contain ACE in the card hand
            if ($arr[0] === 0) {
                //Add 13 points to ACE and if the total amount of keys is 55 then is Royal flush
                if (array_sum($arr) + 13 == 55) {
                    $_SESSION['poker']['win'] += 1;
                    return 'Royal Flush';
                    //if the last value divided by the first value and the result is 4 the is straight flush
                } else if ($arr[4] - $arr[0] == 4) {
                    $_SESSION['poker']['win'] += 1;
                    return 'Straight Flush';
                    //any different result is flush
                } else {
                    $_SESSION['poker']['win'] += 1;
                    return 'Flush';
                }
            } else if ($arr[4] - $arr[0] == 4) {
                $_SESSION['poker']['win'] += 1;
                return 'Straight Flush';
            } else {
                $_SESSION['poker']['win'] += 1;
                return 'Flush';
            }
        } else {
            //check if is 4 of king or Full house
            if (count($same_value_in_arr) == 2) {
                if ($same_value_in_arr[0] == 4 || $same_value_in_arr[1] == 4) {
                    $_SESSION['poker']['win'] += 1;
                    return '4 of a King';
                } else {
                    $_SESSION['poker']['win'] += 1;
                    return 'Full House';
                }
            }
            //check if is a 3 of king or 2 pairs
            if (count($same_value_in_arr) == 3) {
                if ($same_value_in_arr[0] == 3 || $same_value_in_arr[1] == 3 || $same_value_in_arr[2] == 3) {
                    $_SESSION['poker']['win'] += 1;
                    return '3 of a King';
                } else {
                    $_SESSION['poker']['win'] += 1;
                    return '2 Pairs';
                }
            }
            if (count($same_value_in_arr) == 4) {
                $_SESSION['poker']['win'] += 1;
                return '1 Pair';
            }
            if (count($same_value_in_arr) > 4) {
                if ($arr[4] - $arr[0] == 4) {
                    $_SESSION['poker']['win'] += 1;
                    return 'Straight';
                }
                if (isset($_SESSION['poker']['not_win'])) {
                    $_SESSION['poker']['not_win'] = $_SESSION['poker']['not_win'] + 1;
                } else {
                    $_SESSION['poker']['not_win'] = 1;
                }
                return 'No Pair';
            }
        }
    } // end check win function

    static function draw_cards($str)
    {
        if (!empty($str)) {
            $arr = explode(',', $str, 5);
            for ($i = 0; $i < count($arr); $i++) {
                switch ($arr[$i]) {
                    case $arr[$i] == 'first_card';
                        $_SESSION['card_hand']['first_card'] =  $_SESSION['card_hand']["{$i}_card"];
                        break;
                    case $arr[$i] == 'second_card';
                        $_SESSION['card_hand']['second_card'] =  $_SESSION['card_hand']["{$i}_card"];
                        break;

                    case $arr[$i] == 'third_card';
                        $_SESSION['card_hand']['third_card'] =  $_SESSION['card_hand']["{$i}_card"];
                        break;

                    case $arr[$i] == 'fourth_card';
                        $_SESSION['card_hand']['fourth_card'] =  $_SESSION['card_hand']["{$i}_card"];
                        break;

                    case $arr[$i] == 'fifth_card';
                        $_SESSION['card_hand']['fifth_card'] =  $_SESSION['card_hand']["{$i}_card"];
                        break;
                }
            }
        }
    }
}
