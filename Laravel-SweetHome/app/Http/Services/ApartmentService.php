<?php

namespace App\Http\Services;


interface ApartmentService
{
    public function getAll();
    public function findById($id);
    public function create($request);
    public function update($request, $id);
    public function destroy($id);
<<<<<<< HEAD
=======

>>>>>>> b33cddfc89923c718417d0913086fd44117a1a6a
}
