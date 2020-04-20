<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store()
    {
        $this->withoutExceptionHandling();
        $response = $this->json('POST', 'api/categories', [
            'name' => 'nombre de la categoria',
            'photo' => 'ruta de la foto',
            'subcategory' => 1
        ]);

        $response->assertJsonStructure(['id','name','photo','subcategory','created_at','updated_at'])
        ->assertJson([
            'name' => 'nombre de la categoria',
            'photo' => 'ruta de la foto',
            'subcategory' => 1
            ])
        ->assertStatus(201);

        $this->assertDatabaseHas('categories',[
            'name' => 'nombre de la categoria',
            'photo' => 'ruta de la foto',
            'subcategory' => 1
            ]);
    }
}
