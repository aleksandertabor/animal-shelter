<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreShelterRequest;
use App\Http\Requests\UpdateShelterRequest;
use App\Http\Resources\ShelterResource;
use App\Models\Shelter;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ShelterController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ShelterResource::collection(
            Shelter::paginate(20),
        );
    }

    public function store(StoreShelterRequest $request): ShelterResource
    {
        return new ShelterResource(Shelter::create($request->validated()));
    }

    public function show(Shelter $shelter): ShelterResource
    {
        return new ShelterResource($shelter);
    }

    public function update(UpdateShelterRequest $request, Shelter $shelter): ShelterResource
    {
        $shelter->update($request->validated());

        return new ShelterResource($shelter);
    }

    public function destroy(Shelter $shelter): Response
    {
        $shelter->delete();

        return response()->noContent();
    }
}
