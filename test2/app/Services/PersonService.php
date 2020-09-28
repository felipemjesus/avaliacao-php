<?php

namespace App\Services;

use App\Models\Person;
use Illuminate\Support\Facades\DB;

class PersonService
{
    /**
     * @param array $data
     * @return Person
     * @throws \Exception
     */
    public function create(array $data): Person
    {
        DB::beginTransaction();
        try {
            $person = new Person($data);
            $person->save();

            $person->contacts()->createMany($data['contacts']);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return $person;
    }

    /**
     * @param Person $person
     * @param array $data
     * @return Person
     * @throws \Exception
     */
    public function update(Person $person, array $data): Person
    {
        DB::beginTransaction();
        try {
            $person->update($data);

            foreach ($data['contacts'] as $contact) {
                $person->contacts()->updateOrCreate(
                    ['id' => $contact['id'] ?? null],
                    $contact
                );
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return $person;
    }

    /**
     * @param Person $person
     * @throws \Exception
     */
    public function delete(Person $person): void
    {
        DB::beginTransaction();
        try {
            Contact::destroy($person->contacts());

            $person->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
