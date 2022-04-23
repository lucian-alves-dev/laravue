<?php

namespace App\Http\Controllers;

use App\Http\Responses\CustomResponse;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserPatchRequest;
use App\Models\User;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function index(Request $request)
    {
        $form = $request->all();
        $users = User::search($form)->paginate(20);
        return CustomResponse::success(content: $users);
    }

    public function show($id)
    {
        return CustomResponse::success(content: User::find($id));
    }

    public function store(Request $request)
    {
        $validator = UserStoreRequest::validate($request);
        if ($validator->fails()) {
            return CustomResponse::error(
                errors: $validator->errors()->all(),
                msg: 'Não foi possível criar o usuário.'
            );
        }

        $user = User::create($validator->validated());
        return CustomResponse::success(
            content: $user->toArray(),
            msg: 'Usuário criado com sucesso.'
        );
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        if(! $user) return CustomResponse::error(msg: 'Usuário não encontrado.');

        $validator = UserPatchRequest::validate($request, $user);
        if ($validator->fails()) {
            return CustomResponse::error(
                errors: $validator->errors()->all(),
                msg: 'Não foi possível alterar os dados do usuário.'
            );
        }

        $user->update($validator->validated());
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
