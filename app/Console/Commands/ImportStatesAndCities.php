<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\State;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ImportStatesAndCities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ibge:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data of states and cities from IBGE Api to local database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Downloading States');
        $states = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados')->json();
        foreach ($states as $stateData) {
            $state = State::updateOrCreate(

                ['id' => $stateData['id']],
                [
                    'abbr' => $stateData['sigla'],
                    'name' => $stateData['nome']
                ]
            );

            $this->info("Downloading cities from $state->abbr");
            $cities = Http::get("https://servicodados.ibge.gov.br/api/v1/localidades/estados/$state->abbr/municipios")->json();
            foreach ($cities as $cityData) {
                City::updateOrCreate(

                    ['id' => $cityData['id']],
                    [
                        'state_id' => $stateData['id'],
                        'name' => $cityData['nome']
                    ]
                );
            }
        }
        $this->info("Import succesfull");
        return Command::SUCCESS;
    }
}
