<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Ümit UZ',
                'email' => 'umituz998@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$3OOqNANDK6E5nZMBtFt/a.iIoo/gzPSOMzE7W8bpXjt2c1DnhnY16',
                'remember_token' => NULL,
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Macy Cole',
                'email' => 'awelch@example.org',
                'email_verified_at' => '2020-04-01 08:40:08',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'kjngzFx533',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Meaghan Kautzer I',
                'email' => 'bogisich.gabe@example.net',
                'email_verified_at' => '2020-04-01 08:40:08',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => '7qnPUoj76j',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Prof. Rick Kassulke',
                'email' => 'jarrell24@example.org',
                'email_verified_at' => '2020-04-01 08:40:08',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'hesuU9oPVa',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Leora Senger MD',
                'email' => 'ned54@example.net',
                'email_verified_at' => '2020-04-01 08:40:08',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'LGbDEntTig',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Jace Pouros',
                'email' => 'tessie.effertz@example.net',
                'email_verified_at' => '2020-04-01 08:40:08',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'A906dyIoMg',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Alberta Boyle II',
                'email' => 'flossie.powlowski@example.com',
                'email_verified_at' => '2020-04-01 08:40:08',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'amuJuZLiYd',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Donavon Upton',
                'email' => 'njaskolski@example.com',
                'email_verified_at' => '2020-04-01 08:40:08',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'Ep1QvKtxqO',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Casandra Ryan',
                'email' => 'kulas.juvenal@example.com',
                'email_verified_at' => '2020-04-01 08:40:08',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'm7iaGbgt4R',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Eileen Kovacek',
                'email' => 'jay.schaefer@example.org',
                'email_verified_at' => '2020-04-01 08:40:08',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => '1yHO9xXx5s',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Juvenal Kub Sr.',
                'email' => 'maureen85@example.net',
                'email_verified_at' => '2020-04-01 08:40:08',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'eKHUXGk6pg',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Dessie Borer',
                'email' => 'wava.altenwerth@example.net',
                'email_verified_at' => '2020-04-01 08:40:08',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'BFPprKe5sz',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Jaden Blick',
                'email' => 'kihn.stone@example.org',
                'email_verified_at' => '2020-04-01 08:40:08',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'uZInHZ8Ygv',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Zackery Bartell',
                'email' => 'jewell.langosh@example.org',
                'email_verified_at' => '2020-04-01 08:40:08',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'SDHmJRS9Jw',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Vivian Prohaska',
                'email' => 'delia.goyette@example.org',
                'email_verified_at' => '2020-04-01 08:40:08',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'GNdyQzMVIh',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Prof. Rogers Ritchie',
                'email' => 'dohara@example.net',
                'email_verified_at' => '2020-04-01 08:40:08',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'JFSYHWN4LS',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
        ));
        
        
    }
}