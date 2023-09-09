<?php
namespace App\Domains\WebsiteSetting\Http\Controllers\Backend;
use App\Domains\Setting\Http\Requests\Backend\SettingRequest;
use App\Domains\Setting\Models\Setting;
use App\Domains\Setting\Services\SettingService;
use App\Domains\WebsiteSetting\Http\Requests\Backend\WebsiteSettingRequest;
use App\Domains\WebsiteSetting\Models\WebsiteSetting;
use App\Domains\WebsiteSetting\Services\WebsiteSettingService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteSettingController extends Controller
{
    private WebsiteSettingService $websiteSettingService;

    /**
     * @param WebsiteSettingService $websiteSettingService
     */
    public function __construct(WebsiteSettingService $websiteSettingService)
    {
        $this->websiteSettingService = $websiteSettingService;
    }

    /**
     * @param WebsiteSetting $websiteSetting
     * @return mixed
     */
    public function edit(WebsiteSetting $websiteSetting)
    {
        return view('backend.setting.website-setting')
            ->withWebsiteSetting($websiteSetting);
    }

    /**
     * @param WebsiteSettingRequest $request
     * @param $setting
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(WebsiteSettingRequest $request, $setting)
    {
        $this->websiteSettingService->update($setting, $request->validated());

        return redirect()->back()->withFlashSuccess(__('The Setting was successfully updated'));
    }
}
