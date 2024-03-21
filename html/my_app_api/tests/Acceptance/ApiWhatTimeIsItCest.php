<?php


namespace Tests\Acceptance;

use DateTime;
use Tests\Support\AcceptanceTester;

class ApiWhatTimeIsItCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $utc_location = "London";
        $message = $this->getMessage($utc_location);
        $I->amOnPage('my_app_api/index.php/api/whattimeisit/in/london');
        $I->see($message);

    }

    /**
     * @throws \Exception
     */
    private function getMessage($utc_location){
        list ($hour, $minutes, $meridiem) = $this->calculateTime($utc_location);
        if ($minutes < 10) {
            $message = "It's $minutes past to $hour $meridiem";
        } else {
            $diff = 60 - $minutes;
            $hourp = $hour++;
            if ($hour == 12) {
                $hourp = 1;
            }
            $message = "It's {$diff} to $hourp $meridiem";
        }
        return $message;
    }


    /**
     * @throws \Exception
     */
    private function calculateTime($utc_location): array
    {
        if ($utc_location) {
            $strLocation = 'Europe/' . ucwords($utc_location);
            $given = new DateTime('now', new \DateTimeZone($strLocation));
        } else {
            $given = new DateTime('now', new \DateTimeZone('Europe/Berlin'));
        }

        $hm = $given->format("h:i:A");
        $arr_hm = explode(":", $hm);

        $hour = $arr_hm[0];
        $minutes = $arr_hm[1];
        $meridiem = strtolower($arr_hm[2]);

        return [$hour, $minutes, $meridiem];
    }
}
