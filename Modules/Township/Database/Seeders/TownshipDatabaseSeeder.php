<?php

namespace Modules\Township\Database\Seeders;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Domains\Auth\Models\User;

use App\Domains\Auth\Models\Permission;
use App\Domains\Auth\Models\Role;
use Modules\Township\Entities\Township;

class TownshipDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();

        // $this->call("OthersTableSeeder");

        // Grouped permissions
        // Users category
        $lower_module = strtolower('Township');
        $name = 'admin.access.'.$lower_module;

        $users = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => $name,
            'description' => 'All '.$lower_module.' Permissions',
        ]);

        $users->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.'.$lower_module.'.manage',
                'description' => 'manage '.$lower_module,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.'.$lower_module.'.view',
                'description' => 'view '.$lower_module,
                'sort' => 2,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.'.$lower_module.'.create',
                'description' => 'create '.$lower_module,
                'sort' => 3,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.'.$lower_module.'.edit',
                'description' => 'edit '.$lower_module,
                'sort' => 4,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.'.$lower_module.'.delete',
                'description' => 'delete '.$lower_module,
                'sort' => 5,
            ]),
        ]);

        $township = [
            ['id' => '1', 'name' => 'Ahlon', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '2', 'name' => 'Bahan', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '3', 'name' => 'Dagon', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '4', 'name' => 'Hlaing', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '5', 'name' => 'Kamayut', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '6', 'name' => 'Kyauktada', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '7', 'name' => 'Kyimyindaing', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '8', 'name' => 'Lanmadaw', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '9', 'name' => 'Latha', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '10', 'name' => 'Mayangon', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '11', 'name' => 'Pabedan', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '12', 'name' => 'Sanchaung', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '13', 'name' => 'Seikkan', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '14', 'name' => 'Botataung', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '15', 'name' => 'Dagon Seikkan', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '16', 'name' => 'Dawbon', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '17', 'name' => 'Mingala Taungnyunt', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '18', 'name' => 'New Dagon East', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '19', 'name' => 'New Dagon North', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '20', 'name' => 'New Dagon South', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '21', 'name' => 'North Okkalapa', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '22', 'name' => 'Pazundaung', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '23', 'name' => 'South Okkalapa', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '24', 'name' => 'Tamwe', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '25', 'name' => 'Thaketa', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '26', 'name' => 'Thingangyun', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '27', 'name' => 'Yankin', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '28', 'name' => 'Cocokyun', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '29', 'name' => 'Dala', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '30', 'name' => 'Kawhmu', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '31', 'name' => 'Khayan', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '32', 'name' => 'Kungyangon', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '33', 'name' => 'Kyauktan', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '34', 'name' => 'Seikkyi Kanaungto', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '35', 'name' => 'Thanlyin', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '36', 'name' => 'Thongwa', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '37', 'name' => 'Twante', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '38', 'name' => 'Hlaingthaya', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '39', 'name' => 'Hlegu', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '40', 'name' => 'Hmawbi', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '41', 'name' => 'Htantabin', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '42', 'name' => 'Insein', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '43', 'name' => 'Mingaladon', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '44', 'name' => 'Shwepyitha', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '45', 'name' => 'Taikkyi', 'active'=>'1', 'region_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '46', 'name' => 'Aungmyethazan Township', 'active'=>'1', 'region_id' => '2', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '47', 'name' => 'Chanayethazan Township', 'active'=>'1', 'region_id' => '2', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '48', 'name' => 'Chanmyathazi Township', 'active'=>'1', 'region_id' => '2', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '49', 'name' => 'Maha Aungmye Township', 'active'=>'1', 'region_id' => '2', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '50', 'name' => 'Patheingyi Township', 'active'=>'1', 'region_id' => '2', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '51', 'name' => 'Pyigyidagun Township', 'active'=>'1', 'region_id' => '2', 'created_at' => now(), 'updated_at' => now()],


        ];

        Township::insert($township);

    }
}
