<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiPerInventaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fi_per_inventaire', function (Blueprint $table) {
            $table->bigIncrements('id_numinv'); // id auto
            $table->string('numinv', 13)->nullable()->comment('Numinventaire');
            $table->string('description', 300)->nullable()->comment('Description');
            $table->string('numserie', 30)->nullable()->comment('N° de serie');
            $table->date('datfabrication')->nullable()->comment('date de fabrication');
            $table->string('numfact', 8)->nullable()->comment('Numero facture');
            $table->date('datfact')->nullable()->comment('date facture');
            $table->string('numbrec', 8)->nullable()->comment('Numero bon de reception');
            $table->date('datbrec')->nullable()->comment('date bon de reception');
            $table->string('Codtypsortexcep', 2)->nullable()->comment('Codtypsortexcep');
            $table->date('dattypsortexcep')->nullable()->comment('Date type de sortie excep');
            $table->string('Codfour', 4)->nullable()->comment('Codfour');
            $table->date('datacquisition')->nullable()->comment('Date d\'acquisition');
            $table->date('datsortexcep')->nullable()->comment('date sortie exceptionnel');
            $table->string('Codorigine', 1)->nullable()->comment('Codorigine');
            $table->string('Codetat', 1)->nullable()->comment('Codetat');
            $table->string('Codvaleur', 1)->nullable()->comment('Codvaleur');
            $table->string('Coddive', 3)->nullable()->comment('Coddive');
            $table->date('datsortdiv')->nullable()->comment('date sortie divers');
            $table->date('datentdecision')->nullable()->comment('date entree par decision');
            $table->string('numbsor', 8)->nullable()->comment('N° bon de sortie');
            $table->date('datbsor')->nullable()->comment('Date bon sortie');
            $table->string('codpers', 4)->nullable()->comment('code personnel');
            $table->string('nligne', 4)->nullable()->comment('N° de ligne');
            $table->string('clembrec', 12)->nullable()->comment('Clembrec'); // numbrec,nligne
            $table->string('numbsortdiv', 8)->nullable()->comment('Numero bon de sortie divers');
            $table->string('numbsortexcep', 8)->nullable()->comment('Numero bon de sortie exceptionnel');
            $table->string('numdecision', 8)->nullable()->comment('Numero decision domaine');
            $table->binary('image')->nullable()->comment('image');
            $table->string('clenumbsor', 12)->nullable()->comment('clenumbsor'); // Code_service,numbsor
            $table->date('datannulreforme')->nullable()->comment('Date annulation reforme');
            $table->string('clenuminv', 17)->nullable()->comment('clenuminv'); // numinv,id_numinv
            $table->string('Chemin_image', 100)->nullable()->comment('Chemin_image');
            $table->bigInteger('puht')->nullable()->comment('Prix unitaire HT'); // 99 999 999 999
            $table->string('Codtpf', 100)->nullable()->comment('Codtpf');
            $table->string('Codtva', 100)->nullable()->comment('Codtva');
            $table->decimal('prixttc', 12, 3)->nullable()->comment('Prix d\'achat ttc'); // 999 999 999,999
            $table->string('clecodartnumbrec', 21)->nullable()->comment('clecodartnumbrec'); // Code_article,numbrec
            $table->string('cle_numbrecnuminv', 21)->nullable()->comment('cle_numbrecnuminv'); // numbrec,numinv
            $table->boolean('type_transfert_collecteur')->nullable()->comment('type_transfert_collecteur');
            $table->boolean('type_transfert_excel')->nullable()->comment('type_transfert_excel');
            $table->bigInteger('num_operationinventaire')->nullable()->comment('num_operationinventaire collecteur'); // 999 999 999
            $table->date('datinv')->nullable()->comment('Datinv inventaire collecteur');
            $table->string('codeabarre_visible', 50)->nullable()->comment('codeabarre_visible');
            $table->bigInteger('num_ordre_frid')->nullable()->comment('num_ordre_frid'); // 999 999 999 999
            $table->string('num_frid', 50)->nullable()->comment('num_frid');
            $table->string('Code_article', 20)->nullable()->comment('code article');
            $table->string('Code_service', 5)->nullable()->comment('Code_service');
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
        Schema::dropIfExists('fi_per_inventaire');
    }
}
