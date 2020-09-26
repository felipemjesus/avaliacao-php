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

    public function update(Person $person, array $data)
    {
        DB::beginTransaction();
        try {
            $person->update($data);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return $person;
    }

    public function delete(Person $person)
    {
        DB::beginTransaction();
        try {
            $person->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
