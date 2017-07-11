<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateuserInfosAPIRequest;
use App\Http\Requests\API\UpdateuserInfosAPIRequest;
use App\Models\userInfos;
use App\Repositories\userInfosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class userInfosController
 * @package App\Http\Controllers\API
 */

class userInfosAPIController extends AppBaseController
{
    /** @var  userInfosRepository */
    private $userInfosRepository;

    public function __construct(userInfosRepository $userInfosRepo)
    {
        $this->userInfosRepository = $userInfosRepo;
    }

    /**
     * Display a listing of the userInfos.
     * GET|HEAD /userInfos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->userInfosRepository->pushCriteria(new RequestCriteria($request));
        $this->userInfosRepository->pushCriteria(new LimitOffsetCriteria($request));
        $userInfos = $this->userInfosRepository->all();

        return $this->sendResponse($userInfos->toArray(), 'User Infos retrieved successfully');
    }

    /**
     * Store a newly created userInfos in storage.
     * POST /userInfos
     *
     * @param CreateuserInfosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateuserInfosAPIRequest $request)
    {
        $input = $request->all();

        $userInfos = $this->userInfosRepository->create($input);

        return $this->sendResponse($userInfos->toArray(), 'User Infos saved successfully');
    }

    /**
     * Display the specified userInfos.
     * GET|HEAD /userInfos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var userInfos $userInfos */
        $userInfos = $this->userInfosRepository->findWithoutFail($id);

        if (empty($userInfos)) {
            return $this->sendError('User Infos not found');
        }

        return $this->sendResponse($userInfos->toArray(), 'User Infos retrieved successfully');
    }

    /**
     * Update the specified userInfos in storage.
     * PUT/PATCH /userInfos/{id}
     *
     * @param  int $id
     * @param UpdateuserInfosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateuserInfosAPIRequest $request)
    {
        $input = $request->all();

        /** @var userInfos $userInfos */
        $userInfos = $this->userInfosRepository->findWithoutFail($id);

        if (empty($userInfos)) {
            return $this->sendError('User Infos not found');
        }

        $userInfos = $this->userInfosRepository->update($input, $id);

        return $this->sendResponse($userInfos->toArray(), 'userInfos updated successfully');
    }

    /**
     * Remove the specified userInfos from storage.
     * DELETE /userInfos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var userInfos $userInfos */
        $userInfos = $this->userInfosRepository->findWithoutFail($id);

        if (empty($userInfos)) {
            return $this->sendError('User Infos not found');
        }

        $userInfos->delete();

        return $this->sendResponse($id, 'User Infos deleted successfully');
    }
}
