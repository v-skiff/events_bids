<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bid;
use App\Event;

class TaskController extends Controller
{
    public function task_1() {
        $max_price_username = Bid::orderBy('price', 'desc')->first()->name;
        $event_with_no_bids = Event::doesntHave('bids')->get();
        $event_with_3_bids = Event::has('bids', '>', 3)->get();
        $event_with_max_bids = Event::withCount('bids')->orderBy('bids_count', 'desc')->limit(1)->get();

        return view('task_1', compact([
            'max_price_username',
            'event_with_no_bids',
            'event_with_3_bids',
            'event_with_max_bids',
         ]));
    }

    public function task_2() {

        # task 2
        $students_total = 28;
        $athlete_percent = 75;
        $athletes = ($students_total * $athlete_percent) / 100;

        # task 3
        $str = 'This server has 386 GB RAM and 500GB storage';
        preg_match_all('!\d+!', $str, $digits_arr);
        $digits_assoc = [];
        foreach($digits_arr[0] as $key => $digit) {
            $digits_assoc['digit_' . $key] = $digit;
        }

        #task 4
        $a = [1,2,3,4,5];
        $b = 'Hello world';

        list($a,$b) = [$b,$a];

        return view('task_2', [
            'students_total' => $students_total,
            'athletes' => $athletes,
            'a' => $a,
            'b' => $b,
//            'digits_assoc' => $digits_assoc,
        ]);
    }
}
