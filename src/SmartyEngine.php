<?php

namespace Interop\Template\Smarty;

use Interop\Template\Exception\TemplateExceptionInterface;
use Interop\Template\TemplateEngineInterface;
use Smarty;
use Exception, RuntimeException;

final class SmartyEngine implements TemplateEngineInterface
{
    /** @var Smarty */
    private $smarty;

    /** @var string */
    private $suffix;

    public function __construct(Smarty $smarty, string $suffix = '.tpl')
    {
        $this->smarty = $smarty;
        $this->suffix = $suffix;
    }

    /**
     * @param string $templateName
     * @param array $parameters
     * @return string
     * @throws TemplateExceptionInterface
     */
    public function render(string $templateName, array $parameters = []): string
    {
        try {
             $this->smarty->assign($parameters);
             return $this->smarty->fetch($templateName.$this->suffix);
        } catch (Exception $e) {
            // Cast exception to template-interop one
            throw new class($e->getMessage(), $e->getCode(), $e) extends RuntimeException implements TemplateExceptionInterface {};
        }
    }
}
