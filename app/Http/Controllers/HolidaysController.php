<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckHolidayDateRequest;
use App\Services\HolidayService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HolidaysController extends Controller
{
    /**
     * @param CheckHolidayDateRequest $request
     * @param HolidayService $holidayService
     * @return Application|Factory|View
     */
    public function checkDate(CheckHolidayDateRequest $request, HolidayService $holidayService)
    {
        return view('response', [ 'response' => $holidayService->getHolidays($request->holiday_date) ]);
    }
}
