<?php

namespace App\Containers\Practice\UI\WEB\Controllers;

use App\Containers\Practice\UI\WEB\Requests\CreatePracticeRequest;
use App\Containers\Practice\UI\WEB\Requests\DeletePracticeRequest;
use App\Containers\Practice\UI\WEB\Requests\GetAllPracticesRequest;
use App\Containers\Practice\UI\WEB\Requests\FindPracticeByIdRequest;
use App\Containers\Practice\UI\WEB\Requests\UpdatePracticeRequest;
use App\Containers\Practice\UI\WEB\Requests\StorePracticeRequest;
use App\Containers\Practice\UI\WEB\Requests\EditPracticeRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Practice\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllPracticesRequest $request
     */
    public function index()
    {
       // $practices = Apiato::call('Practice@GetAllPracticesAction', [$request]);

        // ..

        return view('practice::index');
    }

    public function slovoPerevod()
    {
        return view('practice::slovo_perevod');
    }

    public function perevodSlovo()
    {
        return view('practice::perevod_slovo');
    }

    public function constructor()
    {
        return view('practice::constructor');
    }

    public function povtor()
    {
        return view('practice::result_page');
        //return view('practice::povtor');
    }

    /**
     * Show one entity
     *
     * @param FindPracticeByIdRequest $request
     */
    public function show(FindPracticeByIdRequest $request)
    {
        $practice = Apiato::call('Practice@FindPracticeByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreatePracticeRequest $request
     */
    public function create(CreatePracticeRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StorePracticeRequest $request
     */
    public function store(StorePracticeRequest $request)
    {
        $practice = Apiato::call('Practice@CreatePracticeAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditPracticeRequest $request
     */
    public function edit(EditPracticeRequest $request)
    {
        $practice = Apiato::call('Practice@GetPracticeByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdatePracticeRequest $request
     */
    public function update(UpdatePracticeRequest $request)
    {
        $practice = Apiato::call('Practice@UpdatePracticeAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeletePracticeRequest $request
     */
    public function delete(DeletePracticeRequest $request)
    {
         $result = Apiato::call('Practice@DeletePracticeAction', [$request]);

         // ..
    }
}
