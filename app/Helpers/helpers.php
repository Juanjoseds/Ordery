<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use Config;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Helper
{
    public static function applClasses()
    {
        // Demo
        $fullURL = request()->fullurl();
        if (App()->environment() === 'production') {
            for ($i = 1; $i < 7; $i++) {
                $contains = Str::contains($fullURL, 'demo-' . $i);
                if ($contains === true) {
                    $data = config('custom.' . 'demo-' . $i);
                }
            }
        } else {
            $data = config('custom.custom');
        }

        // default data array
        $DefaultData = [
            'mainLayoutType' => 'vertical',
            'theme' => 'light',
            'sidebarCollapsed' => false,
            'navbarColor' => '',
            'horizontalMenuType' => 'floating',
            'verticalMenuNavbarType' => 'floating',
            'footerType' => 'static', //footer
            'layoutWidth' => 'boxed',
            'showMenu' => true,
            'bodyClass' => '',
            'pageClass' => '',
            'pageHeader' => true,
            'contentLayout' => 'default',
            'blankPage' => false,
            'defaultLanguage' => 'en',
            'direction' => env('MIX_CONTENT_DIRECTION', 'ltr'),
        ];

        // if any key missing of array from custom.php file it will be merge and set a default value from dataDefault array and store in data variable
        $data = array_merge($DefaultData, $data);

        // All options available in the template
        $allOptions = [
            'mainLayoutType' => array('vertical', 'horizontal'),
            'theme' => array('light' => 'light', 'dark' => 'dark-layout', 'bordered' => 'bordered-layout', 'semi-dark' => 'semi-dark-layout'),
            'sidebarCollapsed' => array(true, false),
            'showMenu' => array(true, false),
            'layoutWidth' => array('full', 'boxed'),
            'navbarColor' => array('bg-primary', 'bg-info', 'bg-warning', 'bg-success', 'bg-danger', 'bg-dark'),
            'horizontalMenuType' => array('floating' => 'navbar-floating', 'static' => 'navbar-static', 'sticky' => 'navbar-sticky'),
            'horizontalMenuClass' => array('static' => '', 'sticky' => 'fixed-top', 'floating' => 'floating-nav'),
            'verticalMenuNavbarType' => array('floating' => 'navbar-floating', 'static' => 'navbar-static', 'sticky' => 'navbar-sticky', 'hidden' => 'navbar-hidden'),
            'navbarClass' => array('floating' => 'floating-nav', 'static' => 'navbar-static-top', 'sticky' => 'fixed-top', 'hidden' => 'd-none'),
            'footerType' => array('static' => 'footer-static', 'sticky' => 'footer-fixed', 'hidden' => 'footer-hidden'),
            'pageHeader' => array(true, false),
            'contentLayout' => array('default', 'content-left-sidebar', 'content-right-sidebar', 'content-detached-left-sidebar', 'content-detached-right-sidebar'),
            'blankPage' => array(false, true),
            'sidebarPositionClass' => array('content-left-sidebar' => 'sidebar-left', 'content-right-sidebar' => 'sidebar-right', 'content-detached-left-sidebar' => 'sidebar-detached sidebar-left', 'content-detached-right-sidebar' => 'sidebar-detached sidebar-right', 'default' => 'default-sidebar-position'),
            'contentsidebarClass' => array('content-left-sidebar' => 'content-right', 'content-right-sidebar' => 'content-left', 'content-detached-left-sidebar' => 'content-detached content-right', 'content-detached-right-sidebar' => 'content-detached content-left', 'default' => 'default-sidebar'),
            'defaultLanguage' => array('en' => 'en', 'fr' => 'fr', 'de' => 'de', 'pt' => 'pt'),
            'direction' => array('ltr', 'rtl'),
        ];

        //if mainLayoutType value empty or not match with default options in custom.php config file then set a default value
        foreach ($allOptions as $key => $value) {
            if (array_key_exists($key, $DefaultData)) {
                if (gettype($DefaultData[$key]) === gettype($data[$key])) {
                    // data key should be string
                    if (is_string($data[$key])) {
                        // data key should not be empty
                        if (isset($data[$key]) && $data[$key] !== null) {
                            // data key should not be exist inside allOptions array's sub array
                            if (!array_key_exists($data[$key], $value)) {
                                // ensure that passed value should be match with any of allOptions array value
                                $result = array_search($data[$key], $value, 'strict');
                                if (empty($result) && $result !== 0) {
                                    $data[$key] = $DefaultData[$key];
                                }
                            }
                        } else {
                            // if data key not set or
                            $data[$key] = $DefaultData[$key];
                        }
                    }
                } else {
                    $data[$key] = $DefaultData[$key];
                }
            }
        }

        //layout classes
        $layoutClasses = [
            'theme' => $data['theme'],
            'layoutTheme' => $allOptions['theme'][$data['theme']],
            'sidebarCollapsed' => $data['sidebarCollapsed'],
            'showMenu' => $data['showMenu'],
            'layoutWidth' => $data['layoutWidth'],
            'verticalMenuNavbarType' => $allOptions['verticalMenuNavbarType'][$data['verticalMenuNavbarType']],
            'navbarClass' => $allOptions['navbarClass'][$data['verticalMenuNavbarType']],
            'navbarColor' => $data['navbarColor'],
            'horizontalMenuType' => $allOptions['horizontalMenuType'][$data['horizontalMenuType']],
            'horizontalMenuClass' => $allOptions['horizontalMenuClass'][$data['horizontalMenuType']],
            'footerType' => $allOptions['footerType'][$data['footerType']],
            'sidebarClass' => '',
            'bodyClass' => $data['bodyClass'],
            'pageClass' => $data['pageClass'],
            'pageHeader' => $data['pageHeader'],
            'blankPage' => $data['blankPage'],
            'blankPageClass' => '',
            'contentLayout' => $data['contentLayout'],
            'sidebarPositionClass' => $allOptions['sidebarPositionClass'][$data['contentLayout']],
            'contentsidebarClass' => $allOptions['contentsidebarClass'][$data['contentLayout']],
            'mainLayoutType' => $data['mainLayoutType'],
            'defaultLanguage' => $allOptions['defaultLanguage'][$data['defaultLanguage']],
            'direction' => $data['direction'],
        ];
        // set default language if session hasn't locale value the set default language
        if (!session()->has('locale')) {
            app()->setLocale($layoutClasses['defaultLanguage']);
        }

        // sidebar Collapsed
        if ($layoutClasses['sidebarCollapsed'] == 'true') {
            $layoutClasses['sidebarClass'] = "menu-collapsed";
        }

        // blank page class
        if ($layoutClasses['blankPage'] == 'true') {
            $layoutClasses['blankPageClass'] = "blank-page";
        }

        return $layoutClasses;
    }

    public static function updatePageConfig($pageConfigs)
    {
        $demo = 'custom';
        $fullURL = request()->fullurl();
        if (App()->environment() === 'production') {
            for ($i = 1; $i < 7; $i++) {
                $contains = Str::contains($fullURL, 'demo-' . $i);
                if ($contains === true) {
                    $demo = 'demo-' . $i;
                }
            }
        }
        if (isset($pageConfigs)) {
            if (count($pageConfigs) > 0) {
                foreach ($pageConfigs as $config => $val) {
                    Config::set('custom.' . $demo . '.' . $config, $val);
                }
            }
        }
    }

    /**
     * @param $base64
     * @return array
     * Devuelve un array:
     * [0] Nombre
     * [1] Extensión
     * [2] Imagen base64 sin data
     */
    public static function base64toStore($base64){
        $image_64 = $base64;
        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf
        $replace = substr($image_64, 0, strpos($image_64, ',')+1);

        $image = str_replace($replace, '', $image_64);
        $image = str_replace(' ', '+', $image);
        $imageName = Str::random(20).'.'.$extension;
        return [$imageName, $extension, $image];
    }

    public static function base64ToFile($base64Image)
    {
        try {
            //set name of the image file
            $extension = strtolower(explode('/', mime_content_type($base64Image))[1]);
            $base64Image = trim($base64Image);
            $base64Image = str_replace('data:image/png;base64,', '', $base64Image);
            $base64Image = str_replace('data:image/jpg;base64,', '', $base64Image);
            $base64Image = str_replace('data:image/jpeg;base64,', '', $base64Image);
            $base64Image = str_replace('data:image/gif;base64,', '', $base64Image);
            $base64Image = str_replace(' ', '+', $base64Image);
            // Convertir el base54 en file
            $imageData = base64_decode($base64Image);
            // Devolver el fichero y la extensión
            return [
                'file' => $imageData,
                'extension' => $extension,
            ];
        } catch (\Throwable $th) {
            return null;
            // CAMBIAR ESTO A VALIDACIONES REALES, PENDIENTE!!!!
        }
    }

    public static function randomString($length = 5)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }

    public static function getStoredImage($base64){
        $img = base64_encode(Storage::disk('tiendas')->get($base64));
        $mime = Storage::disk('tiendas')->mimeType($base64);
        $img = "data:$mime;base64,$img";
        return $img;
    }

    public function tratarImagenes($request = null, $modelo, $folderName, $sesion)
    {
        $files_old = glob(storage_path('app/public/images/' . $folderName . '/' . $modelo->id . '/*')); // obtener imagenes del anuncio
        $oldImages = [];

        // En caso de que vengan imagenes antiguas, significa que se han eliminado imagenes del anuncio al editarlo
        if($request->has('oldImages')) {
            $imageNames = array_map('basename', $files_old); // obtener los nombres de las imagenes actual del anuncio
            $oldImages = json_decode($request->oldImages); // Obtener las imagenes antiguas que vienen del front

            foreach ($imageNames as $imageName) {
                // Verificar si el nombre de la imagen antigua no está en la lista de imágenes del servidor
                $found = false;
                foreach ($oldImages as $oldImage) {
                    if ($oldImage->name === $imageName) {
                        $found = true;
                        break;
                    }
                }

                // Si el nombre de archivo no se encuentra en $oldImages, eliminarlo del sistema
                if (!$found) {
                    File::delete(storage_path('app/public/images/' . $folderName . '/' . $modelo->id . '/' . $imageName));
                }
            }

        } else {
            foreach ($files_old as $file) {
                File::delete($file);
            }
        }

        $oldImagesRoutes = implode(',', array_column($oldImages, 'route'));

        $fotos = "";
        if ($request->has('filesName') && !is_null($request->filesName)) {
            $imagenes = explode(',', $request->filesName);
            $errores = [];

            Log::info($request->all());
            foreach ($imagenes as $index => $foto) {
                $extension = $request->$foto->getMimeType();
                //Check Formato
                $supported_image = array(
                    'image/jpeg',
                    'image/pjpeg',
                    'image/png',
                    'image/x-png',
                    'image/gif'
                );
                //check imagen
                if (!in_array($extension, $supported_image)) {
                    $errores[$foto][] = "Imagen no soportada";
                }

                //Check Size
                $size = filesize($request->$foto);
                $megas = 5;
                if ($size / 1024 / 1024 > $megas) {
                    $errores[$foto][] = "Imagen demasiado grande";
                }
            }

            if (sizeof($errores) > 0) {
                throw new \Exception("errores");
            }

            foreach ($imagenes as $index => $foto) {
                $extension = $request->$foto->getMimeType();
                $nombre = explode('/', $foto);
                $onlyName = $nombre[sizeof($nombre) - 1];
                $imageName = 'images' . $folderName . '/' . $modelo->id . '/' . $onlyName;
                $encoded_image = 'data:' . $extension . ';base64,' . base64_encode(file_get_contents($request->$foto));
                $newName = Helpers::imageInStorage($encoded_image, $imageName);
                $fotos .= count($imagenes) == $index + 1 ? $newName : $newName . ','; // Guardamos la ruta de la imagen seguido de una "," excepto la ultima imagen
            }
        }

        $allImages = array_merge(explode(',', $oldImagesRoutes), explode(',', $fotos)); // Unimos las imagenes antiguas con las nuevas
        $imagenes = $this->orderImages($allImages, $request->fileOrder);

        if ($oldImagesRoutes != "" || $fotos != "") {
            $modelo->imagenes = implode(',', $imagenes); // Guardamos las imagenes en el modelo
            // $modelo->imagenes = $oldImagesRoutes . ($oldImagesRoutes != "" && $fotos != "" ? "," : "") . $fotos;
        } else {
            $modelo->imagenes = null;
        }
    }

}
