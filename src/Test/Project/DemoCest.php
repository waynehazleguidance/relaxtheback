<?php

declare(strict_types=1);

namespace Guidance\Tests\Project\Test\Project;

class DemoCest extends \Guidance\Tests\Project\Test\BaseAbstract
{
    // ########################################

    protected function processStateAndPreconditions(): void
    {
        /**
         * ========================================
         *               EXAMPLE USE
         * ========================================
         */

        // ========================================Data registry

        $city1 = $this->dataGenerator->getCity();
        $city2 = $this->dataGenerator->getCity();

        $email         = $this->dataGenerator->getEmail();
        $country       = $this->dataGenerator->getCountry();
        $streetAddress = $this->dataGenerator->getStreetAddress();

        // ========================================Data provider

        $testIndividualData = $this->dataSetProviderIndividual->getData('/city_chic/PDP/id/');
        $testIndividualFile = $this->dataSetProviderIndividual->getFile('guid.png');

        $testGeneralData = $this->dataSetProviderGeneral->getData('/browser/chrome/extension/store/');
        $testGeneralFile = $this->dataSetProviderGeneral->getFile('/browser/chrome/extension/watermark.png');
    }

    // ########################################


    public function relaxtheback(\Guidance\Tests\Project\Actor $I)
    {

        $I->amOnUrl('https://relaxtheback.com/');
        $I->maximizeWindow();
        // $I->wait(5);
        $I->waitForText('store', 30); // secs

        // ****************************
        // Sign In
        //  *******************************


        $I->amOnPage('/account/login/');
        $I->waitForText('password', 30); // secs
        $I->see('password');
        $I->fillField(['id' => 'customer_email'], 'wayne.hazle@guidance.com');
        $I->wait(1);
        $I->fillField(['id' => 'customer_password'], '@Jwjw5050');
        $I->wait(1);
        $I->click(['css' => 'input.btn:nth-child(8)']);
        $I->waitForText('LOGOUT', 30); // secs
        $I->see('LOGOUT');


       // $I->waitForText('Maybe', 30); // secs
       // $I->click(['css' => 'body']);

        // *****************************************************************************
        //  GO TO PLP - Editor's Pick & Test Sorting
        // ***********************************************************
        // 2. Go to Simple SHOP ALL PLP page----------------------------------------------------------------------------
        $I->amOnPage('/collections/recliners');
        $I->waitForText('recliners', 30); // secs
        $I->see('recliners');

        // Use Sorter
        $I->click(['css' => 'div.toolbar-menu:nth-child(2) > div:nth-child(2) > select:nth-child(1)']);
        $I->wait(3);
        $I->click(['css' => 'div.toolbar-menu:nth-child(2) > div:nth-child(2) > select:nth-child(1) > option:nth-child(4)']);
        $I->wait(5);

        // Choose Number to show on page Sorter
        $I->click(['css' => 'select.ng-pristine']);
        $I->wait(1);
        $I->click(['css' => 'select.ng-pristine > option:nth-child(1)']);
        $I->wait(3);

        // *****************************************************************************
        //  Go to a PDP and Add to Cart
        // ***********************************************************
        $I->amOnPage('/products/zerog-5-0-massage-chair');
        $I->waitForText('Chair', 30); // secs
        $I->see('Chair');


        // Click Add to Cart
        $I->see('Add to Cart');
        $I->click(['css' => '#mwAddToCart > svg:nth-child(2)']);
       // $I->waitForText('shopping cart', 30); // secs
       // $I->see('shopping cart');


        // *****************************************************************************
        //  Go to Shopping Cart
        // ***********************************************************
       // $I->amOnPage('/checkout/cart/');
        $I->waitForText('Shopping', 30); // secs
        $I->see('Shopping');

    }


    // ########################################
}