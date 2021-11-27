<?php

namespace Commander\Console\Commands\Make;

use Commander\Enumerations\PackageEnumeration;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Commander\Commander;

/**
 * Class ServiceMakeCommand
 * @package Commander\Console\Commands\Make
 */
class ServiceMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'commander:make-service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Service';

    /**
     * Replace the class name for the given stub.
     *
     * @param string $stub
     * @param string $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        if (!$this->argument('name')) {
            throw new InvalidArgumentException("Missing required argument model name");
        }

        $stub = parent::replaceClass($stub, $name);

//        str_replace('DummyModel', $this->option('model'), $stub);

        return str_replace('DummyService', $this->argument('name'), $stub);
    }

    /**
     *
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return base_path() . '/vendor/umituz/' . PackageEnumeration::PACKAGE_NAME . '/src/Console/Stubs/make-service.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return Commander::getNamespace($rootNamespace . '\\' . $this->getEnvironmentName(), 'service');
    }

    /**
     * Return environment location
     *
     * @return string
     */
    private function getEnvironmentName()
    {
        return 'Services';
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the model class.'],
        ];
    }
}
