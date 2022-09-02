<?php

namespace Jafar\LaravelDDD\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Jafar\LaravelDDD\Commands\Traits\WithClassGenerator;
use Jafar\LaravelDDD\Commands\Traits\WithDomainOptions;

class GenerateNewDTOCommand extends Command
{
    use WithClassGenerator, WithDomainOptions;

    protected $domainName;

    protected $className;

    protected string $namespacePostfix;

    protected string $stubName;

    protected string $type;

    protected const STUB_NAME = 'domains.dto.stub';

    protected Filesystem $files;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:dto {--domain=} {--name=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new DTO inside a Domain';

    /**
     * Create a new command instance.
     *
     * @param  Filesystem  $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
        $this->namespacePostfix = 'DTOs';
        $this->type = 'DTO';
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $this->generateClass();
        $this->comment('DTO created successfully.');

        return self::SUCCESS;
    }
}
