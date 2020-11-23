<?php

namespace App\Modules;

class Response {

    public function answer($data, $optional = []) {
        if (!empty($data)) {

            $html = '';
            if (isset($optional['url'])) {
                ob_start();
                require($_SERVER['DOCUMENT_ROOT'] . $optional['url']);
                $html = ob_get_clean();
            }
            $arResponse = array_merge($data, $optional);
            if (!empty($optional)) {
                $arResponse['html'] = $html;
            }

            return $this->toJSON($arResponse);
        }
        return $this->toJSON(['result' => false, 'message' => 'Invalid type of Request.']);
    }



    private function toJSON(array $array) {
        return json_encode($array);
    }
}