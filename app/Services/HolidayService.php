<?php

namespace App\Services;

class HolidayService {

    public $holidays = [];

    public function __construct()
    {
        $this->holidays = [
        [
            'name' => 'Thanksgiving',
            'till' => strtotime('Thursday 4 week November'),
            'from' => strtotime('Thursday 4 week November'),
            'description' => 'Thursday of the 4th week of November'
        ],
        [
            'name' => 'New year',
            'till' => strtotime('1st January'),
            'from' => strtotime('1st January'),
            'description' => '1st of January'
        ],
        [
            'name' => 'Orthodox Christmas',
            'till' => strtotime('7th January'),
            'from' => strtotime('7th January'),
            'description' => '7th of January'
        ],
        [
            'name' => 'May holidays',
            'till' => strtotime('1st May'),
            'from' => strtotime('7th May'),
            'description' => 'From 1st of May till 7th of May'
        ],
        [
            'name' => 'Birthday of Martin Luther King',
            'till' => strtotime('Monday 3 week January'),
            'from' => strtotime('Monday 3 week January'),
            'description' => 'Monday of the 3rd week of January'
        ],
        [
            'name' => 'World Water Day',
            'till' => strtotime('Monday last week March'),
            'from' => strtotime('Monday last week March'),
            'description' => 'Monday of the last week of March'
        ]
    ];
    }

    /**
     * @param $date
     * @return array
     */
    function getHolidays($date): array
    {
        return array_filter($this->holidays, function ($item) use ($date) {
            return $item['from'] >= strtotime($date) && $item['till'] <= strtotime($date);
        });
    }
}
