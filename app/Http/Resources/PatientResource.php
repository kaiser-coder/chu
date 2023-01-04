<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
					'id' => $this->id_patient,
					'lastname' => $this->nom_patient,
					'firstname' => $this->prenom,
					'birthdate' => $this->date_naiss,
					'age' => $this->age,
					'gender' => $this->sexe,
					'address' => $this->adresse,
					'job' => $this->profession,
					'observation' => $this->remarque,
				];
    }
}
