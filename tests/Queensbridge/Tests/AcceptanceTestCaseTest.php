<?php

namespace Queensbridge\Tests;

use Queensbridge\AcceptanceTestCase;

class AcceptanceTestCaseTest extends AcceptanceTestCase
{
    public function testVisit()
    {
        $this->enableJavascript();

        $this->visit('http://en.wikipedia.org/wiki/Main_Page');
        $this->assertStatusCodeEquals(200);

        $this->fillIn('search', 'Stockholm');
        $this->clickButton('searchButton');
        $this->assertStatusCodeEquals(200);
        $this->assertPageHasContent('Stockholm');
        $this->assertPageHasSelector('#firstHeading');

        $this->clickLink('Main page');
        $this->assertStatusCodeEquals(200);
    }
}
