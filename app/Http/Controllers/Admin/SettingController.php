<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        if (!$setting) {
            $setting = Setting::create([]);
        }

        return view('admin.settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();

        $request->validate([
            'site_title' => 'nullable|string|max:255',
            'site_description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpg,jpeg,png,ico,webp|max:1024',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'admin_email' => 'nullable|email|max:255',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
        ]);

        $logoName = $setting->logo;
        $faviconName = $setting->favicon;

        // Handle Logo
        if ($request->hasFile('logo')) {
            if ($setting->logo && file_exists(public_path('uploads/settings/'.$setting->logo))) {
                unlink(public_path('uploads/settings/'.$setting->logo));
            }
            $logo = $request->file('logo');
            $logoName = time() . '_logo.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('uploads/settings'), $logoName);
        }

        // Handle Favicon
        if ($request->hasFile('favicon')) {
            if ($setting->favicon && file_exists(public_path('uploads/settings/'.$setting->favicon))) {
                unlink(public_path('uploads/settings/'.$setting->favicon));
            }
            $favicon = $request->file('favicon');
            $faviconName = time() . '_favicon.' . $favicon->getClientOriginalExtension();
            $favicon->move(public_path('uploads/settings'), $faviconName);
        }

        $setting->update([
            'site_title' => $request->site_title,
            'site_description' => $request->site_description,
            'logo' => $logoName,
            'favicon' => $faviconName,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'admin_email' => $request->admin_email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'youtube' => $request->youtube,
        ]);

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
