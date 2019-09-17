<?php

use Illuminate\Database\Seeder;
use App\Settings;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = new Settings();
        $setting->name = "Site Title";
        $setting->value = "Body Esteem";
        $setting->save();

        $setting = new Settings();
        $setting->name = "Contact Email";
        $setting->value = "susan@bodyesteem.com";
        $setting->save();
    }
}
