<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Rules\PetStatus;
use App\Pet;
use App\Category;
use App\Tag;

class PetController extends Controller
{
    use Helpers;

    public function store(Request $request)
    {
        \Log::debug(print_r($request->all(),true));

        try {
            $request->validate([
                'name' => 'required',
                'photoUrls' => 'required|array',
                'status' => [new PetStatus],
                'category.name' => 'required',
                'tags' => 'array',
                'tags.*.name' => 'required'
            ]);

        } catch (\Exception $e) {
            return $this->response->error('Invalid input', 405);
        }

        if ($request->input('category.name', false)) {
            $category = Category::updateOrCreate(
                ['id' => $request->input('category.id', 0)],
                ['name' => $request->input('category.name')]
            );

            $categoryId = $category->id;
        } else {
            $categoryId = null;
        }

        $pet = Pet::updateOrCreate(
            ['id' => $request->input('id', 0)],
            ['name' => $request->input('name'),
             'category_id' => $categoryId,
             'photo_urls' => json_encode($request->input('photoUrls')),
             'status' => $request->input('status'),
            ]
        );

        if ($request->input('tags', false)) {
            $tagsIdArray = [];
            foreach($request->input('tags') as $tag) {
                $id = array_key_exists('id', $tag) ? $tag['id'] : 0;

                $tag = Tag::updateOrCreate(
                    ['id' => $id],
                    ['name' => $tag['name']]
                );

                array_push($tagsIdArray, $tag->id);
            }

            $pet->tags()->sync($tagsIdArray);
        }

        $pet->load('category', 'tags');
        return $pet;
    }

    public function get($id)
    {
        if (!is_numeric($id)) {
            return $this->response->error('Invalid ID supplied', 400);
        }

        try {
            $pet = Pet::findOrFail($id);
        } catch (\Exception $e) {
            return $this->response->errorNotFound();
        }

        $pet->load('category', 'tags');
        return $pet;
    }

    public function delete($id)
    {
        if (!is_numeric($id)) {
            return $this->response->error('Invalid ID supplied', 400);
        }

        try {
            $pet = Pet::findOrFail($id);
        } catch (\Exception $e) {
            return $this->response->errorNotFound();
        }

        $pet->delete();

        return $this->response->array(['message' => 'Pet deleted', 'status_code' => '200']);
    }
}
