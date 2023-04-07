<?php

    namespace App\Classes;


use Redmine\Client\NativeCurlClient;

class HelpRedmine{

    /**
     * @return NativeCurlClient
     */
    public function createClientRestApi(){

        return new NativeCurlClient(getenv('REDMINE_API_URL'), getenv('REDMINE_API_USERNAME'), getenv('REDMINE_API_PASSWORD'));
    }

    /**
     * Trabalha o request da tela para ser utilizado pelo Rest do redmine na inserção
     *
     * @param array $request
     * @return array
     */
    public function workRequestToRest( array $request )
    {
        $client = $this->createClientRestApi();

        // Trabalha os campos personalizados "cf_"
        $customFields = array_flip($client->getApi('custom_fields')->listing());
        foreach ($request as $id => $value)
        {
            if ( str_contains($id, 'cf_') )
            {
                $idCustomfield = str_replace('cf_', '', $id);

                $request['custom_fields'][] = array(
                    'id' => $idCustomfield,
                    'name' => $customFields[$idCustomfield],
                    'value' => $value);
            }
        }

        //Trabalha o campo de upload de arquivo
        if( !is_null($request["file"]) )
        {
            $file = explode('.', $request["file"]);
            $upload = json_decode($client->getApi('attachment')->upload($request["file"]));

            $request['uploads'] = array(
                array(
                    'token' => $upload->upload->token,
                    'filename' => $request["file"],
                    'description' => 'Arquivo inserido na criação da OP',
                    'content_type' => 'application/' . $file[1]
                )
            );
        }

        return $request;
    }

}
