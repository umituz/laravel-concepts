<?php

namespace App\Http\Controllers\Api;

use App\Enumerations\ApiEnumeration;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\UserResource;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class UserController
 * @package App\Http\Controllers\Api
 */
class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse|Response
     */
    public function index(Request $request)
    {
        $offset = $request->has('offset') ? $request->query('offset') : 0;
        $limit = $request->has('limit') ? $request->query('limit') : 10;

        $products = User::query();

        if ($request->has('q')) {
            $products->where('name', 'like', '%' . $request->query('q') . '%');
        }

        if ($request->has('sortBy')) {
            $products->orderBy($request->query('sortBy'), $request->query('sort', 'DESC'));
        }

        $data = $products->offset($offset)->limit($limit)->get();

//        $data->each(function($item){
//
//            $item->setAppends(['full_name']);
//
//        });

        $data->each->setAppends(['full_name']);

//        return response($data, 200);

        return $this->apiResponse($data, 'Users fetched successfully', JsonResponse::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserStoreRequest $request
     * @return JsonResponse
     */
    public function store(UserStoreRequest $request)
    {
//        $validator = Validator::make($request->all(), [
//            'email' => 'required|email|unique:users',
//            'user_name' => 'required|string|max:30',
//            'first_name' => 'required|string|max:30',
//            'last_name' => 'required|string|max:30',
//            'password' => 'required|min:6|max:30'
//        ]);
//
//        if ($validator->fails()) {
//            return $this->apiResponse($validator->errors(), 'Please, validate the form', 422, ApiEnumeration::ERROR);
//        }

        $user = new User();
        $user->user_name = $request->user_name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->email_verified_at = now();
        $user->password = bcrypt($request->password);
        $user->save();

//        return response([
//            'data' => $user,
//            'message' => 'Record added successfully'
//        ], 201);

        return $this->apiResponse($user, 'Users added successfully', JsonResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return JsonResponse
     */
    public function show($id)
    {
//        return $user;

        try {

            $user = User::findOrFail($id);

            return $this->apiResponse($user, 'User fetched successfully', JsonResponse::HTTP_OK);

        } catch (ModelNotFoundException $exception) {

            return $this->apiResponse(null, 'User Not Found!!!', JsonResponse::HTTP_NOT_FOUND, ApiEnumeration::ERROR);

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @param User $user
     * @return JsonResponse
     */
    public function update(UserUpdateRequest $request, User $user)
    {
//        $validator = Validator::make($request->all(), [
//            'email' => 'required|email|unique:users,email,' . $user->id,
//            'user_name' => 'required|string|max:30',
//            'first_name' => 'required|string|max:30',
//            'last_name' => 'required|string|max:30',
//            'password' => 'required|min:6|max:30'
//        ]);
//
//        if ($validator->fails()) {
//            return $this->apiResponse($validator->errors(), 'Please, validate the form', 422, ApiEnumeration::ERROR);
//        }

        $user->user_name = $request->user_name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

//        return response([
//            'data' => $user,
//            'message' => 'Record edited successfully'
//        ], 200);

        return $this->apiResponse($user, 'User edited successfully', JsonResponse::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();

//        return response([
//            'message' => 'Record deleted successfully'
//        ], 200);

        return $this->apiResponse($user, 'User deleted successfully', JsonResponse::HTTP_OK);
    }

    public function custom1()
    {
        $user2 = User::find(2);

        return new UserResource($user2);
    }

    public function custom2()
    {
        $users = User::all();

        return UserResource::collection($users);
    }

    public function custom3()
    {
        $users = User::all();

        return new UserCollection($users);
    }

    public function custom4()
    {
        $users = User::all();

        return UserResource::collection($users)->additional([
            'meta' => [
                'total_users' => $users->count(),
                'method' => 'additional method',
                'custom_key' => 'custom_value'
            ]
        ]);
    }
}
