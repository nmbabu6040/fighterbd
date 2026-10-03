<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::firstOrCreate([]);
        return view('admin.setting.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $setting = Setting::firstOrCreate([]);

        $validated = $request->validate([
            'title' => 'nullable|string|max:255',

            'header_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:3072',
            'footer_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:3072',
            'favicon' => 'nullable|image|mimes:jpg,jpeg,png,webp,ico|max:1024',

            'address' => 'nullable|string|max:255',
            'phone_1' => 'nullable|string|max:50',
            'phone_2' => 'nullable|string|max:50',

            'email_1' => 'nullable|email|max:255',
            'email_2' => 'nullable|email|max:255',

            'copyright' => 'nullable|string|max:255',

            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'pinterest' => 'nullable|string|max:255',

            'about_subtitle' => 'nullable|string|max:255',
            'about_title' => 'nullable|string|max:255',
            'about_description' => 'nullable|string',
            'about_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'about_button_text' => 'nullable|string|max:255',
            'about_button_link' => 'nullable|string|max:1000',

            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',

            'google_analytics' => 'nullable|string',
            'google_tag_manager' => 'nullable|string',
            'google_map_url' => 'nullable|string|max:1000',
        ]);

        /*
    |--------------------------------------------------------------------------
    | Upload Directory
    |--------------------------------------------------------------------------
    */

        $uploadPath = public_path('uploads/settings');

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        /*
    |--------------------------------------------------------------------------
    | Image Upload
    |--------------------------------------------------------------------------
    */

        $imageFields = [
            'header_logo',
            'footer_logo',
            'favicon',
            'about_image',
        ];

        foreach ($imageFields as $field) {

            if ($request->hasFile($field)) {

                // Delete old image
                if ($setting->$field && file_exists($uploadPath . '/' . $setting->$field)) {
                    unlink($uploadPath . '/' . $setting->$field);
                }

                // Generate unique filename
                $image = $request->file($field);

                $imageName = time() . '_' . $field . '.' . $image->getClientOriginalExtension();

                // Move new image
                $image->move($uploadPath, $imageName);

                // Add filename to validated data
                $validated[$field] = $imageName;
            }
        }

        /*
    |--------------------------------------------------------------------------
    | Update Settings
    |--------------------------------------------------------------------------
    */

        $setting->update($validated);

        return redirect()
            ->route('admin.settings')
            ->with('success', 'Settings updated successfully');
    }
}
