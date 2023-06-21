<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Http\Controllers\ShelterController;
use App\Http\Resources\ShelterResource;
use App\Models\Shelter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShelterControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex(): void
    {
        $sheltersCount = 5;

        $shelters = Shelter::factory()->count($sheltersCount)->create();

        $this->get(action([ShelterController::class, 'index']))
            ->assertSuccessful()
            ->assertJsonCount($sheltersCount, 'data')
            ->assertJson([
                'data' => ShelterResource::collection($shelters)->jsonSerialize(),
            ]);
    }

    public function testStore(): void
    {
        $shelter = Shelter::factory()->make([
            'name' => 'Shelter Name',
        ]);

        $jsonResponse = (new ShelterResource($shelter))->jsonSerialize();
        unset($jsonResponse['id']);

        $this->post(action([ShelterController::class, 'store']), [
            'name' => $shelter->name,
        ])
            ->assertSuccessful()
            ->assertJsonFragment($jsonResponse);
    }

    public function testShow(): void
    {
        $shelter = Shelter::factory()->create();

        $this->get(action([ShelterController::class, 'show'], $shelter))
            ->assertSuccessful()
            ->assertJson([
                'data' => (new ShelterResource($shelter))->jsonSerialize(),
            ]);
    }

    public function testUpdate(): void
    {
        $shelter = Shelter::factory()->create();
        $shelter->name = 'Updated Shelter Name';

        $this->patch(action([ShelterController::class, 'update'], $shelter), [
            'name' => $shelter->name,
        ])
            ->assertSuccessful()
            ->assertJsonPath('data.name', $shelter->name)
            ->assertJson([
                'data' => (new ShelterResource($shelter))->jsonSerialize(),
            ]);
    }

    public function testDestroy(): void
    {
        $shelter = Shelter::factory()->create();

        $this->delete(action([ShelterController::class, 'destroy'], $shelter))
            ->assertNoContent();
    }
}
