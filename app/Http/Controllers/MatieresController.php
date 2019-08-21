<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatieresRequest;
use App\Http\Resources\Matiere;
use App\Http\Resources\Matieres;
use App\Repositories\MatieresRepository;
use Illuminate\Http\Request;

class MatieresController extends Controller
{
    protected $matiereRepository;

    /**
     * MatieresController constructor.
     * @param $matiereRepository
     */
    public function __construct(MatieresRepository $matiereRepository)
    {
        $this->matiereRepository = $matiereRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(MatieresRequest $request)
    {
        //
        $data = [
            'nom' => $request->nom,
            'description' => $request->description,
            'type' => $request->type
        ];
        $matiere = $this->matiereRepository->store($data);

        return response()->json(['data'=> new Matiere($matiere)],200);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return response()->json(['data'=> new Matiere($this->matiereRepository->find($id))],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->matiereRepository->update($id,$request->all());
        return response()->json(['success' => true ,
            'message' => 'Matière mis à jour avec succès'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->matiereRepository->delete($id);
        return response()->json(['success' => true ,
            'message' => 'Matière supprimée avec succès'], 200);
    }

    public function getMatieres(){
        return response()->json(['data'=> new Matieres($this->matiereRepository->findAll())],200);
    }
}
