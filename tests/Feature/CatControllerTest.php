<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Http\Controllers\CatController;
use App\Http\Resources\CatResource;
use App\Models\Cat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex(): void
    {
        $catsCount = 5;

        $cats = Cat::factory()->count($catsCount)->create();

        $this->get(action([CatController::class, 'index']))
            ->assertSuccessful()
            ->assertJsonCount($catsCount, 'data')
            ->assertJson([
                'data' => CatResource::collection($cats)->jsonSerialize(),
            ]);
    }

    public function testStore(): void
    {
        $cat = Cat::factory()->make();

        $jsonResponse = (new CatResource($cat))->jsonSerialize();
        unset($jsonResponse['id']);

        $this->post(action([CatController::class, 'store']), [
            'shelter_id' => $cat->shelter_id,
            'name' => $cat->name,
        ])
            ->assertSuccessful()
            ->assertJsonFragment($jsonResponse);
    }

    public function testShow(): void
    {
        $cat = Cat::factory()->create();

        $this->get(action([CatController::class, 'show'], $cat))
            ->assertSuccessful()
            ->assertJson([
                'data' => (new CatResource($cat))->jsonSerialize(),
            ]);
    }

    public function testUpdate(): void
    {
        $cat = Cat::factory()->create();
        $cat->name = 'Updated Cat Name';

        $this->patch(action([CatController::class, 'update'], $cat), [
            'name' => $cat->name,
        ])
            ->assertSuccessful()
            ->assertJsonPath('data.name', $cat->name)
            ->assertJson([
                'data' => (new CatResource($cat))->jsonSerialize(),
            ]);
    }

    public function testDestroy(): void
    {
        $cat = Cat::factory()->create();

        $this->delete(action([CatController::class, 'destroy'], $cat))
            ->assertNoContent();
    }
}
