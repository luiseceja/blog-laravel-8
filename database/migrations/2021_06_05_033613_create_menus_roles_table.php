
   <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateMenusRolesTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('menus_roles', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('menus_id');
                $table->foreign('menus_id')->references('id')->on('menuses')->onDelete('cascade')->onUpdate('restrict');
                $table->unsignedBigInteger('roles_id');
                $table->foreign('roles_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('restrict');

            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('menus_roles');
        }
    }
