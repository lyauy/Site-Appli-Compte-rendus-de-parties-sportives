<?php

use Illuminate\Database\Seeder;

class SportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('catégoriesports')->insert(

        	array(
        		array(
        			'libellésport' => 'Football'
        		),
        		array(
        			'libellésport' => 'Basketball'
        		),
        		array(
        			'libellésport' => 'Athlétisme'
        		),
        		array(
        			'libellésport' => 'Baseball'
        		),
        		array(
        			'libellésport' => 'Escrime'
        		),
        		array(
        			'libellésport' => 'Tennis'
        		),
        		array(
        			'libellésport' => 'Tennis de table'
        		),
        		array(
        			'libellésport' => 'Golf'
        		),
        		array(
        			'libellésport' => 'Hockey'
        		),
        		array(
        			'libellésport' => 'Karaté'
        		),
        		array(
        			'libellésport' => 'Judo'
        		),
        		array(
        			'libellésport' => 'Aikido'
        		),
        		array(
        			'libellésport' => 'Taekwondo'
        		),
        		array(
        			'libellésport' => 'Boxe'
        		),
        		array(
        			'libellésport' => 'Aviation'
        		),
        		array(
        			'libellésport' => 'Volleyball'
        		),
        		array(
        			'libellésport' => 'Cyclisme'
        		),
        		array(
        			'libellésport' => 'Handball'
        		),
        		array(
        			'libellésport' => 'Lutte'
        		),
        		array(
        			'libellésport' => 'Sumo'
        		),
        		array(
        			'libellésport' => 'Badminton'
        		),
        		array(
        			'libellésport' => 'Krav-maga'
        		),
        		array(
        			'libellésport' => 'Capoeira'
        		),
        		array(
        			'libellésport' => 'Canoë'
        		),
        		array(
        			'libellésport' => 'Ski'
        		),
        		array(
        			'libellésport' => 'Natation'
        		),
        		array(
        			'libellésport' => 'Joutes'
        		),
        		array(
        			'libellésport' => 'Formule 1'
        		),
        		array(
        			'libellésport' => 'Rallye'
        		),
        		array(
        			'libellésport' => 'Catch'
        		),
        		array(
        			'libellésport' => 'Echecs'
        		),
        		array(
        			'libellésport' => 'Billard'
        		),
        		array(
        			'libellésport' => 'Aviron'
        		),
        		array(
        			'libellésport' => 'Rugby'
        		),
        		array(
        			'libellésport' => 'Tir'
        		),
        		array(
        			'libellésport' => 'Pétanque'
        		),
        		array(
        			'libellésport' => 'Moto'
        		),
        		array(
        			'libellésport' => 'Kendo'
        		),
        		array(
        			'libellésport' => 'Ju-Jitsu'
        		),
        		array(
        			'libellésport' => 'Trampoline'
        		),
        		array(
        			'libellésport' => 'Bowling'
        		),
        		

        	)

        );
    }
}
