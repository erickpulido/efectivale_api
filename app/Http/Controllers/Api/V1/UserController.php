<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('statuses')->get();
        return response()->json(['data' => new UserResource($users)], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        DB::beginTransaction();
        try{
            $user = User::firstOrCreate(
                $request->only(['email']),
                $request->only(['name', 'password']),                
            );
            
            if(!$user->wasRecentlyCreated)
                throw new \Exception("Ya existe el usuario con el email {$request->email}", 409);

            $user->roles()->attach($request->role);
            $user->statuses()->attach(2);
            DB::commit();

            return response()->json(['message' => "Usuario creado correctamente"], 201);
        }
        catch(\Exception $e){
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 422);
        }       
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user = $user->find($user->id);
        return response()->json(['data' => new UserResource($user)], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        DB::beginTransaction();
        try{
            $response = ['message' => "Usuario actualizado correctamente"];

            if(!$request->all())
                throw new \Exception("No se ha modificado nada", 304);

            $user->update($request->except(['status']));

            if($request->filled('status'))
            {
                $user->statuses()->detach();
                $user->statuses()->attach($request->status);
                $newUserStatus = $user->statuses->toArray()[0]['name'];

                $mail = Mail::send([], [], function($message) use(&$user, &$newUserStatus){
                    $message->to($user->email)
                        ->subject("Usuario")
                        ->html("<p>Usuario {$user->email} ha sido {$newUserStatus}</p>");
                });

                if(!$mail)
                    throw new \Exception("No se pudo enviar el correo");

                $response['message'] = "Usuario habilitado, se envió correo";
            }
            DB::commit();

            return response()->json($response, 201);
        }
        catch(\Exception $e){
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
