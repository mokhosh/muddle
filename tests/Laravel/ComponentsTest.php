<?php

test('text strategies')
    ->get('text')
    ->assertOk();

test('link strategies')
    ->get('link')
    ->assertOk();
