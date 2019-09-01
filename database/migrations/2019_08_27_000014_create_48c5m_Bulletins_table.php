<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create48C5MBulletinsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = '48c5m_Bulletins';

    /**
     * Run the migrations.
     * @table 48c5m_Bulletins
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('codeAnnee',9)->nullable(false);
            $table->string('codeEtablissement', 45)->nullable(false);
            $table->string('matriculeEleve', 45)->nullable(false);
            $table->string('periode', 45)->nullable(false);
            $table->binary('bulletin');

            $table->index(["codeAnnee"], 'fk_48c5m_Bulletins_AnneeScolaire1_idx');

            $table->index(["matriculeEleve"], 'fk_48c5m_Bulletins_48c5m_Eleve1_idx');

            $table->index(["codeEtablissement"], 'fk_48c5m_Bulletins_48c5m_Etablissement1_idx');

            $table->foreign('codeAnnee', 'fk_48c5m_Bulletins_AnneeScolaire1_idx')
                ->references('codeAnnee')->on('48c5m_AnneeScolaire')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('matriculeEleve', 'fk_48c5m_Bulletins_48c5m_Eleve1_idx')
                ->references('matriculeEleve')->on('48c5m_Eleve')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('codeEtablissement', 'fk_48c5m_Bulletins_48c5m_Etablissement1_idx')
                ->references('numeroAutorisation')->on('48c5m_Etablissement')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->primary(['codeAnnee', 'codeEtablissement', 'matriculeEleve', 'periode'],'idBulletin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}