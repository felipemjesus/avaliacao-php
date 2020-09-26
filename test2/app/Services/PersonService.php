<?php

namespace App\Services;

use App\Models\Person;
use Illuminate\Support\Facades\DB;

class PersonService
{
    public function create(array $data)
    {
        DB::beginTransaction();
        try {
            $person = new Person($data);
            $person->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return $person;
    }

    public function update(array $data)
    {
        DB::beginTransaction();
        try {
            $person = new Person($data);
            $person->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return $person;
    }
}
