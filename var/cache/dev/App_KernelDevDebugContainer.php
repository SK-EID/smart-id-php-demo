<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerAYe1gNu\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerAYe1gNu/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerAYe1gNu.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerAYe1gNu\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerAYe1gNu\App_KernelDevDebugContainer([
    'container.build_hash' => 'AYe1gNu',
    'container.build_id' => '9bbf8e24',
    'container.build_time' => 1598438153,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerAYe1gNu');
