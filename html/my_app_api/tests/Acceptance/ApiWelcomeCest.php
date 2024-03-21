<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class ApiWelcomeCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('my_app_api/index.php/api/index');
        $I->see('welcome');
    }
}
