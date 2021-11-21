<?php

namespace Tests\Feature;

use App\Services\AWSFileStorageService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Tests\CreatesApplication;
use Tests\TestCase;

class AWSFileStorageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_upload()
    {
        $service = $this->app->make(AWSFileStorageService::class);

        if($service instanceof AWSFileStorageService) {
            $service->save(file_get_contents("http://google.co.id"), "test_filename.txt");
            dd($service);
        }

        throw new \Exception("Bye bye");
    }
}
