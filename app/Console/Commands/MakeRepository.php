<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository in project';

    /**
     * Execute the console command.
     *
     * @return int
     */

    public function handle()
    {
        $name = $this->argument('name');
        $repo = "Repository";
        $model = str_replace($repo, "", $name);
        $repositoryPath = app_path("Repositories/{$name}Repository.php");

        if (File::exists($repositoryPath)) {
            $this->error("Repository already exists!");
            return;
        }

        $repositoryContent = "<?php\n\nnamespace App\Repositories;\n\nuse App\Models\\{$name};\nuse App\Interfaces\ApiCrudInterface;\n\nclass {$model}Repository implements ApiCrudInterface\n{\n    public function all()\n    {\n        return {$model}::all();\n    }\n\n    public function find(\$id)\n    {\n        return {$model}::findOrFail(\$id);\n    }\n\n    public function create(array \$data)\n    {\n        return {$model}::create(\$data);\n    }\n\n    public function update(\$id, array \$data)\n    {\n        \$entity = {$model}::findOrFail(\$id);\n        \$entity->update(\$data);\n        return \$entity;\n    }\n\n    public function delete(\$id)\n    {\n        \$entity = {$model}::findOrFail(\$id);\n        return \$entity->delete();\n    }\n}\n";

        File::put($repositoryPath, $repositoryContent);

        $this->info("Repository created successfully!");
    }
}
