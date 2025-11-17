<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Candidates\ChangePassworRequest;
use App\Http\Requests\Candidates\CreateCandidateRequest;
use App\Http\Requests\Candidates\LoginRequest;
use App\Http\Requests\Candidates\UpdateCandidateRequest;
use App\Http\Services\CandidateService;
use App\Models\Candidate;
use Hash;

class ApiCandidateController extends Controller
{
    private $service;

    public function __construct(CandidateService $service)
    {
        $this->service = $service;
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $candidate = Candidate::where('email', $data['email'])->first();

        if (!$candidate || !Hash::check($data['password'], $candidate->password)) {
            return response()->json([
                'message' => 'Credenciais inválidas'
            ], 401);
        }
        return response()
            ->json(
                ['data' =>
                [
                    'candidate' => $candidate,
                    'token' => $candidate->createToken('auth_token')->plainTextToken
                ]]
            );
    }
    public function logout(){
        $user = auth()->user();
        $user->currentAccessToken()->delete();
        return response()->json(['message'=>'Logout realizado com sucesso']);
    }

    public function register(CreateCandidateRequest $request)
    {
        $candidate = $this->service->store($request->validated());
        return response()->json(['message' => 'Usuário criado com sucesso', 'candidate' => $candidate]);
    }

    public function me(){
        $user_id = auth()->user()->id;
        return response()->json(['data'=> $this->service->me($user_id)]);
    }

    public function index()
    {
        return response()->json(['data' => 'api funcionando']);
    }

    public function all()
    {
        return response()->json(['data' => $this->service->all()]);
    }

    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        $this->service->updateCandidate($candidate, $request->validated());
        return response()->json(['data' => 'Usuário atualizado com sucesso']);
    }

    public function show(Candidate $candidate){
        return response()->json(['data'=> $this->service->show($candidate->id)]);
    }

    public function destroy(Candidate $candidate){
        $this->service->destroyCandidate($candidate);
        return response()->json(['data'=>'Conta deletada com sucesso.']);
    }
    public function changePassword(ChangePassworRequest $request){
        $user = auth()->user();
        $user->password = bcrypt($request->new_password);
        $user->save();

        return response()->json(['message' => 'Senha alterada com sucesso.']);
    }
}
