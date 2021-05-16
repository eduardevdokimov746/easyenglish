<?php

namespace App\Containers\Chat\Actions;

use App\Containers\Chat\Jobs\SendCheckedMessagesJob;
use App\Ship\Parents\Actions\Action;

class CheckedMessagesAction extends Action
{
    public function run($chatHash)
    {
        \Chat::setHash($chatHash)->checkedMessages();
        $topic = \Chat::setHash($chatHash)->getTopic($chatHash);

        dispatch(new SendCheckedMessagesJob($topic, $chatHash))->onQueue('chat');
    }
}
