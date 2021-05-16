<?php

namespace App\Containers\TeacherSection\Material\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class PrepareTextAction extends Action
{
    public function run(Request $request)
    {
        $title = html_entity_decode($request->get('plain_title'));
        $text = html_entity_decode($request->get('plain_text'));
        $isAutogenerate = $request->filled('auto-generate');

        $dataTitle = \Apiato::call('TeacherSection\Material@PrepareTextTask', [$title, $isAutogenerate]);
        $dataText = \Apiato::call('TeacherSection\Material@PrepareTextTask', [$text, $isAutogenerate]);

        return ['html_title' => $dataTitle['html'], 'html_text' => $dataText['html'], 'newWords' => $dataTitle['newWords']->merge($dataText['newWords'])];
    }
}
