<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redmine\Api\Issue;
use Redmine\Client\NativeCurlClient;
use App\Classes\HelpRedmine;


class IssueController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.issue');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {

        //Trata os campos da tela que precisam de dados vindos do Redmine
        $params['usuarios'] = $this->workFieldClientToView();
        $params['prioridades'] = $this->workFieldPriorityToView();
        $params['acos'] = $this->workFieldRuleToView();
        $params['borrachas'] = $this->workFieldRubberToView();

        return view('admin.issue.create', $params);
    }


    /**
     * @param Request $request
     * @return void
     *
     */
    public function store(Request  $request)
    {
        $helpRedmine = new HelpRedmine();
        $client = $helpRedmine->createClientRestApi();

        $request = $helpRedmine->workRequestToRest($request->all());

        return $client->getApi( 'issue')->create($request);
    }


    /**
     * Trabalha os dados de USUÁRIOS retornados do Redmine para o campo select da tela
     *
     * @return array
     */
    public function workFieldClientToView()
    {
        $helpRedmine = new HelpRedmine();
        $users = $helpRedmine->createClientRestApi()->getApi('user')->all();

        $usuarios = array();
        foreach ($users['users'] as $user)
        {
            $usuarios[] = array('id' => $user['id'],
                'name' => $user['firstname'] . ' ' . $user['lastname']);
        }

        return $usuarios;
    }

    /**
     * Trabalha os dados do campo PRIORIDADE retornados do Redmine para o campo select da tela
     *
     * @return array
     */
    public function workFieldPriorityToView()
    {
        $helpRedmine = new HelpRedmine();
        $priorities = $helpRedmine->createClientRestApi()->getApi('issue_priority')->all();

        $return = array();
        foreach ($priorities['issue_priorities'] as $priority)
        {
            $return[] = array('id' => $priority['id'],
                'name' => $priority['name']);
        }

        return $return;
    }

    /**
     * Trabalha os dados possíveis do campo personalizado de AÇO retornados do Redmine para o campo select da tela
     *
     * @return array
     */
    public function workFieldRuleToView()
    {
        $helpRedmine = new HelpRedmine();
        $customFields = $helpRedmine->createClientRestApi()->getApi('custom_fields')->all();

        $return = array();
        foreach ($customFields['custom_fields'] as $customField)
        {
            if ($customField['id'] == getenv('REDMINE_FIELD_ACO'))
            {
                foreach ( $customField['possible_values'] as $possibles )
                {
                    $return[] = array('id' => $possibles['value'],
                        'name' => $possibles['label']);
                }
                break;
            }
        }


        return $return;
    }


    /**
     * Trabalha os dados possíveis do campo personalizado de BORRACHA retornados do Redmine para o campo select da tela
     *
     * @return array
     */
    public function workFieldRubberToView()
    {
        $helpRedmine = new HelpRedmine();
        $customFields = $helpRedmine->createClientRestApi()->getApi('custom_fields')->all();

        $return = array();
        foreach ($customFields['custom_fields'] as $customField)
        {
            if ($customField['id'] == getenv('REDMINE_FIELD_TIPO_BORRACHA'))
            {
                foreach ( $customField['possible_values'] as $possibles )
                {
                    $return[] = array('id' => $possibles['value'],
                                      'name' => $possibles['label']);
                }
                break;
            }
        }


        return $return;
    }



}
