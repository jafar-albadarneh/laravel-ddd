<?php

namespace Jafar\LaravelDDD\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Jafar\LaravelDDD\Commands\Traits\WithClassGenerator;
use Jafar\LaravelDDD\Commands\Traits\WithDomainOptions;

class GenerateNewServiceCommand extends Command
{
    use WithClassGenerator, WithDomainOptions;

    protected ?string $domainName;

    protected ?string $className;

    protected string $namespacePostfix;

    protected string $stubName;

    protected string $type;

    protected const STUB_NAME = 'domains.service.stub';

    protected const FACADE_STUB_NAME = 'domains.service.facade.stub';

    protected $files;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {--domain=} {--name=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Domain Service Class';

    /**
     * Create a new command instance.
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
        $this->namespacePostfix = 'Services';
        $this->type = 'Service';
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        //Generating ServiceClass
        $this->generateClass(true);
        $this->comment('Service created successfully.');

        return self::SUCCESS;
    }
}
