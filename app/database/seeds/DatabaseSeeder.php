<?php

class DatabaseSeeder extends Seeder {

    /**
     * Table names
     * @var array
     */
    protected $tables = [
        'users', 'statuses'
    ];

    /**
     * Seeder Classes
     * @var array
     */
    protected $seeders = [
        'UsersTableSeeder',
        'StatusesTableSeeder'
    ];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
        $this->cleanDatabase();

        foreach($this->seeders as $seeder)
        {
            $this->call($seeder);
        }
	}

    /**
     * Remove all data from table before seeding it
     */
    private function cleanDatabase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        foreach($this->tables as $table)
        {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

}
