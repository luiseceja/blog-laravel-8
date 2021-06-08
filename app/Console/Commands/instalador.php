<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\roles;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class instalador extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando ejecuta el instalador inicial del proyecto';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (!$this->verificarrol() && !$this->verificaruser()) {
            $rol = $this->crearRolSuperAdmin();
            $usuario = $this->crearUsuarioSuperAdmin();
            $usuario->roles()->attach($rol);
            $this->info('ya se crearon el usurio y el rol');

        } else {
            $this->error('No se puede crear el rol ni el usuario ya que se han creado');
        }
    }
    private function verificarrol()
    {
        return roles::find(1);
    }
    private function verificaruser()
    {
        return User::find(1);
    }
    private function crearRolSuperAdmin()
    {
        $nombre = "super Administrador";
        return  roles::create([
            'nombre' => $nombre,
            'slug' => $slug = Str::slug($nombre, '-')
        ]);
    }
    private function crearUsuarioSuperAdmin()
    {
        return User::create([
            'name' => 'SuperAdmin',
            'email' => 'luisceja100@hotmail.com',
            'password' => Hash::make('123'),
            'estado' => 1

        ]);
    }
}
