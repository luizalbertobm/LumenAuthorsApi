<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Traits\ApiResponser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        $rules = [
            'name' => 'required|max:50',
            'gender' => 'required|max:50|in:male,female',
            'country' => 'required|max:50'
        ];

        $this->validate($req, $rules);

        $author = Author::create($req->all());
        return $this->successResponse($author, Response::HTTP_CREATED);
    }

    public function show($id)
    {

        $author = Author::findOrFail($id);

        return $this->successResponse($author);
    }

    public function update(Request $req, $id)
    {
        $rules = [
            'name' => 'required|max:50',
            'gender' => 'required|max:50|in:male,female',
            'country' => 'required|max:50'
        ];

        $this->validate($req, $rules);

        $author = Author::findOrFail($id);

        $author->fill($req->all());

        if ($author->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $author->save();
        return $this->successResponse($author, Response::HTTP_CREATED);
    }

    public function destroy($id)
    {
        $author = Author::findOrFail($id);

        $author->delete();
        return $this->successResponse($author);
    }

    //
}
