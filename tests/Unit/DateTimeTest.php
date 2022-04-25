<?php

namespace Henzeb\DateTime\Tests\Unit;


use PHPUnit\Framework\TestCase;
use Henzeb\DateTime\DateTime;

class DateTimeTest extends TestCase
{
    public function testShouldTimeTravelWhenUsingConstructor()
    {
        DateTime::setTestNow('2012-01-01 12:00:00.1');
        $actual = new DateTime();
        $this->assertEquals(
            '2012-01-01 12:00:00.100000',
            $actual->format(DateTime::DEFAULT)
        );
    }

    public function testShouldTimeTravelUsingDateTime()
    {
        DateTime::setTestNow(new \DateTime('2012-01-01 12:00:00.1'));
        $actual = DateTime::now();

        $this->assertEquals(
            '2012-01-01 12:00:00.100000',
            $actual->format(DateTime::DEFAULT)
        );
    }

    public function testShouldTimeTravelWhenUsingNow()
    {
        DateTime::setTestNow('2012-01-01 12:00:00.1');
        $actual = DateTime::now();

        $this->assertEquals(
            '2012-01-01 12:00:00.100000',
            $actual->format(DateTime::DEFAULT)
        );
    }

    public function testShouldTimeTravelWhenUsingNew()
    {
        DateTime::setTestNow('2012-01-01 12:00:00.1');
        $actual = DateTime::new('2021-01-01 13:14:15.0');

        $this->assertEquals(
            '2012-01-01 12:00:00.100000',
            $actual->format(DateTime::DEFAULT)
        );
    }

    public function testShouldResetTestNow()
    {
        DateTime::setTestNow();

        $expected = DateTime::now();

        DateTime::setTestNow('2012-01-01 12:00:00.1');
        DateTime::setTestNow();
        $actual = DateTime::now();

        $this->assertNotEquals(
            '2012-01-01 12:00:00.100000',
            $actual->format(DateTime::DEFAULT)
        );

        $this->assertEquals(
            $expected->format('Y-m-d H:i'),
            $actual->format('Y-m-d H:i'),
        );
    }
}
