<?php

namespace Api\Auth\Controllers;

use Api\Auth\Model\User;

use Api\Auth\Repository\ClientInterface;
use Api\Auth\Repository\UserInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;


class AuthController extends BaseController
{
    private $_client;
    private $_user;

    public function __construct(ClientInterface $client, UserInterface $user)
    {
        $this->_client = $client;
        $this->_user = $user;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function givClintId(Request $request)
    {
        try {
            $data = [
                'name' => $request->header("app-name"),
                'version' => $request->header("app-ver"),
                'type' => $request->header("app-type"),
                'agent' => $request->userAgent(),
                'ip' => $request->ip()
            ];
            $client = $this->_client->save($data);
            if ($client != null) {
                return Created201(jwt_encode(collect($client)));
            }
            return BadRequest400();
        } catch (\Exception $ex) {
            return InternalServerError500($ex->getMessage());
        }

    }

    public function login(Request $request)
    {
        $this->validate($request, [
            "type" => "required",
            "password" => "required"
        ]);
        try {
            $key = mb_strtolower($request->input('type'));
            $user = $this->_user->find($key, $request->input($key));
            if ($user == null) {
                return NotFound404();
            }
            if (!Hash::check($request->input('password'), $user->password)) {
                return OK([
                    "token" => jwt_encode($user),
                    "data" => collect($user)
                ]);
            }
            return BadRequest400();
        } catch (\Exception $ex) {
            return InternalServerError500($ex->getMessage());
        }
    }

    public function signup(Request $request)
    {
        //422 Unprocessable Entity user not valid
        $this->validate($request, [
            "type" => "required",
            "name" => "required",
            "password" => "required"
        ]);

        try {
            $key = mb_strtolower($request->input('type'));
            $value = $request->input($key);
           $user= $this->_user->find($key,$value);
            if($user){
                // Conflict user exist
                return Conflict409();
            }
            $user = $this->_user->save([
                'name' => $request->input('name'),
                'data' => [
                    [
                        'type' => $key,
                        $key => $value
                    ]
                ],
                'password' => Hash::make($request->input('password'))
            ]);
            if ($user != null) {
                //TODO create class for response
                //201 Created user create
                return Created201(jwt_encode(collect($user)));
            }
            //400 BadRequest user not created
            return BadRequest400();
        } catch (\Exception $ex) {
            //500 Internal Server Error
            return InternalServerError500($ex->getMessage());
        }

    }

    public function updateUser()
    {
        return "updateUser";
    }

    public function changePassword()
    {
        return "changePassword";
    }

    public function rememberPassword()
    {
        return "rememberPassword";
    }
///<summary>
/// refreshToken
///</summary>
    public function refreshToken()
    {
        return "refreshToken";
    }

}
