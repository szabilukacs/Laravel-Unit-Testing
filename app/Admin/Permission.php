<?php

namespace App\Admin;

use Spatie\Permission\Models\Permission as PermissionModel;
use Webapix\Admin\Fields\BelongsToMany;
use Webapix\Admin\Fields\Text;
use Webapix\Admin\Resource;

class Permission extends Resource
{
    public $pageTitle = 'Permissions';

    public function __construct()
    {
        $this->model = config('permission.models.permission', PermissionModel::class);
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
            BelongsToMany::make('Roles')
        ];
    }

    public function toMenuItem()
    {
        return parent::toMenuItem()
            ->icon('fas fa-user-shield');
    }
}
