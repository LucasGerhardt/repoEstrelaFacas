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
     * Trabalha os campos "cf_" do array para poder ser usado pelo Rest API do redmine
     *
     * @param array $request
     * @return array
     */
    public function workRequestCustomFieldsToRest( array $request )
    {
        $client = $this->createClientRestApi();
        $customFields = $client->getApi('custom_fields')->all();

        dd($request);
        $i = 0;
        foreach ($request as $id => $value)
        {
            if ( str_contains($id, 'cf_') )
            {
                $idCustomfield = str_replace('cf_', '', $id);

                $request['custom_fields'][] = array('id' => $idCustomfield,
                                                    'name' => $customFields[0][$i]['name'],
                                                    'value' => $value);
            }

            $i++;
        }

        dd($request);

        return $request;
    }

}
