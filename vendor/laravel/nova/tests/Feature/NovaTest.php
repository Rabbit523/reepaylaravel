<?php

namespace Laravel\Nova\Tests\Feature;

use Laravel\Nova\Exceptions\NovaExceptionHandler;
use Laravel\Nova\Nova;
use Laravel\Nova\Tests\IntegrationTest;

class NovaTest extends IntegrationTest
{
    public function test_nova_can_use_a_custom_report_callback()
    {
        $_SERVER['nova.exception.error_handled'] = false;

        $this->assertFalse($_SERVER['nova.exception.error_handled']);

        Nova::report(function ($exception) {
            $_SERVER['nova.exception.error_handled'] = true;
        });

        app(NovaExceptionHandler::class)->report(new \Exception('It did not work'));

        $this->assertTrue($_SERVER['nova.exception.error_handled']);

        unset($_SERVER['nova.exception.error_handled']);
    }
}
