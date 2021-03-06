<?php

namespace App\Containers\Settings\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Settings\Models\Setting;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

/**
 * Class CreateSettingAction
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class CreateSettingAction extends Action
{

    /**
     * @param \App\Ship\Parents\Requests\Request $request
     *
     * @return  \App\Containers\Settings\Models\Setting
     */
    public function run(Request $request) : Setting
    {
        $data = $request->sanitizeInput([
            'key',
            'value'
        ]);

        $setting = Apiato::call('Settings@CreateSettingTask', [$data]);

        return $setting;
    }
}
