<?php

require(__DIR__ . '/../app/HeadersHelper.php');

class HeadersHelperTest extends PHPUnit_Framework_TestCase {

    public function testGetHostReturnsCorrectlyWithoutPrecedingWww() {
        // Arrange
        $_SERVER['HTTP_HOST'] = "myHost";
        $headersHelper = new HeadersHelper();

        // Act
        $host = $headersHelper->getHost();

        // Assert
        $this->assertEquals("myHost", $host);
    }

    public function testGetHostReturnsCorrectlyWithPrecedingWww() {
        // Arrange
        $_SERVER['HTTP_HOST'] = "www.myHost";
        $headersHelper = new HeadersHelper();

        // Act
        $host = $headersHelper->getHost();

        // Assert
        $this->assertEquals("myHost", $host);
    }


}
?>
