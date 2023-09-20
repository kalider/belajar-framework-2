<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
        $this->table('users')->truncate();
        
        $data = [
            [
                'fullname' => 'Fatah',
                'username' => 'fatah',
                'email' => 'fatah@kawatama.com',
                'password' => '$2y$10$yvW/J3x48QtUxmJqfYT8BOr1qFkX/L3sYL5PHkB.CLUf2xVNREvoe',
                'address' => 'Cihanjuang',
                'dob' => '1996-12-03',
                'status' => '1',
                'created_at' => '2023-09-20 00:00:00',
            ]
        ];

        for ($i=0; $i < 100; $i++) { 
            $data[] = [
                'fullname' => "Fatah{$i}",
                'username' => "fatah{$i}",
                'email' => "fatah{$i}@kawatama.com",
                'password' => '$2y$10$yvW/J3x48QtUxmJqfYT8BOr1qFkX/L3sYL5PHkB.CLUf2xVNREvoe',
                'address' => 'Cihanjuang',
                'dob' => '1996-12-03',
                'status' => '1',
                'created_at' => '2023-09-20 00:00:00',
            ];
        }

        $this->table('users')->insert($data)->saveData();
    }
}
