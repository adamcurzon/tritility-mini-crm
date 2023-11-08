<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthTest extends TestCase
{
    const VALID_EMAIL = 'admin@admin.com';
    const VALID_PASSWORD = 'password';
    const INVALID_PASSWORD = 'invalid';

    public function test_dashboard_unauth(): void
    {
        $response = $this->get('/dashboard');
        $response->assertStatus(302);
    }

    public function test_login_success(): void
    {
        $response = $this->post('/login', [
            'email' => self::VALID_EMAIL,
            'password' => self::VALID_PASSWORD
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(self::HOST . '/dashboard');
    }

    public function test_login_failed(): void
    {
        $response = $this->post('/login', [
            'email' => self::VALID_EMAIL,
            'password' => self::INVALID_PASSWORD
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(self::HOST);
    }
}
