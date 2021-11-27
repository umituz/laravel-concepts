<?php

namespace Gallery\Policies;

use App\Gallery;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class GalleryPolicy
 * @package Gallery\Policies
 * @todo NOT COMPLETED YET
 */
class GalleryPolicy
{
	use HandlesAuthorization;
	/**
	 * Determine whether the user can view any Gallerys.
	 *
	 * @param  \App\User  $user
	 * @return mixed
	 */
	public function viewAny(User $user)
	{
		return true;
	}
	/**
	 * Determine whether the user can view the Gallery.
	 *
	 * @param  \App\User  $user
	 * @param  \App\Gallery  $Gallery
	 * @return mixed
	 */
	public function view(User $user, Gallery $Gallery)
	{
		return $user->id == $Gallery->user_id;
	}
	/**
	 * Determine whether the user can create Gallerys.
	 *
	 * @param  \App\User  $user
	 * @return mixed
	 */
	public function create(User $user)
	{
		return true;
	}
	/**
	 * Determine whether the user can update the Gallery.
	 *
	 * @param  \App\User  $user
	 * @param  \App\Gallery  $Gallery
	 * @return mixed
	 */
	public function update(User $user, Gallery $Gallery)
	{
		return $user->id == $Gallery->user_id;
	}
	/**
	 * Determine whether the user can delete the Gallery.
	 *
	 * @param  \App\User  $user
	 * @param  \App\Gallery  $Gallery
	 * @return mixed
	 */
	public function delete(User $user, Gallery $Gallery)
	{
		return $user->id == $Gallery->user_id;
	}
	/**
	 * Determine whether the user can restore the Gallery.
	 *
	 * @param  \App\User  $user
	 * @param  \App\Gallery  $Gallery
	 * @return mixed
	 */
	public function restore(User $user, Gallery $Gallery)
	{
		return false;
	}
	/**
	 * Determine whether the user can permanently delete the Gallery.
	 *
	 * @param  \App\User  $user
	 * @param  \App\Gallery  $Gallery
	 * @return mixed
	 */
	public function forceDelete(User $user, Gallery $Gallery)
	{
		return false;
	}
}