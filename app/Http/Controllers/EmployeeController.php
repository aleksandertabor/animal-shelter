<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\IndexEmployeeRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    public function index(IndexEmployeeRequest $request): AnonymousResourceCollection
    {
        return EmployeeResource::collection(
            Employee::when(
                $request->has('shelter_id'),
                fn (Builder $query) => $query->where('shelter_id', '=', $request->query('shelter_id')),
            )
                ->paginate(20),
        );
    }

    public function store(StoreEmployeeRequest $request): EmployeeResource
    {
        return new EmployeeResource(Employee::create($request->validated()));
    }

    public function show(Employee $employee): EmployeeResource
    {
        return new EmployeeResource($employee);
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee): EmployeeResource
    {
        $employee->update($request->validated());

        return new EmployeeResource($employee);
    }

    public function destroy(Employee $employee): Response
    {
        $employee->delete();

        return response()->noContent();
    }
}
