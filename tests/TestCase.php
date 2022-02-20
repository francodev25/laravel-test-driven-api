<?php

namespace Tests;

use App\Models\Task;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    # This always gonna run without exception handling
    # It's recommend to comment or discomment these lines.
    public function setUp() : void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
    }

    public function createTask($args = []){
        return Task::factory()->create($args);
    }
}
