<?php

namespace Jafar\LaravelDDD\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Jafar\LaravelDDD\Commands\Traits\WithClassGenerator;
use Jafar\LaravelDDD\Commands\Traits\WithDomainOptions;

class GenerateNewActionCommand extends Command
{
    use WithClassGenerator, WithDomainOptions;

    protected ?string $domainName;

    protected ?string $className;

    protected string $namespacePostfix;

    protected string $stubName;

    protected string $type;

    protected const STUB_NAME = 'domains.action.stub';

    protected $files;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:action {--domain=} {--name=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Domain Action Class';

    /**
     * Create a new command instance.
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
        $this->namespacePostfix = 'Actions';
        $this->type = 'Action';
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->generateClass();
        $this->comment('Action created successfully.');

        return self::SUCCESS;
    }
}
