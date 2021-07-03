<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $data['auth'] = Auth::user();
        return view('admin.layouts.auth.profile')->with($data);
    }

    public function ChangePic(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'profile_pic' => 'required|image|mimes:jpeg',
            ]);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }
            $admin = Admin::find(Auth::user()->id);
            $oldImg = $admin->profile_image_url;
            $image = $request->file('profile_pic');
            $imgName = $admin->id . '_' . date("Ymd_His");
            $ext = strtolower($image->getClientOriginalExtension());
            $fullName = $imgName . '.' . $ext;
            $uploadPath = 'assets/uploads/profile/';
            $image->move($uploadPath, $fullName);
            $image_path = $uploadPath . $oldImg;

            if (File::exists($image_path)) {
                File::delete($image_path);
            }

            DB::beginTransaction();
            $admin->profile_image_url = $fullName;
            $admin->save();
            DB::commit();
            return $this->respondCreated('Success',  $admin);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.profile');
        }
    }
}
