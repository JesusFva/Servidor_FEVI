<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use League\Csv\Reader;
use App\Models\CP;

class CpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $csv = Reader::createFromPath('database/seeders/CPunico.csv', 'r');     
        // indicamos que el delimitador es la coma
        $csv->setDelimiter(',');     
        // Indicamos el índice de la fila de nombres de columnas
        $csv->setHeaderOffset(0);     
        $records = $csv->getRecords();      

        foreach ($records as $r) {
            $registro = new Cp();
                $registro->codigo = $r['codigo'];
                $registro->colonia = $r['colonia'];
                $registro->tipo_asenta = $r['tipo_asenta'];
                $registro->municipio = $r['municipio'];
                $registro->estado = $r['estado'];
                
            $registro->save();
        }
        
        //
        /* FacadesDB::table('cp')->insert([
            'codigo' => ('20000'),
            'colonia' => ('Aguascalientes Centro'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20010'),
            'colonia' => ('Colinas del Rio'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20010'),
            'colonia' => ('Olivares Santana'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20010'),
            'colonia' => ('Las Brisas'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20010'),
            'colonia' => ('Ramon Romo Franco'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20010'),
            'colonia' => ('San Cayetano'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20016'),
            'colonia' => ('Colinas de San Ignacio'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20016'),
            'colonia' => ('La Fundición'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20016'),
            'colonia' => ('Fundición II'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20016'),
            'colonia' => ('Los Sauces'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20018'),
            'colonia' => ('Línea de Fuego'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20020'),
            'colonia' => ('Buenos Aires'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20020'),
            'colonia' => ('Circunvalación Norte'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20020'),
            'colonia' => ('Las Arboledas'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20020'),
            'colonia' => ('Villas de San Francisco'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20029'),
            'colonia' => ('Villas de La Universidad'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20030'),
            'colonia' => ('El Sol'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20030'),
            'colonia' => ('Gremial'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20030'),
            'colonia' => ('Industrial'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20040'),
            'colonia' => ('Altavista'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20040'),
            'colonia' => ('Curtidores'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20040'),
            'colonia' => ('La Concordia'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20040'),
            'colonia' => ('Miravalle'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20040'),
            'colonia' => ('Panorama'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20040'),
            'colonia' => ('Residencial Guadalupe'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20049'),
            'colonia' => ('Colinas del Poniente'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20050'),
            'colonia' => ('Bugambilias'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20050'),
            'colonia' => ('Del Carmen'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20050'),
            'colonia' => ('La Fe'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20050'),
            'colonia' => ('México'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20050'),
            'colonia' => ('Primavera'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20050'),
            'colonia' => ('San Pablo'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20059'),
            'colonia' => ('Guadalupe'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20059'),
            'colonia' => ('Heliodoro Garcia'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20060'),
            'colonia' => ('Gómez'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20060'),
            'colonia' => ('Moderno'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20064'),
            'colonia' => ('Valle del Rio San Pedro'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20070'),
            'colonia' => ('Guadalupe Posada'),
            'tipo_asenta' => ('Unidad habitacional'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20070'),
            'colonia' => ('San Marcos'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20078'),
            'colonia' => ('San Marcos'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20080'),
            'colonia' => ('Modelo'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20080'),
            'colonia' => ('Residencial del Valle I'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20089'),
            'colonia' => ('Residencial del Valle II'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20100'),
            'colonia' => ('La Herradura'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20100'),
            'colonia' => ('Club Campestre'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20100'),
            'colonia' => ('Jardines del Campestre'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20100'),
            'colonia' => ('Los Vergeles'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20100'),
            'colonia' => ('Ciudad Universitaria'),
            'tipo_asenta' => ('Equipamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20100'),
            'colonia' => ('Rancho San Antonio'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20110'),
            'colonia' => ('Talamantes Ponce'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20110'),
            'colonia' => ('Granjas del Campestre'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20110'),
            'colonia' => ('Puerto las Hadas'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20110'),
            'colonia' => ('Valle del Campestre'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20110'),
            'colonia' => ('Villas de Montenegro'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20110'),
            'colonia' => ('Las Cavas'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20110'),
            'colonia' => ('La Enramada'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20115'),
            'colonia' => ('Trojes de Oriente'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20115'),
            'colonia' => ('Valle de las Trojes'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20115'),
            'colonia' => ('Villas de San Nicolás'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20115'),
            'colonia' => ('San Telmo'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20115'),
            'colonia' => ('La Paloma'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20115'),
            'colonia' => ('Barrio de Santiago'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20115'),
            'colonia' => ('Villa de las Trojes'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20115'),
            'colonia' => ('Valle de Santa Teresa'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20116'),
            'colonia' => ('La Troje'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20116'),
            'colonia' => ('Trojes de Alonso'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20116'),
            'colonia' => ('San Telmo Residencial'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20116'),
            'colonia' => ('Santa Fe'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20118'),
            'colonia' => ('Las Trojes'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20118'),
            'colonia' => ('Misión del Campanario'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20118'),
            'colonia' => ('Trojes de Cristal'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20118'),
            'colonia' => ('Trojes del Sol'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20118'),
            'colonia' => ('Residencial Santa Clara'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20118'),
            'colonia' => ('Misión de Santiago'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20118'),
            'colonia' => ('Andora Residencial'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20118'),
            'colonia' => ('Cadaqués Residencial'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20118'),
            'colonia' => ('Valle del Campanario'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20118'),
            'colonia' => ('Los Calicantos'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20118'),
            'colonia' => ('Las Misiones'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20118'),
            'colonia' => ('Los Jarales'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20118'),
            'colonia' => ('Cerrada El Molino'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20118'),
            'colonia' => ('Valle Real'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20118'),
            'colonia' => ('Terzetto'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20118'),
            'colonia' => ('Cerrada de La Misión'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20118'),
            'colonia' => ('Cerrada del Valle'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20118'),
            'colonia' => ('Cerrada de la Mezquitera'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20119'),
            'colonia' => ('Lomas del Campestre 2a Sección'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20119'),
            'colonia' => ('Villas del Campestre'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20120'),
            'colonia' => ('Jardines de la Concepción'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20120'),
            'colonia' => ('Los Bosques'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20120'),
            'colonia' => ('Rinconada los Bosques'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20123'),
            'colonia' => ('La Perla Norte'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20123'),
            'colonia' => ('Arroyo El Molino'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20124'),
            'colonia' => ('Galerías'),
            'tipo_asenta' => ('Zona comercial'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20124'),
            'colonia' => ('Residencial Altaria'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Constitución'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Libertad'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Pozo Bravo Norte'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Soberana Convención Revolucionaria'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Villa Montaña'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Villas de Don Antonio'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Los Ángeles'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Capittala'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Recinto de la Macarena'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('La Soledad'),
            'tipo_asenta' => ('Rancho'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Los Naranjos'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Villa de Nuestra Señora de La Asunción Sector Guadalupe'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Villa Teresa'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Cartagena 1947'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Villas de La Convención'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Lomas de La Asunción'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Villa de Nuestra Señora de La Asunción Sector Encino'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Villa de Nuestra Señora de La Asunción Sector Alameda'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('San José de Pozo Bravo'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Villa de Nuestra Señora de La Asunción Sector San Marcos'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Villa de Nuestra Señora de La Asunción Sector Estación'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Las Plazas'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('El Rosedal'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Natura'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Montebello Della Stanza'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Villa Notre Dame'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Privada Guadalupe'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Rinconada Pozo Bravo'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Pozo Bravo Sur'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Villa Loma Dorada'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Jardines de Montebello'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Villas del Río'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('El Puertecito'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20126'),
            'colonia' => ('Rinconada del Puertecito'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20127'),
            'colonia' => ('Bosques del Prado Norte'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20128'),
            'colonia' => ('Sartenejo'),
            'tipo_asenta' => ('Rancho'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20129'),
            'colonia' => ('Lomas del Campestre 1a Sección'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20130'),
            'colonia' => ('Bosques del Prado Sur'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20130'),
            'colonia' => ('El Roble'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20130'),
            'colonia' => ('Fátima'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20130'),
            'colonia' => ('Independencia de México'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20130'),
            'colonia' => ('Nueva Rinconada'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20130'),
            'colonia' => ('Primo Verdad'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20130'),
            'colonia' => ('San José del Arenal'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20130'),
            'colonia' => ('Unidad Ganadera'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20130'),
            'colonia' => ('San Xavier'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20130'),
            'colonia' => ('Residencial del Real'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20130'),
            'colonia' => ('Puerta Navarra'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20130'),
            'colonia' => ('Residencial Campestre Club de Golf'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20130'),
            'colonia' => ('Palma Real'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20130'),
            'colonia' => ('Muralia'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20135'),
            'colonia' => ('Agropecuario'),
            'tipo_asenta' => ('Zona comercial'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20135'),
            'colonia' => ('Centro Distribuidor de Básicos'),
            'tipo_asenta' => ('Zona comercial'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20136'),
            'colonia' => ('La Rinconada'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20137'),
            'colonia' => ('El Plateado'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20138'),
            'colonia' => ('Residencial Pulgas Pandas Norte'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20138'),
            'colonia' => ('Residencial Pulgas Pandas Sur'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20138'),
            'colonia' => ('Villas del Vergel'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20138'),
            'colonia' => ('Cerrada San Miguel'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20140'),
            'colonia' => ('Las Hadas'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20140'),
            'colonia' => ('Morelos'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20140'),
            'colonia' => ('Andrea'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20146'),
            'colonia' => ('Los Arcos'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20149'),
            'colonia' => ('Industrial'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20150'),
            'colonia' => ('Buenavista'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20150'),
            'colonia' => ('C.T.M.'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20150'),
            'colonia' => ('La Estrella'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20150'),
            'colonia' => ('Macias Arellano'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20150'),
            'colonia' => ('Trento'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20150'),
            'colonia' => ('Nueva Andalucia Coto Residencial'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20150'),
            'colonia' => ('Váltica'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20150'),
            'colonia' => ('Lomas del Cobano'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20157'),
            'colonia' => ('La Higuerilla'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20157'),
            'colonia' => ('Parras'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20158'),
            'colonia' => ('El Cobano'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20158'),
            'colonia' => ('Hacienda el Cobano'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20158'),
            'colonia' => ('Trojes del Cobano'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20158'),
            'colonia' => ('Villas del Cobano'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20159'),
            'colonia' => ('Alianza Ferrocarrilera'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20159'),
            'colonia' => ('Bosques del Prado Oriente'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20160'),
            'colonia' => ('Francisco Guel Jimenez'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20160'),
            'colonia' => ('Las Viñas INFONAVIT'),
            'tipo_asenta' => ('Unidad habitacional'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20164'),
            'colonia' => ('Santa Anita 4a Sección'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20169'),
            'colonia' => ('Santa Anita'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20169'),
            'colonia' => ('Santa Anita 2a Sección'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20170'),
            'colonia' => ('El Maguey'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20170'),
            'colonia' => ('Las Cumbres'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20170'),
            'colonia' => ('Lic Benito Juárez'),
            'tipo_asenta' => ('Unidad habitacional'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20170'),
            'colonia' => ('Nazario Ortiz Garza'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20170'),
            'colonia' => ('Rodolfo Landeros Gallegos'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20170'),
            'colonia' => ('S.T.E.M.A.'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20170'),
            'colonia' => ('Zona Militar'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20170'),
            'colonia' => ('Villa Bonita'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20172'),
            'colonia' => ('Lic Benito Palomino Dena'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20172'),
            'colonia' => ('Anexo Benito Palomino Dena (Cumbres II)'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20172'),
            'colonia' => ('La Florida l'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20172'),
            'colonia' => ('La Florida II'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20172'),
            'colonia' => ('Claustros Loma Dorada'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20172'),
            'colonia' => ('Cumbres III'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20174'),
            'colonia' => ('Lomas de Bellavista'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20174'),
            'colonia' => ('Lomas de las Fuentes'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20174'),
            'colonia' => ('Colinas de Oriente'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20174'),
            'colonia' => ('Vista de las Cumbres'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20174'),
            'colonia' => ('Los Laureles'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20174'),
            'colonia' => ('Mirador de las Culturas'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20174'),
            'colonia' => ('El Rocío'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20174'),
            'colonia' => ('Villas de la Loma'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20174'),
            'colonia' => ('Los Pericos'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20174'),
            'colonia' => ('Paseos del Sol'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20174'),
            'colonia' => ('Miradores de Santa Elena'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20174'),
            'colonia' => ('Villas de las Fuentes'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20175'),
            'colonia' => ('La Hojarasca'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20175'),
            'colonia' => ('Ejido las Cumbres'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20175'),
            'colonia' => ('J Refugio Esparza Reyes'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20175'),
            'colonia' => ('Rinconadas las Cumbres'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20175'),
            'colonia' => ('Lomas de Oriente'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20177'),
            'colonia' => ('C.N.O.P. Oriente'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20179'),
            'colonia' => ('Las Cumbres'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20179'),
            'colonia' => ('Luis Ortega Douglas'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20179'),
            'colonia' => ('Pensadores Mexicanos'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20179'),
            'colonia' => ('Pintores Mexicanos'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20179'),
            'colonia' => ('Progreso'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20179'),
            'colonia' => ('Santa Regina'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20179'),
            'colonia' => ('Cerro Alto'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20179'),
            'colonia' => ('Santa Margarita'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20180'),
            'colonia' => ('Del Trabajo'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20180'),
            'colonia' => ('Ferronales'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20180'),
            'colonia' => ('Luis Gómez Zepeda (ferronales)'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20180'),
            'colonia' => ('Lomas de Santa Anita'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20180'),
            'colonia' => ('Alameda'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20180'),
            'colonia' => ('Rinconada de La Alameda'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20180'),
            'colonia' => ('Bosques de La Alameda'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20180'),
            'colonia' => ('Nueva Alameda'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20190'),
            'colonia' => ('Héroes'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20190'),
            'colonia' => ('La Hacienda'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20190'),
            'colonia' => ('La Mancha'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20196'),
            'colonia' => ('Ojocaliente'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20196'),
            'colonia' => ('Ojocaliente INEGI'),
            'tipo_asenta' => ('Unidad habitacional'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20196'),
            'colonia' => ('Solidaridad 1a Sección'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20196'),
            'colonia' => ('Sol Naciente'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20196'),
            'colonia' => ('Villa de las Norias'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20196'),
            'colonia' => ('Camino Real'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);
        
        FacadesDB::table('cp')->insert([
            'codigo' => ('20196'),
            'colonia' => ('Ribera del Sol'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20196'),
            'colonia' => ('Ambrosía'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20196'),
            'colonia' => ('José Guadalupe Peralta Gámez'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20196'),
            'colonia' => ('Haciendas de Aguascalientes'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20196'),
            'colonia' => ('Villerías'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20196'),
            'colonia' => ('Vistas de Oriente'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20196'),
            'colonia' => ('Real de Haciendas'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20196'),
            'colonia' => ('Valle de los Cactus'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20196'),
            'colonia' => ('Colinas de San Patricio'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20196'),
            'colonia' => ('Balcones de Oriente'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20196'),
            'colonia' => ('Terra Nova'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20196'),
            'colonia' => ('José Guadalupe Posada'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20196'),
            'colonia' => ('Comunidad el Rocío'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20196'),
            'colonia' => ('Valle del Bicentenario'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20196'),
            'colonia' => ('Paseo de los Cactus'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20196'),
            'colonia' => ('Balcones del Valle'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20196'),
            'colonia' => ('Real del Sol'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20198'),
            'colonia' => ('Ex Hacienda Ojocaliente'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20198'),
            'colonia' => ('Ejido Ojocaliente'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20198'),
            'colonia' => ('Misión Alameda'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20199'),
            'colonia' => ('El Riego'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20199'),
            'colonia' => ('Fidel Velázquez'),
            'tipo_asenta' => ('Unidad habitacional'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20199'),
            'colonia' => ('Municipio Libre'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20200'),
            'colonia' => ('Vergel de la Cantera'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20200'),
            'colonia' => ('Balandra'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20200'),
            'colonia' => ('Carmel'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20200'),
            'colonia' => ('Villas de La Cantera'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20200'),
            'colonia' => ('Lic Manuel Gómez Morin'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20200'),
            'colonia' => ('Residencial San Nicolás'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20200'),
            'colonia' => ('Villas del Mediterráneo'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20200'),
            'colonia' => ('Ex Hacienda La Cantera'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20200'),
            'colonia' => ('José Vasconcelos Calderón'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20200'),
            'colonia' => ('Porta Canteras'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20200'),
            'colonia' => ('Fuentes del Lago'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20200'),
            'colonia' => ('El Quelite'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20200'),
            'colonia' => ('Olinda'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20200'),
            'colonia' => ('Bellavista'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20200'),
            'colonia' => ('Loma Bonita'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20200'),
            'colonia' => ('Nueva Castilla'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20200'),
            'colonia' => ('Xenia Residencial'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20205'),
            'colonia' => ('Educación Álamos'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20205'),
            'colonia' => ('Nueva España'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20206'),
            'colonia' => ('Lic. José López Portillo'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20206'),
            'colonia' => ('La Barranquilla'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20206'),
            'colonia' => ('Barandales de San José'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20207'),
            'colonia' => ('Canteras de San Javier'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20207'),
            'colonia' => ('Capital City'),
            'tipo_asenta' => ('Zona comercial'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20207'),
            'colonia' => ('Rinconada San José'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20208'),
            'colonia' => ('Canteras de San José'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20210'),
            'colonia' => ('Circunvalación Poniente'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20210'),
            'colonia' => ('España'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20210'),
            'colonia' => ('La Barranca de Guadalupe'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20210'),
            'colonia' => ('Pirules INFONAVIT'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20217'),
            'colonia' => ('Residencial los Pirules'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20218'),
            'colonia' => ('Canteras de Santa Imelda'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20218'),
            'colonia' => ('Francisco Villa'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20218'),
            'colonia' => ('Jardines del Lago'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20218'),
            'colonia' => ('Tahona Residencial'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20218'),
            'colonia' => ('San Martin de La Cantera'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20218'),
            'colonia' => ('Canteras de San Agustin'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20218'),
            'colonia' => ('Santa Imelda'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20218'),
            'colonia' => ('Los Eucaliptos 2a. Sección'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20218'),
            'colonia' => ('Los Eucaliptos'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20218'),
            'colonia' => ('San Agustín'),
            'tipo_asenta' => ('Rancho'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20219'),
            'colonia' => ('El Edén'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20219'),
            'colonia' => ('Parque Industrial el Vergel'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20219'),
            'colonia' => ('Misión Juan Pablo II'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20220'),
            'colonia' => ('Las Flores'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20220'),
            'colonia' => ('Vivienda Popular'),
            'tipo_asenta' => ('Unidad habitacional'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20229'),
            'colonia' => ('Las Torres'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20230'),
            'colonia' => ('Las Américas'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20230'),
            'colonia' => ('Obraje'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20230'),
            'colonia' => ('Santa Elena'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20234'),
            'colonia' => ('Agricultura'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20235'),
            'colonia' => ('El Dorado 1a Sección'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20235'),
            'colonia' => ('El Dorado 2a Sección'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20235'),
            'colonia' => ('Valle Dorado'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20235'),
            'colonia' => ('Villa Jardín'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20236'),
            'colonia' => ('Jardines de Santa Elena'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20237'),
            'colonia' => ('Hermanos Carreón'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20237'),
            'colonia' => ('Montebello'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20238'),
            'colonia' => ('Santa Elena 2a Sección'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20239'),
            'colonia' => ('La Fuente'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20240'),
            'colonia' => ('El Encino'),
            'tipo_asenta' => ('Barrio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20240'),
            'colonia' => ('El Laurel'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20240'),
            'colonia' => ('La Luna'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20240'),
            'colonia' => ('La Salud'),
            'tipo_asenta' => ('Barrio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20240'),
            'colonia' => ('Los Virreyes'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20240'),
            'colonia' => ('El Llanito'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20240'),
            'colonia' => ('Residencial el Encino'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20240'),
            'colonia' => ('Triana'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20240'),
            'colonia' => ('Residencial Cosío'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20247'),
            'colonia' => ('San Fernando INFONAVIT'),
            'tipo_asenta' => ('Unidad habitacional'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20248'),
            'colonia' => ('Jardines de Triana'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20249'),
            'colonia' => ('Gámez'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20250'),
            'colonia' => ('Jesús Gómez Portugal'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20250'),
            'colonia' => ('Héroes de Aguascalientes'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20250'),
            'colonia' => ('Jardines de La Cruz'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20250'),
            'colonia' => ('La Huerta'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20250'),
            'colonia' => ('San Luis'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20250'),
            'colonia' => ('Vivienda Militar'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20250'),
            'colonia' => ('Villas de Kristal'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20255'),
            'colonia' => ('Bona Gens'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20255'),
            'colonia' => ('INFONAVIT Los Volcanes'),
            'tipo_asenta' => ('Unidad habitacional'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20256'),
            'colonia' => ('FOVISSSTE Ojocaliente I'),
            'tipo_asenta' => ('Unidad habitacional'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20256'),
            'colonia' => ('Ojocaliente FOVISSSTE II'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20256'),
            'colonia' => ('Ojocaliente las Torres'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20256'),
            'colonia' => ('Rinconada de La Cruz'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20256'),
            'colonia' => ('Villas de Ojocaliente'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20256'),
            'colonia' => ('Parque y Presa del Cedazo'),
            'tipo_asenta' => ('Equipamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20256'),
            'colonia' => ('Parque y Presa del Cedazo'),
            'tipo_asenta' => ('Equipamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20257'),
            'colonia' => ('Lázaro Cárdenas'),
            'tipo_asenta' => ('Unidad habitacional'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20259'),
            'colonia' => ('La Estación'),
            'tipo_asenta' => ('Barrio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20259'),
            'colonia' => ('La Purísima'),
            'tipo_asenta' => ('Barrio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        
        FacadesDB::table('cp')->insert([
            'codigo' => ('20260'),
            'colonia' => ('IV Centenario'),
            'tipo_asenta' => ('Unidad habitacional'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20260'),
            'colonia' => ('Jesús Terán Peredo'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20260'),
            'colonia' => ('Ojo de Agua'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20260'),
            'colonia' => ('Sidusa'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20260'),
            'colonia' => ('Rinconada El Cedazo'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20263'),
            'colonia' => ('Agua Clara'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20263'),
            'colonia' => ('Balcones de Ojocaliente'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20263'),
            'colonia' => ('Cielo Claro'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20263'),
            'colonia' => ('Lomas del Chapulín'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20263'),
            'colonia' => ('Ojo de Agua de Palmitas'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20263'),
            'colonia' => ('Salto de Ojocaliente'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20263'),
            'colonia' => ('Solidaridad 2a Sección'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20263'),
            'colonia' => ('Solidaridad 3a Sección'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20263'),
            'colonia' => ('Tierra Buena'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20263'),
            'colonia' => ('Rinconada San Antonio I'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20263'),
            'colonia' => ('Cima del Chapulín'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20263'),
            'colonia' => ('Cobano de Palmitas'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20263'),
            'colonia' => ('San Jorge'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);
        
        FacadesDB::table('cp')->insert([
            'codigo' => ('20263'),
            'colonia' => ('La Lomita'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20263'),
            'colonia' => ('Villa las Palmas'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20263'),
            'colonia' => ('Bajío de las Palmas'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20263'),
            'colonia' => ('Lomas del Gachupín'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20263'),
            'colonia' => ('El Cedazo'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20263'),
            'colonia' => ('San Ángel'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20263'),
            'colonia' => ('Villa Taurina'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20264'),
            'colonia' => ('Morelos INFONAVIT'),
            'tipo_asenta' => ('Unidad habitacional'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20264'),
            'colonia' => ('Vista del Sol 2a Sección'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20264'),
            'colonia' => ('Vista del Sol 3a Sección'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20264'),
            'colonia' => ('Vista del Sol 1a Sección'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20265'),
            'colonia' => ('Ojo de Agua INFONAVIT'),
            'tipo_asenta' => ('Unidad habitacional'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20266'),
            'colonia' => ('Jardines del Sol'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20266'),
            'colonia' => ('La Cruz'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20266'),
            'colonia' => ('Misión de Santa Fe'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20267'),
            'colonia' => ('S.T.E.M.A.'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20267'),
            'colonia' => ('Jardines de La Convención'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20267'),
            'colonia' => ('Ojo de Agua FOVISSSTE 1a Sección'),
            'tipo_asenta' => ('Unidad habitacional'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20267'),
            'colonia' => ('Lic Primo Verdad INEGI'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20268'),
            'colonia' => ('Fuentes de La Asunción'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20269'),
            'colonia' => ('Jardines de La Luz'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20270'),
            'colonia' => ('Mesonero'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20270'),
            'colonia' => ('Bulevar'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20270'),
            'colonia' => ('El Caminero'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20270'),
            'colonia' => ('Jardines de Aguascalientes'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        
        FacadesDB::table('cp')->insert([
            'codigo' => ('20270'),
            'colonia' => ('Jardines de La Asunción'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20270'),
            'colonia' => ('Las Canoas'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20270'),
            'colonia' => ('Lindavista'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20270'),
            'colonia' => ('México'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20270'),
            'colonia' => ('Los Cedros'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20276'),
            'colonia' => ('Jardines de las Bugambilias'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20276'),
            'colonia' => ('Jardines del Parque'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20276'),
            'colonia' => ('Jardines de Alejandría'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20277'),
            'colonia' => ('Pirámides'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20277'),
            'colonia' => ('Residencial del Parque'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20277'),
            'colonia' => ('Rinconada del Parque'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20278'),
            'colonia' => ('Jardines de las Fuentes'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20280'),
            'colonia' => ('Casasolida'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20280'),
            'colonia' => ('Central de Abastos'),
            'tipo_asenta' => ('Zona comercial'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20280'),
            'colonia' => ('Jardines del Sur'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20280'),
            'colonia' => ('Martinez Dominguez'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20280'),
            'colonia' => ('Prados de Villasunción'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20280'),
            'colonia' => ('Prados del Sur'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20280'),
            'colonia' => ('San Francisco del Arenal'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20280'),
            'colonia' => ('San Pedro'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20280'),
            'colonia' => ('Torres de San Francisco'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20280'),
            'colonia' => ('Trojes del Sur'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20280'),
            'colonia' => ('Australis'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20280'),
            'colonia' => ('Conjunto San Francisco'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20280'),
            'colonia' => ('Villas de San José'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20283'),
            'colonia' => ('Kerarta'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20283'),
            'colonia' => ('Parque Industrial Siglo XXI'),
            'tipo_asenta' => ('Zona industrial'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20284'),
            'colonia' => ('La Casita'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20284'),
            'colonia' => ('La Estancia'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20284'),
            'colonia' => ('INFONAVIT Potreros del Oeste'),
            'tipo_asenta' => ('Unidad habitacional'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20284'),
            'colonia' => ('Villas de Santa Rosa'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20284'),
            'colonia' => ('Villas del Oeste'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20284'),
            'colonia' => ('Villas del Sur'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20284'),
            'colonia' => ('Rinconada del Sur'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20284'),
            'colonia' => ('Villas del Encino'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20285'),
            'colonia' => ('Versalles 1a Sección'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20285'),
            'colonia' => ('Versalles 2a Sección'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20286'),
            'colonia' => ('Bosque Real'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20286'),
            'colonia' => ('Rancho Santa Mónica'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20286'),
            'colonia' => ('Vicente Guerrero'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20286'),
            'colonia' => ('Villas del Pilar 1a Sección'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20286'),
            'colonia' => ('Barlovento'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20286'),
            'colonia' => ('Abadía'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20286'),
            'colonia' => ('Mangata'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20286'),
            'colonia' => ('Caranday'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20286'),
            'colonia' => ('Amura'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20286'),
            'colonia' => ('Villas San Antonio'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20286'),
            'colonia' => ('Providencia'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20286'),
            'colonia' => ('Rinconada Santa Mónica'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20286'),
            'colonia' => ('Paseos de Santa Mónica'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20287'),
            'colonia' => ('Insurgentes'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20288'),
            'colonia' => ('Bulevares 1a. Sección'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20288'),
            'colonia' => ('Bulevares 2a. Sección'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20289'),
            'colonia' => ('Pilar Blanco INFONAVIT'),
            'tipo_asenta' => ('Unidad habitacional'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20290'),
            'colonia' => ('Ciudad Industrial'),
            'tipo_asenta' => ('Zona industrial'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20290'),
            'colonia' => ('Vista Alegre'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20290'),
            'colonia' => ('Parque Industrial ALTEC'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20296'),
            'colonia' => ('Rústicos Calpulli'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20296'),
            'colonia' => ('Reserva San Matías'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20296'),
            'colonia' => ('Villas de Bonaterra'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20296'),
            'colonia' => ('San Francisco de los Arteaga'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20296'),
            'colonia' => ('Residencial San Javier'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20296'),
            'colonia' => ('Villa Sur'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20297'),
            'colonia' => ('Casa Blanca'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20297'),
            'colonia' => ('Jardines de Blanca'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20297'),
            'colonia' => ('Jardines de Casanueva'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20298'),
            'colonia' => ('Emiliano Zapata'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20298'),
            'colonia' => ('Morelos I'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20298'),
            'colonia' => ('Morelos 2a Sección'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20298'),
            'colonia' => ('Solidaridad 4a Sección'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20298'),
            'colonia' => ('Residencial Hacienda San Martín'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20298'),
            'colonia' => ('Viñedos del Sur'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20298'),
            'colonia' => ('Reserva Villa Sur'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20298'),
            'colonia' => ('Villas de Ajedrez'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20298'),
            'colonia' => ('Lomas de Vistabella'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20298'),
            'colonia' => ('San Sebastián'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20298'),
            'colonia' => ('Lomas del Sur'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20298'),
            'colonia' => ('Lomas de Nueva York'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20298'),
            'colonia' => ('Laureles del Sur'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20298'),
            'colonia' => ('Lomas del Mirador'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20298'),
            'colonia' => ('Misión de Santa Lucía'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        
        FacadesDB::table('cp')->insert([
            'codigo' => ('20298'),
            'colonia' => ('Lomas de Vistabella 2a. Sección'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20298'),
            'colonia' => ('Lotes de Arellano'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20298'),
            'colonia' => ('Condominio La terraza'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20298'),
            'colonia' => ('Valle del Cedazo'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20298'),
            'colonia' => ('Paseos de San Antonio'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20298'),
            'colonia' => ('Hacienda San Marcos'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20299'),
            'colonia' => ('Lomas del Ajedrez'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20299'),
            'colonia' => ('Mujeres Ilustres'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20299'),
            'colonia' => ('Periodistas'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20299'),
            'colonia' => ('Villa del Chapulín'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20299'),
            'colonia' => ('Los Dolores'),
            'tipo_asenta' => ('Granja'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20299'),
            'colonia' => ('Fundadores'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20299'),
            'colonia' => ('Lomas de San Jorge'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20299'),
            'colonia' => ('Reencuentro'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20299'),
            'colonia' => ('Villalta'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20299'),
            'colonia' => ('Lunaria'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20300'),
            'colonia' => ('Panamericano'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20300'),
            'colonia' => ('San Francisco de los Romos Centro'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20303'),
            'colonia' => ('El Tirón (El Progreso)'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20303'),
            'colonia' => ('Hidalgo'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20303'),
            'colonia' => ('La Aurora'),
            'tipo_asenta' => ('Granja'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20303'),
            'colonia' => ('La Guadalupana'),
            'tipo_asenta' => ('Granja'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20303'),
            'colonia' => ('La Perla'),
            'tipo_asenta' => ('Granja'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20303'),
            'colonia' => ('Los Cedros'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20303'),
            'colonia' => ('María'),
            'tipo_asenta' => ('Granja'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20303'),
            'colonia' => ('Revolución'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20303'),
            'colonia' => ('San Francisco'),
            'tipo_asenta' => ('Granja'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20303'),
            'colonia' => ('San José Buenavista'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20303'),
            'colonia' => ('Cerrada San Francisco'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20304'),
            'colonia' => ('Fracción de la Trinidad II'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20304'),
            'colonia' => ('La Escondida (El Salero)'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20304'),
            'colonia' => ('Monserrat'),
            'tipo_asenta' => ('Granja'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20304'),
            'colonia' => ('San José del Barranco'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20304'),
            'colonia' => ('San Juan'),
            'tipo_asenta' => ('Granja'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20304'),
            'colonia' => ('28 de Abril'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20304'),
            'colonia' => ('Santa Bárbara'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20304'),
            'colonia' => ('El Cardonal'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20304'),
            'colonia' => ('Santa Fe'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20305'),
            'colonia' => ('El Barranco'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20305'),
            'colonia' => ('El Gigante'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20305'),
            'colonia' => ('El Refugio'),
            'tipo_asenta' => ('Granja'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20305'),
            'colonia' => ('Santa Elena (Elena)'),
            'tipo_asenta' => ('Granja'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20305'),
            'colonia' => ('La Gloria'),
            'tipo_asenta' => ('Rancho'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20305'),
            'colonia' => ('La Paz'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20305'),
            'colonia' => ('La Providencia'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20305'),
            'colonia' => ('La Trinidad'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20305'),
            'colonia' => ('La Unión'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20305'),
            'colonia' => ('Las Carmelitas'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20305'),
            'colonia' => ('Los Lirios'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20305'),
            'colonia' => ('Sociedad Plan de los Sabinos'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20305'),
            'colonia' => ('San Ángel'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20305'),
            'colonia' => ('San Pedro Victoria de Arriba'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20305'),
            'colonia' => ('Santa Anita'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20305'),
            'colonia' => ('Zacatenco'),
            'tipo_asenta' => ('Granja'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20306'),
            'colonia' => ('Los Corrales (Los Corrales Blancos)'),
            'tipo_asenta' => ('Rancho'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20306'),
            'colonia' => ('El Chamizal'),
            'tipo_asenta' => ('Rancho'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20306'),
            'colonia' => ('Mary'),
            'tipo_asenta' => ('Granja'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20306'),
            'colonia' => ('Villa de Guadalupe'),
            'tipo_asenta' => ('Rancho'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20306'),
            'colonia' => ('San Pablo'),
            'tipo_asenta' => ('Rancho'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20310'),
            'colonia' => ('Los Negritos'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20310'),
            'colonia' => ('Coyotes'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20310'),
            'colonia' => ('Viñedos Valle Redondo'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20310'),
            'colonia' => ('CERESO (Para Varones y Mujeres)'),
            'tipo_asenta' => ('Zona federal'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20310'),
            'colonia' => ('La Loma de los Negritos'),
            'tipo_asenta' => ('Pueblo'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20310'),
            'colonia' => ('Viñedos San Felipe'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20313'),
            'colonia' => ('Cuauhtémoc (Las Palomas)'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20313'),
            'colonia' => ('Hacienda Nueva'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20314'),
            'colonia' => ('El Cariñán'),
            'tipo_asenta' => ('Granja'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20316'),
            'colonia' => ('Santa Cruz de la Presa'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20316'),
            'colonia' => ('Lomas del Picacho'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20320'),
            'colonia' => ('Estación Cañada Honda'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20320'),
            'colonia' => ('General José María Morelos y Pavón (Cañada Honda)'),
            'tipo_asenta' => ('Pueblo'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20320'),
            'colonia' => ('Las Cañadas'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20323'),
            'colonia' => ('Santa María de Gallardo'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20324'),
            'colonia' => ('Jaltomate'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20326'),
            'colonia' => ('Loretta'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20326'),
            'colonia' => ('Parque Industrial Tecnopolo 2 (PITP2)'),
            'tipo_asenta' => ('Zona industrial'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20326'),
            'colonia' => ('La Aurora'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20326'),
            'colonia' => ('Bosque Sereno'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20326'),
            'colonia' => ('Cavalia'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20326'),
            'colonia' => ('Quinta los Olivos'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20326'),
            'colonia' => ('Misión de San Jerónimo'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20326'),
            'colonia' => ('Privada Los Olivos'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20326'),
            'colonia' => ('Residencial Punta del Cielo'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20326'),
            'colonia' => ('Portón San Ignacio'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20326'),
            'colonia' => ('Valle de San Ignacio (El Filso)'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20326'),
            'colonia' => ('San Ignacio'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20326'),
            'colonia' => ('La Trinidad'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20326'),
            'colonia' => ('Tamarindos'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20326'),
            'colonia' => ('Xaramá Entorno Residencial'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20326'),
            'colonia' => ('Puesta del Sol'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20326'),
            'colonia' => ('La Soledad'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20326'),
            'colonia' => ('La Rioja'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20326'),
            'colonia' => ('Rinconada de San Ignacio'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20326'),
            'colonia' => ('Ex-Hacienda de San Ignacio'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20326'),
            'colonia' => ('La Perla'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20326'),
            'colonia' => ('San Ignacio II'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20326'),
            'colonia' => ('San Ignacio III'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20328'),
            'colonia' => ('Los Fresnos'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20328'),
            'colonia' => ('Terranza'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20328'),
            'colonia' => ('Pocitos'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20328'),
            'colonia' => ('Parque Industrial Tecnopolo Pocitos'),
            'tipo_asenta' => ('Zona industrial'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20329'),
            'colonia' => ('Privanza Andaluz'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20329'),
            'colonia' => ('Residencial Las Quintas'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20329'),
            'colonia' => ('La Querencia'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20329'),
            'colonia' => ('Rincón Andaluz'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20329'),
            'colonia' => ('La Plazuela'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20329'),
            'colonia' => ('Torres Residencial Campestre Santamaría'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20329'),
            'colonia' => ('La Punta Campestre'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20329'),
            'colonia' => ('Contadero'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20329'),
            'colonia' => ('La Joya'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20329'),
            'colonia' => ('Río Viejo'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20330'),
            'colonia' => ('Crucero Ojo de Agua de Crucitas'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20330'),
            'colonia' => ('Palo Alto'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20330'),
            'colonia' => ('De Triana'),
            'tipo_asenta' => ('Barrio'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20330'),
            'colonia' => ('Palo Alto Centro'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20330'),
            'colonia' => ('Pobre'),
            'tipo_asenta' => ('Barrio'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20330'),
            'colonia' => ('De Afuera'),
            'tipo_asenta' => ('Barrio'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20330'),
            'colonia' => ('De Abajo'),
            'tipo_asenta' => ('Barrio'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20330'),
            'colonia' => ('El Progreso'),
            'tipo_asenta' => ('Barrio'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20330'),
            'colonia' => ('El Salto'),
            'tipo_asenta' => ('Barrio'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20330'),
            'colonia' => ('El Saucito'),
            'tipo_asenta' => ('Barrio'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20333'),
            'colonia' => ('El Cotón'),
            'tipo_asenta' => ('Rancho'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20333'),
            'colonia' => ('El Milagro'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20333'),
            'colonia' => ('Las Flores (El Cotón)'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20333'),
            'colonia' => ('Licenciado Jesús Terán (El Muerto)'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20333'),
            'colonia' => ('San Francisco de los Viveros'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20333'),
            'colonia' => ('Sandovales (San Miguel de los Sandovales)'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20333'),
            'colonia' => ('San Francisco de los Pedroza'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20333'),
            'colonia' => ('El Barreno (Ampliación San Francisco)'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20333'),
            'colonia' => ('El Mocho'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20333'),
            'colonia' => ('San Gerónimo'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20333'),
            'colonia' => ('San José (San Antonio de Montoya)'),
            'tipo_asenta' => ('Granja'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20334'),
            'colonia' => ('El Novillo'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20334'),
            'colonia' => ('La Luz'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20335'),
            'colonia' => ('El Puertecito'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20335'),
            'colonia' => ('Ojo de Agua de Crucitas'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20336'),
            'colonia' => ('El Terremoto'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20336'),
            'colonia' => ('Francisco Sarabia (La Reforma)'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20336'),
            'colonia' => ('Los Conos'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20336'),
            'colonia' => ('Montoya'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20336'),
            'colonia' => ('Santa Rosa (El Huizache)'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20337'),
            'colonia' => ('El Retoño'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20337'),
            'colonia' => ('La Tinaja'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20337'),
            'colonia' => ('El Rosario'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20338'),
            'colonia' => ('El Copetillo'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20338'),
            'colonia' => ('El Tildío'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20338'),
            'colonia' => ('La Unión (La Paz)'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20338'),
            'colonia' => ('Rancho Nuevo'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20338'),
            'colonia' => ('El Chonguillo (El Chonguito)'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20338'),
            'colonia' => ('El Copetillo (El Moquete)'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20338'),
            'colonia' => ('Tanque el Coyote (El Coyote)'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20338'),
            'colonia' => ('Mirasoles'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20339'),
            'colonia' => ('San José (San José de los Rodríguez)'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20339'),
            'colonia' => ('El Centenario'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20339'),
            'colonia' => ('Santa Rita'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20339'),
            'colonia' => ('La Primavera'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20339'),
            'colonia' => ('Lomas del Refugio (La Loma)'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20339'),
            'colonia' => ('Santa Elena'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20339'),
            'colonia' => ('El Llano [CERESO]'),
            'tipo_asenta' => ('Zona federal'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20339'),
            'colonia' => ('Granja Temixco'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20339'),
            'colonia' => ('El Paraíso (Santa Rita)'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20339'),
            'colonia' => ('Santa Rita Uno (Santa Rita)'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20339'),
            'colonia' => ('San Lorenzo'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20339'),
            'colonia' => ('Santa Clara (Las Mieleras)'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20339'),
            'colonia' => ('San Agustín de los Díaz'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20339'),
            'colonia' => ('La Lucita'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20339'),
            'colonia' => ('La Calavera'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20339'),
            'colonia' => ('San Antonio de la Rosa'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20339'),
            'colonia' => ('San Ramón'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('El Llano'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20340'),
            'colonia' => ('Parque Industrial de Logística Automotriz (PILA)'),
            'tipo_asenta' => ('Zona industrial'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20340'),
            'colonia' => ('Arellano'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20340'),
            'colonia' => ('Buenavista de Peñuelas'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20340'),
            'colonia' => ('Peñuelas (El Cienegal)'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20340'),
            'colonia' => ('El Cedazo (Cedazo de San Antonio)'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20341'),
            'colonia' => ('El Salto de los Salado'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20342'),
            'colonia' => ('San Francisco'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20342'),
            'colonia' => ('San Gerardo'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20342'),
            'colonia' => ('Santa Gertrudis'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20343'),
            'colonia' => ('San José'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20344'),
            'colonia' => ('La Rinconada (La Escondida)'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20344'),
            'colonia' => ('Villa Licenciado Jesús Terán (Calvillito)'),
            'tipo_asenta' => ('Pueblo'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20345'),
            'colonia' => ('Montoro (Mesa del Salto)'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20346'),
            'colonia' => ('Los Caños'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20347'),
            'colonia' => ('Dolores'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20347'),
            'colonia' => ('El Turicate'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20348'),
            'colonia' => ('San Antonio de Peñuelas'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20349'),
            'colonia' => ('Aguascalientes (Lic. Jesús Terán Peredo)'),
            'tipo_asenta' => ('Aeropuerto'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20350'),
            'colonia' => ('Los Capricornios (La Biznaga)'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20350'),
            'colonia' => ('Loretito (Charco del Toro)'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20350'),
            'colonia' => ('Macario J Gómez'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20350'),
            'colonia' => ('Medio Kilo'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20355'),
            'colonia' => ('La Concepción'),
            'tipo_asenta' => ('Pueblo'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20355'),
            'colonia' => ('Viñedos River'),
            'tipo_asenta' => ('Hacienda'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20355'),
            'colonia' => ('Parque Industrial San Francisco'),
            'tipo_asenta' => ('Zona industrial'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20355'),
            'colonia' => ('Paseos de la Providencia'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20355'),
            'colonia' => ('Urbi Villa del Vergel'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20356'),
            'colonia' => ('Borrotes'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20356'),
            'colonia' => ('Estación Chicalote'),
            'tipo_asenta' => ('Paraje'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20357'),
            'colonia' => ('Arellano'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20357'),
            'colonia' => ('Amapolas del Río'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20357'),
            'colonia' => ('El Tepetate'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20357'),
            'colonia' => ('Rancho Nuevo'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20358'),
            'colonia' => ('Monteverde'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20358'),
            'colonia' => ('Valle de Aguascalientes'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20358'),
            'colonia' => ('Reserva Quetzales'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20358'),
            'colonia' => ('Rancho Seco'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20358'),
            'colonia' => ('Castelo San Francisco'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20358'),
            'colonia' => ('Puertecito de la Virgen'),
            'tipo_asenta' => ('Pueblo'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20358'),
            'colonia' => ('Parque Industrial Valle de Aguascalientes'),
            'tipo_asenta' => ('Zona industrial'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20358'),
            'colonia' => ('Ex-Viñedos Guadalupe'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20358'),
            'colonia' => ('Villas de San Felipe'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20358'),
            'colonia' => ('La Casita'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20358'),
            'colonia' => ('La Ribera'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20358'),
            'colonia' => ('Sendero de los Quetzales'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('San Francisco de los Romo'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20363'),
            'colonia' => ('San Antonio de los Pedroza'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20363'),
            'colonia' => ('San José de la Ordeña'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20364'),
            'colonia' => ('San Nicolás de Arriba'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20364'),
            'colonia' => ('San Nicolás de en Medio'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20366'),
            'colonia' => ('La Herrada'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20366'),
            'colonia' => ('El Colorado (El Soyatal)'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20366'),
            'colonia' => ('El Conejal'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20367'),
            'colonia' => ('2 de Octubre'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20367'),
            'colonia' => ('Che Guevara'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20367'),
            'colonia' => ('Tanque el Trigo'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20367'),
            'colonia' => ('Norias de Ojocaliente'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20369'),
            'colonia' => ('El Malacate'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20370'),
            'colonia' => ('Puerto de Nieto'),
            'tipo_asenta' => ('Rancho'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20371'),
            'colonia' => ('Santa Cruz de la Presa (La Tlacuacha)'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20371'),
            'colonia' => ('Ciudad de los Niños'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20371'),
            'colonia' => ('La Cotorra'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20372'),
            'colonia' => ('Cabecita 3 Marías (Rancho Nuevo)'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20372'),
            'colonia' => ('El Niágara'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20372'),
            'colonia' => ('Ex-Hacienda de Agostaderito'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20372'),
            'colonia' => ('Granjas Fátima'),
            'tipo_asenta' => ('Rancho'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20372'),
            'colonia' => ('Villa Campestre San José del Monte'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20373'),
            'colonia' => ('El Ocote'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20374'),
            'colonia' => ('La Huerta (La Cruz)'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20375'),
            'colonia' => ('El Tanque de los Jiménez'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20375'),
            'colonia' => ('Campestre Bosques de Las Lomas'),
            'tipo_asenta' => ('Condominio'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20376'),
            'colonia' => ('Centro de Arriba (El Taray)'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20377'),
            'colonia' => ('San Pedro Cieneguilla'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20378'),
            'colonia' => ('Cieneguilla (La Lumbrera)'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20378'),
            'colonia' => ('Cieneguilla'),
            'tipo_asenta' => ('Hacienda'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20384'),
            'colonia' => ('El Hotelito'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20384'),
            'colonia' => ('Norias del Paso Hondo'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20384'),
            'colonia' => ('Paso Hondo'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20386'),
            'colonia' => ('El Duraznillo'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20388'),
            'colonia' => ('Los Cuervos (Los Ojos de Agua)'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20388'),
            'colonia' => ('San Bartolo'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20389'),
            'colonia' => ('Los Durón'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20389'),
            'colonia' => ('Soledad de Abajo'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20389'),
            'colonia' => ('Matamoros'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20392'),
            'colonia' => ('Parque Industrial Gigante de los Arellano'),
            'tipo_asenta' => ('Zona industrial'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20392'),
            'colonia' => ('El Gigante (Arellano)'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20392'),
            'colonia' => ('Norias de Cedazo (Cedazo Norias de Montoro)'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20392'),
            'colonia' => ('Montoro'),
            'tipo_asenta' => ('Rancho'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20392'),
            'colonia' => ('Universidad Autónoma de Aguascalientes  Campus Sur'),
            'tipo_asenta' => ('Equipamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20392'),
            'colonia' => ('Campestre el Potrerillo'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20393'),
            'colonia' => ('Parque Industrial FINSA Aguascalientes'),
            'tipo_asenta' => ('Zona industrial'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20394'),
            'colonia' => ('Lomas de Arellano'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20394'),
            'colonia' => ('Tanque de Guadalupe'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20394'),
            'colonia' => ('Cañada Grande de Cotorina'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20395'),
            'colonia' => ('Cotorina (Coyotes)'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20396'),
            'colonia' => ('El Refugio de Peñuelas'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20396'),
            'colonia' => ('Ex-Hacienda de Peñuelas'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Aguascalientes'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20400'),
            'colonia' => ('Rincón de Romos Centro'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20403'),
            'colonia' => ('Rincón Real'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20403'),
            'colonia' => ('Norte'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20403'),
            'colonia' => ('Santa Elena'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20404'),
            'colonia' => ('Valle del Real'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20404'),
            'colonia' => ('José Luis Macias'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20404'),
            'colonia' => ('Estancia de Chora'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20404'),
            'colonia' => ('Embajadores'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20405'),
            'colonia' => ('El Chaveño'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20405'),
            'colonia' => ('De Guadalupe'),
            'tipo_asenta' => ('Barrio'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20405'),
            'colonia' => ('La Paz'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20406'),
            'colonia' => ('Rinconada de las Piedras'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20406'),
            'colonia' => ('Rinconada Alameda'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20406'),
            'colonia' => ('De Chora'),
            'tipo_asenta' => ('Barrio'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20406'),
            'colonia' => ('Santa Cruz'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20406'),
            'colonia' => ('Lázaro Cárdenas'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20406'),
            'colonia' => ('Fraternidad'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20406'),
            'colonia' => ('Cerro del Gato'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20410'),
            'colonia' => ('Independencia'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20410'),
            'colonia' => ('Magisterial'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20410'),
            'colonia' => ('Magisterial II'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20410'),
            'colonia' => ('Santa Anita'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20410'),
            'colonia' => ('El Potrero'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20410'),
            'colonia' => ('La Mezquitera'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20414'),
            'colonia' => ('Villas de Jesús'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20415'),
            'colonia' => ('Fundadores'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20415'),
            'colonia' => ('San José'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20416'),
            'colonia' => ('Presidentes de México'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20416'),
            'colonia' => ('Solidaridad'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20417'),
            'colonia' => ('Miguel Hidalgo'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20417'),
            'colonia' => ('Popular'),
            'tipo_asenta' => ('Fraccionamiento'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20420'),
            'colonia' => ('Pablo Escaleras'),
            'tipo_asenta' => ('Colonia'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20420'),
            'colonia' => ('El Saucillo'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20420'),
            'colonia' => ('Presa de San Elías (José Muñoz)'),
            'tipo_asenta' => ('Ranchería'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]);

        FacadesDB::table('cp')->insert([
            'codigo' => ('20420'),
            'colonia' => ('El Bajío'),
            'tipo_asenta' => ('Ejido'),
            'municipio' => ('Rincón de Romos'),
            'estado' => ('Aguascalientes'),
        ]); */



        //580 excel
        
        
    }
}
