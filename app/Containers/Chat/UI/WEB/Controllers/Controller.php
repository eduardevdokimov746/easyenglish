<?php

namespace App\Containers\Chat\UI\WEB\Controllers;

use App\Containers\Chat\UI\WEB\Requests\CreateChatRequest;
use App\Containers\Chat\UI\WEB\Requests\DeleteChatRequest;
use App\Containers\Chat\UI\WEB\Requests\GetAllChatsRequest;
use App\Containers\Chat\UI\WEB\Requests\FindChatByIdRequest;
use App\Containers\Chat\UI\WEB\Requests\UpdateChatRequest;
use App\Containers\Chat\UI\WEB\Requests\StoreChatRequest;
use App\Containers\Chat\UI\WEB\Requests\EditChatRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Chat\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllChatsRequest $request
     */
    public function index(GetAllChatsRequest $request)
    {
        $chats = Apiato::call('Chat@GetAllChatsAction', [$request]);

        // ..
    }

    /**
     * Show one entity
     *
     * @param FindChatByIdRequest $request
     */
    public function show(FindChatByIdRequest $request)
    {
        $chat = Apiato::call('Chat@FindChatByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateChatRequest $request
     */
    public function create(CreateChatRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreChatRequest $request
     */
    public function store(StoreChatRequest $request)
    {
        $chat = Apiato::call('Chat@CreateChatAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditChatRequest $request
     */
    public function edit(EditChatRequest $request)
    {
        $chat = Apiato::call('Chat@GetChatByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateChatRequest $request
     */
    public function update(UpdateChatRequest $request)
    {
        $chat = Apiato::call('Chat@UpdateChatAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteChatRequest $request
     */
    public function delete(DeleteChatRequest $request)
    {
         $result = Apiato::call('Chat@DeleteChatAction', [$request]);

         // ..
    }
}
