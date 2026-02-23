<?php

namespace Modules\RecycleBin\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Modules\RecycleBin\Repositories\RecycleBinRepository;

class BinCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'bin:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check any module deleted records exist for recycle bin.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(RecycleBinRepository $bin)
    {
        parent::__construct();
        $this->bin = $bin;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $module = $this->argument('module');
        $date   = $this->option('date');
        $this->info($this->bin->binCheckDeleted($module,$date));
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['module', InputArgument::OPTIONAL, 'The name of module will be used.',null],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['date', null, InputOption::VALUE_OPTIONAL, 'The start date of module deleted records scan which scan to today.', null],
        ];
    }
}
