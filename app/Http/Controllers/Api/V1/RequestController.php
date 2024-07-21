<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequestRequest;
use App\Http\Requests\UpdateRequestRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\RequestResource;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = ModelsRequest::all();
        return response()->json(['data' => new RequestResource($users)], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequestRequest $request)
    {
        DB::beginTransaction();
        try{
            $user = ModelsRequest::create($request->only([
                'name',
                'email',
                'phone',
                'description',
            ]));

            DB::commit();

            return response()->json(['message' => "Petición creada correctamente"], 201);
        }
        catch(\Exception $e){
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()],422);
        }        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequestRequest $updateRequest, ModelsRequest $request)
    {
        DB::beginTransaction();
        try{
            $request->update($updateRequest->all());

            DB::commit();

            return response()->json(['message' => "Se realizó la llamada"], 201);
        }
        catch(\Exception $e){
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
