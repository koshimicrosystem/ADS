<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'f_name' => 'Rahul',
            'm_name' => 'Deosharan',
            'l_name' => 'Singh',
            'email' => 'rahul.adsps@ads.com',
            'gender' => 'Mail',
            'dob' => Carbon::create(2000, 5, 8),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);
    }
}
