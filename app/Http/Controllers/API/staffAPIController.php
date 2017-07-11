<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatestaffAPIRequest;
use App\Http\Requests\API\UpdatestaffAPIRequest;
use App\Models\staff;
use App\Repositories\staffRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class staffController
 * @package App\Http\Controllers\API
 */

class staffAPIController extends AppBaseController
{
    /** @var  staffRepository */
    private $staffRepository;

    public function __construct(staffRepository $staffRepo)
    {
        $this->staffRepository = $staffRepo;
    }

    /**
     * Display a listing of the staff.
     * GET|HEAD /staff
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->staffRepository->pushCriteria(new RequestCriteria($request));
        $this->staffRepository->pushCriteria(new LimitOffsetCriteria($request));
        $staff = $this->staffRepository->all();

        return $this->sendResponse($staff->toArray(), 'Staff retrieved successfully');
    }

    /**
     * Store a newly created staff in storage.
     * POST /staff
     *
     * @param CreatestaffAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatestaffAPIRequest $request)
    {
        $input = $request->all();

        $staff = $this->staffRepository->create($input);

        return $this->sendResponse($staff->toArray(), 'Staff saved successfully');
    }

    /**
     * Display the specified staff.
     * GET|HEAD /staff/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var staff $staff */
        $staff = $this->staffRepository->findWithoutFail($id);

        if (empty($staff)) {
            return $this->sendError('Staff not found');
        }

        return $this->sendResponse($staff->toArray(), 'Staff retrieved successfully');
    }

    /**
     * Update the specified staff in storage.
     * PUT/PATCH /staff/{id}
     *
     * @param  int $id
     * @param UpdatestaffAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatestaffAPIRequest $request)
    {
        $input = $request->all();

        /** @var staff $staff */
        $staff = $this->staffRepository->findWithoutFail($id);

        if (empty($staff)) {
            return $this->sendError('Staff not found');
        }

        $staff = $this->staffRepository->update($input, $id);

        return $this->sendResponse($staff->toArray(), 'staff updated successfully');
    }

    /**
     * Remove the specified staff from storage.
     * DELETE /staff/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var staff $staff */
        $staff = $this->staffRepository->findWithoutFail($id);

        if (empty($staff)) {
            return $this->sendError('Staff not found');
        }

        $staff->delete();

        return $this->sendResponse($id, 'Staff deleted successfully');
    }
}
