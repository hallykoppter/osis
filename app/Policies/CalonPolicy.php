<?php

namespace App\Policies;

use App\Models\Calon;
use App\Models\Siswa;
use Illuminate\Auth\Access\HandlesAuthorization;

class CalonPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Siswa $siswa)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Siswa  $siswa
     * @param  \App\Models\Calon  $calon
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Siswa $siswa, Calon $calon)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Siswa $siswa)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Siswa  $siswa
     * @param  \App\Models\Calon  $calon
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Siswa $siswa, Calon $calon)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Siswa  $siswa
     * @param  \App\Models\Calon  $calon
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Siswa $siswa, Calon $calon)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Siswa  $siswa
     * @param  \App\Models\Calon  $calon
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Siswa $siswa, Calon $calon)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Siswa  $siswa
     * @param  \App\Models\Calon  $calon
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Siswa $siswa, Calon $calon)
    {
        //
    }
}
