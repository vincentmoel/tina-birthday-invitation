<?php

namespace Database\Seeders;

use App\Models\AdminSetting;
use Illuminate\Database\Seeder;

class AdminSettingSeeder extends Seeder
{
    public function run(): void
    {
        AdminSetting::updateOrCreate(
            ['setting_key' => 'message_template'],
            ['setting_value' => "Hi Friends,\nPlease Open this.. 🫶🏻\n\nI hope you will be there and share happy moments with me..🤗\nSee You Soon and GOD Bless 😇\n\n{url}"]
        );

        AdminSetting::updateOrCreate(
            ['setting_key' => 'default_url'],
            ['setting_value' => 'https://christina-elnathan-gratefulparty.my.id']
        );
    }
}
