<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';
    protected $description = 'Generate a service class';

    public function handle()
    {
        $name = $this->argument('name');
        $path = app_path("Services/{$name}.php");

        if (File::exists($path)) {
            $this->error("Service sudah ada !");
            return;
        }

        $namespace = 'App\Services';
        File::ensureDirectoryExists(app_path('Services'));
        File::put($path, "<?php

namespace {$namespace};

class {$name}
{
    //
}
");

        $this->info("Service {$name} Berhasil membuat service");

        // Daftarkan service di AppServiceProvider
        $this->registerServiceInProvider($name);
    }

    protected function registerServiceInProvider($name)
    {
        $providerPath = app_path('Providers/AppServiceProvider.php');
        $serviceClass = "App\\Services\\{$name}";

        // Cek apakah service sudah terdaftar
        $providerContent = File::get($providerPath);
        if (strpos($providerContent, $serviceClass) !== false) {
            $this->info("Service {$name} sudah terdaftar di AppServiceProvider.");
            return;
        }

        // Tambahkan pendaftaran service
        $registrationCode = "\$this->app->singleton({$serviceClass}::class, function (\$app) {\n    return new {$serviceClass}();\n});\n";
        $providerContent = preg_replace('/(public function register\(\)\s*{)/', "$1\n        {$registrationCode}", $providerContent);

        File::put($providerPath, $providerContent);
        $this->info("Service {$name} berhasil didaftarkan di AppServiceProvider.");
    }
}
