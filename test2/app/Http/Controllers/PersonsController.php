<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Models\Person;
use App\Services\PersonService;
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
}
