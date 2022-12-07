<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function getCount($startNumber, $endNumber)
    {
        if($endNumber <= $startNumber)
            return response()->json('End number must be greater than the start number');

        $totalNumbers = $endNumber - $startNumber;
        $range = strlen($totalNumbers - 1);

        return response()->json(self::countOfFivesToMinus($range));

        // $count = 0;
        // $newStartNumber = $startNumber;
        // $newEndNumber = $endNumber;

        // for ($i=$startNumber; $i%5 ; $i++) {
        //     $newStartNumber = ($i+1);
        //     $count++;
        // }

        // for ($i=$endNumber; $i%5 ; $i--) {
        //     $newEndNumber = ($i-1);
        //     $count++;
        // }

        // $totalNumbers = $newEndNumber - $newStartNumber;
        // $totalNumbersDivisibleByFive = $totalNumbers / 5;
        // $numbersCount = $totalNumbers - $totalNumbersDivisibleByFive;

        // // To include the first and end numbers count
        // $count+=2;
        // $count += $numbersCount;

        // return response()->json($count . "|" . $newStartNumber . "|" . $newEndNumber);

        // for ($i=$startNumber; $i <= $endNumber; $i++) {
        //     // To check if the number divisible by 5
        //     if($i%5 == 0)
        //         continue; // To skip the current loop number
        //     $count++;
        // }

        // return response()->json("Count of numbers between [" . $startNumber . "] and [" . $endNumber . "] excluding multiples of 5 is: [" . $count . "]");
    }

    public function countOfFivesToMinus($range)
    {
        $result = 0;

        for ($i=0; $i < $range; $i++) {
            $result += (pow(9, ($range-1) - $i)) * pow(10, $i);
        }

        return $result;
    }



    // Converting Alphabet function
    public function getAlphabetCount($inputString)
    {
        $result = 0;
        $stringLength = strlen($inputString);
        $arr = self::getAsciiValueAndConvert($inputString);

        for ($i=0; $i < $stringLength; $i++) {
            $result += ($arr[$i] * pow(26, ($stringLength-1-$i)));
        }

        return response()->json("The output is ".$result);
    }
    public function getAsciiValueAndConvert($string)
    {
        // To convert to uppercase as Ascii values of uppercases are different from the lower cases
        $string = strtoupper($string);
        $arr = array();
        foreach (str_split($string) as $char) {
            $asciiOrder = (int) ord($char);
            // Here as the value of A->65, B->66 so converting them to A->1, B->2 ....
            array_push($arr, $asciiOrder - 64);
        }
        return $arr;
    }
    // ./Converting Alphabet function
}
