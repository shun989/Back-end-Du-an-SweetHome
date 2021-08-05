<?php

namespace App\Http\Services\Impl;



use App\Http\Repositories\AvatarRepository;
use App\Http\Services\AvatarService;

class AvatarServiceImpl implements AvatarService
{
    protected $avatarRepository;

    public function __construct(AvatarRepository $avatarRepository)
    {
        $this->avatarRepository = $avatarRepository;
    }

    public function getAll()
    {
        $avatars = $this->avatarRepository->getAll();

        return $avatars;
    }

    public function findById($id)
    {

        $avatar = $this->avatarRepository->findById($id);

        $statusCode = 200;
        if (!$avatar)
            $statusCode = 404;

        $data = [
            'statusCode' => $statusCode,
            'avatars' => $avatar
        ];

        return $data;

    }

    public function create($request)
    {
        $avatar = $this->avatarRepository->create($request);

        $statusCode = 201;
        if (!$avatar)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'avatars' => $avatar
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldAvatar = $this->avatarRepository->findById($id);

        if (!$oldAvatar) {
            $newAvatar = null;
            $statusCode = 404;
        } else {
            $newAvatar = $this->avatarRepository->update($request, $oldAvatar);
            $statusCode = 200;
        }

        $data = [
            'statusCode' => $statusCode,
            'avatars' => $newAvatar
        ];
        return $data;
    }

    public function destroy($id)
    {
        $avatar = $this->avatarRepository->findById($id);

        $statusCode = 404;
        $message = "Image not found";
        if ($avatar) {
            $this->avatarRepository->destroy($avatar);
            $statusCode = 200;
            $message = "Delete success!";
        }

        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }
}
