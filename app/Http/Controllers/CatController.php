<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\IndexCatRequest;
use App\Http\Requests\StoreCatRequest;
use App\Http\Requests\UpdateCatRequest;
use App\Http\Resources\CatResource;
use App\Models\Cat;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CatController extends Controller
{
    public function index(IndexCatRequest $request): AnonymousResourceCollection
    {
        return CatResource::collection(
            Cat::when(
                $request->has('shelter_id'),
                fn (Builder $query) => $query->where('shelter_id', '=', $request->query('shelter_id')),
            )
                ->paginate(20),
        );
    }

    public function store(StoreCatRequest $request): CatResource
    {
        return new CatResource(Cat::create($request->validated()));
    }

    public function show(Cat $cat): CatResource
    {
        return new CatResource($cat);
    }

    public function update(UpdateCatRequest $request, Cat $cat): CatResource
    {
        $cat->update($request->validated());

        return new CatResource($cat);
    }

    public function destroy(Cat $cat): Response
    {
        $cat->delete();

        return response()->noContent();
    }
}
