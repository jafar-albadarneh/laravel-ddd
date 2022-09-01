<?php

namespace Jafar\LaravelDDD\Commands\Traits;

trait WithDomainOptions
{
    protected function resolveInput(bool $useDomainNameAsClassName)
    {
        $this->domainName = $this->option('domain');
        if (empty($this->domainName)) {
            $this->domainName = $this->ask('Please enter the name of the Domain?');
        }

        if ($useDomainNameAsClassName) {
            $this->className = $this->option('name') ?? $this->domainName;
        } else {
            $this->className = $this->option('name');
            if (empty($this->className)) {
                $this->className = $this->ask("Please enter the name of the {$this->type}");
            }
        }
        $this->stubName = self::STUB_NAME;
    }
}
