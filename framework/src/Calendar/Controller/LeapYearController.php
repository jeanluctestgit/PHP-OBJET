<?php
// example.com/src/Calendar/Controller/LeapYearController.php
namespace Calendar\Controller;
//require_once __DIR__.'/../Model/LeapYear.php';
use Calendar\Model\LeapYear;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LeapYearController
{
    public function index(Request $request, $year)
    {
        $leapYear = new LeapYear();
        if ($leapYear->isLeapYear($year)) {
            return new Response(require_once __DIR__.'/../Views/Yes.php');
        }

        return new Response(require_once __DIR__.'/../Views/No.php');
    }
}
