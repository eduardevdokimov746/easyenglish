<?php

namespace App\Containers\TeacherSection\Material\Tasks;

use App\Ship\Parents\Tasks\Task;
use App\Containers\Dictionary\Models\EngWord;
use App\Ship\Services\ImageApiService;
use App\Ship\Services\SoundApiService;
use App\Ship\Services\TranslateApiService;

class PrepareTextTask extends Task
{
    public function run($text, $isAutogenerate)
    {
        $words = $this->splitWords($text);
        $data = $this->findAndCreateNewWords($words, $isAutogenerate);

        $wordsModel = $data['allWords'];
        $newWords = $data['newWords'];

        $textHtml = collect(\Str::of(str_replace("\r\n", ' <br> ', $text))->split('#\s#'))->map(function ($word) use ($wordsModel) {
            if ($word == '<br>') {
                return '<br>';
            }

            $index = $wordsModel->search(function ($item) use ($word) {
                return \Str::lower(trim(trim($word), '.,-_+|/\\*()[]^$#&@{}"\'<>=?!')) == $item->word;
            });

            if ($index !== false) {
                $prepareWord = $wordsModel->get($index);

                return $this->createHtml($prepareWord, $word);
            }

        })->implode(' ');

        $textHtmlToDB = collect(\Str::of(str_replace("\r\n", ' <br> ', $text))->split('#\s#'))->map(function ($word) use ($wordsModel) {
            if ($word == '<br>') {
                return '<br>';
            }

            $index = $wordsModel->search(function ($item) use ($word) {
                return \Str::lower(trim(trim($word), '.,-_+|/\\*()[]^$#&@{}"\'<>=?!')) == $item->word;
            });

            if ($index !== false) {
                $prepareWord = $wordsModel->get($index);

                return $this->createHtmlToDB($prepareWord, $word);
            }

        })->implode(' ');

        return ['html' => $textHtml, 'htmlToDb' => $textHtmlToDB, 'newWords' => $newWords];
    }

    protected function findAndCreateNewWords($words, $isAutogenerate)
    {
        $wordsAlreadyExists = EngWord::whereIn('word', $words->toArray())
            ->with('rusTranslate')
            ->get();

        $wordsDoesntHaveTranslate = EngWord::whereIn('word', $words->toArray())
            ->doesntHave('rusTranslate')
            ->get();


        $wordNotExistsDb = $words->diff($wordsAlreadyExists->pluck('word'));

        if ($wordNotExistsDb->isNotEmpty()) {
            $wordNotExistsDb->each(function ($word) use ($isAutogenerate) {

                if ($isAutogenerate) {
                    $dbData = ['user_id' => \Auth::id(), 'word' => $word];

                    $image = $this->generateImage($word);

                    if (!is_null($image)) {
                        $dbData['image'] = $image;
                    }

                    $wordModel = EngWord::create($dbData);

                    $rusTranslates = $this->generateTranslate($word);

                    if (!is_null($rusTranslates)) {
                        $wordModel->rusTranslate()->createMany($rusTranslates);
                    }

                } else {
                    $wordModel = EngWord::create(['user_id' => \Auth::id(), 'word' => $word]);
                }

                $this->generateSounds($wordModel);
            });

            //newWordsModels содержит как слова с переводом так и без него
            $newWordsModels = EngWord::whereIn('word', $wordNotExistsDb->toArray())
                ->with('rusTranslate')
                ->get();

            $allWords = $wordsAlreadyExists->merge($newWordsModels);
        } else {
            $allWords = $wordsAlreadyExists;
        }

        //Здесь одна коллекция с созданными новыми словами и уже существовавшими allWords

        if ($wordsDoesntHaveTranslate->isNotEmpty() && $isAutogenerate) {

            $wordsDoesntHaveTranslate->each(function ($word) {
                $rusTranslates = $this->generateTranslate($word->word);

                if (!is_null($rusTranslates)) {
                    $word->rusTranslate()->createMany($rusTranslates);
                }
            });

            $updateWordsDoesntHaveTranslate = EngWord::whereIn('word', $wordsDoesntHaveTranslate->pluck('word')->toArray())
                ->with('rusTranslate')
                ->get();

            $allWords = $allWords->merge($updateWordsDoesntHaveTranslate);
        }

        //Здесь мы уже добавили переводы слов и обновили модели све в allWords

        $wordsDoesntHaveTranslate = EngWord::whereIn('word', $words->toArray())
            ->doesntHave('rusTranslate')
            ->get();

        return ['allWords' => $allWords, 'newWords' => $wordsDoesntHaveTranslate];
    }

    protected function createHtml($wordModel, $plainWord)
    {
        return '<span :class="[{\'word\': hasTranslate('.$wordModel->id.')}, {\'untranslate-word\': !hasTranslate('.$wordModel->id.')}]" @click="showListTranslate(' .$wordModel->id. ', $event)">' .$plainWord. '</span>';
    }

    protected function createHtmlToDB($wordModel, $plainWord)
    {
        return '<span class="word" @click="showListTranslate(' .$wordModel->id. ', $event)">' .$plainWord. '</span>';
    }

    protected function splitWords($text)
    {
        return collect(\Str::of($text)->split('#\s#'))->filter()->map(function($word){
            return \Str::lower(trim(trim($word), '.,-_+|/\\*()[]^$#&@{}"\'<>=?!'));
        })->unique();
    }

    protected function generateImage($word)
    {
        $imageApiService = new ImageApiService($word);

        return $imageApiService->request();
    }

    protected function generateTranslate($word)
    {
        $translateApiService = new TranslateApiService($word);

        $result = $translateApiService->request();

        if (!is_null($result)) {
            $dbData = [];

            foreach ($result as $item) {
                $dbData[] = ['user_id' => \Auth::id(), 'translate' => $item];
            }

            return $dbData;
        }

        return null;
    }

    protected function generateSounds($wordModal)
    {
        $soundService = new SoundApiService();
        $word = $wordModal->word;

        $normalSpeedSound = $soundService->getNormal($word);
        $slowSpeedSound = $soundService->getSlow($word);

        $filePathNormal = \SoundStorage::add($normalSpeedSound);
        $filePathSlow = \SoundStorage::add($slowSpeedSound);

        if (!empty($filePathNormal) && !empty($filePathSlow)) {
            $wordModal->sound()->create(['normal' => $filePathNormal, 'slow' => $filePathSlow]);
        }
    }
}
