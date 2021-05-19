<?php

declare(strict_types=1);

namespace Yiisoft\View\Tests\TestSupport;

use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Yiisoft\Files\FileHelper;
use Yiisoft\Test\Support\EventDispatcher\SimpleEventDispatcher;
use Yiisoft\View\View;
use Yiisoft\View\WebView;

use function dirname;

final class TestHelper
{
    public static function touch(string $path): void
    {
        FileHelper::ensureDirectory(dirname($path));
        touch($path);
    }

    public static function createView(
        ?EventDispatcherInterface $eventDispatcher = null,
        ?LoggerInterface $logger = null
    ): View {
        return new View(
            dirname(__DIR__) . '/public/view',
            $eventDispatcher ?? new SimpleEventDispatcher(),
            $logger ?? new NullLogger(),
        );
    }

    public static function createWebView(
        ?EventDispatcherInterface $eventDispatcher = null,
        ?LoggerInterface $logger = null
    ): WebView {
        return new WebView(
            dirname(__DIR__) . '/public/view',
            $eventDispatcher ?? new SimpleEventDispatcher(),
            $logger ?? new NullLogger(),
        );
    }
}
