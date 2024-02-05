<?php

namespace Nwidart\Modules\Commands;

class UpdateCommand extends BaseCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'module:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update dependencies for the specified module or for all modules.';

    public function executeAction($name): void
    {
        $module = $this->getModuleModel($name);

        $this->components->task("Updating {$module->getName()} module", function () use ($module) {
            $this->laravel['modules']->update($module);
        });
    }

    function getInfo(): string|null
    {
        return 'Updating Module ...';
    }
}
