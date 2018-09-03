<?php

namespace BrainySoft\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('bsText', 'components.form.text', ['name', 'value' => null, 'attributes' => []]);
        Form::component('bsNumber', 'components.form.number', ['name', 'value' => null, 'attributes' => []]);
        Form::component('bsSelect', 'components.form.select', ['name', 'value' => null,'selected' => '', 'attributes' => []]);
        Form::component('bsEmail', 'components.form.email', ['name', 'value' => null, 'attributes' => []]);
        Form::component('bsSubmit', 'components.form.submit', ['value' => 'Submit', 'attributes' => []]);
        Form::component('bsFile', 'components.form.file', ['name', 'attributes' => []]);
        Form::component('bsDate', 'components.form.date', ['name', 'value' => null, 'attributes' => []]);
        Form::component('bsHidden', 'components.form.hidden', ['name','value' => null, 'attributes' => []]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }
}
