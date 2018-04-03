<?php

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = factory(Student::class)
            ->times(10)
            ->make();

        $user_array = $users->makeVisible(['password', 'remember_token'])->toArray();
        Student::insert($user_array);

        $student = Student::find(1);
        $student->name = 'skyloong';
        $student->number = '1407064241';
        $student->class = '14070642';
        $student->save();
    }
}
