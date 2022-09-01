<?php

namespace Jafar\LaravelDDD\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Jafar\LaravelDDD\Commands\Traits\WithDomainOptions;
use Jafar\LaravelDDD\Commands\Traits\WithStubs;

class GenerateNewServiceCommand extends Command
{
    use WithStubs, WithDomainOptions;

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
    protected $signature = 'service:create {--domain=} {--name=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Domain Service Class';

    /**
     * Filesystem instance
     *
     * @var Filesystem
     */

    /**
     * Create a new command instance.
     *
     * @param  Filesystem  $files
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
     *
     * @return void
     */
    public function handle(): void
    {
        //Generating ServiceClass
        $this->generateClass(true);
    }
}
