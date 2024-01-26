<?php

namespace AppBundle\Twig\Extension;

use Carbon\Carbon;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Pimcore\Model\DataObject;

class CalendarEventDateExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('ehl_calendar_event_date', [$this, 'getHtml']),
            new TwigFunction('ehl_calendar_event_date_edit', [$this, 'editDate']),
            new TwigFunction('ehl_calendar_event_reg_date', [$this, 'getRegDate']),
            new TwigFunction('ehl_calendar_event_last_reg_date', [$this, 'getLastRegDate']),
        ];
    }

    public function getHtml(string $language, Carbon $startDate, Carbon $endDate, bool $displayEndDate = false): string
    {
        $html = '';
        $startDate_Date = $startDate->toDateTimeString();
        $endDate_Date = $endDate->toDateTimeString();

        // Get start and end day and month
        $startDay = date('j', strtotime($startDate_Date));
        $startMonth = date('n', strtotime($startDate_Date));
        $endDay = date('j', strtotime($endDate_Date));
        $endMonth = date('n', strtotime($endDate_Date));
        $timeLang = ($language == 'sv') ? 'kl.' : 'at';


        if ($displayEndDate == false) { // Only display the start date
            $html .= strftime('%e %B %Y', strtotime($startDate_Date)) . " $timeLang " . date('H:i', strtotime($startDate_Date));
        } else if (date('H:i', strtotime($startDate_Date)) == '00.00') { //don't show time if 00.00
            $html .= strftime('%e %B %Y', strtotime($startDate_Date));
        } else if ($startDay == $endDay && $startMonth == $endMonth) { //same day and month
            $html .= strftime('%e %B %Y', strtotime($startDate_Date)) . " $timeLang " . date('H:i', strtotime($startDate_Date)) . '&ndash;' . date('H:i', strtotime($endDate_Date));
        } else if ($startDay != $endDay && $startMonth == $endMonth) {//different days, but same month
            $html .= strftime('%e', strtotime($startDate_Date)) . '&ndash;' . strftime('%e %B %Y', strtotime($endDate_Date));
        } else if ($startDay != $endDay && $startMonth != $endMonth) {//different days and different months
            $html .= strftime('%e %B', strtotime($startDate_Date)) . '&ndash;' . strftime('%e %B %Y', strtotime($endDate_Date));
        } else { //display the entire start and end date as a catch all
            $html .= strftime('%A %e %B %Y', strtotime($startDate_Date)) . '&ndash;' . strftime('%A %e %B %Y', strtotime($endDate_Date));
        }

        return $html;
    }

    public function editDate(string $date, DataObject\Events $event): string
    {
        $date = str_replace(["kl.", "at"], "<br>", $date);
        $date = ($event->getCancelled() && strpos($date, '<br>'))
            ? substr($date, 0, strpos($date, '<br>'))
            : $date;

        return $date;
    }

    public function getRegDate(Carbon $date): string
    {
        return strftime('%d %B %Y', strtotime($date));
    }

    public function getLastRegDate(Carbon $date): string
    {
        return strtotime($date . " UTC + 1 day");
    }
}
