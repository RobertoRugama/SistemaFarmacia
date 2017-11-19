<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /************************USERS*********************/
        $alberto = Db::table('users')->insertGetId(
            [
                'name'=>'alberto',
                'email'=>'albertchc04@gmail.com',
                'password' => bcrypt('achamorro123!'),
                'remember_token' => str_random(10),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        $roberto = Db::table('users')->insertGetId(
            [
                'name'=>'roberto',
                'email'=>'hrugama01@gmail.com',
                'password' => bcrypt('rhernandez123!'),
                'remember_token' => str_random(10),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
         
        /************************CHARGES*********************/
         $cajero = Db::table('charges')->insertGetId(
            [
                'status'=> true,
                'name'=>'Cajero',
                'description' => 'Atiende al cliente',
                'salary' => 5900.5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        $admon = Db::table('charges')->insertGetId(
            [
                'status'=> true,
                'name'=>'Administrador',
                'description' => 'Gestiona el bien de la empresa',
                'salary' => 29000.0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        /************************CATEGORIES*********************/
        $categoryA = Db::table('categories')->insertGetId(
            [
                'status'=> true,
                'name'=>'Categoria A',
                'description' => 'productos que empiezan en su nombre por la letra A',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        $categoryB = Db::table('categories')->insertGetId(
            [
                'status'=> true,
                'name'=>'Categoria B',
                'description' => 'productos que empiezan en su nombre por la letra B',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        $categoryC = Db::table('categories')->insertGetId(
            [
                'status'=> true,
                'name'=>'Categoria C',
                'description' => 'productos que empiezan en su nombre por la letra C',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        $categoryD = Db::table('categories')->insertGetId(
            [
                'status'=> true,
                'name'=>'Categoria D',
                'description' => 'productos que empiezan en su nombre por la letra D',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        $categoryE = Db::table('categories')->insertGetId(
            [
                'status'=> true,
                'name'=>'Categoria E',
                'description' => 'productos que empiezan en su nombre por la letra E',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            
        $cleaning = Db::table('categories')->insertGetId(
            [
                'status'=> true,
                'name'=>'Productos de Limpieza',
                'description' => 'Productos para limpieza',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

                     
        $hygiene = Db::table('categories')->insertGetId(
            [
                'status'=> true,
                'name'=>'Productos de Higuiene',
                'description' => 'Productos de higuiene personal',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
       
        /************************LABORATORIES*********************/
        $isnaya = Db::table('laboratories')->insertGetId(
            [
                'status'=> true,
                'name'=>'Laborarios Isnaya',
                'location' => 'Cost S Esc Anexa 1/2c al Oe',
                'type' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        $unimark = Db::table('laboratories')->insertGetId(
            [
                'status'=> true,
                'name'=>'Unimark, S.A.',
                'location' => 'Semáf Club Terraza 150m al Oe M/I',
                'type' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        $rocha = Db::table('laboratories')->insertGetId(
            [
                'status'=> true,
                'name'=>'Drogueria Rocha, S.A.',
                'location' => 'Km 15.2 Carretera Masaya, Edificio E.Chamorro Industrial',
                'type' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        $ramos = Db::table('laboratories')->insertGetId(
            [
                'status'=> true,
                'name'=>'Laboratios Ramos',
                'location' => 'Carret Norte Km 6',
                'type' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        
        /************************PROVIDERS*********************/
        $estrellaRoja = Db::table('providers')->insertGetId(
            [
                'status'=> true,
                'name'=>'Farmacias Estrella Roja',
                'address' => 'Plaza el Progreso Módulo No. 1',
                'ruc' => '44112333J',
                'url' => 'http://www.farmaciasestrellaroja.com.ni',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        $calox = Db::table('providers')->insertGetId(
            [
                'status'=> true,
                'name'=>'Calox de Nicaragua',
                'address' => 'Rot El Gueguense 130m al E Fte a Price Smart',
                'ruc' => '89112333I',
                'url' => 'http://calox.com',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        $nipro = Db::table('providers')->insertGetId(
            [
                'status'=> true,
                'name'=>'Nipro Medical Corporation',
                'address' => 'Km 7 1/2 Carret Norte Fte a Tabacalera',
                'ruc' => '44100033J',
                'url' => 'http://www.niprocoorporation.com.ni',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);


    }
}
