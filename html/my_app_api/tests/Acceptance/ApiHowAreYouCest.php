<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class ApiHowAreYouCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('my_app_api/index.php/api/howareyou');
        $I->see('fine');
    }
}
