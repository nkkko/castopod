<?php

declare(strict_types=1);

namespace App\View\Components\Forms;

use ViewComponents\Component;

class Label extends Component
{
    /**
     * @var array<string, string>
     */
    protected array $attributes = [
        'for' => '',
        'name' => '',
        'class' => '',
    ];

    protected string $hint = '';

    protected bool $isOptional = false;

    public function setIsOptional(string $value): void
    {
        $this->isOptional = $value === 'true';
    }

    public function render(): string
    {
        $labelClass = $this->attributes['class'];
        unset($this->attributes['class']);

        $attributes = stringify_attributes($this->attributes);
        $optionalText = $this->isOptional ? '<small class="ml-1 lowercase">(' .
        lang('Common.optional') .
        ')</small>' : '';
        $hint = $this->hint !== '' ? hint_tooltip($this->hint, 'ml-1') : '';

        return <<<HTML
            <label class="{$labelClass}" {$attributes}>{$this->slot}{$optionalText}{$hint}</label>
        HTML;
    }
}
