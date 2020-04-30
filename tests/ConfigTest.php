<?php
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{

    public function testCanBeUsedAsString()
    {
        $this->assertEquals(
            'user@example.com',
            'user@example.coms'
        );
    }
}