<?php

namespace Commander\Console\Commands\Make;

use Commander\Enumerations\PackageEnumeration;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Commander\Commander;

/**
 * Class ComposerMakeCommand
 * @package Commander\Console\Commands\Make
 */
class ComposerMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'commander:make-composer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new composer';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Composer';

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

        return str_replace('DummyComposer', $this->argument('name'), $stub);
    }

    /**
     *
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return base_path() . '/vendor/umituz/' . PackageEnumeration::PACKAGE_NAME . '/src/Console/Stubs/make-composer.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return Commander::getNamespace($rootNamespace . '\\' . $this->getEnvironmentName(), 'composer');
    }

    /**
     * Return environment location
     *
     * @return string
     */
    private function getEnvironmentName()
    {
        return 'Http\Views';
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
