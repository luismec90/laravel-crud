<?php namespace Montoya\Crud\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CrudController extends Controller
{

    private $lowerEntity;
    private $lowerPluralEntity;
    private $upperEntity;
    private $upperPluralEntity;

    public function index()
    {
        return view('crud::index');
    }

    public function generate(Request $request)
    {
        $this->lowerEntity = strtolower($request->input('entity'));
        $this->lowerPluralEntity = str_plural($this->lowerEntity);
        $this->upperEntity = ucfirst($this->lowerEntity);
        $this->upperPluralEntity = str_plural($this->upperEntity);

        $this->createMigration();
        $this->createModel();
        $this->createController();
        $this->createViews();
        $this->createRoutes();

    }

    private function createMigration()
    {
        $source = __DIR__ . '/../Templates/Migration.tpl.php';
        $content = $this->renderTemplate($source);
        $path = base_path() . '/database/migrations/' . date('Y_m_d_His') . '_create_' . $this->lowerPluralEntity . '_table.php';
        $this->createFile($path, $content);

        Artisan::call('migrate');

    }

    private function createModel()
    {
        $source = __DIR__ . '/../Templates/Model.tpl.php';
        $content = $this->renderTemplate($source);
        $this->createFile(app_path() . '/' . $this->upperEntity . '.php', $content);
    }

    private function createController()
    {
        $source = __DIR__ . '/../Templates/Controller.tpl.php';
        $content = $this->renderTemplate($source);
        $this->createFile(app_path() . '/Http/Controllers/' . $this->upperEntity . 'Controller.php', $content);
    }

    private function createViews()
    {
        $path = base_path() . '/resources/views/' . $this->lowerPluralEntity;

        if (!is_dir($path)) {
            $this->createFolder($path);
        }

        $source = __DIR__ . '/../Templates/index.tpl.blade.php';
        $content = $this->renderTemplate($source, ['lowerPluralEntity', 'upperEntity'], [$this->lowerPluralEntity, $this->upperEntity]);
        $this->createFile($path . '/index.blade.php', $content);

        $source = __DIR__ . '/../Templates/show.tpl.blade.php';
        $content = $this->renderTemplate($source, ['lowerPluralEntity', 'upperEntity'], [$this->lowerPluralEntity, $this->upperEntity]);
        $this->createFile($path . '/show.blade.php', $content);

        $source = __DIR__ . '/../Templates/create.tpl.blade.php';
        $content = $this->renderTemplate($source, ['lowerPluralEntity', 'upperEntity'], [$this->lowerPluralEntity, $this->upperEntity]);
        $this->createFile($path . '/create.blade.php', $content);
    }

    private function createRoutes()
    {
        $addRoute = 'Route::resource(\'' . $this->lowerPluralEntity . '\', \'' . ucfirst($this->upperEntity) . 'Controller\');';
        $this->appendToFile(app_path() . '/Http/routes.php', $addRoute);
    }

    private function renderTemplate($source, $find = null, $replace = null)
    {
        if (is_null($find) || is_null($replace)) {
            $find = ['lowerEntity',
                'lowerPluralEntity',
                'upperEntity',
                'upperPluralEntity'];

            $replace = [$this->lowerEntity,
                $this->lowerPluralEntity,
                $this->upperEntity,
                $this->upperPluralEntity];
        }

        $content = file_get_contents($source);

        return str_replace($find, $replace, $content);

    }

    private function createFolder($path)
    {
        mkdir($path);
    }

    private function createFile($path, $content)
    {
        file_put_contents($path, $content);
    }

    protected function appendToFile($path, $text)
    {
        $content = file_get_contents($path);
        if (!str_contains($content, $text)) {
            $newContent = substr($content, 0, strlen($content)) . "\n" . $text;
            file_put_contents($path, $newContent);
        }
    }
}