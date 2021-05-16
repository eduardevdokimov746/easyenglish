<?php

namespace App\Ship\Services;

use App\Containers\User\Models\User;
use Illuminate\Http\UploadedFile;

class Photo
{
    protected $publicPathProfile = 'storage/users/profile_avatars/';
    protected $storagePathProfile = 'users/profile_avatars/';
    protected $storagePathChat = 'users/chat_avatars/';
    protected $storagePathPreview = 'users/tmp_avatars/';

    public function getProfileAvatar(User $user)
    {
        return asset($this->publicPathProfile . $user->avatar);
    }

    public function addProfileAvatar($name, $data): void
    {
        $imagePath = $this->storagePathProfile . $name;
        \Storage::put($imagePath, $data);
    }

    public function addChatAvatar($name, $data): void
    {
        $imagePath = $this->storagePathChat . $name;
        \Storage::put($imagePath, $data);
    }

    public function hasProfileAvatar($name): bool
    {
        $photos = collect(\Storage::files($this->storagePathProfile));

        $issetPhoto = $photos->map(function ($item) {
            return basename($item);
        })->filter(function ($item) {
            return $item != 'no_image_user.png';
        })->search($name);

        return $issetPhoto === false ? false : true;
    }

    public function deleteProfileAvatar($name): void
    {
        if ($this->hasProfileAvatar($name)) {
            \Storage::delete($this->storagePathProfile . $name);
        }
    }

    public function updateProfileAvatar($name, $data)
    {
        if ($this->hasProfileAvatar($name)) {
            $this->deleteProfileAvatar($name);
            $this->addProfileAvatar($name, $data);
        }
    }

    public function updateProfileAvatarFromRequest($name, UploadedFile $file)
    {
        if ($this->hasProfileAvatar($name)) {
            $this->deleteProfileAvatar($name);
        }

        $name = md5($file->getSize()) . '.' . $file->extension();
        $file->storeAs($this->storagePathProfile, $name);

        return $name;
    }

    public function setDefaultAvatar($name)
    {
        if ($this->hasProfileAvatar($name)) {
            $this->deleteProfileAvatar($name);
        }
    }

    public function getProfileAvatarForImage($fileName)
    {
        return asset($this->publicPathProfile . $fileName);
    }
}
