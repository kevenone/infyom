<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateuserInfosRequest;
use App\Http\Requests\UpdateuserInfosRequest;
use App\Repositories\userInfosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class userInfosController extends AppBaseController
{
    /** @var  userInfosRepository */
    private $userInfosRepository;

    public function __construct(userInfosRepository $userInfosRepo)
    {
        $this->userInfosRepository = $userInfosRepo;
    }

    /**
     * Display a listing of the userInfos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->userInfosRepository->pushCriteria(new RequestCriteria($request));
        $userInfos = $this->userInfosRepository->all();

        return view('user_infos.index')
            ->with('userInfos', $userInfos);
    }

    /**
     * Show the form for creating a new userInfos.
     *
     * @return Response
     */
    public function create()
    {
        return view('user_infos.create');
    }

    /**
     * Store a newly created userInfos in storage.
     *
     * @param CreateuserInfosRequest $request
     *
     * @return Response
     */
    public function store(CreateuserInfosRequest $request)
    {
        $input = $request->all();

        $userInfos = $this->userInfosRepository->create($input);

        Flash::success('User Infos saved successfully.');

        return redirect(route('userInfos.index'));
    }

    /**
     * Display the specified userInfos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userInfos = $this->userInfosRepository->findWithoutFail($id);

        if (empty($userInfos)) {
            Flash::error('User Infos not found');

            return redirect(route('userInfos.index'));
        }

        return view('user_infos.show')->with('userInfos', $userInfos);
    }

    /**
     * Show the form for editing the specified userInfos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userInfos = $this->userInfosRepository->findWithoutFail($id);

        if (empty($userInfos)) {
            Flash::error('User Infos not found');

            return redirect(route('userInfos.index'));
        }

        return view('user_infos.edit')->with('userInfos', $userInfos);
    }

    /**
     * Update the specified userInfos in storage.
     *
     * @param  int              $id
     * @param UpdateuserInfosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateuserInfosRequest $request)
    {
        $userInfos = $this->userInfosRepository->findWithoutFail($id);

        if (empty($userInfos)) {
            Flash::error('User Infos not found');

            return redirect(route('userInfos.index'));
        }

        $userInfos = $this->userInfosRepository->update($request->all(), $id);

        Flash::success('User Infos updated successfully.');

        return redirect(route('userInfos.index'));
    }

    /**
     * Remove the specified userInfos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userInfos = $this->userInfosRepository->findWithoutFail($id);

        if (empty($userInfos)) {
            Flash::error('User Infos not found');

            return redirect(route('userInfos.index'));
        }

        $this->userInfosRepository->delete($id);

        Flash::success('User Infos deleted successfully.');

        return redirect(route('userInfos.index'));
    }
}
