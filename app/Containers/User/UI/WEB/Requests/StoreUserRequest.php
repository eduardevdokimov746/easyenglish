<?php

namespace App\Containers\User\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Support\Facades\Lang;

/**
 * Class StoreUserRequest.
 */
class StoreUserRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    // protected $transporter = \App\Ship\Transporters\DataTransporter::class;

    /**
     * Define which Roles and/or Permissions has access to this request.
     *
     * @var  array
     */
    protected $access = [
        'permissions' => '',
        'roles'       => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     *
     * @var  array
     */
    protected $decode = [
        //'login',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var  array
     */
    protected $urlParameters = [

    ];

    /**
     * @return  array
     */
    public function rules()
    {
        return [
            'login' => 'required|unique:users,login',
            'email' => 'required|email',
            'password' => 'min:3|confirmed'
        ];
    }

    /**
     * @return  bool
     */
    public function authorize()
    {
        return true;
    }
}
