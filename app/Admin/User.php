<?php

namespace App\Admin;

use App\Models\User as UserModel;
use Webapix\Admin\Fields\Date;
use Webapix\Admin\Fields\MorphToMany;
use Webapix\Admin\Fields\Password;
use Webapix\Admin\Fields\Text;
use Webapix\Admin\Resource;

class User extends Resource
{
    public $model = UserModel::class;
    public $pageTitle = 'Users';

    /**
     * @return array
     */
    public function fields()
    {
        return [
            Text::make('Name')
                ->rules('required'),
            Text::make('Email')
                ->rules('required|email'),
            Password::make('Password'),
            Date::make('Email Verified At')
                ->withTime()
                ->rules('nullable|date')
                ->exceptOnForms(),
            Date::make('Created At')
                ->exceptOnForms(),

            MorphToMany::make('Roles'),
            MorphToMany::make('Permissions')
        ];
    }

    public function toMenuItem()
    {
        return parent::toMenuItem()
            ->icon('fas fa-user');
    }
}
