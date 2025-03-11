<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\View\View;
use Carbon\CarbonInterface;
use Spatie\GoogleCalendar\Event;

class Calendar extends Component
{
    public $currentMonth;
    public $currentYear;
    public $daysInMonth;
    public $firstDayOfMonth;
    public $weeks = [];

    public function mount(): void
    {
        $this->setMonthData(Carbon::now()->year, Carbon::now()->month);
    }

    private function setMonthData($year, $month): void
    {
        $this->currentYear = $year;
        $this->currentMonth = $month;
        $this->daysInMonth = Carbon::createFromDate($year, $month, 1)->daysInMonth;
        $this->firstDayOfMonth = Carbon::createFromDate($year, $month, 1)->dayOfWeek;

        $this->generateCalendar();
    }

    private function generateCalendar(): void
    {
        $this->weeks = [];
        $startOfMonth = Carbon::createFromDate($this->currentYear, $this->currentMonth, 1);
        $endOfMonth = Carbon::createFromDate($this->currentYear, $this->currentMonth, $this->daysInMonth);
        $startDay = $startOfMonth->copy()->startOfWeek(CarbonInterface::MONDAY);
        $endDay = $endOfMonth->copy()->endOfWeek(CarbonInterface::SUNDAY);

        $date = $startDay->copy();

        while ($date->lte($endDay)) {
            $week = [];
            for ($i = 0; $i < 7; $i++) {
                $week[] = [
                    'date' => $date->copy(),
                    'inCurrentMonth' => $date->month == $this->currentMonth,
                    'isToday' => $date->isToday(),
                ];
                $date->addDay();
            }
            $this->weeks[] = $week;
        }
    }

    public function previousMonth(): void
    {
        $date = Carbon::createFromDate($this->currentYear, $this->currentMonth, 1)->subMonth();
        $this->setMonthData($date->year, $date->month);
    }

    public function nextMonth(): void
    {
        $date = Carbon::createFromDate($this->currentYear, $this->currentMonth, 1)->addMonth();
        $this->setMonthData($date->year, $date->month);
    }

    public function render(): View
    {
//        $events = Event::get(now(), now()->addMonths(1));
//        $eventId = Event::get()->first()->id;
//        ray($events);
//        ray($eventId);
        return view('livewire.calendar');
    }
}
