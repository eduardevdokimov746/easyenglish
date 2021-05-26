<?php

namespace App\Containers\TeacherSection\Material\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class PrepareTextAction extends Action
{
    public function run(Request $request)
    {
        $title = htmlspecialchars_decode($request->get('plain_title'));
        $text = htmlspecialchars_decode($request->get('plain_text'));
        $isAutogenerate = $request->filled('auto-generate');

        $dataTitle = \Apiato::call('TeacherSection\Material@PrepareTextTask', [$title, $isAutogenerate]);
        $dataText = \Apiato::call('TeacherSection\Material@PrepareTextTask', [$text, $isAutogenerate]);

        return [
            'html_title' => $dataTitle['html'],
            'html_title_to_db' => $dataTitle['htmlToDb'],
            'html_text' => $dataText['html'],
            'html_text_to_db' => $dataText['htmlToDb'],
            'newWords' => $dataTitle['newWords']->merge($dataText['newWords'])
        ];
    }
}
