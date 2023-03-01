<?php

namespace App\Admin;

use Spatie\Permission\Models\Role as RoleModel;
use Webapix\Admin\Fields\BelongsToMany;
use Webapix\Admin\Fields\Text;
use Webapix\Admin\Resource;

class Role extends Resource
{
    public $pageTitle = 'Roles';

    public function __construct()
    {
        $this->model = config('permission.models.role', RoleModel::class);
    }

    /**
     * @return array
     */
    public function fields()
    {
        return [
            Text::make('Name')
                ->rules('required'),
            Text::make('Guard Name'),
            BelongsToMany::make('Permissions')
        ];
    }

    public function toMenuItem()
    {
        return parent::toMenuItem()
            ->icon('fas fa-user-shield');
    }
}
