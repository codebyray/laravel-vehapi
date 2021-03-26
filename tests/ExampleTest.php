<?php

namespace Codebyray\LaravelVehapi\Tests;

use Codebyray\LaravelVehapi\LaravelVehapiServiceProvider;
use Orchestra\Testbench\TestCase;

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
