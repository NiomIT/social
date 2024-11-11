<?php

namespace App\Http\Controllers\Backend;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    /** General Setting **/
    public function generalSetting()
    {
       return view('backend.setting.general_setting');
    }

    public function generalSettingUpdate(Request $request)
    {
    //    dd($request->all());

        Setting::updateOrCreate(
            ['name' => 'site_title'],
            ['value' => $request->site_title],
        );
        Setting::updateOrCreate(
            ['name' => 'site_address'],
            ['value' => $request->site_address],
        );
        Setting::updateOrCreate(
            ['name' => 'site_phone_number'],
            ['value' => $request->site_phone_number],
        );

        Setting::updateOrCreate(
            ['name' => 'site_facebook_link'],
            ['value' => $request->site_facebook_link],
        );
        Setting::updateOrCreate(
            ['name' => 'site_twitter_link'],
            ['value' => $request->site_twitter_link],
        );
        Setting::updateOrCreate(
            ['name' => 'site_google_link'],
            ['value' => $request->site_google_link],
        );
        Setting::updateOrCreate(
            ['name' => 'site_rss_link'],
            ['value' => $request->site_rss_link],
        );
        Setting::updateOrCreate(
            ['name' => 'site_vimeo_link'],
            ['value' => $request->site_vimeo_link],
        );
        Setting::updateOrCreate(
            ['name' => 'site_linkedin_link'],
            ['value' => $request->site_linkedin_link],
        );
        Setting::updateOrCreate(
            ['name' => 'site_youtube_link'],
            ['value' => $request->site_youtube_link],
        );
        Setting::updateOrCreate(
            ['name' => 'copy_right'],
            ['value' => $request->copy_right],
        );
        Setting::updateOrCreate(
            ['name' => 'site_email'],
            ['value' => $request->site_email],
        );
        Setting::updateOrCreate(
            ['name' => 'site_bio'],
            ['value' => $request->site_bio],
        );

        //Setting logo_image Update
        if ($request->hasFile('logo_image')) {
            $logo = $request->file('logo_image');
            $logo_save = time() . $logo->getClientOriginalName();
            $logo->move('upload/setting/logo/', $logo_save);
            $save_url_logo = 'upload/setting/logo/' . $logo_save;

            if (setting('logo_image') != null) {
                $setting = Setting::where('name', 'logo_image')->first();
                try {
                    if (file_exists($setting->value)) {
                        unlink($setting->value);
                    }
                } catch (Exception $e) {}
            }
            Setting::updateOrCreate(
                ['name' => 'logo_image'],
                ['value' => $save_url_logo],
            );
        }

        //Setting favicon_icon Update
        if ($request->hasFile('favicon_icon')) {
            $logo = $request->file('favicon_icon');
            $logo_save = time() . $logo->getClientOriginalName();
            $logo->move('upload/setting/favicon/', $logo_save);
            $save_url_favicon = 'upload/setting/favicon/' . $logo_save;

            if (setting('favicon_icon') != null) {
                $setting = Setting::where('name', 'favicon_icon')->first();
                try {
                    if (file_exists($setting->value)) {
                        unlink($setting->value);
                    }
                } catch (Exception $e) {}
            }
            Setting::updateOrCreate(
                ['name' => 'favicon_icon'],
                ['value' => $save_url_favicon],
            );
        }

        Session::flash('Setting Update');
        return redirect()->back();
    }



}
