<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('well_sensor_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('well_sensor_id')->constrained('well_sensor', 'well_sensor_id')->onDelete('cascade');
            $table->date('data_date');
            $table->time('data_time');
            $table->integer('bit_depth_m');
            $table->integer('scfm');
            $table->integer('mud_cond_in_mmho');
            $table->integer('block_pos_m');
            $table->integer('wob_klb');
            $table->integer('bvdepth_m');
            $table->integer('mud_cond_out_mmho');
            $table->integer('torque_klbft');
            $table->integer('rpm');
            $table->integer('hkld_klb');
            $table->integer('log_depth_m');
            $table->integer('h2s_1_ppm');
            $table->integer('mud_flow_outp');
            $table->integer('totspm');
            $table->integer('sp_press_psi');
            $table->integer('mud_flow_in_gpm');
            $table->integer('co2_1_perct');
            $table->integer('gas_perct');
            $table->integer('mud_temp_in_c');
            $table->integer('mud_temp_out_c');
            $table->integer('tank_vol_tot_bbl');
            $table->integer('ropi_m_hr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('well_sensor_data');
    }
};
