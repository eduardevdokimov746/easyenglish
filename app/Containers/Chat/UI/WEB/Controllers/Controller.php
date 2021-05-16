<?php

namespace App\Containers\Chat\UI\WEB\Controllers;

use App\Containers\Chat\Jobs\SendMessageJob;
use App\Containers\Chat\UI\WEB\Requests\CreateChatRequest;
use App\Containers\Chat\UI\WEB\Requests\DeleteChatRequest;
use App\Containers\Chat\UI\WEB\Requests\GetAllChatsRequest;
use App\Containers\Chat\UI\WEB\Requests\FindChatByIdRequest;
use App\Containers\Chat\UI\WEB\Requests\UpdateChatRequest;
use App\Containers\Chat\UI\WEB\Requests\StoreChatRequest;
use App\Containers\Chat\UI\WEB\Requests\EditChatRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

class Controller extends WebController
{
    public function index()
    {
        try {
            $chats = \Apiato::call('Chat@GetAllChatsAction');

            return json_encode($chats);
        } catch (\Exception) {
            return abort(500);
        }
    }

    public function showDialog()
    {
        $chatHash = request()->get('hash');

        $dialog = \Chat::setHash($chatHash)->getDialog();

        \Apiato::call('Chat@CheckedMessagesAction', [$chatHash]);

        $response['dialog'] = $dialog;
        $response['dataBoxes'] = \Chat::setHash($chatHash)->createDataBoxes($dialog['msgs']);

        return json_encode($response);
    }

    public function findUsers()
    {
        $query = request()->get('query');

        $users = \Apiato::call('Chat@FindUsersFromQueryAction', [$query]);

        return json_encode($users);
    }

    public function selectFindUser()
    {
        $user_id = request()->get('user_id');

        $chat = \Apiato::call('Chat@FindChatWithUserFromUserIdAction', [$user_id]);


        if (is_null($chat)) {
            $hash = \Apiato::call('Chat@CreateDialogAction', [$user_id]);
            //return json_encode(['type' => 'old', \Chat::setHash($chat['hash'])->getDialog()]);
        } else {
            $hash = $chat['hash'];
        }

        $dialog = \Chat::setHash($hash)->getDialog();
        $response['dialog'] = $dialog;
        $response['dataBoxes'] = \Chat::setHash($hash)->createDataBoxes($dialog['msgs']);
        $response['hash'] = $hash;

        return json_encode($response);
    }

    public function sendMessage()
    {
        $topic = request()->get('topic');
        $hash = request()->get('hash');
//        var_dump($hash);
//        die;
        $message = request()->get('message');

        \Apiato::call('Chat@CheckedMessagesAction', [$hash]);
        $message = \Apiato::call('Chat@WriteMessageAction', [$hash, $message]);

        dispatch(new SendMessageJob($topic, $hash, $message))->onQueue('chat');

        return json_encode($message);
    }

    public function checkedMessages()
    {
        $hash = request()->get('hash');

        \Apiato::call('Chat@CheckedMessagesAction', [$hash]);
    }
}
