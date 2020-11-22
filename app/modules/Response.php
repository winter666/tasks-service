<?php

namespace App\Modules;

class Response {

    public function answer($data, $optional = []) {
        if (!empty($data)) {
            $arResponse['result'] = $data['result'];
            $arResponse['message'] = $data['message'];
            $html = '';

            if (isset($optional['url'])) {
                ob_start();
                include($_SERVER['DOCUMENT_ROOT'] . $optional['url']);
                $html = ob_get_clean();
            }
            $arResponse['html'] = $html;

            if (!empty($optional)) {
                $arResponse = array_merge($data, $optional);
            }

            return $this->toJSON($arResponse);
        }
        return $this->toJSON(['result' => false, 'message' => 'Invalid type of Request.']);
    }



    private function toJSON(array $array) {
        return json_encode($array);
    }
}