<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    private $data = [
        [
            'name' => 'desamirit',
            'username' => 'desamirit',
            'email' => 'desamirit@gmail.com',
            'password' => 'janganlupa',
            'nomor_hp' => '687727757986',
            'role' => 3,
        ],
        [
            'name' => 'desarowo',
            'username' => 'desarowo',
            'email' => 'desarowo@gmail.com',
            'password' => 'janganlupa',
            'nomor_hp' => '085159861101',
            'role' => 3,
        ],
        [
            'name' => 'lpk',
            'username' => 'lpk',
            'email' => 'lpk@gmail.com',
            'password' => 'janganlupa',
            'nomor_hp' => '685159861101',
            'role' => 2,
        ],
        [
            'name' => 'irfan',
            'username' => 'irfan',
            'email' => 'irfan@gmail.com',
            'password' => 'janganlupa',
            'nomor_hp' => '685159861101',
            'role' => 1,
        ],
        [
            'name' => 'agus',
            'username' => 'agus',
            'email' => 'agus@gmail.com',
            'password' => 'janganlupa',
            'nomor_hp' => '685159861101',
            'role' => 1,
        ],
    ];

    public function run()
    {
        collect($this->data)
            ->map(function (array $data) {
                $role = Role::findOrFail($data['role']);

                $user = new User(
                    [
                        'name' => $data['name'],
                        'username' => $data['username'],
                        'email' => $data['email'],
                        'password' => Hash::make($data['password']),
                        'nomor_hp' => $data['nomor_hp']
                    ]
                );
                $user->role()->associate($role);
                $user->save();
            });
    }
}
