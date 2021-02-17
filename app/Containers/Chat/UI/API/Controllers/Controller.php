<?php

namespace App\Containers\Chat\UI\API\Controllers;

use App\Containers\Chat\UI\API\Requests\CreateChatRequest;
use App\Containers\Chat\UI\API\Requests\DeleteChatRequest;
use App\Containers\Chat\UI\API\Requests\GetAllChatsRequest;
use App\Containers\Chat\UI\API\Requests\FindChatByIdRequest;
use App\Containers\Chat\UI\API\Requests\UpdateChatRequest;
use App\Containers\Chat\UI\API\Transformers\ChatTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Chat\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateChatRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createChat(CreateChatRequest $request)
    {
        $chat = Apiato::call('Chat@CreateChatAction', [$request]);

        return $this->created($this->transform($chat, ChatTransformer::class));
    }

    /**
     * @param FindChatByIdRequest $request
     * @return array
     */
    public function findChatById(FindChatByIdRequest $request)
    {
        $chat = Apiato::call('Chat@FindChatByIdAction', [$request]);

        return $this->transform($chat, ChatTransformer::class);
    }

    /**
     * @param GetAllChatsRequest $request
     * @return array
     */
    public function getAllChats(GetAllChatsRequest $request)
    {
        $chats = Apiato::call('Chat@GetAllChatsAction', [$request]);

        return $this->transform($chats, ChatTransformer::class);
    }

    /**
     * @param UpdateChatRequest $request
     * @return array
     */
    public function updateChat(UpdateChatRequest $request)
    {
        $chat = Apiato::call('Chat@UpdateChatAction', [$request]);

        return $this->transform($chat, ChatTransformer::class);
    }

    /**
     * @param DeleteChatRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteChat(DeleteChatRequest $request)
    {
        Apiato::call('Chat@DeleteChatAction', [$request]);

        return $this->noContent();
    }
}
