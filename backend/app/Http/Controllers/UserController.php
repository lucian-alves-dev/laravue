<?php

namespace App\Http\Controllers;

use App\Http\CustomResponse;
use App\Models\User;
use App\Validators\UserValidator;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function index()
    {
        $users = User::paginate(20);
        return CustomResponse::success(content: $users);
    }

    public function show($id)
    {
        return CustomResponse::success(content: User::find($id));
    }

    public function store(Request $request)
    {
        $validator = UserValidator::validate($request);
        if ($validator->errors()->count() > 0) {
            return CustomResponse::error(
                errors: $validator->errors()->all(),
                msg: 'Não foi possível criar o usuário.'
            );
        }

        $user = User::create($validator->customValidated);

        return CustomResponse::success(
            content: $user->toArray(),
            msg: 'Usuário criado com sucesso.'
        );
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        if(! $user) return CustomResponse::error(msg: 'Usuário não encontrado.');

        $validator = UserValidator::validate($request, $user);
        if ($validator->errors()->count() > 0) {
            return CustomResponse::error(
                errors: $validator->errors()->all(),
                msg: 'Não foi possível alterar os dados do usuário.'
            );
        }

        $user->update($validator->customValidated);

        return CustomResponse::success(
            content: $user->toArray(),
            msg: 'Dados do usuário alterados com sucesso.'
        );
    }

    public function delete($id)
    {
        $user = User::find($id);
        if($user) $user->delete();
        return CustomResponse::success(msg: 'Usuário excluído com sucesso.');
    }
}
