<?php

namespace App\Containers\Comment\UI\WEB\Controllers;

use App\Containers\Comment\UI\WEB\Requests\CreateCommentRequest;
use App\Containers\Comment\UI\WEB\Requests\DeleteCommentRequest;
use App\Containers\Comment\UI\WEB\Requests\GetAllCommentsRequest;
use App\Containers\Comment\UI\WEB\Requests\FindCommentByIdRequest;
use App\Containers\Comment\UI\WEB\Requests\UpdateCommentRequest;
use App\Containers\Comment\UI\WEB\Requests\StoreCommentRequest;
use App\Containers\Comment\UI\WEB\Requests\EditCommentRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Comment\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllCommentsRequest $request
     */
    public function index(GetAllCommentsRequest $request)
    {
        $comments = Apiato::call('Comment@GetAllCommentsAction', [$request]);

        // ..
    }

    /**
     * Show one entity
     *
     * @param FindCommentByIdRequest $request
     */
    public function show(FindCommentByIdRequest $request)
    {
        $comment = Apiato::call('Comment@FindCommentByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateCommentRequest $request
     */
    public function create(CreateCommentRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreCommentRequest $request
     */
    public function store(StoreCommentRequest $request)
    {
        $comment = Apiato::call('Comment@CreateCommentAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditCommentRequest $request
     */
    public function edit(EditCommentRequest $request)
    {
        $comment = Apiato::call('Comment@GetCommentByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateCommentRequest $request
     */
    public function update(UpdateCommentRequest $request)
    {
        $comment = Apiato::call('Comment@UpdateCommentAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteCommentRequest $request
     */
    public function delete(DeleteCommentRequest $request)
    {
         $result = Apiato::call('Comment@DeleteCommentAction', [$request]);

         // ..
    }
}
