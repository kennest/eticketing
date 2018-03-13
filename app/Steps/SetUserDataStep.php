<?php
namespace App\Wizard\Steps;

use Smajti1\Laravel\Step;


class SetUserDataStep extends Step
{

    public static $label = 'Donnees Client';
    public static $slug = 'set-user-data';
    public static $view = 'client.pages.wizard.userdata';

    public function process(\Illuminate\Http\Request $request)
    {
        // for example, create user
    
        // next if you want save one step progress to session use
        $this->saveProgress($request);
    }

    public function rules(\Illuminate\Http\Request $request = null): array
    {
        return [
            'number' => 'required|min:8|max:8',
        ];
    }
}