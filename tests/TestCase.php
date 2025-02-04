<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations, DatabaseTransactions, WithFaker;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function tearDown(): void
    {
        $this->artisan('migrate:reset');
        parent::tearDown();
    }
}
