<?php
/**
 * @author    Vencel Katai <vencel.katai@webapix.hu>
 * @copyright WEBAPIX Kft. 2018 All rights reserved.
 * Unauthorized copying of this file, via any medium is strictly prohibited.
 * Proprietary and confidential.
 */

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/**
 * Class AdminPermissionSeeder
 */
class AdminPermissionSeeder extends Seeder
{
    /**
     * @var string
     */
    private $userClass;

    public function __construct()
    {
        $this->userClass = config('auth.providers.users.model');
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = $this->getRole();
        $user = $this->getAdminUser();

        if (! $role->users()->where('model_id', $user->getKey())->exists()) {
            $role->users()->attach($user->getKey());
        }
    }

    private function getAdminUser()
    {
        $user = $this->userClass::whereEmail('support@webapix.hu')->first();

        return $user ?? $this->createAdminUser();
    }

    private function createAdminUser()
    {
        return tap(new $this->userClass, function ($user) {
            $user->name = 'Support';
            $user->email = 'support@webapix.hu';
            //$user->password = Hash::make($password = Str::random(10));

            $user->password = Hash::make('password');
            $password = 'password';

            $this->command->info('Admin user (support@webapix.hu) password: ' . $password);

            $user->save();
        });
    }

    private function getRole(): Role
    {
        return tap(Role::firstOrCreate(['name' => 'admin']), function (Role $role) {
            $permission = Permission::firstOrCreate(['name' => 'accessAdminPanel']);

            if (! $role->hasPermissionTo($permission)) {
                $role->permissions()->attach($permission);
            }
        });
    }
}
