<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatezbinfoAPIRequest;
use App\Http\Requests\API\UpdatezbinfoAPIRequest;
use App\Models\zbinfo;
use App\Repositories\zbinfoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class zbinfoController
 * @package App\Http\Controllers\API
 */

class zbinfoAPIController extends AppBaseController
{
    /** @var  zbinfoRepository */
    private $zbinfoRepository;

    public function __construct(zbinfoRepository $zbinfoRepo)
    {
        $this->zbinfoRepository = $zbinfoRepo;
    }

    /**
     * Display a listing of the zbinfo.
     * GET|HEAD /zbinfos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->zbinfoRepository->pushCriteria(new RequestCriteria($request));
        $this->zbinfoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $zbinfos = $this->zbinfoRepository->all();

        return $this->sendResponse($zbinfos->toArray(), 'Zbinfos retrieved successfully');
    }

    /**
     * Store a newly created zbinfo in storage.
     * POST /zbinfos
     *
     * @param CreatezbinfoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatezbinfoAPIRequest $request)
    {
        $input = $request->all();

        $zbinfos = $this->zbinfoRepository->create($input);

        return $this->sendResponse($zbinfos->toArray(), 'Zbinfo saved successfully');
    }

    /**
     * Display the specified zbinfo.
     * GET|HEAD /zbinfos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var zbinfo $zbinfo */
        $zbinfo = $this->zbinfoRepository->findWithoutFail($id);

        if (empty($zbinfo)) {
            return $this->sendError('Zbinfo not found');
        }

        return $this->sendResponse($zbinfo->toArray(), 'Zbinfo retrieved successfully');
    }

    /**
     * Update the specified zbinfo in storage.
     * PUT/PATCH /zbinfos/{id}
     *
     * @param  int $id
     * @param UpdatezbinfoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatezbinfoAPIRequest $request)
    {
        $input = $request->all();

        /** @var zbinfo $zbinfo */
        $zbinfo = $this->zbinfoRepository->findWithoutFail($id);

        if (empty($zbinfo)) {
            return $this->sendError('Zbinfo not found');
        }

        $zbinfo = $this->zbinfoRepository->update($input, $id);

        return $this->sendResponse($zbinfo->toArray(), 'zbinfo updated successfully');
    }

    /**
     * Remove the specified zbinfo from storage.
     * DELETE /zbinfos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var zbinfo $zbinfo */
        $zbinfo = $this->zbinfoRepository->findWithoutFail($id);

        if (empty($zbinfo)) {
            return $this->sendError('Zbinfo not found');
        }

        $zbinfo->delete();

        return $this->sendResponse($id, 'Zbinfo deleted successfully');
    }
}
