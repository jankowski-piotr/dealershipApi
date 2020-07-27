<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create admin user
        $user = [
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@dealership.test',
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
        
        App\User::create($user);
        Artisan::call('passport:client', [
            '--user_id' => $user['id'],
            '--name' => 'app1', 
            '--redirect_uri'=>'https://dealership.test/auth/callback',
            ]);
        factory(App\User::class, 50)->create();
    }
}
