<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeInterface extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:interface {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a interface in project';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $repositoryPath = app_path("Interfaces/{$name}Interface.php");

        if (File::exists($repositoryPath)) {
            $this->error("Repository already exists!");
            return;
        }

        $repositoryContent = "<?php\n\nnamespace App\Interfaces; \n interface {$name} { \n\n }";
        File::put($repositoryPath, $repositoryContent);

        $this->info("Repository created successfully! \n Path: $repositoryPath");
    }
}
