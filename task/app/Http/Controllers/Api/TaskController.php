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

        $count = 0;
        $newStartNumber = $startNumber;
        $newEndNumber = $endNumber;

        for ($i=$startNumber; $i%5 ; $i++) {
            $newStartNumber = ($i+1);
            $count++;
        }

        for ($i=$endNumber; $i%5 ; $i--) {
            $newEndNumber = ($i-1);
            $count++;
        }

        $totalNumbers = $newEndNumber - $newStartNumber;
        $totalNumbersDivisibleByFive = $totalNumbers / 5;
        $numbersCount = $totalNumbers - $totalNumbersDivisibleByFive;

        // To include the first and end numbers count
        $count+=2;
        $count += $numbersCount;

        // return response()->json($count . "|" . $newStartNumber . "|" . $newEndNumber);

        // for ($i=$startNumber; $i <= $endNumber; $i++) {
        //     // To check if the number divisible by 5
        //     if($i%5 == 0)
        //         continue; // To skip the current loop number
        //     $count++;
        // }

        return response()->json("Count of numbers between [" . $startNumber . "] and [" . $endNumber . "] excluding multiples of 5 is: [" . $count . "]");
    }
}
