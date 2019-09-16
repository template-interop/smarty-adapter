<?php

namespace Interop\Tests\Template\Smarty;

use Interop\Template\Smarty\SmartyEngine;
use PHPUnit\Framework\TestCase;
use Smarty;

final class SmartyEngineTest extends TestCase
{
    public function testRender()
    {
        $smarty = new Smarty;
        $smarty->setTemplateDir(__DIR__.'/templates');
        $engine = new SmartyEngine($smarty);
        $html = $engine->render('hello', ['name' => 'John']);

        $this->assertStringEqualsFile(__DIR__ . '/templates/expected.html', $html);
    }
}
