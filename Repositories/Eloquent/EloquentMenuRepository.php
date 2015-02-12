<?php namespace Modules\Menu\Repositories\Eloquent;

use Modules\Menu\Events\MenuWasCreated;
use Modules\Menu\Repositories\MenuRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentMenuRepository extends EloquentBaseRepository implements MenuRepository
{
    public function create($data)
    {
        $menu = $this->model->create($data);

        $this->raise(new MenuWasCreated($menu));

        $this->dispatchEventsFor($this);

        return $menu;
    }

    public function update($menu, $data)
    {
        $menu->update($data);

        return $menu;
    }
}
