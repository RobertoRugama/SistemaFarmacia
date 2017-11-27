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
                'email'=>'roberto.rugama01@gmail.com',
                'password' => bcrypt('Rugama!23'),
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

        /************************EMPLOYEES*********************/
        $employee1 = Db::table('employees')->insertGetId(
            [
                'status'=> true,
                'date_register' => date('Y-m-d H:i:s'),
                'identification_card'=>'4010407950003Q',
                'first_name'=>'Juan',
                'second_name'=>'Jose',
                'first_last_name'=>'Perez',
                'second_last_name'=>'Rojas',
                'address' => 'Plaza el Progreso Módulo No. 1',
                'user' => 'jjose04',
                'previleges' => 'admin',
                'charge_id'    =>  $cajero,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            $employee2 = Db::table('employees')->insertGetId(
                [
                    'status'=> true,
                    'date_register' => date('Y-m-d H:i:s'),
                    'identification_card'=>'4012212900033H',
                    'first_name'=>'Alvaro',
                    'second_name'=>'Marth',
                    'first_last_name'=>'Talavera',
                    'second_last_name'=>'Gonzales',
                    'address' => 'Plaza el Progreso Módulo No. 2',
                    'user' => 'alvarom33',
                    'previleges' => 'writer',
                    'charge_id'    =>  $admon,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
             /************************PRODUCTS*********************/
            $pampers = Db::table('products')->insertGetId(
            [
                'status'=> true,
                'name' => 'Pampers',
                'presentation'=>'Bolson',
                'description'=>'para bebes de 2 a 4 meses',
                'existence'=> 200,
                'reference'=>'Mayor',
                'unit_price'=>188.5,
                'provider_id' => $estrellaRoja,
                'laboratory_id' => $ramos,
                'category_id'    =>  $hygiene,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $ambromox2 = Db::table('products')->insertGetId(
                [
                    'status'=> true,
                    'name' => 'AB AMBROMOX',
                    'presentation'=>'Vial + Accesorios',
                    'description'=>'Polvo para Solución INYECTABLE 1,200 mg',
                    'existence'=> 100,
                    'reference'=>'Unidad',
                    'unit_price'=>40,
                    'provider_id' => $estrellaRoja,
                    'laboratory_id' => $ramos,
                    'category_id'    =>  $categoryA,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
               $ambromox1 = Db::table('products')->insertGetId(
                    [
                        'status'=> true,
                        'name' => 'AB AMBROMOX',
                        'presentation'=>'Caja Vial',
                        'description'=>'Polvo para Solución INYECTABLE 600 mg',
                        'existence'=> 100,
                        'reference'=>'Unidad',
                        'unit_price'=>30,
                        'provider_id' => $estrellaRoja,
                        'laboratory_id' => $ramos,
                        'category_id'    =>  $categoryA,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                $irbelab = Db::table('products')->insertGetId(
                    [
                        'status'=> true,
                        'name' => 'IRBELAB',
                        'presentation'=>'Caja Envase Blister Tabletas',
                        'description'=>'Tableta',
                        'existence'=> 10,
                        'reference'=>'Detalle',
                        'unit_price'=>4,
                        'provider_id' => $estrellaRoja,
                        'laboratory_id' => $ramos,
                        'category_id'    =>  $categoryA,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                $adacel = Db::table('products')->insertGetId(
                    [
                        'status'=> true,
                        'name' => 'ADACEL',
                        'presentation'=>'Caja Frasco X 0.5 mL',
                        'description'=>'Suspensión Inyectable',
                        'existence'=> 22,
                        'reference'=>'Unidad',
                        'unit_price'=>2.54,
                        'provider_id' => $estrellaRoja,
                        'laboratory_id' => $ramos,
                        'category_id'    =>  $categoryA,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                $amikacina_sufalto = Db::table('products')->insertGetId(
                    [
                        'status'=> true,
                        'name' => 'AMIKACINA SULFATO',
                        'presentation'=>'Ampolla x 4 mL',
                        'description'=>'Solución Inyectable 1 g/4 mL',
                        'existence'=> 50,
                        'reference'=>'Detalle',
                        'unit_price'=>34,
                        'provider_id' => $calox,
                        'laboratory_id' => $unimark,
                        'category_id'    =>  $categoryA,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);

                $amikacina = Db::table('products')->insertGetId(
                    [
                        'status'=> true,
                        'name' => 'AMIKACINA',
                        'presentation'=>'Ampolla X 2 mL',
                        'description'=>'Solución Inyectable 100 mg/2 mL',
                        'existence'=> 100,
                        'reference'=>'Detalle',
                        'unit_price'=>44,
                        'provider_id' => $calox,
                        'laboratory_id' => $unimark,
                        'category_id'    =>  $categoryA,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);

                $ampicilina_sulbactam = Db::table('products')->insertGetId(
                    [
                        'status'=> true,
                        'name' => 'AMPICILINA + SULBACTAM',
                        'presentation'=>'VialL',
                        'description'=>'Polvo para Solución Polvo para Solución',
                        'existence'=> 20,
                        'reference'=>'Detalle',
                        'unit_price'=>120.12,
                        'provider_id' => $calox,
                        'laboratory_id' => $unimark,
                        'category_id'    =>  $categoryA,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);

    }
}
