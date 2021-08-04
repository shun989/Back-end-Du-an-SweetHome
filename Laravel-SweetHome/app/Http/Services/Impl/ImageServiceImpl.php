<?php

namespace App\Http\Services\Impl;

use App\Http\Repositories\ImageRepository;
use App\Http\Services\ImageService;

class ImageServiceImpl implements ImageService
{
    protected $imageRepository;

    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    public function getAll()
    {
        $images = $this->imageRepository->getAll();

        return $images;
    }

    public function findById($id)
    {

        $image = $this->imageRepository->findById($id);

        $statusCode = 200;
        if (!$image)
            $statusCode = 404;

        $data = [
            'statusCode' => $statusCode,
            'images' => $image
        ];

        return $data;

    }

    public function create($request)
    {
        $image = $this->imageRepository->create($request);

        $statusCode = 201;
        if (!$image)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'images' => $image
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldImage = $this->imageRepository->findById($id);

        if (!$oldImage) {
            $newImage = null;
            $statusCode = 404;
        } else {
            $newImage = $this->imageRepository->update($request, $oldImage);
            $statusCode = 200;
        }

        $data = [
            'statusCode' => $statusCode,
            'images' => $newImage
        ];
        return $data;
    }

    public function destroy($id)
    {
        $image = $this->imageRepository->findById($id);

        $statusCode = 404;
        $message = "Image not found";
        if ($image) {
            $this->imageRepository->destroy($image);
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
