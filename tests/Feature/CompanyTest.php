<?php

namespace Tests\Feature;

use App\Models\Company;
use Tests\TestCase;
use App\Models\User;

class CompanyTest extends TestCase
{
    const VALID_COMPANY_ID = 2;
    const INVALID_COMPANY_ID = 1234567;
    const VALID_COMPANY_NAME = 'Testing Company';

    public function test_company_index(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get('/company');

        $response->assertStatus(200);
    }

    public function test_company_show(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get('/company/' . self::VALID_COMPANY_ID);

        $response->assertStatus(200);
    }

    public function test_company_redirect(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get('/company/' . self::INVALID_COMPANY_ID);

        $response->assertStatus(302);
    }

    public function test_company_create(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('/company', [
                'name' => self::VALID_COMPANY_NAME,
            ]);

        $company = Company::where("name", self::VALID_COMPANY_NAME)->orderBy('created_at', 'desc')->first();

        $response->assertStatus(302);
        $response->assertRedirect(self::HOST . "/company/" . $company->id);
    }

    public function test_company_delete(): void
    {
        $user = User::where("id", 1)->first();

        $company = Company::where("name", self::VALID_COMPANY_NAME)->orderBy('created_at', 'desc')->first();

        $response = $this->actingAs($user)
            ->delete('/company/' . $company->id);

        $response->assertStatus(302);
        $response->assertSessionHas('deleted', true);
        $response->assertRedirect(self::HOST . "/company");
    }

    public function test_company_delete_fail(): void
    {
        $user = User::where("id", 1)->first();

        $response = $this->actingAs($user)
            ->delete('/company/' . self::INVALID_COMPANY_ID);

        $response->assertStatus(302);
        $response->assertSessionHas('deleted', false);
        $response->assertRedirect(self::HOST . "/company");
    }
}
