<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerFyjok8H\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerFyjok8H/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerFyjok8H.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerFyjok8H\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerFyjok8H\App_KernelDevDebugContainer([
    'container.build_hash' => 'Fyjok8H',
    'container.build_id' => 'f3da5d8e',
    'container.build_time' => 1590667145,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerFyjok8H');
