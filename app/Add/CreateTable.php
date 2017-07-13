<?php

namespace App\Add;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;
class CreateTable{
    public function create($newClass)
    {

        Capsule::schema()->create($newClass, function (Blueprint $table) {
            $table->increments('id');
            $table->string('godzina')->nullable();
            $table->string('poniedzialek')->nullable();
            $table->string('sala_p')->nullable();
            $table->string('wtorek')->nullable();
            $table->string('sala_w')->nullable();
            $table->string('sroda')->nullable();
            $table->string('sala_s')->nullable();
            $table->string('czwartek')->nullable();
            $table->string('sala_cz')->nullable();
            $table->string('piatek')->nullable();
            $table->string('sala_pi')->nullable();
            $table->timestamps();
        });

        Capsule::table($newClass)->insert([
            [ 'godzina' => null, 'poniedzialek' => null, 'sala_p' => null, 'wtorek' => null, 'sala_w' => null, 'sroda' => null, 'sala_s' => null, 'czwartek' => null, 'sala_cz' => null, 'piatek' => null, 'sala_pi' => null],
            [ 'godzina' => null, 'poniedzialek' => null, 'sala_p' => null, 'wtorek' => null, 'sala_w' => null, 'sroda' => null, 'sala_s' => null, 'czwartek' => null, 'sala_cz' => null, 'piatek' => null, 'sala_pi' => null],
            [ 'godzina' => null, 'poniedzialek' => null, 'sala_p' => null, 'wtorek' => null, 'sala_w' => null, 'sroda' => null, 'sala_s' => null, 'czwartek' => null, 'sala_cz' => null, 'piatek' => null, 'sala_pi' => null],
            [ 'godzina' => null, 'poniedzialek' => null, 'sala_p' => null, 'wtorek' => null, 'sala_w' => null, 'sroda' => null, 'sala_s' => null, 'czwartek' => null, 'sala_cz' => null, 'piatek' => null, 'sala_pi' => null],
            [ 'godzina' => null, 'poniedzialek' => null, 'sala_p' => null, 'wtorek' => null, 'sala_w' => null, 'sroda' => null, 'sala_s' => null, 'czwartek' => null, 'sala_cz' => null, 'piatek' => null, 'sala_pi' => null],
            [ 'godzina' => null, 'poniedzialek' => null, 'sala_p' => null, 'wtorek' => null, 'sala_w' => null, 'sroda' => null, 'sala_s' => null, 'czwartek' => null, 'sala_cz' => null, 'piatek' => null, 'sala_pi' => null],
            [ 'godzina' => null, 'poniedzialek' => null, 'sala_p' => null, 'wtorek' => null, 'sala_w' => null, 'sroda' => null, 'sala_s' => null, 'czwartek' => null, 'sala_cz' => null, 'piatek' => null, 'sala_pi' => null],
            [ 'godzina' => null, 'poniedzialek' => null, 'sala_p' => null, 'wtorek' => null, 'sala_w' => null, 'sroda' => null, 'sala_s' => null, 'czwartek' => null, 'sala_cz' => null, 'piatek' => null, 'sala_pi' => null],

        ]);
    }
}