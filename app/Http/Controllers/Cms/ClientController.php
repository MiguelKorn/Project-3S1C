<?php

namespace App\Http\Controllers\Cms;

use App\Client;
use App\ClientTranslation;
use App\ProjectTranslation;
use Illuminate\Http\Request;

class ClientController extends CmsController
{
    protected $allowedPages = ['portfolio'];


    public function showAll($pageName)
    {
        if ($this->checkPage($pageName)) {
            $clients = Client::all();
            foreach ($clients as $client) {
                $client['translation'] = ClientTranslation::where([['client_id', '=', $client->id], ['locale', '=', 'nl']])->first();
            }

            return view('cms.clients', compact(['pageName', 'clients']));
        } else {
            return redirect()->back();
        }
    }

    public function showByID($pageName, $clientID)
    {
        if ($this->checkPage($pageName)) {
            $client = Client::where('id', $clientID)->first();
            $client['translations'] = $client->translations()->get();

            return view('cms.client', compact('pageName', 'client'));
        } else {
            return redirect()->back();
        }
    }

    public function showAddForm($pageName)
    {
        return view('cms.forms.addClient', compact('pageName'));
    }

    public function add($pageName)
    {
        $data = request()->all();
        $client = new Client();
        $client->url = $data['url'];
        $client->save();

        $cNL = new ClientTranslation();
        $cNL->client_id = $client->id;
        $cNL->locale = 'nl';
        $cNL->name = $data['name-nl'];
        $cNL->save();

        $cEN = new ClientTranslation();
        $cEN->client_id = $client->id;
        $cEN->locale = 'en';
        $cEN->name = $data['name-en'];
        $cEN->save();

        //        todo: if() save -> show else error/redirect

        return redirect()->route('cms.clients', $pageName);
    }

    public function showEditForm($pageName, $clientID)
    {
        $client = Client::where('id', $clientID)->first();
        $client['nl'] = $client->translations()->where('locale', 'nl')->first();
        $client['en'] = $client->translations()->where('locale', 'en')->first();

        return view('cms.forms.editClient', compact('pageName', 'client'));
    }

    public function edit($pageName, $clientID)
    {
        $data = request()->all();
        $client = Client::where('id', $clientID)->first();
        $client->url = $data['url'];
        $client->save();

        $cNL = $client->translations()->where('locale', 'nl')->first();
        $cNL->name = $data['name-nl'];
        $cNL->save();

        $cEN = $client->translations()->where('locale', 'en')->first();
        $cEN->name = $data['name-en'];
        $cEN->save();

        return redirect()->route('cms.clients.client', compact('pageName', 'clientID'));
    }

    public function delete($pageName, $clientID)
    {
        $client = Client::where('id', $clientID)->first();

        if ($client->delete()) {
            return redirect()->route('cms.clients', compact('pageName'));
        }
    }
}
