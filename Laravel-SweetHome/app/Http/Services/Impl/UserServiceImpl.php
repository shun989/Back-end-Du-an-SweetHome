<?php


namespace App\Http\Services\Impl;


use App\Http\Repositories\UserRepository;
use App\Http\Services\UserService;

class UserServiceImpl implements UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll()
    {
        return $this->userRepository->getAll();
    }

    public function findById($id)
    {
        $user = $this->userRepository->findById($id);

        $statusCode = 200;
        if (!$user) {
            $statusCode = 404;
        }

        $data = [
            'statusCode' => $statusCode,
            'users' => $user
        ];
        return $data;
    }

    public function update($request, $id)
    {
        $oldUser = $this->userRepository->findById($id);

        if (!$oldUser) {
            $newUser = null;
            $statusCode = 404;
        } else {
            $newUser = $this->userRepository->update($request, $oldUser);
            $statusCode = 200;
        }

        $data = [
            'statusCode' => $statusCode,
            'users' => $newUser
        ];
        return $data;
    }

    public function create($request)
    {
        $user = $this->userRepository->create($request);

        $statusCode = 201;
        if (!$user) {
            $statusCode = 500;
        }

        $data = [
            'statusCode' => $statusCode,
            'users' => $user
        ];
        return $data;
    }
}
