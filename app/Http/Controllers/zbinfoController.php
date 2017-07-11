<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatezbinfoRequest;
use App\Http\Requests\UpdatezbinfoRequest;
use App\Repositories\zbinfoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class zbinfoController extends AppBaseController
{
    /** @var  zbinfoRepository */
    private $zbinfoRepository;

    public function __construct(zbinfoRepository $zbinfoRepo)
    {
        $this->zbinfoRepository = $zbinfoRepo;
    }

    /**
     * Display a listing of the zbinfo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->zbinfoRepository->pushCriteria(new RequestCriteria($request));
        $zbinfos = $this->zbinfoRepository->all();

        return view('zbinfos.index')
            ->with('zbinfos', $zbinfos);
    }

    /**
     * Show the form for creating a new zbinfo.
     *
     * @return Response
     */
    public function create()
    {
        return view('zbinfos.create');
    }

    /**
     * Store a newly created zbinfo in storage.
     *
     * @param CreatezbinfoRequest $request
     *
     * @return Response
     */
    public function store(CreatezbinfoRequest $request)
    {
        $input = $request->all();

        $zbinfo = $this->zbinfoRepository->create($input);

        Flash::success('Zbinfo saved successfully.');

        return redirect(route('zbinfos.index'));
    }

    /**
     * Display the specified zbinfo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $zbinfo = $this->zbinfoRepository->findWithoutFail($id);

        if (empty($zbinfo)) {
            Flash::error('Zbinfo not found');

            return redirect(route('zbinfos.index'));
        }

        return view('zbinfos.show')->with('zbinfo', $zbinfo);
    }

    /**
     * Show the form for editing the specified zbinfo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $zbinfo = $this->zbinfoRepository->findWithoutFail($id);

        if (empty($zbinfo)) {
            Flash::error('Zbinfo not found');

            return redirect(route('zbinfos.index'));
        }

        return view('zbinfos.edit')->with('zbinfo', $zbinfo);
    }

    /**
     * Update the specified zbinfo in storage.
     *
     * @param  int              $id
     * @param UpdatezbinfoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatezbinfoRequest $request)
    {
        $zbinfo = $this->zbinfoRepository->findWithoutFail($id);

        if (empty($zbinfo)) {
            Flash::error('Zbinfo not found');

            return redirect(route('zbinfos.index'));
        }

        $zbinfo = $this->zbinfoRepository->update($request->all(), $id);

        Flash::success('Zbinfo updated successfully.');

        return redirect(route('zbinfos.index'));
    }

    /**
     * Remove the specified zbinfo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $zbinfo = $this->zbinfoRepository->findWithoutFail($id);

        if (empty($zbinfo)) {
            Flash::error('Zbinfo not found');

            return redirect(route('zbinfos.index'));
        }

        $this->zbinfoRepository->delete($id);

        Flash::success('Zbinfo deleted successfully.');

        return redirect(route('zbinfos.index'));
    }
}
