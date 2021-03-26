<?php

namespace Codebyray\LaravelVehapi\Tests;

use Orchestra\Testbench\TestCase;
use Codebyray\LaravelVehapi\LaravelVehapiServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app): array
    {
        return [LaravelVehapiServiceProvider::class];
    }

    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
