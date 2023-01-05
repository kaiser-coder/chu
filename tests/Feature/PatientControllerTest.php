<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PatientControllerTest extends TestCase
{
	use WithFaker;

	public function test_store_new_patient_should_return_success_status_when_data_are_valid()
	{
		$response = $this->post(
			route('patient.create'),
			[
				'patient' => [
					'gender' => 'Masculin',
					'firstname' => $this->faker->firstNameMale(),
					'lastname' => $this->faker->lastName(),
					'birthdate' => $this->faker->dateTimeThisDecade(),
					'address' => $this->faker->address(),
					'job' => $this->faker->jobTitle(),
					'observation' => $this->faker->paragraphs(3, true),
				],
				'assistant' => [
					'fullname' => $this->faker->firstName(). ' ' . $this->faker->lastName(),
					'address' => $this->faker->address(),
					'contact' => $this->faker->phoneNumber(),
				],
				'treatment' => [
					'type' => 'Radiographie multiple',
				],
				'cause' => [
					'responsible_vehicle' => 'Voiture',
					'victim_category' => 'Passager',
					'security' => 'Casqué',
					'others' => $this->faker->paragraphs(3, true)
				],
				'responsible_driver' => [
					"lastname" => $this->faker->lastName(),
					"firstname" => $this->faker->firstName(),
					"contact"  => $this->faker->phoneNumber(),
					"address"  => $this->faker->address(),
					"identity_card" => '101' .$this->faker->randomNumber(9),
					"vehicle" => 'Moto'
				]
			]
		);

		$response->assertStatus(Response::HTTP_CREATED);
	}
}
