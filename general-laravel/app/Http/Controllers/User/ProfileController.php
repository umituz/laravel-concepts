<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class ProfileController
 * @package App\Http\Controllers\User
 */
class ProfileController extends Controller
{
    /**
     * Upload image
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upload()
    {
        if (request()->hasFile('image')) {
            $this->deleteOldImage();
            $fileName = request('image')->getClientOriginalName();
            request('image')->storeAs('images', $fileName, 'public');
            auth()->user()->update([
                'avatar' => $fileName
            ]);
        }
        return back();
    }

    /**
     * Delete old image
     */
    protected function deleteOldImage(): void
    {
        $avatar = auth()->user()->avatar;
        if ($avatar) {
            Storage::delete('public/images/' . $avatar);
        }
    }
}
