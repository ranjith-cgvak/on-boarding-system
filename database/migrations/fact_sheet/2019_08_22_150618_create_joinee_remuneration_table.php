<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoineeRemunerationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remuneration',function(Blueprint $table){
        	$table->integer('joinee_id')->unsigned()->index();
        	$table->decimal('take_home_sal',12,2);
        	$table->text('deductions');
        	$table->decimal('monthly_ctc',12,2);
        	$table->decimal('yearly_ctc',12,2);
        	$table->text('others')->nullable();
            $table->foreign('joinee_id')
                  ->references('id')
                  ->on('fact_sheet')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('remuneration');
    }
}
