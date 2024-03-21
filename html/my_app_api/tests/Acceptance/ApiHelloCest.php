<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class ApiHelloCest
{
    public function _before(AcceptanceTester $I)
    {

    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('my_app_api/index.php/api/hello');
        $I->see('hello');
    }
}
