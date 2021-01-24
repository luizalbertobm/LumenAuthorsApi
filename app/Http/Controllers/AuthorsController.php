<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $authors = Author::all();
        return $this->successResponse($authors);
    }

    public function store(Request $req)
    {
        # code...
    }

    public function show()
    {
        # code...
    }

    public function update(Request $req, $author)
    {
        # code...
    }

    public function destroy($author)
    {
        # code...
    }

    //
}
