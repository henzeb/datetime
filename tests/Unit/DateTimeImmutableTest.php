<?php

namespace Henzeb\DateTime\Tests\Unit;


use PHPUnit\Framework\TestCase;
use Henzeb\DateTime\DateTime;
use Henzeb\DateTime\DateTimeImmutable;

class DateTimeImmutableTest extends TestCase
{
    public function testShouldTimeTravelWhenUsingConstructor()
    {
        DateTimeImmutable::setTestNow('2012-01-01 12:00:00.1');
        $actual = new DateTimeImmutable();
        $this->assertEquals(
            '2012-01-01 12:00:00.100000',
            $actual->format(DateTime::DEFAULT)
        );
    }

    public function testShouldTimeTravelUsingDateTime()
    {
        DateTimeImmutable::setTestNow(new \DateTime('2012-01-01 12:00:00.1'));
        $actual = DateTimeImmutable::now();

        $this->assertEquals(
            '2012-01-01 12:00:00.100000',
            $actual->format(DateTime::DEFAULT)
        );
    }

    public function testShouldTimeTravelWhenUsingNow()
    {
        DateTimeImmutable::setTestNow('2012-01-01 12:00:00.1');
        $actual = DateTimeImmutable::now();

        $this->assertEquals(
            '2012-01-01 12:00:00.100000',
            $actual->format(DateTime::DEFAULT)
        );
    }

    public function testShouldTimeTravelWhenUsingNew()
    {
        DateTimeImmutable::setTestNow('2012-01-01 12:00:00.1');
        $actual = DateTimeImmutable::new('2021-01-01 13:14:15.0');

        $this->assertEquals(
            '2012-01-01 12:00:00.100000',
            $actual->format(DateTime::DEFAULT)
        );
    }

    public function testShouldResetTestNow()
    {
        DateTimeImmutable::setTestNow();

        $expected = DateTime::now();

        DateTimeImmutable::setTestNow('2012-01-01 12:00:00.1');
        DateTimeImmutable::setTestNow();
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
