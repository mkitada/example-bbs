<?php

namespace App\Http\Controllers\Web;

use App\Usecases\PostApplicationService;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class PostController extends WebBaseController
{
    /**
     * @param Request $request
     * @param PostApplicationService $postApplicationService
     * @return View
     */
    public function index(Request $request, PostApplicationService $postApplicationService): View
    {
        $inputs = $request->only(['skip', 'limit', 'sort', 'order']);
        $result = $postApplicationService->getListWithComments($inputs);

        return view('web.posts.index', ['posts' => $result]);
    }
}
