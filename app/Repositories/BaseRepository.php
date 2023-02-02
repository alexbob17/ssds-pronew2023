<?php 

namespace SSD\Repositories;

abstract class BaseRepository {

	/**
	 * The Model instance.
	 *
	 * @var Illuminate\Database\Eloquent\Model
	 */
	protected $model;

	public function getNumber()
	{
		$total = $this->model->count();

		$new = $this->model->whereSeen(0)->count();

		return compact('total', 'new');
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

	public function getById($id)
	{
		return $this->model->findOrFail($id);
	}
}
