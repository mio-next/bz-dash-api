<?php

namespace App\Http\Controllers\Setting;

use App\Services\RoleService;
use App\Http\Requests\Role\Store;
use App\Http\Requests\Role\Update;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class RoleController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index()
    {
        $items = RoleService::items();

        return success($items);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id)
    {
        $item = RoleService::find($id);

        return $item ? success($item) : fail('Not found.');
    }

    /**
     * @param Store $request
     * @return JsonResponse
     */
    public function store(Store $request)
    {
        $role = RoleService::store($request->validated());

        return $role ? success($role) : fail();
    }

    /**
     * @param Update $request
     * @return JsonResponse
     */
    public function update(Update $request, int $id)
    {
        $role = RoleService::update($request->validated(), compact('id'));

        return $role ? success($role) : fail();
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        return RoleService::destroy($id) ? success() : fail();
    }
}
