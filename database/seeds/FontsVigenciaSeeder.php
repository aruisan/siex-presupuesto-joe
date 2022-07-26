<?php

use App\Model\Hacienda\Presupuesto\FontsVigencia;
use Illuminate\Database\Seeder;

class FontsVigenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FontsVigencia::create([
           'id' => 1,
           'valor' => 656151615,
           'vigencia_id' => 1,
           'font_id' => 1,]);
    }
}
