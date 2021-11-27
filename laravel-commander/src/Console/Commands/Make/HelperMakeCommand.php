<?php

namespace Commander\Console\Commands\Make;

use Commander\Enumerations\PackageEnumeration;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Commander\Commander;

/**
 * Class HelperMakeCommand
 * @package Commander\Console\Commands\Make
 */
class HelperMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'commander:make-helper';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new helper';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Helper';

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

        return str_replace('DummyHelper', $this->argument('name'), $stub);
    }

    /**
     *
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return base_path() . '/vendor/umituz/' . PackageEnumeration::PACKAGE_NAME . '/src/Console/Stubs/make-helper.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return Commander::getNamespace($rootNamespace . '\\' . $this->getEnvironmentName(), 'helper');
    }

    /**
     * Return environment location
     *
     * @return string
     */
    private function getEnvironmentName()
    {
        return 'Helpers';
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
