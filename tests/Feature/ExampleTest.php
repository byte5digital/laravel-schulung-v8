<?php

namespace Tests\Feature;


use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Illuminate\Testing\Fluent\AssertableJson;
use Mockery;
use Tests\TestCase;
use Weegy\Todos\App\Models\Todo;

class ExampleTest extends TestCase
{

    private function createGuzzleMock($status, $header, $body)
    {
        $guzzleMock = Mockery::mock(Client::class);
        $guzzleMock
            ->shouldReceive('get')
            ->andReturn(new Response($status, $header, $body));

        return $guzzleMock;
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {

        // Lokale Endpunkte testen
        $localResponse = $this->get('/api/test');
        $localResponse->assertJsonStructure(['data' => [[]]]);

        // Remote Endpunkte testen
        $response = Http::get('https://the-one-api.dev/v2/book');
        $result = $response->body();
        self::assertJson($result);
        $jsonResponseAsArray = json_decode($result, true);
        self::assertArrayHasKey('docs', $jsonResponseAsArray);
        self::assertEquals(200, $response->status());

//        $response->assertJson(fn (AssertableJson $json) =>
//            $json->first(fn ($json) =>
//            $json->has(1))
//        );

    }

    public function test_db()
    {
        $response = $this->get('/api/testdb');
        $response->assertStatus(400);

        $hasObjectInDatabase = Todo::first(['title'=>'DBTransaction_1']);

        self::assertEquals(true, $hasObjectInDatabase instanceof Todo);
    }
}
