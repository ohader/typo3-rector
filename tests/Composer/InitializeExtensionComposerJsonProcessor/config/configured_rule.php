<?php

declare(strict_types=1);

use Ssch\TYPO3Rector\Composer\InitializeExtensionComposerJsonProcessor;
use Ssch\TYPO3Rector\Rector\Composer\ExtensionComposerRector;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(__DIR__ . '/../../../../config/config.php');
    $services = $containerConfigurator->services();

    $services->set(InitializeExtensionComposerJsonProcessor::class);
    $services->set(ExtensionComposerRector::class)
        ->call('configure', [
            [
                ExtensionComposerRector::TYPO3_VERSION_CONSTRAINT => '^9.5',
            ],
        ]);
};