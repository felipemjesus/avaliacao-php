<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Models\Person;
use App\Services\PersonService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PersonsController extends Controller
{
    protected $personService;

    public function __construct(PersonService $personService)
    {
        $this->personService = $personService;
    }

    public function index()
    {
        return Person::all();
    }

    public function create(PersonRequest $request)
    {
        return $this->personService->create($request->validated());
    }

    public function update(int $id, PersonRequest $request)
    {
        $person = Person::find($id);

        return $this->personService->update($person, $request->validated());
    }

    public function delete(int $id)
    {
        $person = Person::find($id);

        $this->personService->delete($person);

        return response()->json([], JsonResponse::HTTP_NO_CONTENT);
    }
}
