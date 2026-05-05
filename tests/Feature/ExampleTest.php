<?php

it('retorna uma resposta bem-sucedida', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
