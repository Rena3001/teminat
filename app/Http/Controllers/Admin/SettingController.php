<?php

namespace App\Http\Controllers\Admin;

// phpinfo();

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Models\Lang;
use App\Models\Setting;
use App\Services\DataService;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    protected $dataService;

    public function __construct(DataService $dataService)
    {
        $this->dataService = $dataService;
    }
    public function index()
    {
        $langs = Lang::all();
        $settings = Setting::first();

        $settings['home_about_titles'] = $settings->getTranslations('home_about_title');
        $settings['home_about_subtitles'] = $settings->getTranslations('home_about_subtitle');
        $settings['home_about_descs'] = $settings->getTranslations('home_about_desc');
        $settings['footer_titles'] = $settings->getTranslations('footer_title');
        $settings['about_titles'] = $settings->getTranslations('about_title');
        $settings['about_descs'] = $settings->getTranslations('about_desc');
        $settings['contact_titles'] = $settings->getTranslations('contact_title');
        $settings['categories_titles'] = $settings->getTranslations('categories_title');

        return view('admin.settings.index', compact('langs', 'settings'));
    }













    

    public function edit()
    {
        $langs = Lang::all();
        $settings = Setting::first();

        $settings['home_about_titles'] = $settings->getTranslations('home_about_title');
        $settings['home_about_subtitles'] = $settings->getTranslations('home_about_subtitle');
        $settings['home_about_descs'] = $settings->getTranslations('home_about_desc');
        $settings['footer_titles'] = $settings->getTranslations('footer_title');
        $settings['about_titles'] = $settings->getTranslations('about_title');
        $settings['about_descs'] = $settings->getTranslations('about_desc');
        $settings['contact_titles'] = $settings->getTranslations('contact_title');
        $settings['categories_titles'] = $settings->getTranslations('categories_title');

        $settings['images'] = [
            'image_logo_light' => $settings->image_logo_light,
            'image_logo_dark' => $settings->image_logo_dark,
            'about_banner' => $settings->about_banner,
            'contact_image' => $settings->contact_image,
        ];
        return view('admin.settings.edit', compact('langs', 'settings'));
    }


















    public function update(SettingRequest $request)
    {
        $settings = Setting::first();

        $data = $request->only(
            'fb',
            'tw',
            'in',
            'inst',
            'yt',
            'address',
            'phone',
            'fax',
            'email',

            'home_about_title',
            'home_about_subtitle',
            'footer_title',
            'about_title',
            'about_iframe',
            'contact_title',
            'categories_title',
        );

        // Descriptions

        $home_about_desc = $request->get('home_about_desc');

        $this->deleteUnusedImages('uploads/admin/settings', 'home_about_desc', $home_about_desc);

        if (is_array($home_about_desc) && count($home_about_desc) > 0) {

            foreach ($home_about_desc as $lang => $value) {
                if ($value) {
                    $decoded = $this->extractBase64Info($value);
                    if ($decoded) {

                        foreach ($decoded as $match) {
                            $image = base64_decode($match['base64Data']);
                            $imgName = 'home_about_desc_' . $lang . '_' . $this->dataService->getNowDateStr() . '.' . $match['extension'];
                            $imgPath = 'uploads/admin/settings/' . $imgName;
                            Storage::disk('public')->put($imgPath, $image);
                            $imgDbPath = '/storage/' . $imgPath;

                            $home_about_desc[$lang] = str_replace($match['fullMatch'], $imgDbPath, $home_about_desc[$lang]);
                        }
                    }
                }
            }
        }

        $data['home_about_desc'] = $home_about_desc;

        $about_desc = $request->get('about_desc');

        $this->deleteUnusedImages('uploads/admin/settings', 'about_desc', $about_desc);

        if (is_array($about_desc) && count($about_desc) > 0) {

            foreach ($about_desc as $lang => $value) {
                if ($value) {
                    $decoded = $this->extractBase64Info($value);
                    if ($decoded) {

                        foreach ($decoded as $match) {
                            $image = base64_decode($match['base64Data']);
                            $imgName = 'about_desc_' . $lang . '_' . $this->dataService->getNowDateStr() . '.' . $match['extension'];
                            $imgPath = 'uploads/admin/settings/' . $imgName;
                            Storage::disk('public')->put($imgPath, $image);
                            $imgDbPath = '/storage/' . $imgPath;

                            $about_desc[$lang] = str_replace($match['fullMatch'], $imgDbPath, $about_desc[$lang]);
                        }
                    }
                }
            }
        }

        $data['about_desc'] = $about_desc;

        $this->deleteUnusedImages('uploads/admin/settings', 'about_desc', $about_desc);

        // Pictures

        $image_logo_light = $settings->image_logo_light;

        if ($request->file('image_logo_light')) {
            if ($image_logo_light && file_exists(public_path($image_logo_light))) {
                unlink(public_path($image_logo_light));
            }
            $fileExtension = $request->image_logo_light->extension();
            $imgName = 'image_logo_light_' . $this->dataService->getNowDateStr() . '.' . $fileExtension;
            $imgPath = $request->file('image_logo_light')->storeAs('uploads/admin/settings', $imgName, 'public');
            $data['image_logo_light'] = '/storage/' . $imgPath;
        }

        $image_logo_dark = $settings->image_logo_dark;

        if ($request->file('image_logo_dark')) {
            if ($image_logo_dark && file_exists(public_path($image_logo_dark))) {
                unlink(public_path($image_logo_dark));
            }
            $fileExtension = $request->image_logo_dark->extension();
            $imgName = 'image_logo_dark_' . $this->dataService->getNowDateStr() . '.' . $fileExtension;
            $imgPath = $request->file('image_logo_dark')->storeAs('uploads/admin/settings', $imgName, 'public');
            $data['image_logo_dark'] = '/storage/' . $imgPath;
        }

        $about_banner = $settings->about_banner;

        if ($request->file('about_banner')) {
            if ($about_banner && file_exists(public_path($about_banner))) {
                unlink(public_path($about_banner));
            }
            $fileExtension = $request->about_banner->extension();
            $imgName = 'about_banner_' . $this->dataService->getNowDateStr() . '.' . $fileExtension;
            $imgPath = $request->file('about_banner')->storeAs('uploads/admin/settings', $imgName, 'public');
            $data['about_banner'] = '/storage/' . $imgPath;
        }

        $contact_image = $settings->contact_image;

        if ($request->file('contact_image')) {
            if ($contact_image && file_exists(public_path($contact_image))) {
                unlink(public_path($contact_image));
            }
            $fileExtension = $request->contact_image->extension();
            $imgName = 'contact_image_' . $this->dataService->getNowDateStr() . '.' . $fileExtension;
            $imgPath = $request->file('contact_image')->storeAs('uploads/admin/settings', $imgName, 'public');
            $data['contact_image'] = '/storage/' . $imgPath;
        }

        $updated = $settings->update($data);

        if ($updated) {
            return redirect()->route('admin.settings')
                ->with('type', 'success')
                ->with('message', 'Parametrlər uğurla yeniləndi.');
        } else {
            return redirect()->route('admin.settings')
                ->with('type', 'danger')
                ->with('message', 'Parametrlərin yenilənməsi mümkün olmadı.');
        }
    }

    private function extractBase64Info($base64String)
    {
        $extensions = [
            'jpeg' => 'jpg',
            'png' => 'png',
            'gif' => 'gif',
            'bmp' => 'bmp',
            'svg+xml' => 'svg',
        ];

        $pattern = '/(data:image\/(\w+);base64,[^"]+)/';
        preg_match_all($pattern, $base64String, $matches);

        $arr = [];
        if (isset($matches[1]) && isset($matches[2])) {
            foreach ($matches[1] as $index => $fullMatch) {
                $extension = $extensions[$matches[2][$index]] ?? 'jpg';
                $arr[] = [
                    'fullMatch' => $fullMatch,
                    'extension' => $extension,
                    'base64Data' => explode(',', $fullMatch)[1],
                ];
            }
        }
        return $arr;
    }


    private function deleteUnusedImages($directory, $prefix, $descArray)
    {
        $allImages = Storage::disk('public')->files($directory);
        $descImages = $this->extractImageSrc($descArray);

        foreach ($allImages as $image) {
            if (strpos(basename($image), $prefix) === 0 && !in_array('/storage/' . $image, $descImages)) {
                Storage::disk('public')->delete($image);
            }
        }
    }

    private function extractImageSrc($descArray)
    {
        $images = [];
        if (is_array($descArray) && count($descArray) > 0) {
            foreach ($descArray as $lang => $value) {
                preg_match_all('/<img[^>]+src="([^">]+)"/', $value, $matches);
                if (isset($matches[1])) {
                    $images = array_merge($images, $matches[1]);
                }
            }
        }
        return $images;
    }

    // private function deleteExistingImages($directory, $prefix)
    // {
    //     $files = Storage::disk('public')->files($directory);
    //     foreach ($files as $file) {
    //         if (strpos(basename($file), $prefix) === 0) {
    //             Storage::disk('public')->delete($file);
    //         }
    //     }
    // }
}
