<?php
namespace Blog\Seeders;
use Illuminate\Database\Seeder;
use Blog\Term;

class TermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\Blog\Term::class, 10)->create();
    }
}
