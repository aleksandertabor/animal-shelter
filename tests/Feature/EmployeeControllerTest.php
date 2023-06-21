<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Http\Controllers\EmployeeController;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex(): void
    {
        $employeesCount = 5;

        $employees = Employee::factory()->count($employeesCount)->create();

        $this->get(action([EmployeeController::class, 'index']))
            ->assertSuccessful()
            ->assertJsonCount($employeesCount, 'data')
            ->assertJson([
                'data' => EmployeeResource::collection($employees)->jsonSerialize(),
            ]);
    }

    public function testStore(): void
    {
        $employee = Employee::factory()->make();

        $jsonResponse = (new EmployeeResource($employee))->jsonSerialize();
        unset($jsonResponse['id']);

        $this->post(action([EmployeeController::class, 'store']), [
            'shelter_id' => $employee->shelter_id,
            'name' => $employee->name,
            'email' => $employee->email,
        ])
            ->assertSuccessful()
            ->assertJsonFragment($jsonResponse);
    }

    public function testShow(): void
    {
        $employee = Employee::factory()->create();

        $this->get(action([EmployeeController::class, 'show'], $employee))
            ->assertSuccessful()
            ->assertJson([
                'data' => (new EmployeeResource($employee))->jsonSerialize(),
            ]);
    }

    public function testUpdate(): void
    {
        $employee = Employee::factory()->create();
        $employee->name = 'Updated Employee Name';

        $this->patch(action([EmployeeController::class, 'update'], $employee), [
            'name' => $employee->name,
        ])
            ->assertSuccessful()
            ->assertJsonPath('data.name', $employee->name)
            ->assertJson([
                'data' => (new EmployeeResource($employee))->jsonSerialize(),
            ]);
    }

    public function testDestroy(): void
    {
        $employee = Employee::factory()->create();

        $this->delete(action([EmployeeController::class, 'destroy'], $employee))
            ->assertNoContent();
    }
}
