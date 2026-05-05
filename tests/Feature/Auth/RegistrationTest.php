<?php

test('tela de registro pode ser renderizada', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('usuários novos podem se registrar', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));
});
