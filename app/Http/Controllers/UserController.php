<?php

use App\Http\Models\User\Commons\UserViewModel;
use App\Http\Models\User\Create\UserCreateViewModel;
use App\Http\Models\User\Index\UserIndexViewModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use packages\UseCase\User\Create\UserCreateUseCaseInterface;
use packages\UseCase\User\Create\UserCreateRequest;
use packages\UseCase\User\GetList\UserGetListUseCaseInterface;
use packages\UseCase\User\GetList\UserGetListRequest;

class UserController extends BaseController
{
    public function create(UserCreateUseCaseInterface $interactor, Request $request)
    {
        $name = $request->input('name');
        $request = new UserCreateRequest($name);
        $response = $interactor->handle($request);

        $viewModel = new UserCreateViewModel($response->getCreatedUserId(), $name);
        return view('user.create', compact('viewModel'));
    }
}
