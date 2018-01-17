<?php

use \PHPUnit\Framework\TestCase;

class SimpleTest extends TestCase 
{
    public function testArrayEmpty()
    {
        $argsettings = [];
        $this->assertEquals(0,count($argsettings));
    }

    public function testArrayNoEmpty()
    {
        $argsettings = [
            "prueba" => "hola",
        ];
        $this->assertEquals(1,count($argsettings));
    }
        
}
?>