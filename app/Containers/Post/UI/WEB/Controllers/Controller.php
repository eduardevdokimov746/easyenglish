<?php

namespace App\Containers\Post\UI\WEB\Controllers;

use App\Containers\Post\UI\WEB\Requests\CreatePostRequest;
use App\Containers\Post\UI\WEB\Requests\DeletePostRequest;
use App\Containers\Post\UI\WEB\Requests\GetAllPostsRequest;
use App\Containers\Post\UI\WEB\Requests\FindPostByIdRequest;
use App\Containers\Post\UI\WEB\Requests\UpdatePostRequest;
use App\Containers\Post\UI\WEB\Requests\StorePostRequest;
use App\Containers\Post\UI\WEB\Requests\EditPostRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Post\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllPostsRequest $request
     */
    public function index(GetAllPostsRequest $request)
    {
        $posts = Apiato::call('Post@GetAllPostsAction', [$request]);

        // ..
    }

    /**
     * Show one entity
     *
     * @param FindPostByIdRequest $request
     */
    public function show(FindPostByIdRequest $request)
    {
        $post = Apiato::call('Post@FindPostByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreatePostRequest $request
     */
    public function create(CreatePostRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StorePostRequest $request
     */
    public function store(StorePostRequest $request)
    {
        $post = Apiato::call('Post@CreatePostAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditPostRequest $request
     */
    public function edit(EditPostRequest $request)
    {
        $post = Apiato::call('Post@GetPostByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdatePostRequest $request
     */
    public function update(UpdatePostRequest $request)
    {
        $post = Apiato::call('Post@UpdatePostAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeletePostRequest $request
     */
    public function delete(DeletePostRequest $request)
    {
         $result = Apiato::call('Post@DeletePostAction', [$request]);

         // ..
    }
}
