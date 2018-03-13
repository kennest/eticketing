<?php
namespace App\Wizard\Steps;

use Smajti1\Laravel\Step;
use Illuminate\Http\Request;

class SetUserDataStep extends Step
{

    public static $label = 'Donnees Client';
    public static $slug = 'set-user-data';
    public static $view = 'client.pages.wizard.userdata';

    public function process(Request $request)
    {
        // for example, create user
    
        // next if you want save one step progress to session use
        $this->saveProgress($request);
    }

    public function rules(Request $request = null): array
    {
        return [
            'number' => 'required|min:8|max:8',
        ];
    }
}